<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Role;

class RoleController extends Controller
{
    /**
    * Lists of roles
    * @return \Illuminate\Http\JsonResponse
    */
    public function roleLists()
    {
        try{
            $roles = Role::select('id','name','created_at','updated_at')->get();
            if($roles){
                return response()->json([
                    'status' => true,
                    'message' => 'Role Lists',
                    'data' => ['roleDetails' => $roles]
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'No record found',
                    'data' => []
                ], 400);
            }
        } catch(Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => []
            ], 500);
        }
    }

    /**
    * Create role
    * @return \Illuminate\Http\JsonResponse
    */
    public function createRole(Request $request)
    {
        try{

            $roleName = $request->role_name;    //string
            $validator = Validator::make($request->all(), [
                'role_name' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                    'data' => []
                ], 400);
            }

            if(Role::where('name', $roleName)->count() > 0) {
              return response()->json([
                  'status'  => false,
                  'message' => 'This role already exists',
                  'data' => []
              ], 400);
            }

            $role = new Role;
            $role->name = $roleName;
            if($role->save()){
                return response()->json([
                    'status' => true,
                    'message' => 'Role Details',
                    'data' => ['roleDetails' => $role]
                ], 200);
            } else {
              return response()->json([
                  'status' => false,
                  'message' => 'Internal Server Error',
                  'data' => []
              ], 500);
            }

        } catch (\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => []
            ], 500);
        }
    }

    /**
    * Role Details
    * @return \Illuminate\Http\JsonResponse
    */
    public function roleDetails(Request $request)
    {
        try{
            $roleID = $request->role_id;    //int

            $validator = Validator::make($request->all(), [
                'role_id' => 'required|integer|exists:roles,id'
            ]);

            if($validator->fails()) {
              return [
                'status'  =>  false,
                'message' =>  $validator->errors(),
                'data'    =>  []
              ];
            }

            $role = Role::find($roleID);
            if($role){
                return response()->json([
                    'status' => true,
                    'message' => 'Role Details',
                    'data' => ['roleDetails' => $role]
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Role not found',
                    'data' => []
                ], 400);
            }


        } catch(Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => []
            ], 500);
        }
    }

    /**
    * Role Update
    * @return \Illuminate\Http\JsonResponse
    */
    public function roleUpdate(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'role_id'   =>  'required|integer|exists:roles,id,deleted_at,NULL',
                'role_name' =>  'required'
            ]);

            if($validator->fails()) {
              return response()->json([
                  'status'  => false,
                  'message' => $validator->errors(),
                  'data'    => []
              ], 400);
            }

            $roleID   = $request->role_id;
            $roleName = $request->role_name;

            $role       = Role::find($roleID);

            if(!$role) {
              return response()->json([
                  'status'  => false,
                  'message' => 'Role not found!',
                  'data'    => []
              ], 400);
            }

            $role->name = $roleName;
            if($role->save()) {
                return response()->json([
                    'status'  => true,
                    'message' => 'Role updated successfull',
                    'data'    => ['roleDetails' => $role]
                ], 200);
            } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'Database connectivity error. Try again after a while!',
                    'data'    => []
                ], 400);
            }

        } catch(Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => $e->getMessage(),
                'data'    => []
            ], 500);
        }
    }

    /**
    * Role Delete
    * @return \Illuminate\Http\JsonResponse
    */
    public function roleDelete($id)
    {
        try{
            $role = Role::find($id);
            if($role){
                if($role->delete()){
                    return response()->json([
                        'status' => true,
                        'message' => 'Role deleted successfull',
                        'data' => []
                    ], 200);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Internal Error',
                        'data' => []
                    ], 400);
                }

            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Role not found',
                    'data' => []
                ], 400);
            }

        } catch(Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => []
            ], 500);
        }
    }
}
