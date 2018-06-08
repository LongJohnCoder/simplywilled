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
        $redirectUrls->setReturnUrl(url("/dashboard/payment/success"))
            ->setCancelUrl(url("/dashboard/payment/failure"));

        $payment = Paypalpayment::payment();

        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions([$transaction]);

        try {
            $payment->create(Paypalpayment::apiContext());
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

    public function paypalPackageSuccess(Request $request)
    {
      try {
        $paymentID = $request->paymentId;
        $userPackage = UserPackage::where('payment_token', $paymentID)->first();
        if ($userPackage) {
          try {
            $payment = Paypalpayment::getById($paymentID, Paypalpayment::apiContext());
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

          return response()->json([
            'status'=> true,
            'message'=> 'Payment done',
            'data'=> [
              'jwtToken' => $token
            ]
          ], 200);
        } else {
          return response()->json([
            'status'=> false,
            'error'=> 'Database Error',
          ], 400);
        }
      } catch (\Exception $e) {
        return response()->json([
          'status'=> false,
          'error'=> $e->getMessage(),
        ], 500);
      }
    }

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

        // if (!$user->tellUsAboutYou) {
        //   return response()->json([
        //       'status' => false,
        //       'error'  => 'Unable to get data of address',
        //       'data'   => []
        //   ], 400);
        // }
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
        $STREET         = $request->address1 . $request->has('address2') ? ', '.$request->address2 : '';
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

        $pfHostAddr = 'https://api-3t.sandbox.paypal.com/nvp';

        $postData = 'VERSION=56.0&COUNTRYCODE='.$COUNTRYCODE.'&SIGNATURE='.$SIGNATURE.'&USER='.$USER.'&PWD='.$PWD.
                    '&METHOD='.$METHOD.'&PAYMENTACTION='.$PAYMENTACTION.'&IPADDRESS='.$IPADDRESS.'&AMT='.$AMT.'&CREDITCARDTYPE='.$CREDITCARDTYPE.'&ACCT='.$ACCT.'&EXPDATE='.$EXPDATE.'&CVV2='.$CVV2.'&FIRSTNAME='.$FIRSTNAME.'&LASTNAME='.$LASTNAME.'&STREET='.$STREET.'&CITY='.$CITY.'&STATE='.$STATE.'&ZIP='.$ZIP;
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

        $userPackage = new UserPackage;
        $userPackage->user_id = $userID;
        $userPackage->package_id = $package->id;
        $userPackage->started_on = date('Y-m-d H:i:s');
        $userPackage->renew_date = date('Y-m-d H:i:s');
        $userPackage->payment_method = 'Card';
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
          $customClaims = ['package' => $user->package];
          $token = JWTAuth::fromUser($user, $customClaims);
          $arr['jwtToken'] = $token;
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
          ], 500);
        }
      } catch (\Exception $e) {
        return response()->json([
          'status' => false,
          'error' => $e->getMessage()
        ], 500);
      }
    }

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
        $checkUserPackage = User::where('id', $userID)->where('package', $pkgID)->first();
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
}
