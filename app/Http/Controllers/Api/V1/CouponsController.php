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

        $timeNow = Carbon::now()->format('Y-m-d H:i:s');
        $validator = Validator::make($request->all(), [
            'title'       =>  'required',
            'percentage'  =>  'required|numeric|min:0',
            'expired_on'  =>  'required|date|date_format:Y-m-d H:i:s|after:'.$timeNow,
            'description' =>  'nullable',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->errors(),
                'data'    => []
            ], 400);
        }

        $title      = $request->title;
        $percentage = $request->percentage;
        $expiredOn  = $request->expired_on;

        $coupon = new Coupon();
        $coupon->title       = $title;
        $coupon->percentage  = $percentage;
        $coupon->expired_on  = $expiredOn;
        $coupon->description = $request->has('description') ? $request->description : '';
        $coupon->token       = str_random(60);

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
        //rejecting delete request if package id is invalid
        if(!is_numeric($id)) {
         return response()->json([
             'status'   => false,
             'message'  => 'Invalid Coupon id!'
         ], 400);
        }
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


         $timeNow = Carbon::now()->format('Y-m-d H:i:s');
         $validator = Validator::make($request->all(), [
             'id'          =>  'required|exists:coupons,id,deleted_at,NULL',
             'title'       =>  'required',
             'percentage'  =>  'required|numeric|min:0',
             'expired_on'  =>  'required|date|date_format:Y-m-d H:i:s|after:'.$timeNow,
             'description' =>  'nullable',
         ]);
         if ($validator->fails()) {
             return response()->json([
                 'status'  => false,
                 'message' => $validator->errors(),
                 'data'    => []
             ], 400);
         }

         $id = (int)$request->id;
         $percentage = (float)$request->percentage;
         $expiredOn = $request->expired_on;
         $coupon = Coupon::find($id);

         if(!$coupon) {
           return response()->json([
               'status'   => true,
               'message'  => 'Coupon not found!',
               'data'     => []
           ], 400);
         }

         $coupon->title       = $request->has('title') && $request->title != null  ? $request->title : $coupon->title;
         $coupon->percentage  = $percentage == null ? $coupon->percentage : $percentage;
         $coupon->expired_on  = $expiredOn == null ? $coupon->expired_on : $expiredOn;
         $coupon->description = $request->has('description') && $request->description != null ? $request->description : '';
         $coupon->status      = $request->has('status') && $request->status != null ? $request->status : $coupon->status;
         $coupon->token       = $coupon->token;

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
}
