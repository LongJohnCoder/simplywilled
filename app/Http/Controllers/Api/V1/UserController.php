<?php
/**
 * Functional Scope: API for Change Password and Sign Out for Users.
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

class UserController extends Controller {
    
    /**
     * Signs out User
     *
     * @return \Illuminate\Http\JsonResponse
    */

    public function signOut() {
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
     * Change password of logged in user
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