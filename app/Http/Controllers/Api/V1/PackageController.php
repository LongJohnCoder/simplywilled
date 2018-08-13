<?php

namespace App\Http\Controllers\Api\V1;

use App\Exceptions\HttpBadRequestException;
use App\User;
use App\Role;
use App\Models\PasswordReset;
use Auth;
use Crypt;
use DB;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use JWTAuthException;
use Log;
use Mail;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator;
use App\Models\Packages;
use App\Helper\DateTimeHelper;
use \Carbon\Carbon;
use Paypalpayment;
use App\Models\Coupon;
use App\Models\UserPackage;
use App\TellUsAboutYou;
use PayPal\Api\ExecutePayment;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use Illuminate\Support\Facades\Redirect;

class PackageController extends Controller
{

    /**
    * Signs in a authenticated admin
    *
    * @param Request $request
    * @return \Illuminate\Http\JsonResponse
    */
    public function deletePackage($id) {
      try {

        //rejecting delete request if package id is invalid
        if(!is_numeric($id)) {
         return response()->json([
             'status'   => false,
             'message'  => 'Invalid Package id!'
         ], 400);
        }
        $id = (int)$id;
        if(Packages::destroy($id)) {
          return response()->json([
              'status'   => true,
              'message'  => 'Package Deleted Successfully!'
          ], 200);
        } else {
          return response()->json([
              'status'   => true,
              'message'  => 'Invalid Package id!'
          ], 400);
        }
      } catch (\Exception $e) {
        return response()->json([
            'status'       => false,
            'message'      => $e->getMessage(),
            'errorLineNo'  => $e->getLine()
        ], 500);
      }
    }

      /**
      * Signs in a authenticated admin
      *
      * @param Request $request [name (text), amount(float), valid_till(valid datetime), description(text)]
      * @return \Illuminate\Http\JsonResponse
      */
    public function createPackage(Request $request) {
      try {

        $timeNow = Carbon::now()->format('Y-m-d H:i:s');
        $validator = Validator::make($request->all(), [
            'name'        =>  'required',
            'amount'      =>  'required|numeric|min:0',
            // 'valid_till'  =>  'required|date|date_format:Y-m-d H:i:s|after:'.$timeNow,
            'description' =>  'nullable'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->errors(),
                'data'    => []
            ], 400);
        }

        $name       = $request->name;
        $amount     = $request->amount;
        // $validTill  = $request->valid_till;

        $package = new Packages();
        $package->name        = $name;
        $package->amount      = $amount;
        $package->valid_till  = $timeNow;
        $package->description = $request->has('description') ? $request->description : '';
        $package->key_benefits = json_encode($request->key_benefits);
        $package->included     = json_encode($request->included);
        $package->status      = '1';
        if($package->save()) {
          return response()->json([
              'status'   => true,
              'message'  => 'New Package Created',
              'data'     => ['package' => $package]
          ], 200);
        } else {
          return response()->json([
              'status'   => true,
              'message'  => 'Database Conectivity Error',
              'data'     => []
          ], 200);
        }
      } catch(\Exception $e) {
        return response()->json([
            'status'       => false,
            'message'      => $e->getMessage(),
            'errorLineNo'  => $e->getLine(),
            'data'         => []
        ], 500);
      }
    }

    /**
    * Signs in a authenticated admin
    *
    * @param Request $request [id(int) [Package : id] , name(string), amount(float), description(string), ]
    * @return \Illuminate\Http\JsonResponse
    */
    public function editPackage(Request $request) {
      try {
        $validator = Validator::make($request->all(), [
            'id'          =>  'required|exists:packages,id,deleted_at,NULL',
            'name'        =>  'required',
            'amount'      =>  'required|numeric|min:0',
            'status'      =>  'required|numeric|between:0,1|integer',
            'description' =>  'nullable'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->errors(),
                'data'    => []
            ], 400);
        }
        $id     = (int)$request->id;
        $name   = trim($request->name);
        $amount = (float)$request->amount;
        $status = $request->has('status') ? $request->status : config('default_values.Packages.defaultStatus');
        $package               = Packages::find($id);
        $package->name         = $name;
        $package->amount       = $amount;
        $package->description  = $request->has('description') ? $request->description: '';
        $package->status       = (string)$status;
        $package->key_benefits = json_encode($request->key_benefits);
        $package->included     = json_encode($request->included);
        if($package->save()) {
          return response()->json([
              'status'   => true,
              'message'  => 'Package edited sucessfully',
              'data'     => ['package' => $package]
          ], 200);
        } else {
          return response()->json([
              'status'   => true,
              'message'  => 'Database Conectivity Error',
              'data'     => []
          ], 400);
        }
      } catch(\Exception $e) {
        return response()->json([
            'status'       => false,
            'message'      => $e->getMessage(),
            'errorLineNo'  => $e->getLine(),
            'data'         => []
        ], 500);
      }
    }

    /**
    * Signs in a authenticated admin
    *
    * @param null
    * @return \Illuminate\Http\JsonResponse
    */
    public function getPackages() {
      try {
        $packages = Packages::get();
        return [
          'status'  =>  true,
          'message' =>  'Packages fetched successfully',
          'count'   =>  count($packages),
          'data'    =>  $packages
        ];
      } catch (\Exception $e) {
        return [
          'status'  =>  false,
          'message' =>  $e->getMessage(),
          'data'    =>  null
        ];
      }
    }

    /**
    * Purchase a package Express Checkout
    *
    * @param Request
    * @return \Illuminate\Http\JsonResponse
    */
    public function purchasePackage(Request $request)
    {
      try {
        $pkgID         = $request->pkg_id;
        $userID        = $request->user_id;
        $couponID      = $request->coupon_id;
        $firstName     = $request->firstName;
        $lastname      = $request->lastname;
        $phone         = $request->phone;
        $email         = $request->email;
        $address1      = $request->address1;
        $address2      = $request->address2;
        $city          = $request->city;
        $state         = $request->state;
        $zip           = $request->zip;
        $country       = $request->country;
        $package       = Packages::find($pkgID);
        $user          = User::find($userID);
        $coupon        = Coupon::find($couponID);
        $itemsPrice    = 0;
        $totalDiscount = 0;
        $shippingCost  = 0.0;
        $taxCost       = 0.0;
        $items         = [];
        if (!$package) {
          return response()->json([
              'status'       => false,
              'error'      => 'Package not found',
              'data'         => []
          ], 400);
        }

        if (!$user) {
          return response()->json([
              'status'       => false,
              'error'      => 'User not found. Please log in again',
              'data'         => []
          ], 400);
        }

        $payer = Paypalpayment::payer();
        $payer->setPaymentMethod("paypal");

        $item1 = Paypalpayment::item();
        $item1->setName($package->name)
                ->setDescription($package->description)
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setTax(0.0)
                ->setPrice($package->amount);
        array_push($items, $item1);
        $itemsPrice = $itemsPrice + $package->amount;

        if ($coupon) {
          if ($coupon->flag == '1') {
            $discountAmount = $coupon->amount;
          } else {
            $discountAmount = ($itemsPrice * $coupon->amount) / 100;
          }
          $totalDiscount = $totalDiscount + $discountAmount;
          $discount1 = Paypalpayment::item();
          $discount1->setName($coupon->title)
                  ->setDescription($coupon->description)
                  ->setCurrency('USD')
                  ->setQuantity(1)
                  ->setTax(0.0)
                  ->setPrice(-$totalDiscount);
          array_push($items, $discount1);
        }

        $itemList = Paypalpayment::itemList();
        $itemList->setItems($items);

        $subTotal = $itemsPrice - $totalDiscount;
        $total = $shippingCost + $taxCost + $subTotal;

        $details = Paypalpayment::details();
        $details->setShipping($shippingCost)
                ->setTax($taxCost)
                ->setSubtotal($subTotal);

        $amount = Paypalpayment::amount();
        $amount->setCurrency("USD")
                ->setTotal($total)
                // ->setTotal(65)
                ->setDetails($details);

        $transaction = Paypalpayment::transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

        $redirectUrls = Paypalpayment::redirectUrls();
        $redirectUrls->setReturnUrl(url("/api/paypal-payment-processing"))
            ->setCancelUrl(url("/dashboard/packages/payment-failed"));

        $payment = Paypalpayment::payment();

        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions([$transaction]);

        try {
            $payment->create(Paypalpayment::apiContext());
            \Log::info('pre payment : '.print_r($payment, true));
        } catch (PPConnectionException $ex) {
            return response()->json([
              'status' => false,
              "error" => $ex->getMessage(),
              'line' => 'Error encountered on line number. #'.$ex->getLine()
            ], 400);
        }
        // return $payment->toArray()['id'];
        $userPackage = new UserPackage;
        $userPackage->user_id = $userID;
        $userPackage->package_id = $pkgID;
        $userPackage->started_on = date('Y-m-d H:i:s');
        $userPackage->renew_date = date('Y-m-d H:i:s');
        $userPackage->payment_method = 'Paypal';
        $userPackage->payment_token = $payment->toArray()['id'];
        $userPackage->payment_status = '1';
        $userPackage->payment_response = json_encode(['request' => $request->all(), 'process_req' => $payment->toArray()]);
        $userPackage->amount = $total;
        if ($coupon) {
          $userPackage->coupon_id = $couponID;
          $userPackage->coupon_amount = $discountAmount;
        } else {
          $userPackage->coupon_id = 0;
          $userPackage->coupon_amount = 0;
        }
        $userPackage->save();

        $user = User::find($userID);
        $user->name = $request->firstName.' '.$request->lastname;
        $user->save();

        $tellUsAboutYou = TellUsAboutYou::where('user_id', $userID)->first();
        if (!$tellUsAboutYou) {
          $tellUsAboutYou = new TellUsAboutYou;
        }
        $tellUsAboutYou->user_id = $userID;
        $tellUsAboutYou->firstname = $request->firstName;
        $tellUsAboutYou->lastname = $request->lastname;
        $tellUsAboutYou->fullname = $request->firstName.' '.$request->lastname;
        $tellUsAboutYou->phone = $phone;
        $tellUsAboutYou->address = $address1;
        $tellUsAboutYou->city = $city;
        $tellUsAboutYou->state = $state;
        $tellUsAboutYou->zip = $zip;
        $tellUsAboutYou->email = $email;
        $tellUsAboutYou->save();

        return response()->json([
          'status' => true,
          'approval_url' => $payment->getApprovalLink(),
          'data' => $payment->toArray()
        ], 200);
      } catch (\Exception $e) {
        return response()->json([
          'status' => false,
          'error' => $e->getMessage(),
          'line' => 'Error encountered on line no. #'.$e->getLine()
        ], 400);
      }


    }

    /**
    * Purchase a package Express Checkout Success funtion
    *
    * @param Request
    * @return \Illuminate\Http\JsonResponse
    */
    public function paypalPackageSuccess(Request $request)
    {
      try {
        $paymentID = $request->paymentId;
        $userPackage = UserPackage::where('payment_token', $paymentID)->first();
        if ($userPackage) {
          try {
            \Log::info(' paypal success : payment - id : => '.$paymentID.'\n'.'paypal -->> '.print_r(Paypalpayment::apiContext(), true));
            $payment = Paypalpayment::getById($paymentID, Paypalpayment::apiContext());
            \Log::info(' paypal : after payment => '. print_r($payment, true));
          } catch (PPConnectionException $ex) {
            return response()->json([
              'status' => false,
              'error' => $ex->getMessage()
            ], 400);
          }
          // $arr = [];
          $arr[] = json_decode($userPackage->payment_response, TRUE);
          $arr['res'] = $payment;
          $userPackage->payment_response = json_encode($arr);
          $userPackage->payment_status = '2';
          $userPackage->status = '1';
          $userPackage->save();

          $user = User::find($userPackage->user_id);
          $user->package = $userPackage->package_id;
          $user->save();
          $user = User::find($userPackage->user_id);
          $customClaims = ['package' => $user->package];
          $token = JWTAuth::fromUser($user, $customClaims);

          try {
            $mailData = [
              'userName' => $user->name,
              'transactionID' => $userPackage->token,
              'pkgName' => $userPackage->package->name,
              'amount' => $userPackage->amount,
              'paymentStatus' => 'Success',
              'paymentDate' => date('jS M, Y', strtotime($userPackage->created_at)),
              'email' => $user->email
            ];
            Mail::send('emails.payment',$mailData, function($mail) use($mailData){
                    $mail->from(config('settings.email'), 'Simplywilled Payment Confirmation');
                    $mail->to(strtolower($mailData['email']), $mailData['userName'])->subject('You have purchased '.$mailData['pkgName'].'!');
            });
          } catch (\Exception $e) {
            \Log::info('type: error,'.' res: '.$e->getMessage().', line:'.$e->getLine());
          }
          // $cartStack = $this->cartStackSubmit($user->email, $userPackage->amount);

          return response()->json([
            'status'=> true,
            'message'=> 'Payment done',
            'data'=> [
              'jwtToken' => $token,
              'payment' => $userPackage,
              'package_name' => $userPackage->package->name
            ]
          ], 200);
        } else {
          return response()->json([
            'status'=> false,
            'error'=> 'Database Error. Please contact with site adminstrator',
          ], 400);
        }
      } catch (\Exception $e) {
        return response()->json([
          'status'=> false,
          'error'=> $e->getMessage().'  Please contact with site adminstrator',
        ], 500);
      }
    }

    /**
    * Purchase a package Express Checkout Failed funtion
    *
    * @param Request
    * @return \Illuminate\Http\JsonResponse
    */
    public function paypalPackageFailed(Request $request)
    {
      try {
        $token = $request->token;
        return response()->json([
          'status'=> false,
          'error'=> 'Payment failed',
        ], 400);
      } catch (\Exception $e) {
        return response()->json([
          'status'=> false,
          'error'=> $e->getMessage(),
        ], 500);
      }
    }

    /**
    * Purchase a package Paypal Flow funtion
    *
    * @param
    * @return \Illuminate\Http\JsonResponse
    */
    public function paypalFlowButton()
    {
      $amount = 199.00;
      $pfUser = '';
      $pfVendor = '';
      $pfPartner = '';
      $pfPwd = '';
      $pfMode = '';
      $pfHostAddr = 'https://pilot-payflowlink.paypal.com';
      $secureTokenID = uniqid('', true);
      $postData = "USER=".$pfUser."&VENDOR=".$pfVendor."&PARTNER=".$pfPartner.
                  "&PWD=".$pfPwd."&CREATESECURETOKEN=Y"."&SECURETOKENID=".$secureTokenID."&TRXTYPE=S"."&AMT=".$amount;

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $pfHostAddr);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ch, CURLOPT_POST, TRUE);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

      $resp = curl_exec($ch);

      if (!$resp) {
        return response()->json([
          'status' => false,
          'message' => 'To order, Please contact us.'
        ], 500);
      }

      parse_str($resp, $arr);
      if ($arr['RESULT'] != 0) {
        return response()->json([
          'status' => false,
          'message' => 'To order, Please contact us.'
        ], 500);
      }

      return response()->json([
        'status' => true,
        'data' => [
          'SECURETOKEN' => $arr['SECURETOKEN'],
          'SECURETOKENID' => $secureTokenID,
          'MODE' => $pfMode,
          'method' => 'POST',
          'action' => 'https://payflowlink.paypal.com/'
        ],
        'message' => 'Generated Form Data'
      ], 200);
    }

    /**
    * Purchase a package Paypal payment direct method
    *
    * @param Request
    * @return \Illuminate\Http\JsonResponse
    */
    public function paypalDirectPayment(Request $request)
    {
      // return response()->json([
      //   'status' => true,
      //   'message' => 'Payment has done successfully',
      //   'data' => []
      // ], 200);
      try {
        $pkgID         = $request->pkg_id;
        $userID        = $request->user_id;
        $couponID      = $request->coupon_id;
        $email         = $request->email;
        $package       = Packages::find($pkgID);
        $user          = User::find($userID);
        $coupon        = Coupon::find($couponID);

        if (!$package) {
          return response()->json([
              'status'       => false,
              'error'      => 'Package not found',
              'data'         => []
          ], 400);
        }

        if (!$user) {
          return response()->json([
              'status'       => false,
              'error'      => 'User not found. Please log in again',
              'data'         => []
          ], 400);
        }

        $totalAmount  = $package->amount;
        $couponAmount = 0;
        if ($coupon) {
          if ($coupon->flag == '1') {
            $couponAmount = $coupon->amount;
            $totalAmount  = $package->amount - $couponAmount;
          } else {
            $couponAmount = ($package->amount * $coupon->amount) / 100;
            $totalAmount  = $package->amount - $couponAmount;
          }
        }

        if ($totalAmount == 0) {
          $paypalMethod = [];
          $AMT = $totalAmount;
          $arr = [];
          $arr['CORRELATIONID'] = null;
          $arr['ACK'] = 'Success';
          $paymentMethod = 'Free Coupon';
        } elseif ($totalAmount > 0) {
          $paymentMethod  = 'Card';
          $SIGNATURE      = config('paypal_direct.signature');
          $USER           = config('paypal_direct.user');
          $PWD            = config('paypal_direct.password');
          $METHOD         = config('paypal_direct.method');
          $PAYMENTACTION  = config('paypal_direct.paymentAction');
          $IPADDRESS      = $_SERVER['REMOTE_ADDR'];
          $AMT            = $totalAmount;
          $CREDITCARDTYPE = $request->credit_card_type;
          $ACCT           = $request->card_no;
          $EXPDATE        = $request->exp_date;
          $CVV2           = $request->cvv2;
          $FIRSTNAME      = $request->cardFirstName;
          $LASTNAME       = $request->cardLastName;
          $STREET         = $request->address1;
          $CITY           = $request->city;
          $STATE          = $request->state;
          $ZIP            = $request->zip;
          // $SIGNATURE      = 'A.XOJFbCOgWS3AGK6A0Equv15VTdABTLXw6hw.Dp-RbewQjPR2PN8l9i';
          // $USER           = 'ace1_api1.tier5.in';
          // $PWD            = 'CT3R2WD8GRSE8C2A';
          // $METHOD         = 'DoDirectPayment';
          // $PAYMENTACTION  = 'Sale';
          // $IPADDRESS      = '223.31.41.147';
          // $AMT            = '199.50';
          // $CREDITCARDTYPE = 'Visa';
          // $ACCT           = '4254394646835191';
          // $EXPDATE        = '122027';
          // $CVV2           = '840';
          // $FIRSTNAME      = 'Subhadeep';
          // $LASTNAME       = 'Sahoo';
          // $STREET         = '3909 Witmer Road';
          // $CITY           = 'Niagara Falls';
          // $STATE          = 'NY';
          // $ZIP            = '14305';
          $COUNTRYCODE    = 'US';

          $pfHostAddr = config('paypal_direct.host');

          $postData = 'VERSION=56.0&COUNTRYCODE='.$COUNTRYCODE.'&SIGNATURE='.$SIGNATURE.'&USER='.$USER.'&PWD='.$PWD.
                      '&METHOD='.$METHOD.'&PAYMENTACTION='.$PAYMENTACTION.'&IPADDRESS='.$IPADDRESS.'&AMT='.$AMT.'&ACCT='.$ACCT.'&EXPDATE='.$EXPDATE.'&CVV2='.$CVV2.'&FIRSTNAME='.$FIRSTNAME.'&LASTNAME='.$LASTNAME.'&STREET='.$STREET.'&CITY='.$CITY.'&STATE='.$STATE.'&ZIP='.$ZIP;
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $pfHostAddr);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
          curl_setopt($ch, CURLOPT_POST, TRUE);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

          $resp = curl_exec($ch);
          if (!$resp) {
            return response()->json([
              'status' => false,
              'error' => 'To order, Please contact us.'
            ], 500);
          }
          parse_str($resp, $arr);

          $paypalMethod = [];
          $paypalMethod['request'] = $request->all();
          $paypalMethod['request']['country_code'] = 'US';
          $paypalMethod['response'] = $arr;
        } else {
          return response()->json([
            'status' => false,
            'error' => 'This transaction could not processed',
            'data' => []
          ], 400);
        }



        $userPackage = new UserPackage;
        $userPackage->user_id = $userID;
        $userPackage->package_id = $package->id;
        $userPackage->started_on = date('Y-m-d H:i:s');
        $userPackage->renew_date = date('Y-m-d H:i:s');
        $userPackage->payment_method = $paymentMethod;
        $userPackage->payment_status = '0';
        $userPackage->payment_response = json_encode($paypalMethod);
        $userPackage->amount = $AMT;
        if ($coupon) {
          $userPackage->coupon_id = $couponID;
          $userPackage->coupon_amount = $couponAmount;
        } else {
          $userPackage->coupon_id = 0;
          $userPackage->coupon_amount = 0;
        }
        $userPackage->save();

        $userPackage->payment_token = $arr['CORRELATIONID'];
        if ($arr['ACK'] == 'Success') {
          $userPackage->payment_status = '2';
          $userPackage->status = '1';
        }
        $userPackage->save();

        if ($arr['ACK'] == 'Success') {
          $user->package = $pkgID;
          $user->name = $request->firstName.' '.$request->lastname;
          $user->save();

          $tellUsAboutYou = TellUsAboutYou::where('user_id', $userID)->first();
          if (!$tellUsAboutYou) {
            $tellUsAboutYou = new TellUsAboutYou;
          }
          $tellUsAboutYou->user_id = $userID;
          $tellUsAboutYou->firstname = $request->firstName;
          $tellUsAboutYou->lastname = $request->lastname;
          $tellUsAboutYou->fullname = $request->firstName.' '.$request->lastname;
          $tellUsAboutYou->phone = $request->phone;
          $tellUsAboutYou->address = $request->address1;
          $tellUsAboutYou->city = $request->city;
          $tellUsAboutYou->state = $request->state;
          $tellUsAboutYou->zip = $request->zip;
          $tellUsAboutYou->email = $request->email;
          $tellUsAboutYou->save();

          $customClaims = ['package' => $user->package];
          $token = JWTAuth::fromUser($user, $customClaims);
          $arr['jwtToken'] = $token;
          $arr['payment']  = $userPackage;
          $arr['package_name']  = $package->name;

          // try {
          //   $mailData = [
          //     'userName' => $user->name,
          //     'transactionID' => $arr['CORRELATIONID'],
          //     'pkgName' => $package->name,
          //     'amount' => $AMT,
          //     'paymentStatus' => $arr['ACK'],
          //     'paymentDate' => date('jS M, Y', strtotime($userPackage->created_at)),
          //     'email' => $user->email
          //   ];
          //   Mail::send('emails.payment',$mailData, function($mail) use($mailData){
          //           $mail->from(config('settings.email'), 'Simplywilled Payment Confirmation');
          //           $mail->to(strtolower($mailData['email']), $mailData['userName'])->subject('You have purchased '.$mailData['pkgName'].'!');
          //   });
          // } catch (\Exception $e) {
          //   \Log::info('type: error,'.' res: '.$e->getMessage().', line:'.$e->getLine());
          // }

          try {
            $mailData = [
              'userName' => $user->name,
              'transactionID' => $arr['CORRELATIONID'],
              'pkgName' => $package->name,
              'amount' => $AMT,
              'paymentStatus' => $arr['ACK'],
              'paymentDate' => date('jS M, Y', strtotime($userPackage->created_at)),
              'email' => $email
            ];
            Mail::send('emails.payment',$mailData, function($mail) use($mailData){
                    $mail->from(config('settings.email'), 'Simplywilled Payment Confirmation');
                    $mail->to(strtolower($mailData['email']), $mailData['userName'])->subject('You have purchased '.$mailData['pkgName'].'!');
            });
          } catch (\Exception $e) {
            \Log::info('type: error,'.' res: '.$e->getMessage().', line:'.$e->getLine());
          }
          // $cartStack = $this->cartStackSubmit($email, $AMT);
          return response()->json([
            'status' => true,
            'message' => 'Payment has done successfully',
            'data' => $arr
          ], 200);
        } else {
          return response()->json([
            'status' => false,
            'error' => $arr['L_LONGMESSAGE0'],
            'data' => $arr
          ], 400);
        }
      } catch (\Exception $e) {
        return response()->json([
          'status' => false,
          'error' => $e->getMessage()
        ], 500);
      }
    }

    /**
    * Check package
    *
    * @param Request
    * @return \Illuminate\Http\JsonResponse
    */
    public function checkPackage(Request $request)
    {
      try {
        $userID = $request->user_id;
        $pkgID = $request->pkg_id;
        $checkPackage = Packages::find($pkgID);
        if (!$checkPackage) {
          return response()->json([
            'status' => false,
            'message' => 'Unknown Package',
          ], 400);
        }

        if ($checkUserPackage) {
          return response()->json([
            'status' => true,
            'message' => 'Authenticated User',
          ], 200);
        } else {
          return response()->json([
            'status' => false,
            'message' => 'Unauthenticated User',
          ], 400);
        }

      } catch (\Exception $e) {
        return response()->json([
          'status' => false,
          'message' => $e->getMessage(),
          'line' => 'Problem encountered on line no. :'.$e->getLine()
        ], 500);
      }
    }

    /**
    * Free Checkout
    *
    * @param Request
    * @return \Illuminate\Http\JsonResponse
    */
    public function freeCheckout(Request $request)
    {
      try {
        $userID  = $request->user_id;
        $pkgID   = $request->pkg_id;
        $user    = User::find($userID);
        $package = Packages::find($pkgID);

        if (!$user) {
          return response()->json([
            'status' => false,
            'error' => 'User not found'
          ], 400);
        }
        if (!$package) {
          return response()->json([
            'status' => false,
            'error' => 'Package not found'
          ], 400);
        }

        if ($request->has('coupon_id')) {
          $couponID = $request->coupon_id;
          $coupon = Coupon::find($couponID);
          if (!$coupon) {
            return response()->json([
              'status' => false,
              'error' => 'Invalid Coupon'
            ], 400);
          }
          $discountAmount = $coupon->flag == '1' ? $coupon->amount : ($package->amount * $coupon->amount) / 100;
          if ($discountAmount == $package->amount) {
            $user->package = $package->id;
            $user->save();

            $user         = User::find($userID);
            $customClaims = ['package' => $user->package];
            $token        = JWTAuth::fromUser($user, $customClaims);

            // $cartStack = $this->cartStackSubmit($user->email);

            return response()->json([
              'status' => true,
              'message' => 'Your full free checkout has been done',
              'data' => ['jwtToken' => $token]
            ], 200);
          } else {
            return response()->json([
              'status' => false,
              'error' => 'You are not eligible for full free checkout'
            ], 400);
          }
        }
      } catch (\Exception $e) {
        return response()->json([
          'status' => false,
          'message' => $e->getMessage(),
          'line' => 'Problem encountered on line no. :'.$e->getLine()
        ], 500);
      }
    }

    public function viewMail()
    {
      $mailData = [
        'userName' => 'Test User',
        'transactionID' => 'ABCDEFGHIJKLMNOP',
        'pkgName' => 'Something Packgae',
        'amount' => 199.00,
        'paymentStatus' => 'Success',
        'paymentDate' => date('jS M, Y', strtotime('2018-05-15 05:05:05')),
        'email' => 'abc@gmail.com'
      ];

      return $view = \View::make('emails.payment', $mailData);
    }

    public function cartStackSubmit($email='', $amount = 0)
    {
      try {
        // Setup the URL to CartStack...
        $emailAddress = $email; // required, get from session or db...
        $cartTotal = $amount; // optional, more accurate reporting...
        $url = "https://api.cartstack.com/ss/v1/?key=f51ddb7586e8799e1c5e8dd52c5dbb56&siteid=k5FdWlhK&email=".$emailAddress."&total=".$cartTotal;

        // Initialize cURL...
        $ch = curl_init();

        // Set URL and Return directives...
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Send the request...
        $jsonResponse = curl_exec($ch);

        // Close cURL...
        curl_close($ch);

        // Handle JSON response...
        $response = json_decode($jsonResponse, true);

        // Successful call is response code 100...
        if ($response['resp'] != "100")
        {
          \Log::info('CartStack submit success for '.$email.' amount: '.$amount.' resp=>'.json_encode($response));
        } else {
          \Log::info('CartStack submit failed for '.$email.' amount: '.$amount.' resp=>'.json_encode($response));
        }
      } catch (\Exception $e) {
        \Log::info('CartStack submit failed for '.$email.' amount: '.$amount.' message=>'.$e->getMessage());
      }


    }


    public function paypalPaymentProcessing()
    {
      try {
        $paymentID = $_GET['paymentId'];
        $PayerID = $_GET['PayerID'];

        $apiContext = Paypalpayment::apiContext();
        $payment = Payment::get($paymentID, $apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($PayerID);
        $result = $payment->execute($execution, $apiContext);
        $obj = json_decode($payment);
        \Log::info('log resp paypal execute=> '.$payment);

        if ($obj->transactions[0]->related_resources[0]->sale->state == 'completed') {
          $userPackage = UserPackage::where('payment_token', $paymentID)->first();

          $userPackage->payment_response = json_encode($obj);
          $userPackage->payment_token = $obj->transactions[0]->related_resources[0]->sale->id;
          $userPackage->payment_status = '2';
          $userPackage->status = '1';
          $userPackage->save();

          $user = User::find($userPackage->user_id);
          $user->package = $userPackage->package_id;
          $user->save();
          $user = User::find($userPackage->user_id);
          $customClaims = ['package' => $user->package];
          $token = JWTAuth::fromUser($user, $customClaims);

          try {
            $mailData = [
              'userName' => $user->name,
              'transactionID' => $userPackage->token,
              'pkgName' => $userPackage->package->name,
              'amount' => $userPackage->amount,
              'paymentStatus' => 'Success',
              'paymentDate' => date('jS M, Y', strtotime($userPackage->created_at)),
              'email' => $user->email
            ];
            Mail::send('emails.payment',$mailData, function($mail) use($mailData){
                    $mail->from(config('settings.email'), 'Simplywilled Payment Confirmation');
                    $mail->to(strtolower($mailData['email']), $mailData['userName'])->subject('You have purchased '.$mailData['pkgName'].'!');
            });
          } catch (\Exception $e) {
            \Log::info('type: error,'.' res: '.$e->getMessage().', line:'.$e->getLine());
          }
          // $cartStack = $this->cartStackSubmit($user->email, $userPackage->amount);
          $base = url('/') == 'http://127.0.0.1:8000' ? 'http://localhost:4200' : env('BASE_URL');
          $url = $base .'/dashboard/packages/thank-you?payment_token='.$userPackage->payment_token.'&amount='.$userPackage->amount.'&package_name='.$userPackage->package->name.'&payment_status='.$userPackage->payment_status.'&updated_at='.$user->updated_at.'&token='.$token;
          return Redirect::to($url);
          // return response()->json([
          //   'status'=> true,
          //   'message'=> 'Payment done',
          //   'data'=> [
          //     'jwtToken' => $token,
          //     'payment' => $userPackage,
          //     'package_name' => $userPackage->package->name
          //   ]
          // ], 200);
        } else {
          $base = url('/') == 'http://127.0.0.1:8000' ? 'http://localhost:4200' : env('BASE_URL');
          $url = $base .'/dashboard/packages/payment-failed';
          return Redirect::to($url);
          // return response()->json([
          //   'status'=> false,
          //   'error'=> 'Payment not done. Please contact with site adminstrator',
          // ], 400);
        }
      } catch (\Exception $e) {
        $base = url('/') == 'http://127.0.0.1:8000' ? 'http://localhost:4200' : env('BASE_URL');
        $url = $base .'/dashboard/packages/payment-failed';
        return Redirect::to($url);
        // return response()->json([
        //   'status'=> false,
        //   'error'=> $e->getMessage().'  Please contact with site adminstrator',
        // ], 500);
      }

    }
}
