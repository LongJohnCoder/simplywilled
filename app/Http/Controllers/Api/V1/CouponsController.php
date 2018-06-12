<?php
/**
 * Functional Scope: API for Create,Edit,View,Delete Coupons.
 */
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
use App\Models\Coupon;
use App\Models\UserPackage;
use \Carbon\Carbon;
use App\Helper\Common;

class CouponsController extends Controller
{
  /*
   *  Function to view all created coupons
   *  @params null
   *  @return \Illuminate\Http\JsonResponse
   * */
    public function viewCoupons() {
      try {
        $timeNow = Carbon::now()->format('Y-m-d H:i:s');
        $coupons = Coupon::with(array('userPackage'=> function($q) {
            $q->where('payment_status', '2');
            $q->select('id', 'payment_status', 'user_id', 'coupon_amount', 'coupon_id');
            $q->with(['user' => function ($qu) {
              $qu->select('id','name','email');
              $qu->with(['tellUsAboutYou' => function($que) {
                $que->select('id','user_id','firstname','lastname','fullname','phone','email');
                }]);
              }]);
          }))->get();
        return response()->json([
            'status'   => true,
            'message'  => 'All coupons',
            'data'     => $coupons
        ], 200);
      } catch (\Exception $e) {
        return response()->json([
            'status'       => false,
            'message'      => $e->getMessage(),
            'errorLineNo'  => $e->getLine(),
            'data'         => []
        ], 500);
      }
    }
  /*
   *  Function to create coupon by an admin
   *  @params [Request :: title:(text), percentage:(float), expired_on:(datetime), description: text(optional)]
   *  @return \Illuminate\Http\JsonResponse
   * */
    public function createCoupon(Request $request) {
      try {
        $timeNow = Carbon::now()->format('Y-m-d');
        if ($request->expired_on != '') {
          if (Carbon::now()->lte(Carbon::parse($request->expired_on))) {
            $expOn = Carbon::parse($request->expired_on);
          } else {
            return response()->json([
                'status'  => false,
                'message' => 'Expire Date should be greater than current time',
                'data'    => []
            ], 400);
          }
        } else {
          $expOn = '2200-12-31';
        }

        $validator = Validator::make($request->all(), [
            'title'       => 'required',
            'max_user'    => 'required|numeric|min:0',
            'token'       => 'required',
            'useType'     => 'required|numeric',
            'usageType'   => 'required|numeric',
            'flag'        => 'required|numeric|min:0',
            'description' => 'nullable',
            'amount'      => 'required|numeric|min:0'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->errors(),
                'data'    => []
            ], 400);
        }

        $checkToken = Coupon::where('token', $request->token)->first();
        if ($checkToken) {
          return response()->json([
              'status'  => false,
              'message' => 'Coupon Code is already used. Try another coupon code',
              'data'    => []
          ], 400);
        }

        $coupon              = new Coupon();
        $coupon->title       = $request->title;
        $coupon->token       = $request->token;
        $coupon->amount      = $request->amount;
        if ($request->useType == 1) {
          $coupon->max_user    = 1;
        } else if($request->usageType == 1) {
          $coupon->max_user    = 9999999;
        } else {
          $coupon->max_user = $request->max_user;
        }
        $coupon->flag        = $request->flag;
        $coupon->expired_on  = $expOn;
        $coupon->description = $request->has('description') ? $request->description: '';

        if($coupon->save()) {
          return response()->json([
              'status'   => true,
              'message'  => 'New Coupon Created',
              'data'     => ['coupon' => $coupon]
          ], 200);
        } else {
          return response()->json([
              'status'   => true,
              'message'  => 'Database connectivity error',
              'data'     => []
          ], 400);
        }
      } catch (\Exception $e) {
        return response()->json([
            'status'       => false,
            'message'      => $e->getMessage(),
            'errorLineNo'  => $e->getLine(),
            'data'         => []
        ], 500);
      }
    }

    /*
     *  Function to create coupon by an admin
     *  @params [id as url parameter]
     *  @return \Illuminate\Http\JsonResponse
     * */
    public function deleteCoupon($id) {
      try {
        // //rejecting delete request if package id is invalid
        // if(!is_numeric($id)) {
        //  return response()->json([
        //      'status'   => false,
        //      'message'  => 'Invalid Coupon id!'
        //  ], 400);
        // }
        $id = (int)$id;
        if(Coupon::destroy($id)) {
          return response()->json([
              'status'   => true,
              'message'  => 'Coupon Deleted Successfully!'
          ], 200);
        } else {
          return response()->json([
              'status'   => true,
              'message'  => 'Coupon Id cannot be found!'
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


    /*
     *  Function to edit coupon by an admin
     *  @params [Request :: id: (int: coupon id), title:(text), percentage:(float), expired_on:(datetime), description: text(optional), status:enum[0,1]]
     *  @return \Illuminate\Http\JsonResponse
     * */
     public function editCoupon(Request $request) {
       try {
         $timeNow = Carbon::now()->format('Y-m-d');
         if ($request->expired_on != '') {
           if (Carbon::now()->lte(Carbon::parse($request->expired_on))) {
             $expOn = Carbon::parse($request->expired_on);
           } else {
             return response()->json([
                 'status'  => false,
                 'message' => 'Expire Date should be greater than current time',
                 'data'    => []
             ], 400);
           }
         } else {
           $expOn = '2200-12-31';
         }

         $validator = Validator::make($request->all(), [
             'title'       => 'required',
             'max_user'    => 'required|numeric|min:0',
             'useType'     => 'required|numeric',
             'token'       => 'required',
             'usageType'   => 'required|numeric',
             'flag'        => 'required|numeric|min:0',
             'description' => 'nullable',
             'amount'      => 'required|numeric|min:0'
         ]);
         if ($validator->fails()) {
             return response()->json([
                 'status'  => false,
                 'message' => $validator->errors(),
                 'data'    => []
             ], 400);
         }

         $checkToken = Coupon::where('token', $request->token)->where('id', '!=', $request->id)->first();
         if ($checkToken) {
           return response()->json([
               'status'  => false,
               'message' => 'Coupon Code is already used. Try another coupon code',
               'data'    => []
           ], 400);
         }

         $id = (int)$request->id;
         $coupon = Coupon::find($id);

         if(!$coupon) {
           return response()->json([
               'status'   => true,
               'message'  => 'Coupon not found!',
               'data'     => []
           ], 400);
         }

         $coupon->title       = $request->title;
         $coupon->amount      = $request->amount;
         $coupon->token      = $request->token;
         if ($request->useType == 1) {
           $coupon->max_user    = 1;
         } else if($request->usageType == 1) {
           $coupon->max_user    = 9999999;
         } else {
           $coupon->max_user = $request->max_user;
         }
         $coupon->flag        = $request->flag;
         $coupon->expired_on  = $expOn;
         $coupon->description = $request->has('description') ? $request->description: '';

         if($coupon->save()) {
           return response()->json([
               'status'   => true,
               'message'  => 'Coupon Edited Successfully!',
               'data'     => ['coupon' => $coupon]
           ], 200);
         } else {
           return response()->json([
               'status'   => true,
               'message'  => 'Database connectivity error',
               'data'     => []
           ], 400);
         }
       } catch (\Exception $e) {
         return response()->json([
             'status'       => false,
             'message'      => $e->getMessage(),
             'errorLineNo'  => $e->getLine(),
             'data'         => []
         ], 500);
       }
     }

     /*
      *  Function to check coupon by an admin
      *  @params Request
      *  @return \Illuminate\Http\JsonResponse
      * */
     public function checkCoupon(Request $request)
     {
       try {
         $token = $request->token;
         $amount = $request->amount;
         $save = 0;
         $coupon = Coupon::where('token', $token)->whereDate('expired_on', '>', date('Y-m-d H:i:s'))->first();
         if ($coupon) {
           $countUsageCoupon = UserPackage::where('coupon_id',$coupon->id)->where('payment_status', '!=', '0')->count();
           if ($countUsageCoupon < $coupon->max_user) {
             $save = $coupon->flag == '0' ? (($amount * $coupon->amount) / 100) : $coupon->amount;
             if ($save < $amount) {
               return response()->json([
                 'status' => true,
                 'message' => 'Coupon applied successfully',
                 'data' => [
                   'coupon' => $coupon,
                   'savedAmount' => $save
                 ]
               ], 200);
             } else {
               return response()->json([
                 'status' => false,
                 'message' => 'Coupon is not applicable with this product',
               ], 400);
             }
           } else {
             return response()->json([
               'status' => false,
               'message' => 'Coupon has been expired',
             ], 400);
           }
         } else {
           return response()->json([
             'status' => false,
             'message' => 'Invalid coupon',
           ], 400);
         }
       } catch (\Exception $e) {
         return response()->json([
           'status' => false,
           'message' => $e->getMessage(),
           'line' => 'Problem encountered on line number on: '. $e->getLine()
         ], 500);
       }
     }

     /*
      *  Function to get Coupon
      *  @params
      *  @return \Illuminate\Http\JsonResponse
      * */
     public function getCoupon()
     {
       try {
           $token = Common::getToken(6);
           $checkToken = Coupon::where('token', $token)->first();
           if ($checkToken) {
             self::getCoupon();
           } else {
             return response()->json([
               'status'=> true,
               'couponCode' => $token
             ], 200);
           }
       } catch (\Exception $e) {
         return response()->json([
           'status' => false,
           'error' => $e->getMessage()
         ], 500);
       }
     }

     /*
      *  Function to check Coupon
      *  @params token
      *  @return \Illuminate\Http\JsonResponse
      * */
     public function checkToken($token = '')
     {
       try {
         $token = strtoupper($token);
         if ($token == '') {
           return response()->json([
             'status' => false,
             'error' => 'Coupon is not validate'
           ], 400);
         } else {
             $checkToken = Coupon::where('token', $token)->first();
             if ($checkToken) {
               return response()->json([
                 'status' => false,
                 'message' => 'Coupon is already used'
               ], 200);
             } else {
               return response()->json([
                 'status' => true,
                 'message' => 'Coupon is available'
               ], 200);
             }
         }
       } catch (\Exception $e) {
         return response()->json([
           'status' => false,
           'error' => $e->getMessage()
         ], 500);
       }
     }
}
