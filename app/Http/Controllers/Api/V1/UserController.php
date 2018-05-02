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

        try {
            $validator = Validator::make($request->all(), [
                'new_password' => 'required',
                'confirm_password' => 'required',
            ]);

            $errorMessage = '';
            if ($validator->fails()) {
                $messages = $validator->messages();
                foreach ($messages->all() as $message) {
                    $errorMessage = $errorMessage . $message . " ";
                }
                $response = [
                    'status' => false,
                    'message' => $errorMessage,
                ];
                $responseCode = 200;
            } else {
                $user = User::find(Auth::user()->id);

                if ($request->input('new_password') == $request->input('confirm_password')) {
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
                'userId'     =>  'required|exists:users,id,deleted_at,NULL',
                'step'       =>  'required|numeric|between:1,11|integer',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                    'data' => []
                ], 400);
            } // validation for data

            $userId = $request->userId;
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
                    return $this->updateGuardianInfo($request);
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
        $userId = $request->userId;
        $firstName = $request->firstName;
        $middleName = $request->middleName;
        $lastName = $request->lastName;
        $gender = $request->gender; // M || F
        $dob = $request->dob;
        $maritalStatus = $request->maritalStatus;
        $phoneNumber = $request->phoneNumber;
        $address = $request->address;
        $city = $request->city;
        $state = $request->state;
        $zip = $request->zip;
        // if $maritalStatus =="M" || "R"   Create another entry in the user table and add spose info there
        $spouseFirstName = $request->spouseFirstName;
        $spouseMiddleName = $request->spouseMiddleName;
        $spouseLastName = $request->spouseLastName;
        $sposeGender = $request->sposeGender;
        $spouseDob = $request->spouseDob;

        $validator = Validator::make($request->all(), [
            'userId'          =>  'required|exists:users,id,deleted_at,NULL',
            'firstName'       =>  'required',
            'lastName'        =>  'required',
            'gender'          =>  'required|string',
            'dob'             =>  'required | date_format:"Y-m-d"',
            'phoneNumber'     =>  'required',
            'city'            =>  'required',
            'state'           =>  'required',
            'zip'             =>  'required|regex:/^[0-9]{5}(\-[0-9]{4})?$/', // (Zip code validation rules REGX (min value 5))
            // 'spouseFirstName' =>  'required',
            // 'spouseLastName'  =>  'required',
            // 'spouseGender'    =>  'required',
            // 'spouseDob'       =>  'required | date_format:"Y-m-d"',
            'phoneNumber'     =>  'numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'data' => []
            ], 400);
        } // validation for data

        $checkForExistUser = TellUsAboutYou::where('user_id', $userId)->first();
        if ($checkForExistUser) {
            // update TellUsAboutYou
            $checkForExistUser->firstname = $firstName;
            $checkForExistUser->fullname = $firstName . ' ' . $middleName . ' ' . $lastName;
            $checkForExistUser->lastname = $lastName;
            $checkForExistUser->middlename = $middleName;
            $checkForExistUser->gender = $gender; // M || F
            $checkForExistUser->dob = $dob; // datetimeFormat
            $checkForExistUser->marital_status = $maritalStatus;
            if ($maritalStatus == "M" || $maritalStatus == "R") {

                $validator = Validator::make($request->all(), [
                    'spouseFirstName' =>  'required',
                    'spouseLastName'  =>  'required',
                    'spouseGender'    =>  'required',
                    'spouseDob'       =>  'required | date_format:"Y-m-d"',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors(),
                        'data' => []
                    ], 400);
                } // validation for data

                $checkForExistUser->partner_firstname = $spouseFirstName;
                $checkForExistUser->partner_fullname = $spouseFirstName . ' ' . $spouseMiddleName . ' ' . $spouseLastName;
                $checkForExistUser->partner_gender = $sposeGender; // M || F
                $checkForExistUser->partner_lastname = $spouseLastName;
                $checkForExistUser->partner_middlename = $spouseMiddleName;
                // update the user from user table
                $this->updatePartner($userId, $spouseFirstName);
            }
            $checkForExistUser->phone = $phoneNumber;
            $checkForExistUser->address = $address;
            $checkForExistUser->city = $city;
            $checkForExistUser->state = $state;
            $checkForExistUser->zip = $zip;
            if ($checkForExistUser->save()) {
                return response()->json([
                    'status' => true,
                    'message' => 'User profile updated successfully',
                    'data' => ['userDetails' => $checkForExistUser]
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'User profile not updated !',
                    'data' => []
                ], 400);
            }
        } else {
            // create TellUsAboutYou
            $createUser = new TellUsAboutYou;
            $createUser->user_id = $userId;
            $createUser->firstname = $firstName;
            $createUser->fullname = $firstName . ' ' . $middleName . ' ' . $lastName;
            $createUser->lastname = $lastName;
            $createUser->middlename = $middleName;
            $createUser->gender = $gender; // M || F
            $createUser->dob = $dob; // datetimeFormat
            $createUser->marital_status = $maritalStatus;
            if ($maritalStatus == "M" || $maritalStatus == "R") {

              $validator = Validator::make($request->all(), [
                  'spouseFirstName' =>  'required',
                  'spouseLastName'  =>  'required',
                  'spouseGender'    =>  'required',
                  'spouseDob'       =>  'required | date_format:"Y-m-d"',
              ]);

              if ($validator->fails()) {
                  return response()->json([
                      'status' => false,
                      'message' => $validator->errors(),
                      'data' => []
                  ], 400);
              } // validation for data


                $createUser->partner_firstname = $spouseFirstName;
                $createUser->partner_fullname = $spouseFirstName . ' ' . $spouseMiddleName . ' ' . $spouseLastName;
                $createUser->partner_gender = $sposeGender; // M || F
                $createUser->partner_lastname = $spouseLastName;
                $createUser->partner_middlename = $spouseMiddleName;
                //create a new user entry in user table
                $this->updatePartner($userId, $spouseFirstName);
            }
            $createUser->phone = $phoneNumber;
            $createUser->address = $address;
            $createUser->city = $city;
            $createUser->state = $state;
            $createUser->zip = $zip;
            if ($createUser->save()) {

                return response()->json([
                    'status' => true,
                    'message' => 'User Profile created successfully',
                    'data' => ['userDetails' => $createUser]
                ], 200);
            } else {

                return response()->json([
                    'status' => false,
                    'message' => 'User profile not created !',
                    'data' => []
                ], 400);
            }
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
                    $checkForUserPartner->name = $spouseFirstName;
                    $checkForUserPartner->save();
                } else {
                    // create a partner
                    $createUserPartner = new User;
                    $createUserPartner->parent_id = $userId;
                    $createUserPartner->name = $spouseFirstName;
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
            'userId'          =>  'required|exists:users,id,deleted_at,NULL',
            'totalChildren'   =>  'required|numeric|integer|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'data' => []
            ], 400);
        }


        // save/update the children information
        $userId = $request->userId;
        $totalChildren = $request->totalChildren;
        $childrenInfoArray = $request->childrenInfo;    // array containing the info of children [userId],[fullname],[dob]

        //foreign key check;
        $usersArray = User::pluck('id')->toArray();
        $usersArray = array_flip($usersArray);
        //error based on foreign key validation

        foreach($childrenInfoArray as $key => $cInfo) {
          if(!isset($usersArray[$cInfo['userId']])) {
            return response()->json([
                'status'  => false,
                'message' => 'User id '.$cInfo['userId'].' does not exists',
                'data'    => []
            ], 400);
          }
        }

        //dd($usersArray);

        $deceasedChildren = $request->deceasedChildren;   // 0-> No 1-> Yes
        $checkForExistUser = TellUsAboutYou::where('user_id', $userId)->first();
        if ($checkForExistUser) {
            if ($totalChildren && $totalChildren == 0) {
                // update children
                $checkForExistUser->children = $totalChildren;
                $checkForExistUser->save();
            }
            if ($totalChildren && $totalChildren > 0) {
                // create entry in children table
                $checkForExistUser->children = $totalChildren;
                $checkForExistUser->save();
                // check for the exist children table
                $checkForExistchildren = Children::where('user_id', $userId)->get();




                if (count($checkForExistchildren) > 0) {
                    if ($childrenInfoArray) {

                        //delete the previous list and create a new list of children
                        $deleteExistchildren = Children::where('user_id', $userId)->delete();
                        foreach ($childrenInfoArray as $key => $value) {
                            $createChildren = new Children;
                            if(isset($usersArray[$value['userId']])) {
                              $createChildren->user_id = $value['userId'];
                              $createChildren->fullname = $value['fullname'];
                              $createChildren->dob = $value['dob'];
                              $createChildren->save();
                            }
                        }
                    } else {
                        return response()->json([
                            'status' => false,
                            'message' => 'Data not found for update this step',
                            'data' => []
                        ], 400);
                    }
                } else {
                    //create a new list of children
                    if ($childrenInfoArray) {

                        foreach ($childrenInfoArray as $key => $value) {
                            $createChildren = new Children;
                            if(isset($usersArray[$value['userId']])) {
                              $createChildren->user_id = $value['userId'];
                              $createChildren->fullname = $value['fullname'];
                              $createChildren->dob = $value['dob'];
                              $createChildren->save();
                            }
                        }
                    } else {
                        return response()->json([
                            'status' => false,
                            'message' => 'Data not found for update this step',
                            'data' => []
                        ], 400);
                    }
                }

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
                $checkForExistUser->deceased_children = $deceasedChildren;
                $checkForExistUser->deceased_children_names = $deceasedChildrenNames;
                $checkForExistUser->save();
            }
            if ($deceasedChildren == 0) {
                $checkForExistUser->deceased_children = $deceasedChildren;
                $checkForExistUser->save();
            }
            $children = Children::where('user_id', $userId)->get();
            return response()->json([
                'status' => true,
                'message' => 'User updated with the children information',
                'data' => ['childrenData' => $children ]
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

        $validator = Validator::make($request->all(), [
            'userId'                  =>  'required|exists:users,id,deleted_at,NULL',
            'isBusinessInterest'      =>  'required|numeric|between:0,1|integer',
            'isFarmOrRanch'           =>  'required|numeric|between:0,1|integer',
            'isGetCompensate'         =>  'required|numeric|between:0,1|integer',
            'isPercentage'            =>  'required|numeric|between:0,1|integer',
            'compensateAmount'        =>  'required|numeric|min:0',
            'isPercentageBasedOnNet'  =>  'required|numeric|between:0,1|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'data' => []
            ], 400);
        }

        $userId = $request->userId;
        $isBusinessInterest = $request->isBusinessInterest; // 0-> No 1->Yes
        $isFarmOrRanch = $request->isFarmOrRanch; // 0-> No 1->Yes
        $isGetCompensate = $request->isGetCompensate; // 0-> No 1->Yes
        $isPercentage = $request->isPercentage; // 0-> No 1->Yes
        $compensateAmount = $request->compensateAmount; // if the isPercentage flag is YES then save this to compensation_percent_amount
        $isPercentageBasedOnNet = $request->isPercentageBasedOnNet; // 0-> No 1->Yes

        $checkForExistData = ProvideYourLovedOnes::where('user_id', $userId)->first();
        if (count($checkForExistData)) {
            // update
            $checkForExistData->user_id = $userId;
            $checkForExistData->business_interest = $isBusinessInterest;
            $checkForExistData->farm_or_ranch = $isFarmOrRanch;
            $checkForExistData->net_value_percent = $isPercentageBasedOnNet;
            $checkForExistData->is_getcompensate = $isGetCompensate;
            $checkForExistData->is_percentage = $isPercentage;
            if ($isPercentage == 1) {
                $checkForExistData->compensation_percent_amount = $compensateAmount;
                $checkForExistData->compensation_specific_amount = 0.00;
            } else {
                $checkForExistData->compensation_percent_amount = 0.00;
                $checkForExistData->compensation_specific_amount = $compensateAmount;
            }
            if ($checkForExistData->save()) {
                return response()->json([
                    'status' => true,
                    'message' => 'User details updated',
                    'data' => ['userData'=>$checkForExistData]
                ], 200);
            } else {
                return response()->json([
                    'status' => true,
                    'message' => 'User details not updated',
                    'data' => []
                ], 400);
            }
        } else {
            // create
            $checkForExistData = new ProvideYourLovedOnes;
            $checkForExistData->user_id = $userId;
            $checkForExistData->business_interest = $isBusinessInterest;
            $checkForExistData->farm_or_ranch = $isFarmOrRanch;
            $checkForExistData->net_value_percent = $isPercentageBasedOnNet;
            $checkForExistData->is_getcompensate = $isGetCompensate;
            $checkForExistData->is_percentage = $isPercentage;
            if ($isPercentage == 1) {
                $checkForExistData->compensation_percent_amount = $compensateAmount;
            } else {
                $checkForExistData->compensation_specific_amount = $compensateAmount;
            }
            if ($checkForExistData->save()) {
                return response()->json([
                    'status' => true,
                    'message' => 'User details updated',
                    'data' => ['userData'=>$checkForExistData]
                ], 200);

            } else {
                return response()->json([
                    'status' => true,
                    'message' => 'User details not updated',
                    'data' => []
                ], 400);
            }
        }
    }

    /*
     *
     *Function to create update personal representative table
     * @return \Illuminate\Http\JsonResponse
     * */
    public function updatePersonalRepresentatives($request)
    {
        $userId = $request->userId;
        $fullName = $request->fullName;
        $relationShip = $request->relationShip;
        $address = $request->address;
        $state = $request->state;
        $city = $request->city;
        $country = $request->country;
        $zip = $request->zip;
        $isInform = $request->isInform;
        $email = $request->email;
        $backUpRepresentative = $request->backUpRepresentative;

        $validator = Validator::make($request->all(), [
            'fullName' => 'required',
            'relationShip' => 'required',
            'address' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zip' => 'required|regex:/^[0-9]{5}(\-[0-9]{4})?$/',
            'city' => 'required',
        ]);
        // validation for the user data
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'data' => []
            ], 400);
        }

        if($isInform == 1){
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
            ]);
            // validation for the user data
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                    'data' => []
                ], 400);
            }
        }

        $checkForExistRepresentative = PersonalRepresentatives::where('user_id', $userId)->where('is_backuprepresentative', '=', '0')->first();
        if (count($checkForExistRepresentative)) {
            $checkForExistRepresentative->user_id = $userId;
            $checkForExistRepresentative->fullname = $fullName;
            $checkForExistRepresentative->relationship_with = $relationShip;
            $checkForExistRepresentative->address = $address;
            $checkForExistRepresentative->city = $city;
            $checkForExistRepresentative->country = $country;
            $checkForExistRepresentative->state = $state;
            $checkForExistRepresentative->zip = $zip;
            $checkForExistRepresentative->email = $email;
            $checkForExistRepresentative->email_notification = $isInform;
            $checkForExistRepresentative->is_backuprepresentative = "0";
            if ($checkForExistRepresentative->save()) {
                $savedStatus = 1;
                if ($isInform == 1) {
                    $emailType = 1; // send email to personal representative
                    $this->sendEmail($userId, $fullName, $email, $emailType);
                }
            } else {
                $savedStatus = 0;
            }
        } else {
            $saveRepresentative = new PersonalRepresentatives;
            $saveRepresentative->user_id = $userId;
            $saveRepresentative->fullname = $fullName;
            $saveRepresentative->relationship_with = $relationShip;
            $saveRepresentative->address = $address;
            $saveRepresentative->city = $city;
            $saveRepresentative->country = $country;
            $saveRepresentative->state = $state;
            $saveRepresentative->zip = $zip;
            $saveRepresentative->email = $email;
            $saveRepresentative->email_notification = $isInform;
            $saveRepresentative->is_backuprepresentative = "0";
            if ($saveRepresentative->save()) {
                if ($isInform == 1) {
                    $emailType = 1; // send email to personal representative
                    $this->sendEmail($userId, $fullName, $email, $emailType);
                }
                $savedStatus = 1;
            } else {
                $savedStatus = 0;
            }
        }
        if ($backUpRepresentative == 1) {
            $backupFullName = $request->backupFullName;
            $backupRelationShip = $request->backupRelationShip;
            $backupAddress = $request->backupAddress;
            $backupState = $request->backupState;
            $backupCity = $request->backupCity;
            $backupCountry = $request->backupCountry;
            $backupZip = $request->backupZip;
            $backupIsInform = $request->backupIsInform;
            $backupEmail = $request->backupEmail;

            // validation for the user data
            $validator = Validator::make($request->all(), [
                'backupFullName' => 'required',
                'backupRelationShip' => 'required',
                'backupAddress' => 'required',
                'backupState' => 'required',
                'backupCountry' => 'required',
                'backupZip' => 'required|regex:/^[0-9]{5}(\-[0-9]{4})?$/',
                'backupCity' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                    'data' => []
                ], 400);
            }

            if($backupIsInform == 1){
                $validator = Validator::make($request->all(), [
                    'backupEmail' => 'required|email',
                ]);
                // validation for the user data
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors(),
                        'data' => []
                    ], 400);
                }
            }

            $checkForExistRepresentative = PersonalRepresentatives::where('user_id', $userId)->where('is_backuprepresentative', '=', '1')->first();
            if (count($checkForExistRepresentative)) {
                $checkForExistRepresentative->user_id = $userId;
                $checkForExistRepresentative->fullname = $backupFullName;
                $checkForExistRepresentative->relationship_with = $backupRelationShip;
                $checkForExistRepresentative->address = $backupAddress;
                $checkForExistRepresentative->city = $backupCity;
                $checkForExistRepresentative->country = $backupCountry;
                $checkForExistRepresentative->state = $backupState;
                $checkForExistRepresentative->zip = $backupZip;
                $checkForExistRepresentative->email = $backupEmail;
                $checkForExistRepresentative->email_notification = $backupIsInform;
                $checkForExistRepresentative->is_backuprepresentative = $backUpRepresentative;
                if ($checkForExistRepresentative->save()) {
                    if ($backupIsInform == 1) {
                        $emailType = 2; // send email to backup personal representative
                        $this->sendEmail($userId, $backupFullName, $backupEmail, $emailType);
                    }
                    $savedStatus = 1;
                } else {
                    $savedStatus = 0;
                }
            } else {
                $saveRepresentative = new PersonalRepresentatives;
                $saveRepresentative->user_id = $userId;
                $saveRepresentative->fullname = $backupFullName;
                $saveRepresentative->relationship_with = $backupRelationShip;
                $saveRepresentative->address = $backupAddress;
                $saveRepresentative->city = $backupCity;
                $saveRepresentative->country = $backupCountry;
                $saveRepresentative->state = $backupState;
                $saveRepresentative->zip = $backupZip;
                $saveRepresentative->email = $backupEmail;
                $saveRepresentative->email_notification = $backupIsInform;
                $saveRepresentative->is_backuprepresentative = $backUpRepresentative;
                if ($saveRepresentative->save()) {
                    if ($backupIsInform == 1) {
                        $emailType = 2; // send email to backup personal representative
                        $this->sendEmail($userId, $backupFullName, $backupEmail, $emailType);
                    }
                    $savedStatus = 1;
                } else {
                    $savedStatus = 0;
                }
            }
        }   // backup represent YES End

        if ($savedStatus == 1) {
            $representative = PersonalRepresentatives::where('user_id', $userId)->get();
            return response()->json([
                'status' => true,
                'message' => 'User details updated',
                'data' => ['userData'=>$representative]
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'User details not updated',
                'data' => []
            ], 400);
        }
    }

    /*
     * function to create / update GuardianInfo table
     * @return \Illuminate\Http\JsonResponse
     * */
    public function updateGuardianInfo($request)
    {

        $validator = Validator::make($request->all(), [
            'userId'                  =>  'required|exists:users,id,deleted_at,NULL',
            'isguardianMinorChildren' =>  'required|numeric|between:0,1|integer',
            'isInformRepresentive'    =>  'required|numeric|between:0,1|integer',
            'isBackUpGurdian'         =>  'required|numeric|between:0,1|integer'
        ]);
        // validation for the user data
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'data' => []
            ], 400);
        }

        $userId = $request->userId;
        $isguardianMinorChildren = $request->isguardianMinorChildren;   // 1->yes 0->no
        $guardianFullName = $request->guardianFullName;
        $relationShip = $request->relationShip;
        $address = $request->address;
        $city = $request->city;
        $state = $request->state;
        $zip = $request->zip;
        $country = $request->country;
        $isInformRepresentive = $request->isInformRepresentive; // 1->yes 0->No (default Yes)
        $emailRepresentive = $request->emailRepresentive;
        $isBackUpGurdian = $request->isBackUpGurdian; // 1->yes 0->no (default is No)

        $checkForExistUser = TellUsAboutYou::where('user_id', $userId)->first();
        if (count($checkForExistUser)) {
            if ($isguardianMinorChildren == 1) {
                // try to save the data in tellus about u table
                $checkForExistUser->guardian_minor_children = $isguardianMinorChildren;
                $checkForExistUser->save();
                // try to save data in  guardian table
                $checkForExistGuardianInfo = GuardianInfo::where('user_id', $userId)->where('is_backup', '=', '0')->first();   // find and Update normal guardian data
                if (count($checkForExistGuardianInfo)) {
                    // validation for the GuardianInfo
                    $validator = Validator::make($request->all(), [
                        'guardianFullName' => 'required|string|max:255',
                        'relationShip' => 'required|string|max:255',
                        'address' => 'required|string|max:255',
                        'city' => 'required|string|max:255',
                        'state' => 'required|string|max:255',
                        'zip' => 'required|regex:/^[0-9]{5}(\-[0-9]{4})?$/',
                        'country' => 'required|string|max:255',
                    ]);

                    if ($validator->fails()) {
                        return response()->json([
                            'status' => false,
                            'message' => $validator->errors(),
                            'data' => []
                        ], 400);
                    }

                    if($isInformRepresentive == 1){
                        $validator = Validator::make($request->all(), [
                            'emailRepresentive' => 'required|email',
                        ]);

                        if ($validator->fails()) {
                            return response()->json([
                                'status' => false,
                                'message' => $validator->errors(),
                                'data' => []
                            ], 400);
                        }
                    }

                    $checkForExistGuardianInfo->user_id = $userId;
                    $checkForExistGuardianInfo->fullname = $guardianFullName;
                    $checkForExistGuardianInfo->relationship_with = $relationShip;
                    $checkForExistGuardianInfo->address = $address;
                    $checkForExistGuardianInfo->city = $city;
                    $checkForExistGuardianInfo->state = $state;
                    $checkForExistGuardianInfo->zip = $zip;
                    $checkForExistGuardianInfo->country = $country;
                    $checkForExistGuardianInfo->email_notification = $isInformRepresentive;
                    $checkForExistGuardianInfo->email = $emailRepresentive;
                    $checkForExistGuardianInfo->is_backup = "0";
                    $checkForExistGuardianInfo->save();
                    if ($isInformRepresentive == 1) {
                        $emailType = 3; // send email guardian
                        $this->sendEmail($userId, $guardianFullName, $emailRepresentive, $emailType);
                    }
                } else {
                    // validation for the GuardianInfo
                    $validator = Validator::make($request->all(), [
                        'guardianFullName' => 'required|string|max:255',
                        'relationShip' => 'required|string|max:255',
                        'address' => 'required|string|max:255',
                        'city' => 'required|string|max:255',
                        'state' => 'required|string|max:255',
                        'zip' => 'required|regex:/^[0-9]{5}(\-[0-9]{4})?$/',
                        'country' => 'required|string|max:255',
                    ]);

                    if ($validator->fails()) {
                        return response()->json([
                            'status' => false,
                            'message' => $validator->errors(),
                            'data' => []
                        ], 400);
                    }

                    if($isInformRepresentive == 1){
                        $validator = Validator::make($request->all(), [
                            'emailRepresentive' => 'required|email',
                        ]);

                        if ($validator->fails()) {
                            return response()->json([
                                'status' => false,
                                'message' => $validator->errors(),
                                'data' => []
                            ], 400);
                        }
                    }

                    // create new data in guardian table
                    $saveGuardianInfo = new GuardianInfo;
                    $saveGuardianInfo->user_id = $userId;
                    $saveGuardianInfo->fullname = $guardianFullName;
                    $saveGuardianInfo->relationship_with = $relationShip;
                    $saveGuardianInfo->address = $address;
                    $saveGuardianInfo->city = $city;
                    $saveGuardianInfo->state = $state;
                    $saveGuardianInfo->zip = $zip;
                    $saveGuardianInfo->email_notification = $isInformRepresentive;
                    $saveGuardianInfo->is_backup = "0";
                    $saveGuardianInfo->email = $emailRepresentive;
                    $saveGuardianInfo->save();
                    if ($isInformRepresentive == 1) {
                        $emailType = 3; // send email guardian
                        $this->sendEmail($userId, $guardianFullName, $emailRepresentive, $emailType);
                    }
                }
                if ($isBackUpGurdian == 1) {
                    $checkForExistBackupGuardianInfo = GuardianInfo::where('user_id', $userId)->where('is_backup', '=', '1')->first();   // find and upate normal gurdian data

                    $isInformBackUpRepresentive = $request->isInformBackUpRepresentive;
                    $emailBackUpRepresentive = $request->emailBackUpRepresentive;
                    $backupGuardianFullName = $request->backupGuardianFullName;
                    $backupGuardianRelationShip = $request->backupGuardianRelationShip;
                    $backupGuardianAddress = $request->backupGuardianAddress;
                    $backupGuardianCity = $request->backupGuardianCity;
                    $backupGuardianState = $request->backupGuardianState;
                    $backupGuardianZip = $request->backupGuardianZip;
                    $backupGuardianCountry = $request->backupGuardianCountry;

                    $validator = Validator::make($request->all(), [
                        'isInformBackUpRepresentive'  => 'required|numeric|between:0,1|integer',
                        'backupGuardianFullName' => 'required|string|max:255',
                        'backupGuardianRelationShip' => 'required|string|max:255',
                        'backupGuardianAddress' => 'required|string',
                        'backupGuardianCity' => 'required|string',
                        'backupGuardianState' => 'required|string',
                        'backupGuardianZip' => 'required|regex:/^[0-9]{5}(\-[0-9]{4})?$/',
                        'backupGuardianCountry' => 'required|string',
                    ]);

                    if ($validator->fails()) {
                        return response()->json([
                            'status' => false,
                            'message' => $validator->errors(),
                            'data' => []
                        ], 400);
                    } // validation for the user data

                    if($isInformBackUpRepresentive == 1){
                        $validator = Validator::make($request->all(), [
                            'emailRepresentive' => 'required|email',
                        ]);

                        if ($validator->fails()) {
                            return response()->json([
                                'status' => false,
                                'message' => $validator->errors(),
                                'data' => []
                            ], 400);
                        }
                    }

                    if (count($checkForExistBackupGuardianInfo)) {
                        // update
                        $checkForExistBackupGuardianInfo->user_id = $userId;
                        $checkForExistBackupGuardianInfo->fullname = $backupGuardianFullName;
                        $checkForExistBackupGuardianInfo->relationship_with = $backupGuardianRelationShip;
                        $checkForExistBackupGuardianInfo->address = $backupGuardianAddress;
                        $checkForExistBackupGuardianInfo->city = $backupGuardianCity;
                        $checkForExistBackupGuardianInfo->state = $backupGuardianState;
                        $checkForExistBackupGuardianInfo->zip = $backupGuardianZip;
                        $checkForExistBackupGuardianInfo->country = $backupGuardianCountry;
                        $checkForExistBackupGuardianInfo->email_notification = $isInformBackUpRepresentive;
                        $checkForExistBackupGuardianInfo->email = $emailBackUpRepresentive;
                        $checkForExistBackupGuardianInfo->is_backup = $isBackUpGurdian;
                        $checkForExistBackupGuardianInfo->save();
                        if ($isInformBackUpRepresentive == 1) {
                            $emailType = 4; // send mail to Backup Guardian Email
                            $this->sendEmail($userId, $backupGuardianFullName, $emailBackUpRepresentive, $emailType);
                        }
                    } else {
                        // insert or create
                        $saveGuardianInfo = new GuardianInfo;
                        $saveGuardianInfo->user_id = $userId;
                        $saveGuardianInfo->fullname = $backupGuardianFullName;
                        $saveGuardianInfo->relationship_with = $backupGuardianRelationShip;
                        $saveGuardianInfo->address = $backupGuardianAddress;
                        $saveGuardianInfo->city = $backupGuardianCity;
                        $saveGuardianInfo->state = $backupGuardianState;
                        $saveGuardianInfo->zip = $backupGuardianZip;
                        $saveGuardianInfo->country = $backupGuardianCountry;
                        $saveGuardianInfo->email_notification = $isInformBackUpRepresentive;
                        $saveGuardianInfo->email = $emailBackUpRepresentive;
                        $saveGuardianInfo->is_backup = $isBackUpGurdian;
                        $saveGuardianInfo->save();
                        if ($isInformBackUpRepresentive == 1) {
                            $emailType = 4; // send mail to Backup Guardian Email
                            $this->sendEmail($userId, $backupGuardianFullName, $emailBackUpRepresentive, $emailType);
                        }
                    }
                }
                // success message
                $guardianInfo = GuardianInfo::where('user_id',$userId)->get();
                return response()->json([
                    'status' => true,
                    'message' => 'User details updated with GuardianInfo',
                    'data' => ['guardianInfo'=>$guardianInfo]
                ], 200);
            } else {
                $checkForExistUser->guardian_minor_children = $isguardianMinorChildren;
                $checkForExistUser->save();
                // success message
                $guardianInfo = GuardianInfo::where('user_id',$userId)->get();
                return response()->json([
                    'status' => true,
                    'message' => 'User details updated final with GuardianInfo',
                    'data' => ['guardianInfo'=>$guardianInfo]
                ], 200);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'User details not updated',
                'data' => []
            ], 400);
        }
    }

    /*
     *function to update TangibleProperty distribute in the ProvideYourLovedOnes table
     *@return \Illuminate\Http\JsonResponse
     * */
    public function updateTangiblePropertyDistribute($request)
    {
        $validator = Validator::make($request->all(), [
            'isTangiblePropertyDistribute'  =>  'required|numeric|between:1,3|integer',
            'tangiblePropertyDistribute'    =>  'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'data' => []
            ], 400);
        }

        $userId = $request->userId;
        $isTangiblePropertyDistribute = (string)($request->isTangiblePropertyDistribute - 1); // flags 1,2,3
        $tangiblePropertyDistribute = trim($request->tangiblePropertyDistribute);
        $checkForExistData = ProvideYourLovedOnes::where('user_id', $userId)->first();
        if (count($checkForExistData)) {
            $checkForExistData->is_tangible_property_distribute = $isTangiblePropertyDistribute;
            $checkForExistData->tangible_property_distribute    = $tangiblePropertyDistribute;
            if ($checkForExistData->save()) {
                return response()->json([
                    'status' => true,
                    'message' => 'User details updated',
                    'data' => ['userData'=>$checkForExistData]
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
        $validator = Validator::make($request->all(), [
            'userId'    =>  'required|exists:users,id,deleted_at,NULL',
            'giftType'  =>  'required|numeric|between:1,6|integer',
            'giftData'  =>  'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'data' => []
            ], 400);
        }

        $userId = $request->userId;
        $giftType = $request->giftType; // giftType = 1,2,3,4,5,6
        $giftData = $request->giftData; // array of gift data
        if ($userId && $giftType) {

            $checkGift = Gifts::where('user_id', $userId)->where('type', $giftType)->first();
            if (count($checkGift)) {
                //update existing gift
                $checkGift->delete();
                $saveGift = new Gifts;
                $saveGift->user_id = $userId;
                $saveGift->type = $giftType;
                if ($giftType == 1) {
                    //cash gift
                    $saveGift->cash_description = json_encode($giftData);
                }
                if ($giftType == 2) {
                    //property gift
                    $saveGift->property_details = json_encode($giftData);
                }
                if ($giftType == 3) {
                    //business gift
                    $saveGift->business_details = json_encode($giftData);
                }
                if ($giftType == 4) {
                    // assets details
                    $saveGift->asset_details = json_encode($giftData);
                }
                if ($giftType == 5) {
                    // rest details
                    $saveGift->rest_deatils = json_encode($giftData);
                }
                if ($giftType == 6) {
                    // disinherit details
                    $saveGift->disinherit_details = json_encode($giftData);
                }
                if ($saveGift->save()) {
                    // success
                    return response()->json([
                        'status' => true,
                        'message' => 'User gift details updated',
                        'data' => [ 'userData' => $saveGift ]
                    ], 200);
                } else {
                    // error
                    return response()->json([
                        'status' => false,
                        'message' => 'User gift details not updated',
                        'data' => []
                    ], 400);
                }
            } else {
                $saveGift = new Gifts;
                $saveGift->user_id = $userId;
                $saveGift->type = $giftType;
                if ($giftType == 1) {
                    //cash gift
                    $saveGift->cash_description = json_encode($giftData);
                }
                if ($giftType == 2) {
                    //property gift
                    $saveGift->property_details = json_encode($giftData);
                }
                if ($giftType == 3) {
                    //business gift
                    $saveGift->business_details = json_encode($giftData);
                }
                if ($giftType == 4) {
                    // assets details
                    $saveGift->asset_details = json_encode($giftData);
                }
                if ($giftType == 5) {
                    // rest details
                    $saveGift->rest_deatils = json_encode($giftData);
                }
                if ($giftType == 6) {
                    // disinherit details
                    $saveGift->disinherit_details = json_encode($giftData);
                }
                if ($saveGift->save()) {
                    // success
                    return response()->json([
                        'status' => true,
                        'message' => 'User gift details updated',
                        'data' => ['userData' => $saveGift]
                    ], 200);
                } else {
                    // error
                    return response()->json([
                        'status' => false,
                        'message' => 'User gift details not updated',
                        'data' => []
                    ], 400);
                }
            }
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Something went wrong',
                'data' => []
            ], 400);
        }

    }

    /*
     * Function to create / update specific_gift flag in ProvideYourLovedOnes table
     * @return \Illuminate\Http\JsonResponse
     * */

    public function updateSpecificGift($request)
    {
        $userId = $request->userId;
        $specificGift = $request->specificGift; // 0-> NO ,1->Yes
        $validator = Validator::make($request->all(), [
            'specificGift' => 'required|numeric|between:0,1|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'data' => []
            ], 400);
        }
        $checkForExistData = ProvideYourLovedOnes::where('user_id', $userId)->first();
        if (count($checkForExistData)) {
            $checkForExistData->specific_gifts = $specificGift;
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
        $userId = $request->userId;
        $isContingentBeneficiary = $request->isContingentBeneficiary;   // 0->no, 1->yes

        $validator = Validator::make($request->all(), [
            'isContingentBeneficiary' => 'required|numeric|between:0,1|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'data' => []
            ], 400);
        }

        $checkExistData = ContingentBeneficiary::where('user_id', $userId)->first();
        if (count($checkExistData)) {
            $checkExistData->user_id = $userId;
            $checkExistData->is_contingent_beneficiary = $isContingentBeneficiary;
            if ($checkExistData->save()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Contingent beneficiary updated',
                    'data' => ['userData'=>$checkExistData]
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Contingent beneficiary not updated',
                ], 400);
            }
        } else {
            $saveData = new ContingentBeneficiary;
            $saveData->user_id = $userId;
            $saveData->is_contingent_beneficiary = $isContingentBeneficiary;
            if ($saveData->save()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Contingent beneficiary updated',
                    'data' => ['userData'=>$saveData]
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Contingent beneficiary not updated',
                ], 400);
            }
        }

    }

    /*
     * Function to create / update Estate Disrtibute table
     * @return \Illuminate\Http\JsonResponse
     * */
    public function updateEstateDisrtibute($request)
    {
        $userId = $request->userId;
        $disrtibuteType = $request->disrtibuteType; // 1,2,3,4
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

            $checkForTheExistingDisrtibute = EstateDisrtibute::where('user_id', $userId)->where('distribute_type', $disrtibuteType)->first();
            if (count($checkForTheExistingDisrtibute)) {
                //update
                $checkForTheExistingDisrtibute->user_id = $userId;
                $checkForTheExistingDisrtibute->distribute_type = $disrtibuteType;
                if ($disrtibuteType == 1) {
                    $checkForTheExistingDisrtibute->to_a_single_beneficiary = json_encode($disrtibuteData);
                }
                if ($disrtibuteType == 2) {
                    $checkForTheExistingDisrtibute->to_multiple_beneficiary = json_encode($disrtibuteData);
                }
                if ($disrtibuteType == 3) {
                    $checkForTheExistingDisrtibute->to_my_heirs_law = json_encode($disrtibuteData);
                }
                if ($disrtibuteType == 4) {
                    $checkForTheExistingDisrtibute->some_other_way = json_encode($disrtibuteData);
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
                // insert
                $saveDisrtibute = new EstateDisrtibute;
                $saveDisrtibute->user_id = $userId;
                $saveDisrtibute->distribute_type = $disrtibuteType;
                if ($disrtibuteType == 1) {
                    $saveDisrtibute->to_a_single_beneficiary = json_encode($disrtibuteData);
                }
                if ($disrtibuteType == 2) {
                    $saveDisrtibute->to_multiple_beneficiary = json_encode($disrtibuteData);
                }
                if ($disrtibuteType == 3) {
                    $saveDisrtibute->to_my_heirs_law = json_encode($disrtibuteData);
                }
                if ($disrtibuteType == 4) {
                    $saveDisrtibute->some_other_way = json_encode($disrtibuteData);
                }
                if ($saveDisrtibute->save()) {
                    return response()->json([
                        'status' => true,
                        'message' => 'Estate disrtibute updated',
                        'data' => ['userData'=>$saveDisrtibute]
                    ], 200);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'User data not found',
                    ], 400);
                }
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
            'userId'              =>  'required|exists:users,id,deleted_at,NULL',
            'isDisinherit'        =>  'required|numeric|between:0,1|integer',
            'fullname'            =>  'required|string|max:255',
            'relationship'        =>  'required|string|max:255',
            'other_relationship'  =>  'required|string|max:255',
            'gender'              =>  'required|string|in:M,F'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'data' => []
            ], 400);
        }

        $userId = $request->userId;
        $isDisinherit = $request->isDisinherit; // 1-yes,0->no
        $fullname = $request->fullname;
        $relationship = $request->relationship;
        $other_relationship = $request->other_relationship;
        $gender = $request->gender; // M || F

        $checkForExistsDisinherit = Disinherit::where('user_id', $userId)->first();
        if (count($checkForExistsDisinherit)) {
            // update
            $checkForExistsDisinherit->user_id = $userId;
            $checkForExistsDisinherit->disinherit = $isDisinherit;
            $checkForExistsDisinherit->fullname = $fullname;
            $checkForExistsDisinherit->relationship = $relationship;
            $checkForExistsDisinherit->other_relationship = $other_relationship;
            $checkForExistsDisinherit->gender = $gender;
            if ($checkForExistsDisinherit->save()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Disinherit updated',
                    'data' => ['userData'=>$checkForExistsDisinherit]
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Disinherit not found',
                ], 400);
            }
        } else {
            // insert
            $saveDisinherit = new Disinherit;
            $saveDisinherit->user_id = $userId;
            $saveDisinherit->disinherit = $isDisinherit;
            $saveDisinherit->fullname = $fullname;
            $saveDisinherit->relationship = $relationship;
            $saveDisinherit->other_relationship = $other_relationship;
            $saveDisinherit->gender = $gender;
            if ($saveDisinherit->save()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Disinherit updated',
                    'data' => ['userData'=>$saveDisinherit]
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Disinherit not found',
                ], 400);
            }
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
