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

      $package               = new Packages();
      $package->name         = $name;
      $package->amount       = $amount;
      $package->valid_till   = $timeNow;
      $package->description  = $request->has('description') ? $request->description: '';
      $package->key_benefits = json_encode($request->key_benefits);
      $package->included     = json_encode($request->included);
      $package->status       = '1';
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
    * Paypal Express Checkout
    *
    * @param Request
    * @return \Illuminate\Http\JsonResponse
    */
    public function purchasePackage(Request $request)
    {
      $pkgID         = $request->pkg_id;
      $userID        = $request->user_id;
      $couponID      = $request->coupon_id;
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
        $discountAmount = ($itemsPrice * $coupon->percentage) / 100;
        $totalDiscount = $totalDiscount + $discountAmount;
        $discount1 = Paypalpayment::item();
        $discount1->setName($coupon->title)
                ->setDescription($coupon->description)
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setTax(0.0)
                ->setPrice(-$discountAmount);
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
      $redirectUrls->setReturnUrl(url("/api/v1/user/paypal-package-success"))
          ->setCancelUrl(url("/api/v1/user/paypal-package-failed"));

      $payment = Paypalpayment::payment();

      $payment->setIntent("sale")
          ->setPayer($payer)
          ->setRedirectUrls($redirectUrls)
          ->setTransactions([$transaction]);

      try {
          $payment->create(Paypalpayment::apiContext());
      } catch (PPConnectionException $ex) {
          return response()->json(["error" => $ex->getMessage()], 400);
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
      $userPackage->payment_response = null;
      $userPackage->amount = $total;
      if ($coupon) {
        $userPackage->coupon_id = $couponID;
        $userPackage->coupon_amount = $discountAmount;
      } else {
        $userPackage->coupon_id = 0;
        $userPackage->coupon_amount = 0;
      }
      $userPackage->save();

      return response()->json([$payment->toArray(), 'approval_url' => $payment->getApprovalLink()], 200);
    }

    /**
    * Paypal Express Checkout Success function
    */
    public function paypalPackageSuccess()
    {
      try {
        $paymentID = $_GET['paymentId'];
        $userPackage = UserPackage::where('payment_token', $paymentID)->first();
        if ($userPackage) {
          $payment = Paypalpayment::getById($paymentID, Paypalpayment::apiContext());
          $userPackage->payment_response = $payment;
          $userPackage->payment_status = '2';
          $userPackage->status = '1';
          $userPackage->save();
          return redirect('/dashboard/packages/status/'.$paymentID);
        } else {
          return redirect('/dashboard/packages/status/'.$paymentID);
        }
      } catch (\Exception $e) {
        return redirect('/dashboard/packages/status/'.$paymentID);
      }
    }
    /**
    * Paypal Express Checkout Failed function
    */
    public function paypalPackageFailed()
    {
      return redirect('/dashboard/packages/status/paymentID');
    }

    /**
    * Paypal Flow
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
    * Paypal Pro DoDirect Payment
    * @param Request
    * @return \Illuminate\Http\JsonResponse
    */
    public function paypalDirectPayment(Request $request)
    {
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

        if (!$user->tellUsAboutYou) {
          return response()->json([
              'status' => false,
              'error'  => 'Unable to get data of address',
              'data'   => []
          ], 400);
        }
        $totalAmount = $package->amount;
        $couponAmount = 0;
        if ($coupon) {
          $couponAmount = ($package->amount * $coupon->percentage) / 100;
          $totalAmount = $package->amount - $couponAmount;
        }

        $SIGNATURE = config('paypal_direct.signature');
        $USER = config('paypal_direct.user');
        $PWD = config('paypal_direct.password');
        $METHOD = config('paypal_direct.method');
        $PAYMENTACTION = config('paypal_direct.paymentAction');
        $IPADDRESS = $_SERVER['REMOTE_ADDR'];
        $AMT = $totalAmount;
        $CREDITCARDTYPE = $request->credit_card_type;
        $ACCT = $request->card_no;
        $EXPDATE = $request->exp_date;
        $CVV2 = $request->cvv2;
        $FIRSTNAME = $user->tellUsAboutYou->firstname;
        $LASTNAME = $user->tellUsAboutYou->lastname;
        $STREET = $user->tellUsAboutYou->address;
        $CITY = $user->tellUsAboutYou->city;
        $STATE = $user->tellUsAboutYou->state;
        $ZIP = $user->tellUsAboutYou->zip;
        $COUNTRYCODE = 'US';

        $pfHostAddr = config('paypal_direct.host');

        $postData = 'VERSION=56.0'.'&SIGNATURE='.$SIGNATURE.'&USER='.$USER.'&PWD='.$PWD.
                    '&METHOD='.$METHOD.'&PAYMENTACTION='.$PAYMENTACTION.'&IPADDRESS='.$IPADDRESS.'&AMT='.$AMT.'&CREDITCARDTYPE='.$CREDITCARDTYPE.'&ACCT='.$ACCT.'&EXPDATE='.$EXPDATE.'&CVV2='.$CVV2.'&FIRSTNAME='.$FIRSTNAME.'&LASTNAME='.$LASTNAME.'&STREET='.$STREET.'&CITY='.$CITY.'&STATE='.$STATE.'&ZIP='.$ZIP.'&COUNTRYCODE='.$COUNTRYCODE;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $pfHostAddr);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        $resp = curl_exec($ch);
        parse_str($resp, $arr);

        $userPackage = new UserPackage;
        $userPackage->user_id = $userID;
        $userPackage->package_id = $pkgID;
        $userPackage->started_on = date('Y-m-d H:i:s');
        $userPackage->renew_date = date('Y-m-d H:i:s');
        $userPackage->payment_method = 'Paypal';
        $userPackage->payment_token = $arr['CORRELATIONID'];
        if ($arr['ACK'] == 'Success') {
          $userPackage->payment_status = '2';
        } else {
          $userPackage->payment_status = '0';
        }
        $userPackage->payment_response = json_encode($arr);
        $userPackage->amount = $AMT;
        if ($coupon) {
          $userPackage->coupon_id = $couponID;
          $userPackage->coupon_amount = $couponAmount;
        } else {
          $userPackage->coupon_id = 0;
          $userPackage->coupon_amount = 0;
        }
        $userPackage->save();

        if ($arr['ACK'] == 'Success') {
          $user->package_id = $pkgID;
          $user->save();
          return response()->json([
            'status' => true,
            'message' => 'Payment has done successfully',
            'data' => $arr
          ], 200);
        } else {
          return response()->json([
            'status' => false,
            'message' => $arr['L_LONGMESSAGE0'],
            'data' => $arr
          ], 500);
        }
      } catch (\Exception $e) {
        return response()->json([
          'status' => false,
          'message' => $e->getMessage()
        ], 500);
      }
    }
}
