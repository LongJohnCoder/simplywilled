<?php
/**
 * Functional Scope: API for Sign Up, Sign In , Validate Email for Users.
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
use App\Models\LoginHistory;
use Carbon\Carbon;
use App\TellUsAboutYou;
use Newsletter;

class AuthController extends Controller {

    /**
     * Signs up a new user and assign role as User.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws HttpBadRequestException
     */

    public function signUp(Request $request) {
        try {

            DB::beginTransaction();
            $user = new User();

            /**
             * Validate mandatory fields and register a new user
             */
            if ($request->has('email'))

                $user->email = $request->input('email');
            else
                throw new HttpBadRequestException("Email is required.");

            if ($request->has('password'))

                $user->password = $request->input('password');
            else
                throw new HttpBadRequestException("Password is required");

            if ($request->has('confirm_password')) {
                if($request->input('confirm_password') != $request->input('password')) {
                    throw new HttpBadRequestException("Password and confirm password should be same");
                }
            } else {
                throw new HttpBadRequestException("Password is required");
            }

            /**
             * Check user present or not then update or create only for soft deleted user
             */

            $registerUser = User::where('email', $request->input('email'))->whereNotNull('deleted_at')->first();

            if($registerUser) {
                $response = [
                    'status' => false,
                    'error' =>  'Email address already exists'
                ];
                $responseCode = 400;
            } else {

                $user->status = '1';
                $user->parent_id = 0;
                $user->save();
                $user->assignRole('User');
                $role = $user->getRole->roleInfo->name;
                $customClaims = ['package' => $user->package];

                if ($token = JWTAuth::attempt($request->only('email', 'password'), $customClaims)) {
                    $loginHistory = new LoginHistory;
                    $loginHistory->user_id = $user->id;
                    $loginHistory->login_time = Carbon::now();
                    $loginHistory->ip_address = $request->getClientIp();
                    $loginHistory->device_type = $request->server('HTTP_USER_AGENT');
                    $loginHistory->jwt_token = $token;
                    $loginHistory->save();

                    $registerSubscription = Newsletter::subscribe($user->email,[],'register');
                    if (!$registerSubscription)  {
                        $response = [
                            'status' => false,
                            'message' => "Could not subscribe to mailchimp.",
                        ];
                        $responseCode = 400;
                    } else {
                        $response = [
                            'status' => true,
                            'message' => "User signed in successfully.",
                            'user' => [
                                'id' => $user->id, 'name' => $user->name,
                                'email' => $user->email, 'role' => $role,
                                'avatar' => $user->avatar, 'document_path' => $user->document_path,
                                'status' => $user->status, 'package' => $user->package
                            ],
                            'token' => $token,
                        ];
                        $responseCode = 200;
                    }
                    Mail::send('new_emails.registration_first',[], function($mail) use($user){
                            $mail->from(config('settings.email'), 'Simplywilled Registration Successful');
                            $mail->to(strtolower($user->email), $user->name)->subject('You Registered Successfully in Simplywilled!');
                    });

                } else {
                    JWTAuth::invalidate($token);
                      $response = [
                      'status' => false,
                      'error' => "Invalid email or password.",
                    ];
                    $responseCode = 400;
                }

                // $response = [
                //     'status'  => true,
                //     'message' => 'Registration completed Successfully',
                //     'user'    => $user
                // ];
                // $responseCode = 200;
            }
        } catch (HttpBadRequestException $httpBadRequestException) {
            $response = [
                'status' => false,
                'error' => $httpBadRequestException->getMessage()
            ];
            $responseCode = 400;
        } catch (QueryException $queryException) {
            if (!empty($queryException->errorInfo) && $queryException->errorInfo[1] == 1062) {
                $response = [
                    'status'    => false,
                    'error'     => "User is already signed up.Please login or register with different e-mail id.",
                ];
                $responseCode = 409;
            } else {
                $response = [
                    'status'        => false,
                    'error'         => "Internal server error.",
                    'error_info'    => $queryException->getMessage(),
                    'error_line'    => $queryException->getLine()
                ];
                $responseCode = 500;
            }
        } catch (ClientException $clientException) {

            DB::rollBack();

            $response = [
                'status'            => false,
                'error'             => "Internal server error.",
                'error_info'        => $clientException->getMessage(),
                'error_line'        => $clientException->getLine()
            ];
            $responseCode = 500;
        } catch (Exception $exception) {

            DB::rollBack();

            Log::error($exception->getMessage());

            $response = [
                'status'            => false,
                'error'             => "Internal server error.",
                'error_info'        => $exception->getMessage(),
                'error_line'        => $exception->getLine()

            ];

            $responseCode = 500;
        } finally {

            DB::commit();

            unset($user);
        }

        return response()->json($response, $responseCode);
    }




    /**
     * Function to validate email
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws HttpBadRequestException
     */

    public function validationEmail(Request $request) {
        try {
            $email       = $request->input('email');
            $emailExists = User::where('email',$email)->count();
            if($emailExists > 0){
                $response = [
                'status'      => false,
                'message'     => 'Email already exists.'
                ];
                $responseCode = 200;
            } else {
                $response = [
                'status'      => true,
                'message'     => 'Email is available.'
                ];
                $responseCode = 200;
            }

        } catch (HttpBadRequestException $httpBadRequestException) {

            $response = [
                'status'    => false,
                'error'     => $httpBadRequestException->getMessage()
            ];
            $responseCode = 400;
        }

        return response()->json($response, $responseCode);
    }

    /**
     * Signs in a authenticated user
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws HttpBadRequestException
     */

    public function signIn(Request $request) {

        try {

            /**
             * Validate mandatory fields
             */

            //dd($request->all());
            if (!$request->has('email'))

                throw new HttpBadRequestException("Email is required.");

            if (!$request->has('password'))

                throw new HttpBadRequestException("Password is required.");

            /**
             * Authenticate user using JWTAuth
             */
            $user = User::where('email', '=', $request->email)->first();
            if (!$user) {
              return response()->json([
                'status' => false,
                'error' => 'User not found'
              ], 400);
            }
            $customClaims = ['package' => $user->package];
             /*
             *  Checking for a fact that admin cannot log in through user login
             */
            if ($token = JWTAuth::attempt($request->only('email', 'password'), $customClaims)) {

                $user = Auth::user();

                $role = $user->getRole->roleInfo->name;

                if($role == 'User') {
                  $loginHistory = new LoginHistory;
                  $loginHistory->user_id = $user->id;
                  $loginHistory->login_time = Carbon::now();
                  $loginHistory->ip_address = $request->getClientIp();
                  $loginHistory->device_type = $request->server('HTTP_USER_AGENT');
                  $loginHistory->jwt_token = $token;
                  $loginHistory->save();

                  $response = [
                      'status' => true,
                      'message' => "User signed in successfully.",
                      'user' => [
                                  'id' => $user->id, 'name' => $user->name,
                                  'email' =>  $user->email, 'role' => $role,
                                  'avatar' => $user->avatar, 'document_path' => $user->document_path,
                                  'package' => $user->package,
                                  'status' => $user->status
                              ],
                      'token' => $token,
                  ];
                  $responseCode = 200;
                } else {
                  JWTAuth::invalidate($token);
                      $response = [
                      'status' => false,
                      'error' => "Invalid email or password.",
                  ];
                  $responseCode = 400;
                }
            } else {
                $response = [
                    'status' => false,
                    'error' => "Invalid email or password.",
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
                "error_info"    => $exception->getMessage(),
                "error_line"    => $exception->getLine()
            ];
            $responseCode = 500;
        }

        return response()->json($response, $responseCode);
    }

    /**
     * Signs out a user
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function signOut()
    {
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
     * Forget password generate url
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function forgetPassword(Request $request) {

        try {

            /**
             * Validate mandatory fields
             */
             // $validator = Validator::make($request->all(), [
             //     'email'       =>  'required|exists:users,email,deleted_at,NULL'
             // ]);
             // if ($validator->fails()) {
             //     return response()->json([
             //         'status'  => false,
             //         'message' => $validator->errors(),
             //         'data'    => []
             //     ], 400);
             // }

            $user = User::where('email',$request->input('email'))->first();
            if ($user) {
                /**
                 * Fire a mail to user with original subject and message
                 */
                $token = str_random(64);
                $reset = new PasswordReset();
                $reset->email = $user->email;
                $reset->token = $token;
                $reset->created_at = date('Y-m-d h:i:j');
                $reset->save();
                $url = env('BASE_URL') . '/reset-password/' . $user->email . '/' . $token;
                $name = $user->name;

                \Mail::send('emails.resetpasswordEmail', [
                    'email'         => 'info@simplywilled.com',
                    'url'           => $url,
                    'name'          => $name
                ], function ($mail) use ($user) {
                    /** @noinspection PhpUndefinedMethodInspection */
                    $mail->from('info@simplywilled.com', 'USER Reset-Password');
                    /** @noinspection PhpUndefinedMethodInspection */
                    $mail->to($user->email, "User")
                        ->subject('User Re-set Password Link');
                });
                $response = [
                    'status'            => true,
                    'message'           => "Confirmation mail send to your email address.",
                ];
                $responseCode = 200;
            } else {
                $response = [
                    'status'    => false,
                    'message'     => "Sorry! this email address does not belong to any user in our database!"
                ];
                $responseCode = 422;
            }
        } catch (Exception $exception) {

            Log::error($exception->getMessage());

            $response = [
                'status'        => false,
                'message'         => "Internal server error.",
                "error_info"    => $exception->getMessage()
            ];
            $responseCode = 500;
        }

        return response()->json($response, $responseCode);
    }

    /**
     * Reset Password if user Successfully fill up his reset password form
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function resetPassword(Request $request) {
        $reset = PasswordReset::where('email', $request->email)->where('token', $request->token)->first();
        if ($reset != null) {
            /*if (strtotime($reset->created_at) > strtotime("-30 minutes")) {*/
                if ($request->email != null && $request->password != null && $request->confirm_password != null) {
                    if ($request->password == $request->confirm_password) {

                        $user = User::where('email', $request->email)->first();
                        if ($user != null) {
                            $user->password = $request->input('password');
                            // $user->uniqueKey = Crypt::encrypt($request->input('password'));
                            $user->update();
                            $password = PasswordReset::where('email', $user->email)->delete();

                            $response = [
                                'status'        => true,
                                'message'         => "Password Reset Successfully"
                            ];
                            $responseCode = 200;
                            return response()->json($response, $responseCode);
                        } else {
                            $response = [
                                'status'        => false,
                                'message'         => "User not Found"
                            ];
                            $responseCode = 400;
                            return response()->json($response, $responseCode);
                        }
                    } else {
                        $response = [
                            'status'        => false,
                            'message'         => "Password and confirm should be same"
                        ];
                        $responseCode = 406;
                        return response()->json($response, $responseCode);
                    }
                } else {

                    $response = [
                    'status'        => false,
                    'message'         => "Enter Password and confirm password"
                    ];
                    $responseCode = 406;
                    return response()->json($response, $responseCode);
                }
            /*} else {
                $response = [
                    'status'        => false,
                    'error'         => "Token expired"
                ];
                $responseCode = 403;
                return response()->json($response, $responseCode);
            }*/
        } else {
            $response = [
                'status'        => false,
                'message'         => "Token not valid or You Use this token already"
            ];
            $responseCode = 403;
            return response()->json($response, $responseCode);
        }
    }

    /**
     * Get details of fiduciaryOfUser
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function fiduciaryOfUser(Request $request)
    {
      try {
        $userID = Crypt::decryptString($request->token);
        // $user = User::find($userID);
        $user = TellUsAboutYou::where('user_id', $userID)->first();
        if ($user) {
          return response()->json([
            'status' => true,
            'data' => [
              'userName' => ucwords($user->fullname)
            ]
          ], 200);
        } else {
          return response()->json([
            'status' => false,
            'error' => 'User not found'
          ], 400);
        }
      } catch (\Exception $e) {
        return response()->json([
          'status' => false,
          'error' => $e->getMessage(),
          'line' => $e->getLine()
        ], 500);
      }
    }


}
