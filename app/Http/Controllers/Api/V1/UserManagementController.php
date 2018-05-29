<?php
/**
 * Functional Scope: API for manage users activity.
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
use App\FinancialPowerAttorney;
use App\FinalArrangements;
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
use App\Models\HealthFinance;
use App\StatesInfo;

class UserManagementController extends Controller
{
    /*
     * function to get provide-your-loved-ones-user data
     * @param null
     * @return \Illuminate\Http\JsonResponse
     * */
    public function getPYFUserData() {
      try {
        $user = \Auth::user();
        $financialPOA = FinancialPowerAttorney::where('user_id',$user->id)->first();
        return response()->json([
          'status'  =>  true,
          'message' =>  'success',
          'data'    =>  $financialPOA
        ],200);
      } catch(\Exception $e) {
        return response()->json([
          'status'  =>  true,
          'message' =>  'Error : '.$e->getMessage().' LINE : '.$e->getLine(),
          'data'    =>  null
        ],500);
      }
    }


    /*
     * function to get provide-your-loved-ones-user data
     * @param null
     * @return \Illuminate\Http\JsonResponse
     * */
    public function postPYFUserData(Request $request) {
      try {
        //dd($request->all());
          //validation for attorney durable power
          $validator = Validator::make($request->all(), [
              'attorney_powers'   =>  'nullable',
              'attorney_holders'  =>  'nullable',
              'user_id'           =>  'required|numeric|integer|exists:users,id,deleted_at,NULL|in:'.\Auth::user()->id,
              'is_backupattorney' =>  'required|numeric|between:0,1|integer',
              'attorney_backup'   =>  'nullable|required_if:is_backupattorney,1',
          ]);
          if($validator->fails()) {
              return response()->json([
                  'status'  => false,
                  'message' => $validator->errors(),
                  'data'    => []
              ], 400);
          }

          $attorneyPowers   = $request->has('attorney_powers') ? json_encode($request->get('attorney_powers')) : null;
          $attorneyHolders  = $request->has('attorney_holders') ? json_encode($request->get('attorney_holders')) : null;
          $attorneyBackup   = $request->has('attorney_backup') ? json_encode($request->get('attorney_backup')) : null;
          $userId           = $request->user_id;
          $isBackupAttorney = (string)$request->is_backupattorney;

          $financialPowerAttorney = FinancialPowerAttorney::where('user_id',$userId)->first();
          if(!$financialPowerAttorney) {
            $financialPowerAttorney = new FinancialPowerAttorney;
            $financialPowerAttorney->user_id = $userId;
          }

          $financialPowerAttorney->attorney_powers    = $attorneyPowers == null ? $financialPowerAttorney->attorney_powers : $attorneyPowers;
          $financialPowerAttorney->attorney_holders   = $attorneyHolders == null ? $financialPowerAttorney->attorney_holders : $attorneyHolders;
          $financialPowerAttorney->attorney_backup    = $attorneyBackup == null ? $financialPowerAttorney->attorney_backup : $attorneyBackup;
          $financialPowerAttorney->is_backupattorney  = $isBackupAttorney == null ? $financialPowerAttorney->is_backupattorney : $isBackupAttorney;

          // if($financialPowerAttorney->attorney_holders != null
          //   && (($financialPowerAttorney->is_backupattorney == 1 && $financialPowerAttorney->attorney_backup != null)
          //   || ($financialPowerAttorney->is_backupattorney == 0 && $financialPowerAttorney->attorney_backup == null))) {

          // }

          //dd($attorneyHolders);

          if($financialPowerAttorney->save()) {
            return response()->json([
                  'status'  => true,
                  'message' => 'success',
                  'data'    => $financialPowerAttorney
            ], 200);
          } else {
            return response()->json([
                  'status'  => true,
                  'message' => 'Database connectivity error',
                  'data'    => null
            ], 400);
          }
      } catch (\Exception $e) {
        return response()->json([
          'status'  =>  true,
          'message' =>  'Error : '.$e->getMessage().' LINE : '.$e->getLine(),
          'data'    =>  null
        ],500);
      }
    }

    /*
     * function to state information for an user for TellUsAboutYou 1st step
     * @param null
     * @return \Illuminate\Http\JsonResponse
     * */
    public function getStateInfo(){

      try {
        $user = \Auth::user();
        $tellUsAboutYou = TellUsAboutYou::where('user_id',$user->id)->first();
        if($tellUsAboutYou) {
          $state = StatesInfo::where('name',trim($tellUsAboutYou->state))->first();
          return response()->json([
            'status' => true,
            'message'   => 'Success',
            'stateInfo' => $state,
          ],200);
        } else {
          return response()->json([
            'status' => false,
            'message'   => 'Not Found',
            'stateInfo' => null,
          ],400);
        }
      } catch(\Exception $e){
        return response()->json([
            'status' => false,
            'message'   => 'Error',
            'stateInfo' => null,
        ],500);
      }
    }



    /*
     * function to delete Gift for an user
     * @param gifts table id [integer]
     * @return \Illuminate\Http\JsonResponse
     * */
    public function deleteGift($id) {
      try {
          $gift = Gifts::where('id',(int)$id)->where('user_id',\Auth::user()->id)->first();
          if(!$gift) {
            return response()->json([
                  'status'  => false,
                  'message' => 'Gift not found or this gift does not belong to this user',
            ], 400);
          } else {
            if($gift->delete()) {
              return response()->json([
                  'status'  => true,
                  'message' => 'Gift deleted successfully',
              ], 200);
            } else {
              return response()->json([
                  'status'  => false,
                  'message' => 'Gift cannot be deleted',
              ], 400);
            }
          }
      } catch(\Exception $e) {
        return response()->json([
                    'status' => false,
                    'message' => $e->getMessage(),
                    'errorLineNo' => $e->getLine(),
                    'data' => []
                ], 500);
      }
    }


    /*
     * function to add/update Protect finance
     * @return \Illuminate\Http\JsonResponse
     * */

    public function updateProtectFinance(Request $request){
        try {
          //dd($request->all());
          $validator = Validator::make($request->all(), [
              'userId'  =>  'required|numeric|integer|exists:users,id,deleted_at,NULL|in:'.\Auth::user()->id,
              'step'    =>  'required|numeric|between:1,2|integer'
          ]);
          if($validator->fails()) {
              return response()->json([
                  'status'  => false,
                  'message' => $validator->errors(),
                  'data'    => []
              ], 400);
          }

          //validation for attorney durable power
          $validator = Validator::make($request->attorneyPowers, [
              'isDurable'                 =>  'required|numeric|between:0,1|integer',
              'isEffectiveOnIncapacity'   =>  'nullable|required_if:isDurable,1|numeric|between:0,1|integer',
              'isOperatedBusiness'        =>  'required|numeric|between:0,1|integer',
              'isAuthorizeToTrade'        =>  'required|numeric|between:0,1|integer',
              'isGiftOption'              =>  'required|numeric|between:0,1|integer',
              'isAuthorizeToMakeGift'     =>  'nullable|required_if:isGiftOption,1|numeric|between:0,1|integer',
              'isTradeOptionCommodities'  =>  'nullable|numeric|between:0,1|integer',
              'isTspCsrsFersAccount'      =>  'nullable|numeric|between:0,1|integer',
          ]);
          if($validator->fails()) {
              return response()->json([
                  'status'  => false,
                  'message' => $validator->errors(),
                  'data'    => []
              ], 400);
          }

          $step = $request->step;
          $userId = (int)$request->userId;
          $attorneyPowers = $request->attorneyPowers;
          $backupAttorney = $request->backupAttorney;
            if ($step && $userId) {
                $checkExistData = FinancialPowerAttorney::where('user_id',$userId)->first();
                if($step == 1) {
                    if (count($checkExistData)){
                        //dd('here1');
                        // update
                        $checkExistData->user_id = $userId;
                        $checkExistData->attorney_powers = json_encode($attorneyPowers);
                        if($checkExistData->save()){
                            return response()->json([
                                'status' => true,
                                'message' => 'User profile updated successfully',
                                'data' => ['userDetails' => $checkExistData]
                            ], 200);
                        } else {
                            //dd('here2');
                            return response()->json([
                                'status' => false,
                                'message' => 'failed to update user profile ',
                                'data' => []
                            ], 400);
                        }
                    } else {
                        // insert
                        $createData = new FinancialPowerAttorney;
                        $createData->user_id = $userId;
                        $createData->attorney_powers = json_encode($attorneyPowers);
                        if($createData->save()){
                            return response()->json([
                                'status' => true,
                                'message' => 'User profile updated successfully',
                                'data' => ['userDetails' => $createData]
                            ], 200);
                        }else{
                            return response()->json([
                                'status' => false,
                                'message' => 'failed to update user profile ',
                                'data' => []
                            ], 400);
                        }
                    }
                } if($step == 2) {
                    $validator = Validator::make($request->all(), [
                        'isBackupAttorney'  =>  'required|numeric|between:0,1|integer',
                        'attorneyHolders'   =>  'required'
                    ]);
                    if($validator->fails()) {
                        return response()->json([
                            'status'  => false,
                            'message' => $validator->errors(),
                            'data'    => []
                        ], 400);
                    }
                    $attorneyHolders = $request->attorneyHolders;
                    $isBackupAttorney = $request->isBackupAttorney;
                    if (count($checkExistData)){
                        // update
                        $checkExistData->user_id = $userId;
                        $checkExistData->attorney_holders = json_encode($attorneyHolders);
                        if($isBackupAttorney == 1){
                            $checkExistData->is_backupattorney = $isBackupAttorney;
                            $checkExistData->attorney_backup = json_encode($backupAttorney);
                        }
                        if($checkExistData->save()){
                            // dd($backupAttorney[0]['isInformBackup']);
                            if(isset($backupAttorney[0]['isInformBackup']) && $backupAttorney[0]['isInformBackup'] == 1){
                                $emailType = 5; // backup Attroney
                                $fullLegalName = $backupAttorney[0]['backupFullLegalName'];
                                $emailId = $backupAttorney[0]['emailOfBackupAttroney'];
                                app(\App\Http\Controllers\Api\V1\UserController::class)->sendEmail($userId, $fullLegalName, $emailId, $emailType);
                            }
                            if(isset($attorneyHolders[0]['isInform']) && $attorneyHolders[0]['isInform'] == 1){
                                $emailType = 6; // Attroney
                                $fullLegalName = $attorneyHolders[0]['fullLegalName'];
                                $emailId = $attorneyHolders[0]['emailOfAttroney'];
                                app(\App\Http\Controllers\Api\V1\UserController::class)->sendEmail($userId, $fullLegalName, $emailId, $emailType);
                            }
                            return response()->json([
                                'status' => true,
                                'message' => 'User profile updated successfully',
                                'data' => ['userDetails' => $checkExistData]
                            ], 200);
                        }
                    }else{
                        return response()->json([
                            'status' => false,
                            'message' => 'something went wrong,failed to update user profile ',
                            'data' => []
                        ], 400);
                    }
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'something went wrong,user data not found  ',
                    'data' => []
                ], 400);
            }
        }catch(Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'errorLineNo' => $e->getLine(),
                'data' => []
            ], 500);
        }
    }

    /*
     * function to add HealthFinance
     * @return \Illuminate\Http\JsonResponse
     * */

    public function createHealthFinance(Request $request){
        try {
          // return $request->all();
          // $validator = Validator::make($request->all(), [
          //     'userId'          =>  'required|integer|exists:users,id',
          //     'firstLegalName'   =>  'required|string|min:1',
          //     'lastLegalName'   =>  'required|string|min:1',
          //     'phone' => 'required',
          //     'relation'        =>  'required',
          //     'address'         =>  'required',
          //     'city'            =>  'required',
          //     'state'           =>  'required',
          //     'zip'             =>  'required|regex:/^[0-9]{5}(\-[0-9]{4})?$/',
          //     'country'         =>  'required',
          //     'willInform'        =>  'required',
          //     'isBackupAgent'   =>  'nullable|numeric|between:0,1|integer'
          // ]);
          // if (condition) {
          //   # code...
          // }
          // if ($validator->fails()) {
          //     return response()->json([
          //         'status' => false,
          //         'message' => $validator->errors(),
          //         'data' => []
          //     ], 400);
          // }
          //
          // if($request->has('isBackupAgent') && ($request->isBackupAgent == 1)) {
          //   $validator = Validator::make($request->all(), [
          //       'backupFullLegalName' =>  'required|string|min:1',
          //       'backupRelation'      =>  'required',
          //       'backupAddress'       =>  'required',
          //       'backupCity'          =>  'required',
          //       'backupState'         =>  'required',
          //       'backupZip'           =>  'required|regex:/^[0-9]{5}(\-[0-9]{4})?$/',
          //       'backupCountry'       =>  'required',
          //       'isInformBackup'      =>  'required|numeric|between:0,1|integer',
          //       'emailOfBackupAgent'  =>  'required|email'
          //   ]);
          //
          //   if($validator->fails()) {
          //       return response()->json([
          //           'status' => false,
          //           'message' => $validator->errors(),
          //           'data' => []
          //       ], 400);
          //   }
          // }


          $validator = Validator::make($request->all(), [
              'userId' => 'required|numeric|integer|exists:users,id,deleted_at,NULL|in:'.\Auth::user()->id,
          ]);
        
          if($validator->fails()) {
              return response()->json([
                  'status' => false,
                  'message' => $validator->errors(),
                  'data' => []
              ], 400);
          }

          $tellUsAboutYou = TellUsAboutYou::where('user_id', $userId)->first();

          if(!$tellUsAboutYou) {
            return response()->json([
                  'status'  => false,
                  'message' => 'Please fill up Tell Us About You Step',
                  'data'    => []
            ], 400);
          }

          $email  = $backUpEmail = null;
          $userId = $request->userId;
          $healthFinance = HealthFinance::where('userId', $request->userId)->first();
          if (!$healthFinance) {
            $healthFinance         = new HealthFinance();
            $healthFinance->userId = $request->userId;
          }
          $healthFinance->firstLegalName = $request->firstLegalName;
          $healthFinance->lastLegalName  = $request->lastLegalName;
          $healthFinance->phone          = $request->phone;
          $healthFinance->relation       = $request->relation;
          $healthFinance->address        = $request->address;
          $healthFinance->city           = $request->city;
          $healthFinance->state          = $request->state;
          $healthFinance->zip            = $request->zip;
          $healthFinance->country        = $request->country;
          $healthFinance->willInform     = $request->willInform;
          $healthFinance->anyBackupAgent = $request->anyBackupAgent;
          if ($request->willInform == 'true') {
            $email = trim($request->emailOfAgent);
            $healthFinance->emailOfAgent = trim($request->emailOfAgent);
          } else {
            $healthFinance->emailOfAgent = null;
          }

          if ($request->anyBackupAgent == 'true') {
            $healthFinance->backupfirstLegalName = $request->backupfirstLegalName;
            $healthFinance->backuplastLegalName  = $request->backuplastLegalName;
            $healthFinance->backupphone          = $request->backupphone;
            $healthFinance->backupRelation       = $request->backupRelation;
            $healthFinance->backupAddress        = $request->backupAddress;
            $healthFinance->backupCity           = $request->backupCity;
            $healthFinance->backupState          = $request->backupState;
            $healthFinance->backupZip            = $request->backupZip;
            $healthFinance->backupCountry        = $request->backupCountry;
            $healthFinance->willInformBackup     = $request->willInformBackup;
            if ($request->willInformBackup == 'true') {
              $backUpEmail = trim($request->emailOfBackupAgent);
              $healthFinance->emailOfBackupAgent = trim($request->emailOfBackupAgent);
            } else {
              $healthFinance->emailOfBackupAgent = null;
            }
          } else {
            $healthFinance->backupfirstLegalName = null;
            $healthFinance->backuplastLegalName  = null;
            $healthFinance->backupphone          = null;
            $healthFinance->backupRelation       = null;
            $healthFinance->backupAddress        = null;
            $healthFinance->backupCity           = null;
            $healthFinance->backupState          = null;
            $healthFinance->backupZip            = null;
            $healthFinance->backupCountry        = null;
            $healthFinance->emailOfBackupAgent   = null;
          }

          if($healthFinance->save()) {


            if($email != null) {
              \Log::info('email getting send for health care power of attorney');
              $arr = [
                  'firstName'  => $tellUsAboutYou->firstname,
                  'middleName' => $tellUsAboutYou->middlename,
                  'lastName'   => $tellUsAboutYou->lastname,
                  'executiveFirstName' => $request->firstLegalName,
                  'executiveLastName'  => $request->lastLegalName
              ];
              Mail::send('new_emails.health_care', $arr, function($mail) use($email, $arr){
                  $mail->from(config('settings.email'), 'Notice for Health Care Executive');
                  $mail->to($email, $arr['executiveFirstName'].' '.$arr['executiveLastName']);
                  $mail->subject('You are requested to be Health Care Executive');
              });
              if(Mail::failures()) {
                  \Log::info('email sending error for health care power of attorney');
              }
            }

            if($backUpEmail != null) {
              \Log::info('email getting send for backup health care power of attorney');
              $arr = [
                  'firstName'  => $tellUsAboutYou->firstname,
                  'middleName' => $tellUsAboutYou->middlename,
                  'lastName'   => $tellUsAboutYou->lastname,
                  'executiveFirstName' => $request->backupfirstLegalName,
                  'executiveLastName'  => $request->backuplastLegalName
              ];
              Mail::send('new_emails.health_care_backup', $arr, function($mail) use($email, $arr){
                  $mail->from(config('settings.email'), 'Notice for Health Care Executive');
                  $mail->to($email, $arr['executiveFirstName'].' '.$arr['executiveLastName']);
                  $mail->subject('You are requested to be Health Care Executive');
              });
              if(Mail::failures()) {
                  \Log::info('email sending error for health care power of attorney');
              }
            }

            return response()->json([
                'status' => true,
                'message' => 'new health finance created successfully!',
                'data' => ['healthFinance' => $healthFinance]
            ], 200);
          } else {
            return response()->json([
                'status' => false,
                'message' => 'Database connectivity error.. Try after some time!',
                'data' => []
            ], 400);
          }
        } catch(\Exception $e) {
          return response()->json([
              'status'  => false,
              'message' => $e->getMessage(). ' line : '.$e->getLine(),
              'data'    => []
          ], 400);
        }
    }

    /**
    * @param 
    * @return \Illuminate\Http\JsonResponse
    */
    public function fetchHealthFinance()
    {
      try {
        $userID        = \Auth::user()->id;
        $healthFinance = HealthFinance::where('userId', $userID)->first();
        if ($healthFinance) {
          return response()->json([
              'status'  => true,
              'message' => 'Health Finance data fetched',
              'data'    => ['healthFinance' => $healthFinance]
          ], 200);
        } else {
          return response()->json([
              'status'  => false,
              'message' => 'Data not found',
              'data'    => []
          ], 200);
        }
      } catch (\Exception $e) {
        return response()->json([
            'status'  => false,
            'message' => $e->getMessage(). ' line : '.$e->getLine(),
            'data'    => []
        ], 500);
      }
    }

    public function getFinalArrangements() {
      try {
        $userId = \Auth::user()->id;
        $finalArrangement = FinalArrangements::where('user_id',$userId)->first();
        return response()->json([
              'status'  => true,
              'message' => 'Final Arrangements Data',
              'data'    => $finalArrangement
          ], 200);
      } catch(\Exception $e) {
        return response()->json([
            'status'  => false,
            'message' => $e->getMessage(). ' line : '.$e->getLine(),
            'data'    => []
        ], 500);
      }
    }

    /*
     * function to create/update final-agreement table
     * @return \Illuminate\Http\JsonResponse
     * */
     public function updateFinalAgrangement(Request $request){
      try {
        //dd($request->all());
          $validator = Validator::make($request->all(), [
             'user_id'    =>  'required|exists:users,id,deleted_at,NULL',
             'type'       =>  'required|numeric|between:0,1|integer',
             'ashes'      =>  'nullable|string|max:255',
             'arrangements' =>  'nullable|string|max:255'
          ]);
          if($validator->fails()) {
              return response()->json([
                  'status' => false,
                  'message' => $validator->errors(),
                  'data' => []
              ], 400);
          }

          $userId = (int)$request->user_id;
          $type = (string)$request->type; // 0--> buried 1--> Cremated
          $ashes = $request->ashes;
          $arrangements = $request->arrangements;

          $checkExistData = FinalArrangements::where('user_id',$userId)->first();
          if(!$checkExistData) {
            $checkExistData = new FinalArrangements();
            $checkExistData->user_id = $userId;
          }

          $checkExistData->type = $type;
          $checkExistData->ashes = $ashes;
          $checkExistData->arrangements = $arrangements;

          if($checkExistData->save()){
              return response()->json([
                  'status' => true,
                  'message' => 'Final Agreement created/updated successfully',
                  'data' => $checkExistData
              ], 200);
          } else {
              return response()->json([
                  'status' => false,
                  'message' => 'Some error occoured. Try again later',
                  'data' => []
              ], 400);
          }
      } catch(\Exception $e) {
        return response()->json([
                  'status'  => false,
                  'message' => $e->getMessage(). ' line : '.$e->getLine(),
                  'data'    => []
              ], 500);
      }
     }

    /*
    * Function to decide the completion flag in tellUsAboutYou section
    * if all the relative tables are populated it assumes that the tell us about section is complete
    * @return \Illuminate\Http\JsonResponse
    * */
    public function isTellUsAboutYouComplete() {
        //Tables related : tellUsAboutYou, children, guardianInfo

        //checking guardian's info table
        $guardianInfo = GuardianInfo::where('user_id',\Auth::user()->id)->first();

        //checking childrens table
        $childrens = Children::where('user_id',\Auth::user()->id)->first();

        //checkinh tellUsAboutYouTable
        $tellUsAboutYou = TellUsAboutYou::where('user_id',\Auth::user()->id)->first();

        //if step 1 is completed by the user
        //i.e fill up tellUsAboutYou Table
        if($tellUsAboutYou) {

            //if the user has single status : single,widowed,divorced
            $relationshipStatus = $tellUsAboutYou->marital_status;
            if($relationshipStatus == 'M' || $relationshipStatus == 'R') {
                //if spouse info is not present then mark this step as incomplete
                $spouse = User::where('parent_id',\Auth::user()->id)->first();
                if(!$spouse) {
                    $tellUsAboutYou->is_complete = '0';
                    $tellUsAboutYou->save();

                    return false;
                }
            }

            //if the number of children is more than 1
            //and no names are inserted for children then step is incomplete
            if($tellUsAboutYou->children > 0) {
                //if childrens info is not absent then this step is incomplete
                if(!$childrens) {
                    $tellUsAboutYou->is_complete = '0';
                    $tellUsAboutYou->save();

                    return false;
                }

                //if children is present and no guardians are appointed for the minor children
                //then the step is in complete
                if(!$guardianInfo) {
                    $tellUsAboutYou->is_complete = '0';
                    $tellUsAboutYou->save();

                    return false;
                }
            }

            $tellUsAboutYou->is_complete = '1';
            $tellUsAboutYou->save();
            return true;
        } else {

            return false;
        }
    }

    /*
     * function to get user details
     * @return \Illuminate\Http\JsonResponse
     * */

    public function getUserDetails($id) {
      try {
        $responseDataArray    = [];
        $user                 = User::find($id);

        if(!$user) {
          return response()->json([
              'status'  => false,
              'message' => 'User not found!',
              'data'    => []
          ], 400);
        }

        self::isTellUsAboutYouComplete();

        $tellUsAboutYouUser   = TellUsAboutYou::where('user_id',$user->id)->first();
        $spouse               = User::where('parent_id',$user->id)->first();
        $tellUsAboutYouSpouse = null;
        if($spouse) {
          $tellUsAboutYouSpouse = TellUsAboutYou::where('user_id',$spouse->id)->first();
        }


        //dd( $this->fetchUserInformation($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse));
        //step : 1
        array_push($responseDataArray, $this->fetchUserInformation($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse));

        //step:2
        array_push($responseDataArray, $this->fetchChildren($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse));

        //step:3
        array_push($responseDataArray, $this->fetchGuardianInfo($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse));

        //step:4
        array_push($responseDataArray, $this->fetchLovedOnesInfo($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse));

        //step:5
        array_push($responseDataArray, $this->fetchPersonalRepresentativeInfo($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse));

        //step:6
        array_push($responseDataArray, $this->fetchTangiblePropertyInfo($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse));

        //step:7
        array_push($responseDataArray, $this->fetchGiftInfo($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse));

        //step:8
        array_push($responseDataArray, $this->fetchSpecialGiftInfo($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse));

        //step:9
        array_push($responseDataArray, $this->fetcgContingentBeneficiary($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse));

        //step:10
        array_push($responseDataArray, $this->fetchEstateDisrtibuteInfo($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse));

        //step:11
        array_push($responseDataArray, $this->fetchDisinheritInfo($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse));

        return response()->json([
          'status'  =>  200,
          'message' =>  'Fetched user information successfully',
          'data'    =>  $responseDataArray
        ], 200);
      } catch (\Exception $e) {
        return response()->json([
            'status'      => false,
            'message'     => $e->getMessage(),
            'errorLineNo' => $e->getLine(),
            'data' => []
        ], 500);
      }
    }


    /*
     * function to get user and spouse info related to an user
     * @params user , spouse,  tellUsAboutYou instance for both user and spouse
     * @return response array
     * */
    private function fetchUserInformation($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse) {
      $stepValue  = 1;
      if($tellUsAboutYouUser) {
        $userInfoArray = [
          'step'    =>  $stepValue,
          'data'    =>  [
            'userInfo'   => $tellUsAboutYouUser,
            'spouseInfo' => $spouse != null ? $spouse : null
          ]
        ];
        return $userInfoArray;
      }
      return [
        'step'    =>  $stepValue,
        'data'    =>  null
      ];
    }

    /*
     * function to get children info related to an user and spouse
     * @params user , spouse,  tellUsAboutYou instance for both user and spouse
     * @return response array
     * */
    private function fetchChildren($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse) {
      $stepValue  = 2;
      $children   = Children::where('user_id', $user->id)->get();
      $childrenInfoArray  = [];
      foreach ($children as $key => $child) {
        array_push($childrenInfoArray, $child);
      }
      $totalChildren          = count($children);
      $isDeceasedChildren     = $tellUsAboutYouUser != null && $tellUsAboutYouUser->deceased_children == '1' ? 'Yes' : 'No';
      $deceasedChildrenNames  = $tellUsAboutYouUser != null && $tellUsAboutYouUser->deceased_children_names ? $tellUsAboutYouUser->deceased_children_names : null;
      $childrenArray = [
        'totalChildren'         =>  $totalChildren,
        'childrenInformation'   =>  $childrenInfoArray,
        'desceasedChildren'   =>  $isDeceasedChildren,
        'deceasedChildrenNames'  =>  $deceasedChildrenNames
      ];
      return [
        'step'  =>  $stepValue,
        'data'  =>  $childrenArray
      ];
    }

    /*
     * function to get guardian info related to an user and spouse
     * @params user , spouse,  tellUsAboutYou instance for both user and spouse
     * @return response array
     * */
    private function fetchGuardianInfo($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse) {
      $stepValue  = 3;
      $backupGuardianInfo = GuardianInfo::where('user_id',$user->id)->where('is_backup','1')->get();
      $guardianInfo       = GuardianInfo::where('user_id',$user->id)->where('is_backup','!=','1')->get();
      $guardianInfoArray  = [
        'isGuardianMinorChildren' =>  $tellUsAboutYouUser != null && $tellUsAboutYouUser->guardian_minor_children == 1 ? 'Yes' : 'No',
        'guardian'                =>  $guardianInfo == null ? null : $guardianInfo,
        'isBackUpGuardian'        =>  $backupGuardianInfo->count() == 0 ? 'No' : 'Yes',
        'backupGuardian'          =>  $backupGuardianInfo
      ];
      return [
        'step'  =>  $stepValue,
        'data'  =>  $guardianInfoArray
      ];
    }

    /*
     * function to get loved ones info related to an user and spouse
     * @params user , spouse,  tellUsAboutYou instance for both user and spouse
     * @return response array
     * */
    private function fetchLovedOnesInfo($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse) {
      $stepValue  = 4;
      $lovedOnes  = ProvideYourLovedOnes::where('user_id',$user->id)->first();
      if($lovedOnes) {
        $responseArray = [
          'step' =>  $stepValue,
          'data' =>  ['lovedOnesInfo' => [$lovedOnes]]
        ];
        return $responseArray;
      }
      $responseArray = [
        'step' =>  $stepValue,
        'data' => null
      ];
      return $responseArray;
    }

    /*
     * function to get representative info related to an user and spouse
     * @params user , spouse,  tellUsAboutYou instance for both user and spouse
     * @return response array
     * */
    private function fetchPersonalRepresentativeInfo($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse) {
      $stepValue        = 5;
      $representatives  = PersonalRepresentatives::where('user_id',$user->id)->get();


      $personalRepresentative       = PersonalRepresentatives::where('user_id',$user->id)->where('is_backuprepresentative','0')->first();
      $backupPersonalRepresentative = PersonalRepresentatives::where('user_id',$user->id)->where('is_backuprepresentative','1')->first();
      return [
        'step'  => $stepValue,
        'isPersonalRepresentative'        =>  $personalRepresentative == null ? 'No' : 'Yes',
        'personalRepresentative'          =>  [$personalRepresentative],
        'isBackupPersonalRepresentative'  =>  $backupPersonalRepresentative == null ? 'No' : 'Yes',
        'backupPersonalRepresentative'    =>  [$backupPersonalRepresentative]
      ];
    }

    /*
     * function to get TangibleProperty info related to an user and spouse
     * @params user , spouse,  tellUsAboutYou instance for both user and spouse
     * @return response array
     * */
    private function fetchTangiblePropertyInfo($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse) {
       $stepValue      = 6;
       //responseArray defined to return response array to calling function
       $responseArray  = ['step' => null, 'data' => null];
       $data = ProvideYourLovedOnes::where('user_id',$user->id)->first();

       if($data) {
         $responseArray = [
           'step' =>  $stepValue,
           'data' => [
             //'tangibleProperty' => $data,
             'is_tangible_property_distribute'  =>  $data->is_tangible_property_distribute,
             'tangible_property_distribute'     =>  $data->tangible_property_distribute,
             'residue_to_partner_first'         =>  $data->residue_to_partner_first
           ]
         ];
         return $responseArray;
       } else {
         $responseArray = [
           'step' => $stepValue,
           'data' => null
         ];
         return $responseArray;
       }
    }

    /*
     * function to get gift info related to an user and spouse
     * @params user , spouse,  tellUsAboutYou instance for both user and spouse
     * @return response array
     * */
    private function fetchGiftInfo($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse) {
       $stepValue   = 7;
       $gifts       = Gifts::where('user_id',$user->id)->get();
       $giftsArray  = [];
       foreach ($gifts as $key => $eachGift) {
          array_push($giftsArray, $eachGift);
       }
       $responseArray = [
         'step' =>  $stepValue,
         'data' => [
           'isGift' => count($gifts),
           'gift'   => $giftsArray
         ]
       ];
       return $responseArray;
    }

    /*
     * function to get specal gift info related to an user and spouse
     * @params user , spouse,  tellUsAboutYou instance for both user and spouse
     * @return response array
     * */
    private function fetchSpecialGiftInfo($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse) {
       $stepValue = 8;
       $gift      = ProvideYourLovedOnes::where('user_id',$user->id)->first();
       if($gift) {
         return [
           'step' => $stepValue,
           'data' => [
             'isSpecificGift' => $gift->specific_gifts == 1 ? 'Yes' : 'No'
           ]
         ];
       }
       return [
         'step' => $stepValue,
         'data' => []
       ];
    }

    /*
     * function to get specal gift info related to an user and spouse
     * @params user , spouse,  tellUsAboutYou instance for both user and spouse
     * @return response array
     * */
    private function fetcgContingentBeneficiary($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse) {
       $stepValue   = 9;
       $beneficiary = ContingentBeneficiary::where('user_id',$user->id)->first();
       if($beneficiary) {
         return [
           'step' => $stepValue,
           'data' => [
             'isContingentBeneficiary' => $beneficiary->is_contingent_beneficiary,
              'distribution_type'=>$beneficiary->distribution_type,
              'info'=>$beneficiary->info,
           ]
         ];
       }
       return [
         'step' => $stepValue,
         'data' => [
           'isContingentBeneficiary' => null
         ]
       ];
    }

    /*
     * function to get estate distribute info related to an user and spouse
     * @params user , spouse,  tellUsAboutYou instance for both user and spouse
     * @return response array
     * */
    private function fetchEstateDisrtibuteInfo($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse) {
      $stepValue   = 10;
      $estate = EstateDisrtibute::where('user_id', $user->id)->first();
      $data   = [];
      if($estate) {
        $type = $estate->distribute_type;
        switch($type) {
          case '1' :  $data = ['type' => '1' , 'totalInfo' => $estate->to_a_single_beneficiary];
                      break;
          case '2' :  $data = ['type' => '2' , 'totalInfo' => $estate->to_multiple_beneficiary];
                      break;
          case '3' :  $data = ['type' => '3' , 'totalInfo' => $estate->to_my_heirs_law];
                      break;
          case '4' :  $data = ['type' => '4' , 'totalInfo' => $estate->some_other_way];
                      break;
          default  :  break;
        }
      }
      return [
        'step' => $stepValue,
        'data' => $data
      ];
    }

     /*
      * function to get inherit related to an user and spouse
      * @params user , spouse,  tellUsAboutYou instance for both user and spouse
      * @return response array
      * */
     private function fetchDisinheritInfo($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse) {
       $stepValue   = 11;
       $disinherit  = Disinherit::where('user_id', $user->id)->first();
       $data        = [];
       if($disinherit) {
         $data = $disinherit;
         return [
           'step' => $stepValue,
           'data' => $data
         ];
       }
       return [
         'step' => $stepValue,
         'data' => $data
       ];
     }

}
