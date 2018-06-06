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
        $coupons = Coupon::get();
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
        // $request->expired_on = Carbon::createFromFormat('Y-m-d', $request->expired_on);
        if (Carbon::now()->lte(Carbon::parse($request->expired_on))) {
          $expOn = Carbon::parse($request->expired_on);
        } else {
          return response()->json([
              'status'  => false,
              'message' => 'Expire Date should be greater than current time',
              'data'    => []
          ], 400);
        }
        $timeNow = Carbon::now()->format('Y-m-d');
        $validator = Validator::make($request->all(), [
            'title'       => 'required',
            'max_user'    => 'required|numeric|min:0',
            'flag'        => 'required|numeric|min:0',
            // 'expired_on'  => 'required|after:'.$timeNow,
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

        $coupon              = new Coupon();
        $coupon->title       = $request->title;
        $coupon->amount      = $request->amount;
        $coupon->max_user    = $request->max_user;
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
         if (Carbon::now()->lte(Carbon::parse($request->expired_on))) {
           $expOn = Carbon::parse($request->expired_on);
         } else {
           return response()->json([
               'status'  => false,
               'message' => 'Expire Date should be greater than current time',
               'data'    => []
           ], 400);
         }
         $timeNow = Carbon::now()->format('Y-m-d');
         $validator = Validator::make($request->all(), [
           'title'       => 'required',
           'max_user'    => 'required|numeric|min:0',
           'flag'        => 'required|numeric|min:0',
           // 'expired_on'  => 'required|date|date_format:Y-m-d|after:'.$timeNow,
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
         $coupon->max_user    = $request->max_user;
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
}
