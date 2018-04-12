<?php
/**
 * Functional Scope: API for Sign Up, Sign In , Sign Out , Change Password for Admin.
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

class AdminController extends Controller {


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
   * @param Request $request
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
     * @param Request $request
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
          $id = $request->id;

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

          $package = Packages::findorfail($id);
          $package->name        = $name;
          $package->amount      = $amount;
          $package->description = $request->has('description') ? $request->description : '';
          $package->status      = $request->has('status') ? $request->status : '0';
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

    /**
     * Signs in a authenticated admin
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws HttpBadRequestException
     */

    public function logIn(Request $request) {

        try {

            /**
             * Validate mandatory fields
             */

            if (!$request->has('email'))

                throw new HttpBadRequestException("Email is required.");

            if (!$request->has('password'))

                throw new HttpBadRequestException("Password is required.");

            /**
             * Authenticate user using JWTAuth
             */
            if ($token = JWTAuth::attempt($request->only('email', 'password'))) {

                $user = Auth::user();
                $role = $user->getRole($user->id);
                if($role == 'Admin') {
                    JWTAuth::invalidate($token);
                        $response = [
                        'status' => false,
                        'error' => "Invalid email or password.",
                    ];
                    $responseCode = 400;
                } else {

                    $response = [
                        'status' => true,
                        'message' => "User signed in successfully.",
                        'user' => [
                                    'id' => $user->id, 'name' => $user->name,
                                    'email' => $user->email, 'role' => $role
                                ],
                        'token' => $token,
                    ];
                    $responseCode = 200;
                }
            } else {
                $response = [
                    'status' => false,
                    'error' => "Invalid email or password.",
                    'token' => $token
                ];
                $responseCode = 400;
            }

        } catch (HttpBadRequestException $httpBadRequestException) {

            $response = [
                'status'    => false,
                'error'     => $httpBadRequestException->getMessage()
            ];
            $responseCode = 400;
        } /** @noinspection PhpUndefinedClassInspection */
        catch (JWTAuthException $JWTAuthException) {

            $response = [
                'status'        => false,
                'error'         => "Failed to create token.",
                'error_info'    => $JWTAuthException->getMessage()
            ];
            $responseCode = 500;

        } catch (Exception $exception) {

            Log::error($exception->getMessage());

            $response = [
                'status'        => false,
                'error'         => "Internal server error.",
                "error_info"    => $exception->getMessage()
            ];
            $responseCode = 500;
        }

        return response()->json($response, $responseCode);
    }

    /**
     * Signs out admin
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function logOut() {
        try {
            /*
             * When user request for signing out, invalidate JWT token
             */
            JWTAuth::invalidate(JWTAuth::getToken());

            $response = [
                'status'        => true,
                'message'       => 'User signed out successfully.'
            ];
            $responseCode = 200;

        } catch (JWTException $JWTException) {
            $response = [
                'status'        => false,
                'error'         => "Token mismatched.",
                'error_info'    => $JWTException->getMessage()
            ];
            $responseCode = 401;
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            $response = [
                'status'        => false,
                'error'         => "Internal server error.",
                "error_info"    => $exception->getMessage()
            ];
            $responseCode = 500;
        }

        return response()->json($response, $responseCode);
    }

    /**
     * Change password for Admin
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function changePassword(Request $request) {

        try {
            $validator = Validator::make($request->all(), [
                'new_password'  => 'required',
                'confirm_password' => 'required',
            ]);

            $errorMessage = '';
            if ($validator->fails()){
                $messages = $validator->messages();
                foreach ($messages->all() as $message)
                    {
                      $errorMessage=$errorMessage.$message." ";
                    }
                $response = [
                    'status' => false,
                    'message' => $errorMessage,
                ];
                $responseCode = 200;
            } else {
                $user = User::find(Auth::user()->id);

                if($request->input('new_password') == $request->input('confirm_password')) {
                    $user->password = $request->input('new_password');
                    $user->save();

                    $response = [
                        'status' => true,
                        'message' => 'Password modified successfully'
                    ];
                    $responseCode = 200;

                } else {
                    $response = [
                        'status' => false,
                        'message' => 'New Password and confirm password should be same'
                    ];
                    $responseCode = 200;
                }
            }
        } catch (ModelNotFoundException $modelNotFoundException) {
            $response = [
                'status' => false,
                'error' => "Sorry Model not found",
                'error_info' => preg_replace('/(\\[App\\\\Models\\\\)|(\\])/', '',$modelNotFoundException->getMessage())
            ];
            $responseCode = 404;
        } catch (Exception $exception) {
            DB::rollBack();
            $response = [
                'status' => false,
                'error' => "Internal server error",
                'error_info' => $exception->getMessage()
            ];
            $responseCode = 500;
        } finally {
            DB::commit();
        }
        return response()->json($response, $responseCode);
    }

}
