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
          'valid_till'  =>  'required|date|date_format:Y-m-d H:i:s|after:'.$timeNow,
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
      $validTill  = $request->valid_till;

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
        $package = Packages::find($id);
        $package->name        = $name;
        $package->amount      = $amount;
        $package->description = $request->has('description') ? $request->description : '';
        $package->status      = (string)$status;
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
}
