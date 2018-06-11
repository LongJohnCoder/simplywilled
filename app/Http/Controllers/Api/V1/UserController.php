<?php
/**
 * Functional Scope: API for Change Password and Sign Out for Users.
 */

namespace App\Http\Controllers\Api\V1;

use App\Children;
use App\Exceptions\HttpBadRequestException;
use App\User;
use App\Role;
use App\Models\PasswordReset;
use App\TellUsAboutYou;
use App\GuardianInfo;
use App\ProvideYourLovedOnes;
use App\PersonalRepresentatives;
use App\ContingentBeneficiary;
use App\EstateDisrtibute;
use App\Disinherit;
use App\Gifts;
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
use Illuminate\Support\Facades\Hash;
use App\PetGuardian;

use App\Helper\GiftStatement;

class UserController extends Controller
{

    /**
     * Signs out User
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
                'status' => true,
                'message' => 'User signed out successfully.'
            ];
            $responseCode = 200;

        } catch (JWTException $JWTException) {
            $response = [
                'status' => false,
                'error' => "Token mismatched.",
                'error_info' => $JWTException->getMessage()
            ];
            $responseCode = 401;
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            $response = [
                'status' => false,
                'error' => "Internal server error.",
                "error_info" => $exception->getMessage()
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

    public function changePassword(Request $request)
    {
        $response = [];
        $responseCode = 400;
        try {

            $validator = Validator::make($request->all(), [
                'new_password' => 'required|min:6',
                'confirm_password' => 'required|min:6',
                'old_password'      => 'required'
            ]);

            $errorMessage = '';
            if ($validator->fails()) {
                $messages = $validator->messages();
                foreach ($messages->all() as $message) {
                    $errorMessage = $errorMessage . $message . " \n ";
                }
                $response = [
                    'status' => false,
                    'message' => $errorMessage,
                ];
                $responseCode = 400;
            
            } else {
                
                $user = \Auth::user();
                if(!\Hash::check($request->get('old_password'), $user->password)) {
                    $response = [
                            'status' => false,
                            'message' => 'Old password does not match with our records'
                        ];
                    $responseCode = 400; 
                
                } else {

                    if(strcmp($request->get('old_password'), $request->get('new_password')) == 0) {
                        $response = [
                            'status' => false,
                            'message' => 'New password cannot be same with your old password'
                        ];
                        $responseCode = 400;
                    
                    } else {

                        if(strcmp($request->get('new_password'), $request->get('confirm_password')) != 0) {
                            $response = [
                                'status' => false,
                                'message' => 'New password and confirm password does not match'
                            ];
                            $responseCode = 400;
                        } else {

                            $user->password = $request->get('new_password');
                            $user->save();
                            $response = [
                                'status' => true,
                                'message' => 'Password changed successfully'
                            ];
                            $responseCode = 200;
                        }
                        
                    }

                }
                
            }

        } catch (ModelNotFoundException $modelNotFoundException) {
            $response = [
                'status' => false,
                'error' => "Sorry Model not found",
                'error_info' => preg_replace('/(\\[App\\\\Models\\\\)|(\\])/', '', $modelNotFoundException->getMessage())
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

    /*
     * Function to edit the user profile
     *
     * @return \Illuminate\Http\JsonResponse
     * */

    public function editProfile(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'user_id'    =>  'required|numeric|integer|exists:users,id,deleted_at,NULL|in:'.\Auth::user()->id,
                'step'       =>  'required|numeric|between:1,12|integer',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                    'data' => []
                ], 400);
            } // validation for data

            $userId = $request->user_id;
            $step = $request->step;

            $checkUser = User::find($userId);
            if ($checkUser && $step) {
                if ($step == 1) {
                    return $this->updateTellUsAboutYou($request);
                }
                if ($step == 2) {
                    return $this->updateChildren($request);
                }
                if ($step == 3) {
                    return $this->updateGuardianInfo($request); //TO MODIFY
                }
                if ($step == 4) {
                    return $this->updateProvideYourLovedOnes($request);
                }
                if ($step == 5) {
                    return $this->updatePersonalRepresentatives($request);
                }
                if ($step == 6) {
                    return $this->updateTangiblePropertyDistribute($request);
                }
                if ($step == 7) {
                    return $this->updateGift($request);
                }
                if ($step == 8) {
                    return $this->updateSpecificGift($request);
                }
                if ($step == 9) {
                    return $this->updateContingentBeneficiary($request);
                }
                if ($step == 10) {
                    return $this->updateEstateDisrtibute($request);
                }
                if ($step == 11) {
                    return $this->updateDisinherit($request);
                }
                if ($step == 12) {
                    return $this->updatePetGuardianInfo($request); //TO MODIFY
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'This user is not found',
                    'data' => []
                ], 400);
            }
        } catch (Exception $e) {

            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'errorLineNo' => $e->getLine(),
                'data' => []
            ], 500);
        }
    }



    /*
     * Function to create/update TellUsAboutYou table
     * @return \Illuminate\Http\JsonResponse
     * */
    public function updateTellUsAboutYou($request)
    {
        $invitationFlag = false;

        $userId     = $request->user_id;
        $firstName  = $request->firstname;
        $middleName = $request->middlename;
        $lastName   = $request->lastname;
        $gender     = $request->gender; // M || F
        $dob        = $request->dob;
        $maritalStatus  = $request->marital_status;
        $phoneNumber    = $request->phone;
        $address    = $request->address;
        $city       = $request->city;
        $state      = $request->state;
        $zip        = $request->zip;
        $email      = $request->email;
        $partnerEmail= $request->partner_email;
        // if $maritalStatus =="M" || "R"   Create another entry in the user table and add spose info there
        $partnerFirstName   = $request->partner_firstname;
        $partnerMiddleName  = $request->partner_middlename;
        $partnerLastName    = $request->partner_lastname;
        $partnerGender      = $request->partner_gender;
        $partnerDob         = $request->partner_dob;

        $registeredPartner  = $request->registered_partner;
        $legalMarried       = $request->legal_married;
        $referral           = $request->referral;
        $referral_other     = $request->referral_other;

        //$spouseDob = $request->spouseDob;
        $validator = Validator::make($request->all(), [
            'user_id'         =>  'required|numeric|integer|exists:users,id,deleted_at,NULL|in:'.\Auth::user()->id,
            'firstname'       =>  'required|string|max:255',
            'lastname'        =>  'required|string|max:255',
            'gender'          =>  'required|string|in:M,F',
            'dob'             =>  'required|date_format:"Y-m-d"',
            'phone'           =>  'required|digits:10',
            'city'            =>  'required|string',
            'state'           =>  'required|string',
            'marital_status'  =>  'required|string|in:S,M,R,D,W',
            'zip'             =>  'required|regex:/^[0-9]{5}(\-[0-9]{4})?$/', // (Zip code validation rules REGX (min value 5)),
            'email'           =>  'nullable|email',
            'referral'        =>  'nullable|string',
            'referral_other'  =>  'nullable|string'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'data' => []
            ], 400);
        }// validation for data

        $checkForExistUser = TellUsAboutYou::where('user_id', $userId)->first();
        if(!$checkForExistUser) {
          $checkForExistUser = new TellUsAboutYou;
        }

        // update TellUsAboutYou
        $checkForExistUser->firstname       = $firstName;
        $checkForExistUser->fullname        = $firstName . ' ' . $middleName . ' ' . $lastName;
        $checkForExistUser->lastname        = $lastName;
        $checkForExistUser->middlename      = $middleName;
        $checkForExistUser->gender          = $gender; // M || F
        $checkForExistUser->dob             = $dob; // datetimeFormat
        $checkForExistUser->marital_status  = $maritalStatus;
        $checkForExistUser->email           = $email;
        if ($maritalStatus == "M" || $maritalStatus == "R") {
            if($maritalStatus == "R") {
              $validator = Validator::make($request->all(), [
                  'registered_partner'  =>  'required|numeric|integer|between:0,1',
                  'legal_married'       =>  'required|numeric|integer|between:0,1'
                  //'spouseDob'       =>  'required | date_format:"Y-m-d"',
              ]);
              if ($validator->fails()) {
                  return response()->json([
                      'status' => false,
                      'message' => $validator->errors(),
                      'data' => []
                  ], 400);
              }// validation for data
              //if the partner is legally married oviously the partner is registered partner
              if($legalMarried == 1) $registeredPartner = 1;
            }

            $validator = Validator::make($request->all(), [
                'partner_firstname' =>  'required',
                'partner_lastname'  =>  'required',
                'partner_gender'    =>  'required|string|in:M,F',
                'partner_email'     =>  'nullable|email',
                'partner_dob'       =>  'required|date_format:"Y-m-d"',
                'partner_invitation'  =>  'required|numeric|integer|between:0,1',
                'partner_email'       =>  'nullable|required_if:partner_invitation,1|email'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                    'data' => []
                ], 400);
            }
            // validation for data

            $partnerInvitation = (string)$request->partner_invitation;
            $partnerEmail      = strtolower(trim($request->partner_email));

            if($partnerInvitation == 1 && strlen($partnerEmail) > 0) {
                $invitationFlag = true;
            }

            if(strtolower(trim($checkForExistUser->partner_email)) == $partnerEmail) {
                $invitationFlag = false;
            }
            

            $checkForExistUser->partner_firstname   = $partnerFirstName;
            $checkForExistUser->partner_fullname    = $partnerFirstName . ' ' . $partnerMiddleName . ' ' . $partnerLastName;
            $checkForExistUser->partner_gender      = $partnerGender; // M || F
            $checkForExistUser->partner_lastname    = $partnerLastName;
            $checkForExistUser->partner_middlename  = $partnerMiddleName;
            $checkForExistUser->legal_married       = (string)$legalMarried;
            $checkForExistUser->registered_partner  = (string)$registeredPartner;
            $checkForExistUser->partner_email       = $partnerEmail;
            $checkForExistUser->partner_dob         = $partnerDob;
            $checkForExistUser->partner_invitation  = $partnerInvitation;

            // update the user from user table
            //$this->updatePartner($userId, $partnerFirstName);
        } else {
            
            $checkForExistUser->partner_firstname   = null;
            $checkForExistUser->partner_fullname    = null;
            $checkForExistUser->partner_gender      = null; // M || F
            $checkForExistUser->partner_lastname    = null;
            $checkForExistUser->partner_middlename  = null;
            $checkForExistUser->legal_married       = '0';
            $checkForExistUser->registered_partner  = '0';
            $checkForExistUser->partner_email       = null;
            $checkForExistUser->partner_dob         = null;
            $checkForExistUser->partner_invitation  = null;
        }

        $checkForExistUser->phone   = $phoneNumber;
        $checkForExistUser->address = $address;
        $checkForExistUser->city    = $city;
        $checkForExistUser->state   = $state;
        $checkForExistUser->zip     = $zip;
        $checkForExistUser->user_id = $checkForExistUser->user_id ? $checkForExistUser->user_id : $userId;
        $checkForExistUser->referral= $referral;
        $checkForExistUser->referral_other= $referral_other;
        
        if ($checkForExistUser->save()) {

            if($invitationFlag) {
                \Log::info('email getting send for spouse invitation');
                $arr = [
                    'firstName'         =>  $checkForExistUser->firstname,
                    'middleName'        =>  $checkForExistUser->middlename,
                    'lastName'          =>  $checkForExistUser->lastname,
                    'spouseFullName'    =>  $checkForExistUser->partner_fullname,
                    'email'             =>  $checkForExistUser->partner_email,
                    'spouseFirstName'   =>  $checkForExistUser->partner_firstname
                ];
                Mail::send('new_emails.spouse_invitation', $arr, function($mail) use($arr){
                    $mail->from(config('settings.email'), 'Spouse Invitation to Simplywilled.com');
                    $mail->to($arr['email'], $arr['spouseFullName'])
                    ->subject('Your spouse invited you to Simplywilled.com');
                });

                if(Mail::failures()) {
                    \Log::info('email sending error for spouse invitation');
                }
            }

            return response()->json([
                'status'  => true,
                'message' => 'User profile updated successfully',
                'data'    => ['userDetails' => $checkForExistUser]
            ], 200);
        } else {
            return response()->json([
                'status'  => false,
                'message' => 'User profile not updated !',
                'data'    => []
            ], 400);
        }
    }

    /*
     * function to create/update partner
     * params userId, spouseFirstName
     * */
    public function updatePartner($userId, $spouseFirstName)
    {
        try {
            if ($userId && $spouseFirstName) {
                $checkForUserPartner = User::where('parent_id', $userId)->first();
                if ($checkForUserPartner) {
                    // update the partner
                    $checkForUserPartner->name  = $spouseFirstName;
                    $checkForUserPartner->save();
                } else {
                    // create a partner
                    $createUserPartner = new User;
                    $createUserPartner->parent_id = $userId;
                    $createUserPartner->name  = $spouseFirstName;
                    $createUserPartner->save();
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Something went wrong',
                    'data' => []
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'errorLineNo' => $e->getLine(),
                'data' => []
            ], 500);
        }
    }

    /*
     * Function to create/update children Model
     * @return \Illuminate\Http\JsonResponse
     * */
    public function updateChildren($request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'           =>  'required|numeric|integer|exists:users,id,deleted_at,NULL|in:'.\Auth::user()->id,
            'totalChildren'     =>  'required|numeric|integer|min:0',
            'deceasedChildren'  =>  'required|string|in:Yes,No',
            // 'deceasedChildrenNames'  =>  'required_if:deceasedChildren,Yes|string',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'data' => []
            ], 400);
        }

        if ($request->deceasedChildren == 'Yes') {
          $validator = Validator::make($request->all(), [
              'deceasedChildrenNames'  =>  'required_if:deceasedChildren,Yes|string',
          ]);
        }
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'data' => []
            ], 400);
        }

        // save/update the children information
        $userId = $request->user_id;
        $totalChildren = $request->totalChildren;
        $childrenInfoArray = $request->childrenInfo;    // array containing the info of children [userId],[fullname],[dob]

        //foreign key check;
        $usersArray = User::pluck('id')->toArray();
        $usersArray = array_flip($usersArray);
        //error based on foreign key validation

        if($totalChildren > 0) {
          // $data = ['data' => $childrenInfoArray];
          // $validator = Validator::make($data, [
          //     'data.*.user_id'   =>  'required|numeric|integer|exists:users,id,deleted_at,NULL|in:'.\Auth::user()->id,
          //     'data.*.fullname'  =>  'required|string|max:255',
          //     'data.*.gender'    =>  'required|string|in:M,F',
          //     'data.*.dob'       =>  'required|date_format:"Y-m-d"'
          // ],[
          //   'data.*.user_id'   =>  'ID is required',
          //   'data.*.fullname'  =>  'Children fullname is required',
          //   'data.*.gender'    =>  'Children gender is required',
          //   'data.*.dob'       =>  'Date of birth is required'
          // ]);

          foreach ($childrenInfoArray as $ckey => $cvalue) {
            $index = $ckey + 1;
            $message = [
              'user_id.*'   =>  'Child '.$index.' ID is required',
              'fullname.*'  =>  'Child '.$index.' fullname is required',
              'gender.*'    =>  'Child '.$index.' gender is required',
              'dob.*'       =>  'Date of birth of child '.$index.' is required'
            ];
            $validator = Validator::make($cvalue, [
                'user_id'   =>  'required|numeric|integer|exists:users,id,deleted_at,NULL|in:'.\Auth::user()->id,
                'fullname'  =>  'required|string|max:255',
                'gender'    =>  'required|string|in:M,F',
                'dob'       =>  'required|date_format:"Y-m-d"'
            ],$message);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                    'data' => []
                ], 400);
            }
          }

        }



        //dd($usersArray);

        $deceasedChildren = $request->deceasedChildren == "Yes" ? '1' : '0';   // 0-> No 1-> Yes
        $checkForExistUser = TellUsAboutYou::where('user_id', $userId)->first();
        if ($checkForExistUser) {

            // if ($totalChildren && $totalChildren == 0) {
            //     // update children
            //     $checkForExistUser->children = $totalChildren;
            //     $checkForExistUser->save();
            // }
            if ($totalChildren && $totalChildren > 0) {

                // create entry in children table
                $checkForExistUser->children = $totalChildren;
                $checkForExistUser->save();
                // check for the exist children table
                $checkForExistchildren = Children::where('user_id', $userId)->get();

                if(count($checkForExistchildren) > 0) {
                    Children::where('user_id', $userId)->delete();
                    $checkForExistUser->children = count($checkForExistchildren);
                    $checkForExistUser->save();
                }

                //create a new list of children
                if ($childrenInfoArray) {
                    foreach ($childrenInfoArray as $key => $value) {
                        $createChildren = new Children;
                        if(isset($usersArray[$value['user_id']])) {
                          $createChildren->user_id = $value['user_id'];
                          $createChildren->fullname = $value['fullname'];
                          $createChildren->dob = $value['dob'];
                          $createChildren->gender = $value['gender'] == "M" ? "M" : "F";
                          $createChildren->save();
                        }
                    }
                } else {
                    // return response()->json([
                    //     'status' => false,
                    //     'message' => 'Data not found for update this step',
                    //     'data' => []
                    // ], 400);
                }


            } else {
                Children::where('user_id', $userId)->delete();
                $checkForExistUser->children = 0;
                $checkForExistUser->save();
            }

            if ($deceasedChildren == 1) {
                $deceasedChildrenNames = $request->deceasedChildrenNames;
                $validator = Validator::make($request->all(), [
                    'deceasedChildrenNames' => 'required',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors(),
                        'data' => []
                    ], 400);
                } // validation for the deteased Children name
                $checkForExistUser->deceased_children = (string)$deceasedChildren;
                $checkForExistUser->deceased_children_names = $deceasedChildrenNames;
                $checkForExistUser->save();
            }
            else {
                $checkForExistUser->deceased_children = (string)$deceasedChildren;
                $checkForExistUser->save();
            }

            $children = Children::where('user_id', $userId)->get();
            return response()->json([
                'status' => true,
                'message' => 'User updated with the children information',
                'data' => [
                  'childrenData'          => $children ,
                  'desceasedChildren'     => $deceasedChildren == 1 ? 'Yes' : 'No',
                  'deceasedChildrenNames' => isset($deceasedChildrenNames) ? $deceasedChildrenNames : null
                ]
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data not found for update this step',
                'data' => []
            ], 400);
        }
    }

    /*
     * update ProvideYourLovedOnes table
     * @return \Illuminate\Http\JsonResponse
     * */
    public function updateProvideYourLovedOnes($request)
    {
      try {
        $validator = Validator::make($request->all(), [
            'lovedOnesInfo'                                 =>  'required|array',
            'lovedOnesInfo.*.user_id'                       =>  'required|numeric|integer|exists:users,id,deleted_at,NULL|in:'.\Auth::user()->id,
            'lovedOnesInfo.*.business_interest'             =>  'required|numeric|between:0,1|integer',
            'lovedOnesInfo.*.farm_or_ranch'                 =>  'required|numeric|between:0,1|integer',
            // 'lovedOnesInfo.*.is_percentage'                 =>  'required|numeric|between:0,1|integer',
            'lovedOnesInfo.*.is_getcompensate'              =>  'required|numeric|between:0,1|integer',
            // 'lovedOnesInfo.*.compensation_specific_amount'  =>  'required|numeric|min:0|integer',
            // 'lovedOnesInfo.*.compensation_percent_amount'   =>  'required_if:is_percentage,1|numeric|between:0,100',
            //'compensateAmount'        =>  'required|numeric|min:0',
            //'isPercentageBasedOnNet'  =>  'required|numeric|between:0,1|integer',
            // 'lovedOnesInfo.0.net_value_percent'             =>  'required|numeric|between:0,1|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'data' => []
            ], 400);
        }


        if(isset($request->lovedOnesInfo[0])) {
          $lovedOnesInfo = $request->lovedOnesInfo[0];
          //var_dump($lovedOnesInfo);die();
          if (ProvideYourLovedOnes::updateOrCreate(['user_id'=> $lovedOnesInfo['user_id']],$lovedOnesInfo)) {
              $lovedOnes  = ProvideYourLovedOnes::where('user_id',$lovedOnesInfo['user_id'])->first();
              return response()->json([
                  'status'  => true,
                  'message' => 'User details updated',
                  'data'    => [ 'lovedOnesInfo' => [$lovedOnes]]
              ], 200);
          } else {
              return response()->json([
                  'status' => false,
                  'message' => 'User details not updated',
                  'data' => []
              ], 400);
          }
        } else {
          return response()->json([
              'status' => true,
              'message' => 'Improper data format for loved ones info',
              'data' => []
          ], 400);
        }
      } catch(\Exception $e) {
        return response()->json([
            'status'  => true,
            'message' => 'Error : ',$e->getMessage().' Line : '.$e->getLine(),
            'data'    => []
        ], 500);
      }
    }

    /*
     *  Reusable function for personal representative to update personal representative as well as backup personal representative
     *  @return \Illuminate\Http\JsonResponse
     * */
    private function updatePersonalRepresentativesHelper($personalRepresentative = [], $isBackupRepresentative, $emailType, $tellUsAboutYou) {
      $validator = Validator::make($personalRepresentative, [
          'user_id'           =>  'required|numeric|integer|exists:users,id,deleted_at,NULL|in:'.\Auth::user()->id,
          'fullname'          =>  'required|string',
          'relationship_with' => 'required|string|max:255',
          'address'           => 'required',
          'state'             => 'required',
          'country'           => 'required',
          'zip'               => 'required|regex:/^[0-9]{5}(\-[0-9]{4})?$/',
          'city'              => 'required',
          'email_notification'      => 'required|numeric|between:0,1|integer',
          'email'             =>  "nullable|required_if:email_notification,1|email",
          'is_backuprepresentative' => 'required|numeric|integer|between:0,1',
          'phone'              => 'required',
          'relationship_other' => 'nullable'
      ]);

      // validation for the user data
      if ($validator->fails()) {
          $response = response()->json([
              'status'  => false,
              'message' => $validator->errors(),
              'data'    => []
          ], 400);
          return [
            'response'  => $response,
            'status'    => 400
          ];
      }

      if(isset($personalRepresentative['is_backuprepresentative']) && $isBackupRepresentative != $personalRepresentative['is_backuprepresentative']) {
        $response = response()->json([
                      'status' => false,
                      'message' => ['is_backuprepresentative' => ['is_backuprepresentative value does not match with isBackupPersonalRepresentative']],
                      'data' => []
                  ], 400);
        return [
          'response' => $response,
          'status'   => 400
        ];
      }

      if(isset($personalRepresentative['email_notification']) && $personalRepresentative['email_notification'] == 1) {
        if(!isset($personalRepresentative['email'])) {
          $response = response()->json([
                            'status' => false,
                            'message' => ['email' => ['email is required if email_notification is set to 1']],
                            'data' => []
                      ], 400);

          return [
            'response'    => $response,
            'status'      => 400
          ];
        }
      }


        $perRepresentative = PersonalRepresentatives::where('user_id',$personalRepresentative['user_id'])
                                                        ->where('is_backuprepresentative','0')
                                                        ->first();
        $oldPersonalEmail = $perRepresentative != null ? $perRepresentative->email : null;

        $perBackupRepresentative = PersonalRepresentatives::where('user_id',$personalRepresentative['user_id'])
                                                        ->where('is_backuprepresentative','1')
                                                        ->first();
        $oldBackupEmail = $perBackupRepresentative != null ? $perBackupRepresentative->email : null;

      //if user has not completed previous step in tellUsYou section then this step is not permited
      PersonalRepresentatives::updateOrCreate(['user_id' => $personalRepresentative['user_id'], 'is_backuprepresentative' => (string)$isBackupRepresentative], $personalRepresentative);


      if(isset($personalRepresentative['email_notification']) && $personalRepresentative['email_notification'] ==1) {
        //$this->sendEmail($personalRepresentative['user_id'], $personalRepresentative['fullname'], $personalRepresentative['email'], $emailType);

        if($isBackupRepresentative == 0) {

            $flag = true;
            if(isset($personalRepresentative['email']) && strtolower(trim($personalRepresentative['email'])) == strtolower(trim($oldPersonalEmail)))
            {
                $flag = false;
            }

            if($flag) {
                \Log::info('email getting send for personal representative');
                $arr = [
                    'firstName'     =>  $tellUsAboutYou->firstname,
                    'middleName'    =>  $tellUsAboutYou->middlename,
                    'lastName'      =>  $tellUsAboutYou->lastname,
                    'executorName'  =>  $personalRepresentative['fullname']
                ];
                Mail::send('new_emails.personal_representative_appoint', $arr, function($mail) use($personalRepresentative){
                    $mail->from(config('settings.email'), 'Notice for Executor');
                    $mail->to($personalRepresentative['email'], $personalRepresentative['fullname'])
                    ->subject('You are requested to be an executor');
                });

                if(Mail::failures()) {
                    \Log::info('email sending error for personal representative');
                } 
            }
            
        } else {

            $flag = true;
            if(isset($personalRepresentative['email']) && strtolower(trim($personalRepresentative['email'])) == strtolower(trim($oldBackupEmail)))
            {
                $flag = false;
            }

            if($flag) {
                \Log::info('email getting send for backup personal representative');
                $arr = [
                    'firstName'     =>  $tellUsAboutYou->firstname,
                    'middleName'    =>  $tellUsAboutYou->middlename,
                    'lastName'      =>  $tellUsAboutYou->lastname,
                    'executorName'  =>  $personalRepresentative['fullname']
                ];
                Mail::send('new_emails.personal_representative_appoint_backup', $arr, function($mail) use($personalRepresentative){
                    $mail->from(config('settings.email'), 'Notice for Backup Executor');
                    $mail->to($personalRepresentative['email'], $personalRepresentative['fullname'])
                    ->subject('You are requested to be an backup executor');
                });

                if(Mail::failures()) {
                    \Log::info('email sending error for personal representative');
                }
            }
        }
      }

      return [
        'status'    =>  200,
        'response'  =>  'success'
      ];
    }
    /*
     *  Function to give a response for the personal representative section
     *  @return \Illuminate\Http\JsonResponse
     * */
    private function generatePersonalRepresentativeResponse($userId) {
      $personalRepresentative       = PersonalRepresentatives::where('user_id',$userId)->where('is_backuprepresentative','0')->first();
      $backupPersonalRepresentative = PersonalRepresentatives::where('user_id',$userId)->where('is_backuprepresentative','1')->first();
      return response()->json([
        'isPersonalRepresentative'        =>  $personalRepresentative == null ? 'No' : 'Yes',
        'personalRepresentative'          =>  [$personalRepresentative],
        'isBackupPersonalRepresentative'  =>  $backupPersonalRepresentative == null ? 'No' : 'Yes',
        'backupPersonalRepresentative'    =>  [$backupPersonalRepresentative]
      ]);
    }

    /*
     *
     *Function to create update personal representative table
     * @return \Illuminate\Http\JsonResponse
     * */
    public function updatePersonalRepresentatives($request) {
      try {
        $validator = Validator::make($request->all(), [
            'user_id'                         =>  'required|numeric|integer|exists:users,id,deleted_at,NULL|in:'.\Auth::user()->id,
            'isPersonalRepresentative'        =>  'required|string|in:Yes,No',
            'personalRepresentative'          =>  'required_if:isPersonalRepresentative,Yes|array',
            'isBackupPersonalRepresentative'  =>  'required|string|in:Yes,No',
            'backupPersonalRepresentative'    =>  'nullable|required_if:isBackupPersonalRepresentative,Yes|array'
        ]);
        // validation for the user data
        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->errors(),
                'data'    => []
            ], 400);
        }

        $userId = $request->user_id;

        $tellUsAboutYou = TellUsAboutYou::where('user_id',$userId)->first();
        if(!$tellUsAboutYou) {
            return response()->json([
                'status'  => false,
                'message' => 'Please fill Tell Us About You details first',
                'data'    => []
            ], 400);   
        }

        $personalRepresentative         = $request->personalRepresentative;
        $backupPersonalRepresentative   = $request->backupPersonalRepresentative;
        $isPersonalRepresentative       = $request->isPersonalRepresentative;
        $isBackupPersonalRepresentative = $request->isBackupPersonalRepresentative;
        // dd($isBackupPersonalRepresentative);
        if($isPersonalRepresentative == 'Yes') {
          if(isset($request->personalRepresentative[0])) {
            $personalRepresentative = $request->personalRepresentative[0];
            $emailType  = 1;
            $response   = self::updatePersonalRepresentativesHelper($personalRepresentative, '0', $emailType, $tellUsAboutYou);
            if($response['status'] != 200) {
              return $response['response'];
            }
          } else {
            return response()->json([
                'status'  => false,
                'message' => 'personalRepresentative array should be present when selecting isPersonalRepresentative',
                'data'    => []
            ], 400);
          }
        } else {
          PersonalRepresentatives::where('user_id',$userId)->where('is_backuprepresentative','0')->delete();
        }

        if($isBackupPersonalRepresentative == 'Yes') {
          if(isset($request->backupPersonalRepresentative[0])) {
            $backupPersonalRepresentative = $request->backupPersonalRepresentative[0];
            $emailType  = 2;
            $response   = self::updatePersonalRepresentativesHelper($backupPersonalRepresentative, '1', $emailType, $tellUsAboutYou);
            if($response['status'] != 200) {
              return $response['response'];
            }
          } else {
            return response()->json([
                'status'  => false,
                'message' => 'backupPersonalRepresentative array should be present when selecting isBackupPersonalRepresentative',
                'data'    => []
            ], 400);
          }
        } else {
          PersonalRepresentatives::where('user_id',$userId)->where('is_backuprepresentative','1')->delete();
        }

        $response = self::generatePersonalRepresentativeResponse($userId);
        return $response;

      } catch (\Exception $e) {
        return response()->json([
            'status'  => false,
            'message' => 'Error : ',$e->getMessage().' Line : '.$e->getLine(),
            'data'    => []
        ], 500);
      }
    }

    /*
     * A single function to update guardian as well as backup guardian info
     * @return \Illuminate\Http\JsonResponse
     * */
    private function updateGuardianInfoHelper($guardian = [] , $isGuardianMinorChildren = null, $isBackupGuardian, $emailType = null, $tellUsAboutYou) {
        //validation for normal guardian
        $validator = Validator::make($guardian, [
            //'user_id'      =>  'required|numeric|integer|exists:users,id,deleted_at,NULL|between:'.\Auth::user()->id.','.\Auth::user()->id,
            'fullname'     =>  'required|string',
            'relationship_with' => 'required|string|max:255',
            'address'      =>  'required|string',
            'country'      =>  'required|string',
            'state'        =>  'required|string',
            'city'         =>  'required|string',
            'email_notification' => 'required|numeric|between:0,1|integer',
            'email'         => 'nullable|required_if:email_notification,1|email',
            'zip'          =>  'required|regex:/^[0-9]{5}(\-[0-9]{4})?$/',
            'phone'         => 'required',
            'relationship_other' => 'nullable'
        ]);
        if ($validator->fails()) {
            $response = response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'data' => []
            ], 400);
            return [
              'response'  =>  $response,
              'status'    =>  400
            ];
        }

        if(isset($guardian['is_backup']) && $isBackupGuardian != $guardian['is_backup']) {
          $response = response()->json([
              'status' => false,
              'message' => ['is_backup' => ['is_backup value does not match with isBackupGuardian']],
              'data' => []
          ], 400);
          return [
            'response'  =>  $response,
            'status'    =>  400
          ];
        }

        $isGuardianMinorChildren  = $isGuardianMinorChildren == 'Yes' ? '1' : '0';

        /*
        * backup guardian checking
        * if it is guardian minor children then is backup is 0
        * if it is backup guardian then is backup is 1
        **/
        $guardian['is_backup'] = $isBackupGuardian == 0 ? '0' : '1';
        $checkForExistUser = TellUsAboutYou::where('user_id', $guardian['user_id'])->first();

        if ($checkForExistUser) {

            $checkForExistUser->guardian_minor_children = '1';
            $checkForExistUser->save();


            $Guardian = GuardianInfo::where('user_id',$guardian['user_id'])
                                                            ->where('is_backup','0')
                                                            ->first();
            $oldGuardianEmail = $Guardian != null ? $Guardian->email : null;

            $backupGuardian = GuardianInfo::where('user_id',$guardian['user_id'])
                                                            ->where('is_backup','1')
                                                            ->first();
            $oldBackupGuardianEmail = $backupGuardian != null ? $backupGuardian->email : null;

            //if user has not completed previous step in tellUsYou section then this step is not permited

            GuardianInfo::updateOrCreate(['user_id'=>$guardian['user_id'] , 'is_backup' => $guardian['is_backup']],$guardian);
            //Sending an email if email notification is set
            if($emailType != null && isset($guardian['email_notification']) && $guardian['email_notification'] == 1) {

                //$this->sendEmail($guardian['user_id'], $guardian['fullname'], $guardian['email'], $emailType);
                if($isBackupGuardian == 0) {

                    $flag = true;
                    if(isset($guardian['email']) && strtolower(trim($guardian['email'])) == strtolower(trim($oldGuardianEmail)))
                    {
                        $flag = false;
                    }

                    if($flag) {
                        \Log::info('email getting send for guardian for minor children');
                        $arr = [
                            'firstName'     =>  $tellUsAboutYou->firstname,
                            'middleName'    =>  $tellUsAboutYou->middlename,
                            'lastName'      =>  $tellUsAboutYou->lastname,
                            'guardianName'  =>  $guardian['fullname']
                        ];
                        Mail::send('new_emails.guardian', $arr, function($mail) use($guardian){
                            $mail->from(config('settings.email'), 'Notice for Guardian Appointment');
                            $mail->to($guardian['email'], $guardian['fullname'])
                            ->subject('You are requested to be Guardian for Minor Children');
                        });
                        if(Mail::failures()) {
                            \Log::info('email sending error for guardian for minor children');
                        }
                    }

                } else {

                    $flag = true;
                    if(isset($guardian['email']) && strtolower(trim($guardian['email'])) == strtolower(trim($oldBackupGuardianEmail)))
                    {
                        $flag = false;
                    }

                    if($flag) {
                        \Log::info('email getting send for backup guardian for minor children');
                        $arr = [
                            'firstName'     =>  $tellUsAboutYou->firstname,
                            'middleName'    =>  $tellUsAboutYou->middlename,
                            'lastName'      =>  $tellUsAboutYou->lastname,
                            'backupGuardianName'  =>  $guardian['fullname']
                        ];
                        Mail::send('new_emails.guardian_backup', $arr, function($mail) use($guardian){
                            $mail->from(config('settings.email'), 'Notice for Backup Guardian Appointment');
                            $mail->to($guardian['email'], $guardian['fullname'])
                            ->subject('You are requested to be Backup Guardian for Minor Children');
                        });
                        if(Mail::failures()) {
                            \Log::info('email sending error for guardian for minor children');
                        }
                    }
                }
            }
            $response = self::generateGuardianInfoResponse($guardian['user_id']);
            return [
            'response'  =>  $response,
            'status'    =>  200
            ];
        } else {
          $response = response()->json([
              'status'  => false,
              'message' => 'User details not updated',
              'data'    => []
          ], 400);
          return [
            'response'  =>  $response,
            'status'    =>  400
          ];
        }
    }

    /*
     * A single function to generate guardianInfo response
     * @return \Illuminate\Http\JsonResponse
     * */
    private function generateGuardianInfoResponse($userId) {
      $guardianInfo       = GuardianInfo::where('user_id',$userId)->where('is_backup','0')->get();
      $guardianInfoBackup = GuardianInfo::where('user_id',$userId)->where('is_backup','1')->get();
      return response()->json([
          'status' => true,
          'message' => 'User details updated final with GuardianInfo',
          'data' => [
            'isGuardianMinorChildren' =>  $guardianInfo->count() > 0 ? 'Yes' : 'No' ,
            'guardian'                =>  $guardianInfo,
            'isBackUpGuardian'        =>  $guardianInfoBackup->count() > 0 ? 'Yes' : 'No' ,
            'backupGuardian'          =>  $guardianInfoBackup
          ]
      ], 200);
    }

    /*
     * function to create / update GuardianInfo table
     * @return \Illuminate\Http\JsonResponse
     * */
    public function updateGuardianInfo($request)
    {
        try {
            //validation for necessary flags
            $validator = Validator::make($request->all(), [
                'user_id'                   =>  'required|numeric|integer|exists:users,id,deleted_at,NULL|in:'.\Auth::user()->id,
                'isGuardianMinorChildren'   =>  'required|string|in:Yes,No',
                'isBackUpGuardian'          =>  'required|string|in:Yes,No',
                'guardian.*'                  =>  'required|array',
                'backUpGuardian.*'            =>  'nullable|array',
                'guardian.*.user_id'        =>  'required|numeric|integer|exists:users,id,deleted_at,NULL|in:'.\Auth::user()->id,
                'backUpGuardian.*.user_id'  =>  'nullable|numeric|integer|exists:users,id,deleted_at,NULL|in:'.\Auth::user()->id
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                    'data' => []
               ], 400);
            }

            //check if guardian and backup guardian is present in array format
            if($request->isBackUpGuardian == 'Yes' && !isset($request->backUpGuardian[0])) {
                return response()->json([
                    'status'  => false,
                    'message' => 'If you select idBackUpGuardian you have to provide backUPGuardian array!',
                    'data'    => []
                  ], 400);
            }

            if($request->isGuardianMinorChildren == 'Yes' && !isset($request->guardian[0])) {
                return response()->json([
                    'status'  => false,
                    'message' => 'If you select isGuardianMinorChildren you have to provide guardian array!',
                    'data'    => []
                  ], 400);
            }

            $userId = $request->user_id;
            $tellUsAboutYou = TellUsAboutYou::where('user_id',$userId)->first();
            if(!$tellUsAboutYou) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Please fill Tell Us About You details first',
                    'data'    => []
                ], 400);   
            }
            
            $isGuardianMinorChildren  = $request->isGuardianMinorChildren;// Yes, No
            $isBackUpGuardian         = $request->isBackUpGuardian;//Yes, No
            $isBackupGuardianCopy     = $isBackUpGuardian == 'Yes' ? '1' : '0';
            $guardian                 = isset($request->guardian[0]) ? $request->guardian[0] : null;
            $backUpGuardian           = isset($request->backUpGuardian[0]) ? $request->backUpGuardian[0] : null;

            //if isGuardianMinorChildren is set that means it is a not a backup guardian
            //for backup guardian isGuardianMinorChildren is always false
            if($isGuardianMinorChildren == 'Yes') {
                if(isset($guardian)) {
                  $emailType  = 3;
                  $response   = self::updateGuardianInfoHelper($guardian,$isGuardianMinorChildren,'0',$emailType, $tellUsAboutYou);
                  if($response['status'] != 200) {
                    return $response['response'];
                  }
                }
            } else {
                GuardianInfo::where('user_id',$userId)->where('is_backup','0')->delete();
            }
            if($isBackUpGuardian == 'Yes') {
                if(isset($backUpGuardian)) {
                  $emailType  = 4;
                  $response   = self::updateGuardianInfoHelper($backUpGuardian,'No',$isBackupGuardianCopy,$emailType, $tellUsAboutYou);
                  if($response['status'] != 200) {
                    return $response['response'];
                  }
                }
            } else {
                GuardianInfo::where('user_id',$userId)->where('is_backup','1')->delete();
            }

            if(GuardianInfo::where('user_id',$userId)->first() == null) {
                $tuau = TellUsAboutYou::where('user_id',$userId)->first();
                if($tuau) {
                    $tuau->guardian_minor_children = '0';
                    $tuau->save();
                }
            }

            $response = isset($response['response']) ? $response['response'] : self::generateGuardianInfoResponse($userId);
            return $response;
        } catch (\Exception $e) {
          return response()->json([
                  'status' => false,
                  'message' => 'Message : '.$e->getMessage().' Line : '.$e->getLine(),
                  'data' => []
          ], 500);
        }
    }

    /*
     * A single function to update guardian as well as backup guardian info
     * @return \Illuminate\Http\JsonResponse
     * */
    private function updatePetGuardianInfoHelper($guardian = [] , $isPetGuardianMinorChildren = null, $isBackupGuardian, $emailType = null, $tellUsAboutYou) {
        //validation for normal guardian
        $validator = Validator::make($guardian, [
            //'user_id'      =>  'required|numeric|integer|exists:users,id,deleted_at,NULL|between:'.\Auth::user()->id.','.\Auth::user()->id,
            'fullname'     =>  'required|string',
            'relationship_with' => 'required|string|max:255',
            'address'      =>  'required|string',
            'country'      =>  'required|string',
            'state'        =>  'required|string',
            'city'         =>  'required|string',
            'email_notification' => 'required|numeric|between:0,1|integer',
            'email'         => 'nullable|required_if:email_notification,1|email',
            'zip'          =>  'required|regex:/^[0-9]{5}(\-[0-9]{4})?$/',
            'phone'         => 'required',
            'relationship_other' => 'nullable'
        ]);
        if ($validator->fails()) {
            $response = response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'data' => []
            ], 400);
            return [
              'response'  =>  $response,
              'status'    =>  400
            ];
        }

        if(isset($guardian['is_backup']) && $isBackupGuardian != $guardian['is_backup']) {
          $response = response()->json([
              'status' => false,
              'message' => ['is_backup' => ['is_backup value does not match with isBackupGuardian']],
              'data' => []
          ], 400);
          return [
            'response'  =>  $response,
            'status'    =>  400
          ];
        }

        $isPetGuardianMinorChildren  = $isPetGuardianMinorChildren == 'Yes' ? '1' : '0';

        /*
        * backup guardian checking
        * if it is guardian minor children then is backup is 0
        * if it is backup guardian then is backup is 1
        **/
        $guardian['is_backup'] = $isBackupGuardian == 0 ? '0' : '1';
        $checkForExistUser = TellUsAboutYou::where('user_id', $guardian['user_id'])->first();

        if ($checkForExistUser) {

            $checkForExistUser->guardian_minor_children = '1';
            $checkForExistUser->save();


            $Guardian = PetGuardian::where('user_id',$guardian['user_id'])
                                                            ->where('is_backup','0')
                                                            ->first();
            $oldGuardianEmail = $Guardian != null ? $Guardian->email : null;

            $backupGuardian = petGuardian::where('user_id',$guardian['user_id'])
                                                            ->where('is_backup','1')
                                                            ->first();
            $oldBackupGuardianEmail = $backupGuardian != null ? $backupGuardian->email : null;

            //if user has not completed previous step in tellUsYou section then this step is not permited

            PetGuardian::updateOrCreate(['user_id'=>$guardian['user_id'] , 'is_backup' => $guardian['is_backup']],$guardian);
            //Sending an email if email notification is set
            if($emailType != null && isset($guardian['email_notification']) && $guardian['email_notification'] == 1) {

                //$this->sendEmail($guardian['user_id'], $guardian['fullname'], $guardian['email'], $emailType);
                // if($isBackupGuardian == 0) {

                //     $flag = true;
                //     if(isset($guardian['email']) && strtolower(trim($guardian['email'])) == strtolower(trim($oldGuardianEmail)))
                //     {
                //         $flag = false;
                //     }

                //     if($flag) {
                //         \Log::info('email getting send for pet guardian for minor children');
                //         $arr = [
                //             'firstName'     =>  $tellUsAboutYou->firstname,
                //             'middleName'    =>  $tellUsAboutYou->middlename,
                //             'lastName'      =>  $tellUsAboutYou->lastname,
                //             'guardianName'  =>  $guardian['fullname']
                //         ];
                //         Mail::send('new_emails.guardian', $arr, function($mail) use($guardian){
                //             $mail->from(config('settings.email'), 'Notice for Guardian Appointment');
                //             $mail->to($guardian['email'], $guardian['fullname'])
                //             ->subject('You are requested to be Guardian for Minor Children');
                //         });
                //         if(Mail::failures()) {
                //             \Log::info('email sending error for guardian for minor children');
                //         }
                //     }

                // } else {

                //     $flag = true;
                //     if(isset($guardian['email']) && strtolower(trim($guardian['email'])) == strtolower(trim($oldBackupGuardianEmail)))
                //     {
                //         $flag = false;
                //     }

                //     if($flag) {
                //         \Log::info('email getting send for backup guardian for minor children');
                //         $arr = [
                //             'firstName'     =>  $tellUsAboutYou->firstname,
                //             'middleName'    =>  $tellUsAboutYou->middlename,
                //             'lastName'      =>  $tellUsAboutYou->lastname,
                //             'backupGuardianName'  =>  $guardian['fullname']
                //         ];
                //         Mail::send('new_emails.guardian_backup', $arr, function($mail) use($guardian){
                //             $mail->from(config('settings.email'), 'Notice for Backup Guardian Appointment');
                //             $mail->to($guardian['email'], $guardian['fullname'])
                //             ->subject('You are requested to be Backup Guardian for Minor Children');
                //         });
                //         if(Mail::failures()) {
                //             \Log::info('email sending error for guardian for minor children');
                //         }
                //     }
                // }
            }
            $response = self::generatePetGuardianInfoResponse($guardian['user_id']);
            return [
            'response'  =>  $response,
            'status'    =>  200
            ];
        } else {
          $response = response()->json([
              'status'  => false,
              'message' => 'User details not updated',
              'data'    => []
          ], 400);
          return [
            'response'  =>  $response,
            'status'    =>  400
          ];
        }
    }


    public function updatePetGuardianInfo($request) {
        try 
        {
            //validation for necessary flags
            $validator = Validator::make($request->all(), [
                'user_id'                   =>  'required|numeric|integer|exists:users,id,deleted_at,NULL|in:'.\Auth::user()->id,
                'isPetGuardianMinorChildren'=>  'required|string|in:Yes,No',
                'isBackUpGuardian'          =>  'required|string|in:Yes,No',
                'guardian.*'                =>  'required|array',
                'backUpGuardian.*'          =>  'nullable|array',
                'guardian.*.user_id'        =>  'required|numeric|integer|exists:users,id,deleted_at,NULL|in:'.\Auth::user()->id,
                'backUpGuardian.*.user_id'  =>  'nullable|numeric|integer|exists:users,id,deleted_at,NULL|in:'.\Auth::user()->id
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                    'data' => []
               ], 400);
            }

            //check if guardian and backup guardian is present in array format
            if($request->isBackUpGuardian == 'Yes' && !isset($request->backUpGuardian[0])) {
                return response()->json([
                    'status'  => false,
                    'message' => 'If you select isBackUpGuardian you have to provide backUPGuardian array!',
                    'data'    => []
                  ], 400);
            }

            if($request->isPetGuardianMinorChildren == 'Yes' && !isset($request->guardian[0])) {
                return response()->json([
                    'status'  => false,
                    'message' => 'If you select isPetGuardianMinorChildren you have to provide petGuardian array!',
                    'data'    => []
                  ], 400);
            }

            $userId = $request->user_id;
            $tellUsAboutYou = TellUsAboutYou::where('user_id',$userId)->first();
            if(!$tellUsAboutYou) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Please fill Tell Us About You details first',
                    'data'    => []
                ], 400);   
            }
            
            $isPetGuardianMinorChildren  = $request->isPetGuardianMinorChildren;// Yes, No
            $isBackUpGuardian         = $request->isBackUpGuardian;//Yes, No
            $isBackupGuardianCopy     = $isBackUpGuardian == 'Yes' ? '1' : '0';
            $guardian                 = isset($request->guardian[0]) ? $request->guardian[0] : null;
            $backUpGuardian           = isset($request->backUpGuardian[0]) ? $request->backUpGuardian[0] : null;

            //if isGuardianMinorChildren is set that means it is a not a backup guardian
            //for backup guardian isGuardianMinorChildren is always false
            if($isPetGuardianMinorChildren == 'Yes') {
                if(isset($guardian)) {
                  $emailType  = 3;
                  $response   = self::updatePetGuardianInfoHelper($guardian,$isPetGuardianMinorChildren,'0',$emailType, $tellUsAboutYou);
                  if($response['status'] != 200) {
                    return $response['response'];
                  }
                }
            } else {
                PetGuardian::where('user_id',$userId)->where('is_backup','0')->delete();
            }
            if($isBackUpGuardian == 'Yes') {
                if(isset($backUpGuardian)) {
                  $emailType  = 4;
                  $response   = self::updatePetGuardianInfoHelper($backUpGuardian,'No',$isBackupGuardianCopy,$emailType, $tellUsAboutYou);
                  if($response['status'] != 200) {
                    return $response['response'];
                  }
                }
            } else {
                PetGuardian::where('user_id',$userId)->where('is_backup','1')->delete();
            }

            // if(PetGuardian::where('user_id',$userId)->first() == null) {
            //     $tuau = TellUsAboutYou::where('user_id',$userId)->first();
            //     if($tuau) {
            //         $tuau->guardian_minor_children = '0';
            //         $tuau->save();
            //     }
            // }

            $response = isset($response['response']) ? $response['response'] : self::generatePetGuardianInfoResponse($userId);
            return $response;
        } catch (\Exception $e) {
          return response()->json([
                  'status' => false,
                  'message' => 'Message : '.$e->getMessage().' Line : '.$e->getLine(),
                  'data' => []
          ], 500);
        }
    }

    /*
     * A single function to generate guardianInfo response
     * @return \Illuminate\Http\JsonResponse
     * */
    private function generatePetGuardianInfoResponse($userId) {
      $guardianInfo       = PetGuardian::where('user_id',$userId)->where('is_backup','0')->get();
      $guardianInfoBackup = PetGuardian::where('user_id',$userId)->where('is_backup','1')->get();
      return response()->json([
          'status' => true,
          'message' => 'User details updated final with GuardianInfo',
          'data' => [
            'isPetGuardianMinorChildren' =>  $guardianInfo->count() > 0 ? 'Yes' : 'No' ,
            'petGuardian'                =>  $guardianInfo,
            'isBackUpPetGuardian'        =>  $guardianInfoBackup->count() > 0 ? 'Yes' : 'No' ,
            'backupPetGuardian'          =>  $guardianInfoBackup
          ]
      ], 200);
    }

    /*
     *function to update TangibleProperty distribute in the ProvideYourLovedOnes table
     *@return \Illuminate\Http\JsonResponse
     * */
    public function updateTangiblePropertyDistribute($request)
    {
        $validator = Validator::make($request->all(), [
            'is_tangible_property_distribute'   =>  'nullable|numeric|between:1,4|integer',
            'tangible_property_distribute'      =>  'nullable|required_if:is_tangible_property_distribute,4|string|max:255',
            'residue_to_partner_first'          =>  'nullable|numeric|between:0,1|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'data' => []
            ], 400);
        }

        $userId = $request->user_id;
        //$tangibleProperty = $request->tangibleProperty;
        $residueToPartnerFirst = $request->has('residue_to_partner_first') ? (string)$request->get('residue_to_partner_first') : null;
        $isTangiblePropertyDistribute = $request->has('is_tangible_property_distribute')
                                        ? (string)($request->get('is_tangible_property_distribute')) : null; // flags 0,1,2
        $tangiblePropertyDistribute   = $request->has('tangible_property_distribute')
                                        ? $request->get('tangible_property_distribute') : null;
        $checkForExistData = ProvideYourLovedOnes::where('user_id', $userId)->first();

        if ($checkForExistData) {
            $checkForExistData->is_tangible_property_distribute = $isTangiblePropertyDistribute == null
                                                                    ? $checkForExistData->is_tangible_property_distribute
                                                                    : $isTangiblePropertyDistribute;
            $checkForExistData->tangible_property_distribute    = $isTangiblePropertyDistribute == 4
                                                                    ? $tangiblePropertyDistribute
                                                                    : $checkForExistData->tangible_property_distribute;
            $checkForExistData->residue_to_partner_first        = $residueToPartnerFirst == null
                                                                    ? $checkForExistData->residue_to_partner_first
                                                                    : $residueToPartnerFirst;

            if ($checkForExistData->save()) {
                return response()->json([
                    'status' => true,
                    'message' => 'User details updated',
                    'data' => $checkForExistData
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'User details not updated',
                    'data' => []
                ], 400);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'User details not found',
                'data' => []
            ], 400);
        }
    }

    /*
     *  function to create / update Gift table
     *  @return \Illuminate\Http\JsonResponse
     * */
    public function updateGift($request)
    {
        try {

            $validator = Validator::make($request->all(), [
            'user_id'   =>  'required|numeric|integer|exists:users,id,deleted_at,NULL|in:'.\Auth::user()->id,
            'giftType'  =>  'required|numeric|between:1,6|integer',
            'giftData'  =>  'required',
            'gift_type' =>  'nullable|string|in:individual,charity',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->errors(),
                'data'    => []
            ], 400);
        }

        $tuay = TellUsAboutYou::where('user_id',\Auth::user()->id)->first();
        if(!$tuay) {
            return response()->json([
                'status'  => false,
                'message' => 'Please TellUsAboutYou details first and then proceed to this section',
                'data'    => []
            ], 400);
        }

        $userId   = $request->user_id;
        $giftType = $request->giftType; // giftType = 1,2,3,4,5,6
        $giftData = $request->giftData; // array of gift data

        //update existing gift
        // $saveGift = Gifts::where('user_id', $userId)->where('type',$giftType)->first();

        //or create new gift
        // dd($giftType);
        // if(!$saveGift) {
          $saveGift = new Gifts();
          $saveGift->user_id = $userId;
        // }

        $saveGift->gift_type = $request->has('gift_type') ? $request->get('gift_type') : $saveGift->gift_type;

        $saveGift->type = $giftType;
        switch($giftType) {
          case 1 :  $saveGift->cash_description = GiftStatement::cashDescription($giftData[0],$tuay);
                    //$saveGift->cash_description = json_encode($giftData);
                    break;
          case 2 :  $saveGift->property_details = GiftStatement::generateStatement($giftData[0],$tuay,'real property');
                    //$saveGift->property_details = json_encode($giftData);
                    break;
          case 3 :  $saveGift->business_details = GiftStatement::generateStatement($giftData[0],$tuay,'business interest');
                    //$saveGift->business_details = json_encode($giftData);
                    break;
          case 4 :  $saveGift->asset_details = GiftStatement::generateStatement($giftData[0],$tuay,'specific asset');
                    //$saveGift->asset_details = json_encode($giftData);
                    break;
          case 5 :  $saveGift->rest_deatils = json_encode($giftData);
                    break;
          case 6 :  $saveGift->disinherit_details = json_encode($giftData);
                    break;
          default:  return response()->json([
                        'status' => true,
                        'message' => 'Something went wrong',
                        'data' => []
                    ], 400);
        }
        if ($saveGift->save()) {
            return response()->json([
                'status'  => true,
                'message' => 'User gift details updated',
                'data'    => [ 'userData' => $saveGift ]
            ], 200);
        }
        return response()->json([
            'status'  => false,
            'message' => 'Something went wrong',
            'data'    => []
        ], 400);

        } catch(\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => ' ERROR : '.$e->getMessage().' LINE : '.$e->getLine(),
                'data'    => []
            ], 500);
        }
    }

    /*
     *  function to update Gift table
     *  @return \Illuminate\Http\JsonResponse
     * */
    public function updateProfileGift(Request $request)
    {
      try {
        $giftId = $request->id;
        $gift = Gifts::find($giftId);
        $giftType = $request->giftType; // giftType = 1,2,3,4,5,6
        $giftData = $request->giftData; // array of gift data

        $validator = Validator::make($request->all(), [
            'gift_type'             => 'nullable|string|in:individual,charity',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'data' => []
            ], 400);
        }

        $tuay = TellUsAboutYou::where('user_id',\Auth::user()->id)->first();
        if(!$tuay) {
            return response()->json([
                'status'  => false,
                'message' => 'Please TellUsAboutYou details first and then proceed to this section',
                'data'    => []
            ], 400);
        }

        if ($gift) {

          $gift->type = $giftType;
          $gift->gift_type = $request->has('gift_type') ? $request->get('gift_type') : $gift->gift_type;
          
          switch($giftType) {
            case 1 :  $gift->cash_description = GiftStatement::cashDescription($giftData[0],$tuay);
                      ///$gift->cash_description = json_encode($giftData);
                      break;
            case 2 :  $gift->property_details = GiftStatement::generateStatement($giftData[0],$tuay,'real property');
                      //$gift->property_details = json_encode($giftData);
                      break;
            case 3 :  $gift->business_details = GiftStatement::generateStatement($giftData[0],$tuay,'business interest');
                      //$gift->business_details = json_encode($giftData);
                      break;
            case 4 :  $gift->asset_details = GiftStatement::generateStatement($giftData[0],$tuay,'specific asset');
                      //$gift->asset_details = json_encode($giftData);
                      break;
            case 5 :  $gift->rest_deatils = json_encode($giftData);
                      break;
            case 6 :  $gift->disinherit_details = json_encode($giftData);
                      break;
            default:  return response()->json([
                          'status' => true,
                          'message' => 'Something went wrong',
                          'data' => []
                      ], 400);
          }
          if ($gift->save()) {
              return response()->json([
                  'status'  => true,
                  'message' => 'User gift details updated',
                  'data'    => [ 'userData' => $gift ]
              ], 200);
          } else {
              return response()->json([
                  'status'  => false,
                  'message' => 'Gift not saved',
                  'data'    => []
              ], 500);
          }
        } else {
          return response()->json([
              'status'  => false,
              'message' => 'Gift not found',
              'data'    => []
          ], 400);
        }
      } catch (Exception $e) {
        
        return response()->json([
            'status'  => false,
            'message' => ' ERROR : '.$e->getMessage().' LINE : '.$e->getLine(),
            'data'    => []
        ], 500);
      }


    }

    /*
     * Function to create / update specific_gift flag in ProvideYourLovedOnes table
     * @return \Illuminate\Http\JsonResponse
     * */

    public function updateSpecificGift($request)
    {
        $userId = $request->user_id;
        $validator = Validator::make($request->all(), [
            'user_id'             => 'required|numeric|integer|exists:users,id,deleted_at,NULL|in:'.\Auth::user()->id,
            'data.isSpecificGift' => "required|string|in:Yes,No",
        ]);
        $specificGift = $request->data['isSpecificGift']; // 0-> NO ,1->Yes
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'data' => []
            ], 400);
        }
        $checkForExistData = ProvideYourLovedOnes::where('user_id', $userId)->first();
        if ($checkForExistData) {
            $checkForExistData->specific_gifts = $specificGift == "Yes" ? '1' : '0';
            if ($checkForExistData->save()) {
                return response()->json([
                    'status' => true,
                    'message' => 'User gift details updated',
                    'data' => ['userData'=>$checkForExistData]
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'User gift details not updated',
                    'data' => []
                ], 400);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'User data not found',
            ], 400);
        }
    }

    /*
     *Function to update / create contingent_beneficiary table
     * @return \Illuminate\Http\JsonResponse
     * */
    public function updateContingentBeneficiary($request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'                       => 'required|numeric|integer|exists:users,id,deleted_at,NULL|in:'.\Auth::user()->id,
            'isContingentBeneficiary'  => "required|numeric|between:0,1|integer",
            'distribution_type' =>  "nullable|required_if:isContingentBeneficiary,1|string|in:to_my_heirs,other",
            'info'  =>  "nullable|required_if:distribution_type,other|string"
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'data' => []
            ], 400);
        }

        $userId = $request->user_id;
        $isContingentBeneficiary = (string)$request->isContingentBeneficiary;   // 0->no, 1->yes
        $distributionType = $request->has('distribution_type') ? $request->get('distribution_type') : null;
        $info = $request->has('info') ? $request->get('info') : null;

        $checkExistData = ContingentBeneficiary::where('user_id', $userId)->first();
        if(!$checkExistData) {
          $checkExistData = new ContingentBeneficiary;
          $checkExistData->user_id = $userId;
        }
        $checkExistData->is_contingent_beneficiary = $isContingentBeneficiary;
        if($isContingentBeneficiary == 0) {
            $checkExistData->distribution_type = null;
            $checkExistData->info = null;
        } else {
            $checkExistData->distribution_type = $distributionType == null ? $checkExistData->distribution_type : $distributionType;
            $checkExistData->info = $info == null ? $checkExistData->info : $info;
        }

        if($checkExistData->distribution_type == 'to_my_heirs') {
            $checkExistData->info = null;
        }

        if ($checkExistData->save()) {
            return response()->json([
                'status'  => true,
                'message' => 'Contingent beneficiary updated',
                'data'    => $checkExistData
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Contingent beneficiary not updated',
            ], 400);
        }
    }

    /*
     * Function to create / update Estate Disrtibute table
     * @return \Illuminate\Http\JsonResponse
     * */
    public function updateEstateDisrtibute($request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'             =>  'required|numeric|integer|exists:users,id,deleted_at,NULL|in:'.\Auth::user()->id,
            'disrtibuteType'      =>  'required|numeric|between:1,4|integer'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'data' => []
            ], 400);
        }

        $userId = $request->user_id;
        $disrtibuteType = (string)$request->disrtibuteType; // 1,2,3,4
        $disrtibuteData = $request->disrtibuteData; // disrtibute data array
        if ($userId && $disrtibuteType) {

            $validator = Validator::make($request->all(), [
                'disrtibuteType' => 'required|numeric|between:1,4|integer',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                    'data' => []
                ], 400);
            }

            $checkForTheExistingDisrtibute = EstateDisrtibute::where('user_id', $userId)->first();

            if(!$checkForTheExistingDisrtibute) {
                $checkForTheExistingDisrtibute = new EstateDisrtibute();
                $checkForTheExistingDisrtibute->user_id = $userId;
                $checkForTheExistingDisrtibute->distribute_type = $disrtibuteType;
            }


            // create or update
            $checkForTheExistingDisrtibute->user_id = $userId;
            $checkForTheExistingDisrtibute->distribute_type = $disrtibuteType;
            if ($disrtibuteType == 1) {
                $checkForTheExistingDisrtibute->to_a_single_beneficiary = json_encode($disrtibuteData);
                $checkForTheExistingDisrtibute->to_multiple_beneficiary = null;
                $checkForTheExistingDisrtibute->to_my_heirs_law = null;
                $checkForTheExistingDisrtibute->some_other_way = null;
            }
            if ($disrtibuteType == 2) {
                $checkForTheExistingDisrtibute->to_multiple_beneficiary = json_encode($disrtibuteData);
                $checkForTheExistingDisrtibute->to_a_single_beneficiary = null;
                $checkForTheExistingDisrtibute->to_my_heirs_law = null;
                $checkForTheExistingDisrtibute->some_other_way = null;
            }
            if ($disrtibuteType == 3) {
                $checkForTheExistingDisrtibute->to_my_heirs_law = json_encode($disrtibuteData);
                $checkForTheExistingDisrtibute->to_a_single_beneficiary = null;
                $checkForTheExistingDisrtibute->to_multiple_beneficiary = null;
                $checkForTheExistingDisrtibute->some_other_way = null;
            }
            if ($disrtibuteType == 4) {
                $checkForTheExistingDisrtibute->some_other_way = json_encode($disrtibuteData);
                $checkForTheExistingDisrtibute->to_a_single_beneficiary = null;
                $checkForTheExistingDisrtibute->to_multiple_beneficiary = null;
                $checkForTheExistingDisrtibute->to_my_heirs_law = null;
            }
            if ($checkForTheExistingDisrtibute->save()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Estate disrtibute updated',
                    'data' => ['userData'=>$checkForTheExistingDisrtibute]
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Estate disrtibute data not updated',
                ], 400);
            }

        } else {
            return response()->json([
                'status' => false,
                'message' => 'User data not found',
            ], 400);
        }

    }

    /*
     *function to create / update Disinherit table
     * @return \Illuminate\Http\JsonResponse
     * */
    public function updateDisinherit($request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'               =>  'required|exists:users,id,deleted_at,NULL',
            'disinherit'            =>  'required|numeric|between:0,1|integer',
            'fullname'              =>  'nullable|required_if:disinherit,1|string|max:255',
            'relationship'          =>  'nullable|required_if:disinherit,1|string|max:255',
            'other_relationship'    =>  'nullable|required_if:relationship,Other|string|max:255',
            'gender'                =>  'nullable|required_if:disinherit,1|string|in:M,F'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'data' => []
            ], 400);
        }

        $userId = $request->user_id;
        $isDisinherit = (string)$request->disinherit; // 1-yes,0->no
        $fullname = $request->fullname;
        $relationship = $request->relationship;
        $other_relationship = $request->other_relationship;
        $gender = $request->gender; // M || F

        $checkForExistsDisinherit = Disinherit::where('user_id', $userId)->first();
        if(!$checkForExistsDisinherit) {
            $checkForExistsDisinherit = new Disinherit;
            $checkForExistsDisinherit->user_id = $userId;
        }

        // create or update
        $checkForExistsDisinherit->user_id = $userId;
        $checkForExistsDisinherit->disinherit = $isDisinherit;
        $checkForExistsDisinherit->fullname = $fullname;
        $checkForExistsDisinherit->relationship = $relationship;
        $checkForExistsDisinherit->other_relationship = $other_relationship;
        $checkForExistsDisinherit->gender = $gender;
        $checkForExistsDisinherit->is_complete = '1';
        if ($checkForExistsDisinherit->save()) {
            return response()->json([
                'status' => true,
                'message' => 'Disinherit updated',
                'data' => ['disinherit' => $checkForExistsDisinherit]
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Disinherit not found',
            ], 400);
        }

    }

    /*
     * Function to send email
     *
     * */

    public function sendEmail($userId, $fullname, $emailId, $emailType)
    {
        try {
            if ($userId && $fullname && $emailId && $emailType) {
                $getUser = User::where('id', $userId)->first();
                if (count($getUser)) {
                    if ($emailType == 1) {
                        // send email to personal representative
                        $data = array();
                        $data['title'] = $getUser->name . " Selected You As Personal Representative";
                        $data['banner'] = asset('images/personal-representative-mail-banner.jpg');
                        $data['name'] = $fullname;
                        $data['short_description'] = "<p>" . $getUser->name . " recently joined the thousands of people who have used SimplyWilled.com to create their will and selected you to serve as their Personal Representative. Being selected as a Personal Representative is an important role reserved for those we trust the most. This email is being sent to you so you can let " . $getUser->name . " know whether you accept or decline this honor.</p>
				<h3>What being selected as Primary Personal Representative means for you:</h3>
				<p>As Personal Representative (also called executor is some states) you will be legally responsible for carrying the out the instructions contained in a " . $getUser->name . "'s will. While the responsibilities can vary, you will be primarily responsible for settling the estate, distributing property according to the terms of the will and hiring legal professionals to assist with the probate process.</p>
				<h3><img src='" . asset('images/like-icon-mail.png') . "' alt='like'> Confirm you responsibility:</h3>
				<p>Your duties as Personal Representative do not take effect until " . $getUser->name . " passes away. If you accept this honor and duty, please take a moment to speak with " . $getUser->name . " to have a conversation about the terms of their will, their wishes, and any special instructions. It is important that you confirm the location of their will so that you can access it when the time comes. Otherwise, please let " . $getUser->name . " know you are unable to accept this responsibility so they can choose someone else.</p>";
                        $data['accept_url'] = url("/confirmed") . "?client-name=" . base64_encode($getUser->id);
                        $data['declined_url'] = url("/declined") . "?client-name=" . base64_encode($getUser->id);

                        //send email to personal representative
                        Mail::send('emails.notificationEmail', [
                            'email' => 'info@simplywilled.com',
                            'data' => $data
                        ], function ($mail) use ($emailId) {
                            /** @noinspection PhpUndefinedMethodInspection */
                            $mail->from('info@simplywilled.com', 'simplywilled');
                            /** @noinspection PhpUndefinedMethodInspection */
                            $mail->to($emailId, "Personal Representative")
                                ->subject('Selected You As Personal Representative');
                        });
                        \Log::info('Email Send to the Representative');
                    }
                    if ($emailType == 2) {
                        // send email to backup personal representative
                        $data = array();
                        $data['title'] = $getUser->name . " Selected You As Backup Personal Representative";
                        $data['banner'] = asset('images/personal-representative-mail-banner.jpg');
                        $data['name'] = $fullname;
                        $data['short_description'] = "<p>" . $getUser->name . " recently joined the thousands of people who have used SimplyWilled.com to create their will and selected you to serve as their Backup Personal Representative. Being selected as a Back Up Personal Representative is an important role reserved for those we trust the most. This email is being sent to you so you can let " . $getUser->name . " know whether you accept or decline this honor.</p>
					<h3>What being selected as Backup Personal Representative means for you:</h3>
					<p>As the Backup Personal Representative (also called executor is some states) you will be legally responsible for carrying the out the instructions contained in a " . $getUser->name . "'s will if their Primary Personal Representative is unwilling or unable to serve. While the responsibilities can vary, you will be primarily responsible for settling the estate, distributing property according to the terms of the will and hiring legal professionals to assist with the probate process in the event that " . $getUser->name . "'s first choice is unable to carry out this responsibility.</p>
					<h3><img src='" . asset('images/like-icon-mail.png') . "' alt='like'> Confirm you responsibility:</h3>
					<p>Your duties as Backup Personal Representative do not take effect until " . $getUser->name . " Primary Personal Representative is unable or unwilling to serve.  If you accept this honor and duty, please take a moment to speak with " . $getUser->name . " to have a conversation about the terms of their will, their wishes, and any special instructions. It is important that you confirm the location of their will so that you can access it when the time comes. Otherwise, please let " . $getUser->name . " know you are unable to accept this responsibility so they can choose someone else.</p>";
                        $data['accept_url'] = url("/confirmed") . "?client-name=" . base64_encode($getUser->id);
                        $data['declined_url'] = url("/declined") . "?client-name=" . base64_encode($getUser->id);

                    }
                    if ($emailType == 3) {
                        // send email to  Guardian For Minor Children
                        $data = array();
                        $data['title'] = $getUser->name . " Selected You As Guardian For Minor Children";
                        $data['banner'] = asset('images/guardian-mail-banner.jpg');
                        $data['name'] = $fullname;
                        $data['short_description'] = "<p>" . $getUser->name . " recently joined the thousands of people who have used SimplyWilled.com to create their will and selected you to serve as their Guardian For Minor Children. Being selected as a Guardian For Minor Children is an important role reserved for those we trust the most. This email is being sent to you so you can let " . $getUser->name . " know whether you accept or decline this honor.</p>
					<h3>What being selected as Guardian For Minor Children means for You:</h3>
					<p>As Guardian For Minor Children you will be legally responsible for caring for " . $getUser->name . "'s children. You will have physical custody of their children and will be responsible for their well being.</p>
					<h3><img src='" . asset('images/like-icon-mail.png') . "' alt='like'> Confirm you responsibility:</h3>
					<p>Your duties as Guardian For Minor Children do not take effect until the person who nominated you passes away. If you accept this honor and duty, please take a moment to speak with the person who selected you to have a conversation about this important responsibility.  If you wish to decline this responsibility, please let them know you are unable to accept so they can choose someone else.</p>";
                        $data['accept_url'] = url("/confirmed") . "?client-name=" . base64_encode($getUser->id);
                        $data['declined_url'] = url("/declined") . "?client-name=" . base64_encode($getUser->id);
                        //send email to personal representative
                        Mail::send('emails.notificationEmail', [
                            'email' => 'info@simplywilled.com',
                            'data' => $data
                        ], function ($mail) use ($emailId) {
                            /** @noinspection PhpUndefinedMethodInspection */
                            $mail->from('info@simplywilled.com', 'simplywilled');
                            /** @noinspection PhpUndefinedMethodInspection */
                            $mail->to($emailId, "Guardian For Minor Children")
                                ->subject('Selected You As Guardian For Minor Children');
                        });
                        \Log::info('Email Send to the Guardian For Minor Children');

                    }
                    if ($emailType == 4) {
                        // send email to the backup Backup Guardian
                        $data = array();
                        $data['title'] = $getUser->name . " Selected You As Backup Guardian For Minor Children";
                        $data['banner'] = asset('images/guardian-mail-banner.jpg');
                        $data['name'] = $fullname;
                        $data['short_description'] = "<p>" . $getUser->name . " recently joined the thousands of people who have used SimplyWilled.com to create their will and selected you to serve as their Backup Guardian For Minor Children. Being selected as a Backup Guardian For Minor Children is an important role reserved for those we trust the most. This email is being sent to you so you can let " . $getUser->name . " know whether you accept or decline this honor.</p>
						<h3>What being selected as Backup Guardian For Minor Children means for You:</h3>
						<p>As a Backup Guardian For Minor Children you will be legally responsible for caring for " . $getUser->name . "'s children in the event that their first choice for Guardian is unwilling or unable to serve. You will have physical custody of their children and will be responsible for their well being.</p>
						<h3><img src='" . asset('images/like-icon-mail.png') . "' alt='like'> Confirm you responsibility:</h3>
						<p>Your duties as Backup Guardian For Minor Children do not take effect unless " . $getUser->name . "'s Primary Guardian For Minor Children is unwilling or unable to serve. If you accept this honor and duty, please take a moment to speak with the person who selected you to have a conversation about this important responsibility.  If you wish to decline this responsibility, please let them know you are unable to accept so they can choose someone else.</p>";
                        $data['accept_url'] = url("/confirmed") . "?client-name=" . base64_encode($getUser->id);
                        $data['declined_url'] = url("/declined") . "?client-name=" . base64_encode($getUser->id);

                        //send email to Backup Guardian
                        Mail::send('emails.notificationEmail', [
                            'email' => 'info@simplywilled.com',
                            'data' => $data
                        ], function ($mail) use ($emailId) {
                            /** @noinspection PhpUndefinedMethodInspection */
                            $mail->from('info@simplywilled.com', 'simplywilled');
                            /** @noinspection PhpUndefinedMethodInspection */
                            $mail->to($emailId, "Backup Guardian For Minor Children")
                                ->subject('Selected You As Backup Guardian For Minor Children');
                        });
                    }
                    if($emailType == 5){
                         // Send email to the backup Attroney
                        $data = array();
                        $data['title'] = $getUser->name." Selected You As Backup Financial Power of Attorney";
                        $data['banner'] = asset('images/financial-mail-banner.jpg');
                        $data['name'] = $fullname;
                        $data['short_description'] = "<p>".$getUser->name." recently joined the thousands of people who have used SimplyWilled.com to create their will and selected you to serve as their Backup Financial Power of Attorney. Being selected as a Backup Financial Power of Attorney is an important role reserved for those we trust the most. This email is being sent to you so you can let ".$getUser->name." know whether you accept or decline this honor.</p>
					<h3>What being selected as Backup Financial Power of Attorney means for you:</h3>
					<p>As the Backup Financial Power of Attorney  you will be legally responsible for making financial decision for ".$getUser->name."'s in the event that their Primary Financial Power of Attorney is unwilling or unable to serve. Serving as a Backup Financial Power of Attorney is a very important role and carries with is significant powers should you be called upon to serve. Among them commonly, people give their agent broad power to handle all of their finances.</p>
					<h3><img src='".asset('images/like-icon-mail.png')."' alt='like'> Confirm you responsibility:</h3>
					<p>Your duties as Backup Financially Power of Attorney do not take effect unless ".$getUser->name."'s Primary Financial Power of Attorney is unable or unwilling to serve.  If you accept this honor and duty, please take a moment to speak with ".$getUser->name." to have a conversation about the terms of their Financial Power of Attorney, and any special instructions they may have. It is important that you confirm the location of their estate documents so that you can access them if you are called upon to serve. Otherwise, please let ".$getUser->name." know you are unable to accept this responsibility so they can choose someone else.</p>";
                        $data['accept_url'] = url("/confirmed")."?client-name=".base64_encode($getUser->id);
                        $data['declined_url'] = url("/declined")."?client-name=".base64_encode($getUser->id);

                        Mail::send('emails.notificationEmail', [
                            'email' => 'info@simplywilled.com',
                            'data' => $data
                        ], function ($mail) use ($emailId) {
                            /** @noinspection PhpUndefinedMethodInspection */
                            $mail->from('info@simplywilled.com', 'simplywilled');
                            /** @noinspection PhpUndefinedMethodInspection */
                            $mail->to($emailId, "Backup Financial Power of Attorney")
                                ->subject('Selected You As Backup Financial Power of Attorney');
                        });
                    }
                    if($emailType == 6){
                        // Send email to the Attroney
                        $data = array();
                        $data['title'] = $getUser->name." Selected You As Financial Power of Attorney";
                        $data['banner'] = asset('images/financial-mail-banner.jpg');
                        $data['name'] = $fullname;
                        $data['short_description'] = "<p>".$getUser->name." recently joined the thousands of people who have used SimplyWilled.com to create their will and selected you to serve as their Primary Financial Power of Attorney. Being selected as a Primary Financial Power of Attorney is an important role reserved for those we trust the most. This email is being sent to you so you can let ".$getUser->name." know whether you accept or decline this honor.</p>
				<h3>What being selected as Primary Financial Power of Attorney means for you:</h3>
				<p>As the Primary Financial Power of Attorney  you will be legally responsible for making financial decision for ".$getUser->name."'s in the event that their incapacity. Serving as a Primary Financial Power of Attorney is a very important role and carries with is significant powers should you be called upon to serve. Among them commonly, people give their agent broad power to handle all of their finances.</p>
				<h3><img src='".asset('images/like-icon-mail.png')."' alt='like'> Confirm you responsibility:</h3>
				<p>Your duties as the Primary Financially Power of Attorney do not take effect unless ".$getUser->name." is incapacitated.  If you accept this honor and duty, please take a moment to speak with ".$getUser->name." to have a conversation about the terms of their Financial Power of Attorney, and any special instructions they may have. It is important that you confirm the location of their estate documents so that you can access them if you are called upon to serve. Otherwise, please let ".$getUser->name." know you are unable to accept this responsibility so they can choose someone else.</p>";
                        $data['accept_url'] = url("/confirmed")."?client-name=".base64_encode($getUser->id);
                        $data['declined_url'] = url("/declined")."?client-name=".base64_encode($getUser->id);

                        Mail::send('emails.notificationEmail', [
                            'email' => 'info@simplywilled.com',
                            'data' => $data
                        ], function ($mail) use ($emailId) {
                            /** @noinspection PhpUndefinedMethodInspection */
                            $mail->from('info@simplywilled.com', 'simplywilled');
                            /** @noinspection PhpUndefinedMethodInspection */
                            $mail->to($emailId, "Financial Power of Attorney")
                                ->subject('Selected You As Financial Power of Attorney');
                        });

                    }
                }
            }
        } catch (Exception $e) {
            //error message
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'errorLineNo' => $e->getLine(),
                'data' => []
            ], 500);
        }

    }


}
