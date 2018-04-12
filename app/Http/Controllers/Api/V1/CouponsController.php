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

class CouponsController extends Controller
{
  /*
   *  Function to create coupon by an admin
   *  @params [Request :: title:(text), percentage:(float), expired_on:(datetime), description: text(optional)]
   *  @return \Illuminate\Http\JsonResponse
   * */
    public function createCoupon(Request $request) {
      try {

        if(!$request->has('title') || strlen(trim($request->title)) == 0) {
         return response()->json([
             'status'   => false,
             'message'  => 'Invalid Title Name!',
             'data'     => []
         ], 400);
        }
        $title = $request->title;

        //if request has no amount field or amount field is empty discarding
        if(!$request->has('percentage') || !is_numeric($request->percentage)) {
         return response()->json([
             'status'   => false,
             'message'  => 'Invalid Percentage Provided!',
             'data'     => []
         ], 400);
        }
        $percentage = $request->percentage;

        //if request has no expired_on field or expired_on field is empty discarding
        //Calling helper function to check if date field entered matches mysql datetime format
        $dtHelper = new DateTimeHelper();
        if(!$request->has('expired_on') || !$dtHelper->verifyDate(trim($request->expired_on))) {
         return response()->json([
             'status'   => false,
             'message'  => 'Invalid Coupons expired_on format!',
             'data'     => []
         ], 400);
        }
        $expiredOn = $request->expired_on;

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
     *  @params [Request :: title:(text), percentage:(float), expired_on:(datetime), description: text(optional), status:enum[0,1]]
     *  @return \Illuminate\Http\JsonResponse
     * */
     public function editCoupon(Request $request) {
       try {

         if(!$request->has('id') || !is_numeric($request->id)) {
          return response()->json([
              'status'   => false,
              'message'  => 'Invalid Coupon Id!',
              'data'     => []
          ], 400);
         }
         $id = (int)$request->id;

         //if request has no amount field or amount field is empty discarding
         if($request->has('percentage') && strlen($request->percentage) > 0 && !is_numeric($request->percentage)) {
          return response()->json([
              'status'   => false,
              'message'  => 'Invalid Percentage Provided!',
              'data'     => []
          ], 400);
         }
         $percentage = (float)$request->percentage;

         //if request has no expired_on field or expired_on field is empty discarding
         //Calling helper function to check if date field entered matches mysql datetime format
         $dtHelper = new DateTimeHelper();
         if($request->has('expired_on') && strlen($request->expired_on) > 0 && !$dtHelper->verifyDate(trim($request->expired_on))) {
          return response()->json([
              'status'   => false,
              'message'  => 'Invalid Package expired_on value!',
              'data'     => []
          ], 400);
         }
         $expiredOn = $request->expired_on;

         $coupon = Coupon::findorfail($id);
         $coupon->title       = $request->has('title') && $request->title != null  ? $request->title : $coupon->title;
         $coupon->percentage  = $percentage == null ? $coupon->percentage : $percentage;
         $coupon->expired_on  = $expiredOn == null ? $coupon->expired_on : $expiredOn;
         $coupon->description = $request->has('description') && $request->description != null ? $request->description : '';
         $coupon->status      = $request->has('status') && $request->status != null ? $request->status : $coupon->status;
         $coupon->token       = str_random(60);

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
