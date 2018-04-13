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

          //if request has no name field or name field is empty discarding
          if(!$request->has('name') || strlen(trim($request->name)) == 0) {
           return response()->json([
               'status'   => false,
               'message'  => 'Invalid Package Name!',
               'data'     => []
           ], 400);
          }
          $name = $request->name;

          //if request has no amount field or amount field is empty discarding
          if(!$request->has('amount') || !is_numeric($request->amount)) {
           return response()->json([
               'status'   => false,
               'message'  => 'Invalid Package Amount!',
               'data'     => []
           ], 400);
          }
          $amount = $request->amount;

          //if request has no valid_till field or valid_till field is empty discarding
          if(!$request->has('valid_till') || strlen(trim($request->valid_till)) == 0) {
           return response()->json([
               'status'   => false,
               'message'  => 'Invalid Package valid_till value!',
               'data'     => []
           ], 400);
          }
          $dtHelper = new DateTimeHelper();
          if(!$dtHelper->verifyDate(trim($request->valid_till))) {
            return response()->json([
                'status'   => false,
                'message'  => 'Invalid Package valid_till format!',
                'data'     => []
            ], 400);
          }
          $validTill = $request->valid_till;

          $package = new Packages();
          $package->name        = $name;
          $package->amount      = $amount;
          $package->valid_till  = $validTill;
          $package->description = $request->has('description') ? $request->description : '';
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

            //if request has improper id field then return error
            if(!$request->has('id') || !is_numeric($request->id)) {
             return response()->json([
                 'status'   => false,
                 'message'  => 'Invalid Package Id!',
                 'data'     => []
             ], 400);
            }
            $id = (int)$request->id;

            //if request has no name field or name field is empty discarding
            if($request->has('name') && strlen(trim($request->name)) == 0) {
             return response()->json([
                 'status'   => false,
                 'message'  => 'Invalid Package Name!',
                 'data'     => []
             ], 400);
            }
            $name = trim($request->name);


            //if request has no amount field or amount field is empty discarding
            if($request->has('amount') && !is_numeric($request->amount)) {
             return response()->json([
                 'status'   => false,
                 'message'  => 'Invalid Package Amount!',
                 'data'     => []
             ], 400);
            }
            $amount = (float)$request->amount;

            if($request->has('status') && ($request->status != '0' && $request->status != '1')) {
             return response()->json([
                 'status'   => false,
                 'message'  => 'Invalid Package Status!',
                 'data'     => []
             ], 400);
            }
            $status = $request->has('status') ? $request->status : config('default_values.Packages.defaultStatus');

            $package = Packages::findorfail($id);
            $package->name        = $name;
            $package->amount      = $amount;
            $package->description = $request->has('description') ? $request->description : '';
            $package->status      = $status;
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
}
