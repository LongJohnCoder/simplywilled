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
use App\PetGuardian;

class UserManagementController extends Controller
{
    public function mailFriend(Request $request) {

      try {

        $validator = Validator::make($request->all(), [
          'email'     =>  'required|email',
          'firstname' =>  'required|string',
          'lastname'  =>  'required|string'
        ]);
        if($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->errors(),
                'data'    => []
            ], 400);
        }

        $user = \Auth::user();
        //mail a friend
        $email = $request->email;
        $friendFirstname  = $request->firstname;
        $friendLastname   = $request->lastname;

        $tuay = TellUsAboutYou::where('user_id', $user->id)->first();

        if($tuay) {
          \Log::info('email getting send for spouse invitation');
          $arr = [
              'firstName'         =>  $tuay->firstname,
              'fullName'          =>  $tuay->fullname,
              'email'             =>  $email,
              'friendFirstname'   =>  $friendFirstname,
              'friendLastname'    =>  $friendLastname
          ];

          Mail::send('new_emails.friend_invitation', $arr, function($mail) use($arr){
              $mail->from(config('settings.email'), 'Friend Invitation to Simplywilled.com');
              $mail->to(strtolower($arr['email']), 'Invitation to Simplywilled')
              ->subject('Your friend invited you to Simplywilled.com');
          });


          if(Mail::failures()) {
              \Log::info('email sending error for friend invitation');
              return response()->json([
                  'status'  => false,
                  'message' => 'failed to send email to friend',
                  'data'    => []
              ], 400);
          }

          return response()->json([
                  'status'  => true,
                  'message' => 'email sent successfully to friend',
                  'data'    => []
              ], 200);

        } else {
          return response()->json([
                  'status'  => false,
                  'message' => 'Please fill tell us about you details first',
                  'data'    => []
              ], 400);
        }

      } catch (\Exception $e) {
        return response()->json([
              'status'  => false,
              'message' => 'ERROR : '.$e->getMessage().' LINE : '.$e->getLine(),
              'data'    => []
        ], 500);
      }
    }

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
    * Function to decide the completion flag in protect your finance section
    * if all the relative tables are populated it assumes that the protect-your-finance section is complete
    * @return boolean
    * */
    public function isProtectYourFinanceComplete() {
      $user = \Auth::user();
      $fpa  = FinancialPowerAttorney::where('user_id', $user->id)->first();
      $tuay = TellUsAboutYou::where('user_id',$user->id)->first();


      if($tuay && $fpa) {

        if($tuay->state == 'Minnesota' || $tuay->state == 'Florida' || $tuay->state == 'Maryland' || $tuay->state == 'New York') {

          if($fpa->attorney_holders == null || $fpa->attorney_backup == null) {

            $fpa->is_complete = '0';
            $fpa->save;
            return false;
          } else {
            $fpa->is_complete = '1';
            $fpa->save;
            return true;
          }
        } elseif($fpa->attorney_powers != null && $fpa->attorney_holders != null && $fpa->attorney_backup != null) {

            $fpa->is_complete = '1';
            $fpa->save;
            return true;
        } else {

          $fpa->is_complete = '0';
          $fpa->save;
          return false;
        }
      } else {

        if($fpa) {

          $fpa->is_complete = '0';
          $fpa->save;
          return false;
        }
        return false;
      }
    }

    /*
    * Function to decide the completion flag in Health Finance section
    * if all the relative tables are populated it assumes that the health finance section is complete
    * @return boolean
    * */
    public function isHealthFinanceComplete() {
      $user = \Auth::user();
      $hf = HealthFinance::where('userId', $user->id)->first();

      if($hf)
        return true;

      return false;
    }

    public function isFinalArrangementsComplete() {
      $user = \Auth::user();
      $fa =FinalArrangements::where('user_id', $user->id)->first();
      if($fa)
        return true;

      return false;
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
              'is_backupattorney' =>  'nullable|numeric|between:0,1|integer',
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

          $tellUsAboutYou = TellUsAboutYou::where('user_id', $userId)->first();
          if(!$tellUsAboutYou) {
            return response()->json([
                  'status'  => false,
                  'message' => 'Please fill Tell Us About You details',
                  'data'    => []
            ], 400);
          }

          $financialPowerAttorney = FinancialPowerAttorney::where('user_id',$userId)->first();
          if(!$financialPowerAttorney) {
            $financialPowerAttorney = new FinancialPowerAttorney;
            $financialPowerAttorney->user_id = $userId;
          } else {
            $previousHoldersArr = json_decode($financialPowerAttorney->attorney_holders, true);
            $holderEmail = isset($previousHoldersArr['email']) ? $previousHoldersArr['email'] : null;

            $previousBackupArr  = json_decode($financialPowerAttorney->attorney_backup, true);
            $backupEmail = isset($previousBackupArr['email']) ? $previousBackupArr['email'] : null;
          }

          //code to erase pre-existing email if is-inform is 0
          $attorneyPowersData = json_decode($attorneyPowers, true);
          $attorneyHoldersData = json_decode($attorneyHolders, true);

          if ($attorneyPowersData != null && array_key_exists('is_inform', $attorneyPowersData) && $attorneyPowersData['is_inform'] != 1) {
            $attorneyPowersData['email'] = null;
            $attorneyPowers = json_encode($attorneyPowersData);
          }

          if ($attorneyHoldersData != null && array_key_exists('is_inform', $attorneyHoldersData) && $attorneyHoldersData['is_inform'] != 1) {
            $attorneyHoldersData['email'] = null;
            $attorneyHolders = json_encode($attorneyHoldersData);
          }

          $financialPowerAttorney->attorney_powers    = $attorneyPowers == null ? $financialPowerAttorney->attorney_powers : $attorneyPowers;
          $financialPowerAttorney->attorney_holders   = $attorneyHolders == null ? $financialPowerAttorney->attorney_holders : $attorneyHolders;
          $financialPowerAttorney->attorney_backup    = $attorneyBackup == null ? $financialPowerAttorney->attorney_backup : $attorneyBackup;
          $financialPowerAttorney->is_backupattorney  = $isBackupAttorney == null ? $financialPowerAttorney->is_backupattorney : $isBackupAttorney;

          if($financialPowerAttorney->save()) {

            $attorneyHoldersArr = $attorneyHolders != null ? json_decode($attorneyHolders, true) : [];

            if(isset($attorneyHoldersArr['is_inform']) && $attorneyHoldersArr['is_inform'] == 1 && isset($attorneyHoldersArr['email']) && strlen(trim($attorneyHoldersArr['email'])) > 0) {

              $flag = true;
              if($holderEmail != null && strtolower(trim($holderEmail)) == strtolower(trim($attorneyHoldersArr['email']))) {
                $flag = false;
              }

              if($flag) {
                \Log::info('email getting send for power of attorney 1st choice');
                $arr = [
                    'firstName'   => $tellUsAboutYou->firstname,
                    'middleName'  => $tellUsAboutYou->middlename,
                    'lastName'    => $tellUsAboutYou->lastname,
                    'fullname'    => isset($attorneyHoldersArr['fullname']) ? $attorneyHoldersArr['fullname'] : '',
                    'email'       => $attorneyHoldersArr['email'],
                    'token'         =>  Crypt::encryptString($userId)

                ];
                Mail::send('new_emails.power_of_attorney', $arr, function($mail) use($arr){
                    $mail->from(config('settings.email'), 'Notice for Power Of Attorney');
                    $mail->to($arr['email'], $arr['fullname']);
                    $mail->subject('SimplyWilled.com – You have been appointed as a Financial Power of Attorney');
                });

                if(Mail::failures()) {
                    \Log::info('email sending error for Power of Attorney 1st choice');
                }
              }
            }

            $attorneyBackupArr  = $attorneyBackup != null ? json_decode($attorneyBackup, true) : [];

            if(isset($attorneyBackupArr['is_inform']) && $attorneyBackupArr['is_inform'] == 1 && isset($attorneyBackupArr['email']) && strlen(trim($attorneyBackupArr['email'])) > 0) {

              $flag = true;
              if($backupEmail != null && strtolower(trim($backupEmail)) == strtolower(trim($attorneyBackupArr['email']))) {
                $flag = false;
              }

              if($flag) {
                \Log::info('email getting send for power of attorney 2nd choice');
                $arr = [
                    'firstName'   => $tellUsAboutYou->firstname,
                    'middleName'  => $tellUsAboutYou->middlename,
                    'lastName'    => $tellUsAboutYou->lastname,
                    'fullname'    => isset($attorneyBackupArr['fullname']) ? $attorneyBackupArr['fullname'] : '',
                    'email'       => $attorneyBackupArr['email'],
                    'token'         =>  Crypt::encryptString($userId)

                ];
                Mail::send('new_emails.power_of_attorney_backup', $arr, function($mail) use($arr){
                    $mail->from(config('settings.email'), 'Notice for Power Of Attorney 2nd choice');
                    $mail->to(strtolower($arr['email']), $arr['fullname']);
                    $mail->subject('SimplyWilled.com – You have been appointed as a Backup Financial Power of Attorney');
                });

                if(Mail::failures()) {
                    \Log::info('email sending error for Power of Attorney 2nd choice');
                }
              }
            }

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

          $email  = $backUpEmail = null;
          $userId = $request->userId;

          $tellUsAboutYou = TellUsAboutYou::where('user_id', $userId)->first();
          if(!$tellUsAboutYou) {
            return response()->json([
                  'status'  => false,
                  'message' => 'Please fill up Tell Us About You Step',
                  'data'    => []
            ], 400);
          }

          $healthFinanceEmail = $healthFinanceBackupEmail = null;

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
          $healthFinance->fullname       = $request->fullname;
          $healthFinance->relationOther  = $request->relationOther;
          if ($request->willInform == 'true') {
            $healthFinanceEmail = $healthFinance->emailOfAgent;
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
            $healthFinance->backupFullname       = $request->backupFullname;
            $healthFinance->backupRelationOther  = $request->backupRelationOther;
            if ($request->willInformBackup == 'true') {
              $healthFinanceBackupEmail = $healthFinance->emailOfBackupAgent;
              $backUpEmail = trim($request->emailOfBackupAgent);
              $healthFinance->emailOfBackupAgent = strtolower(trim($request->emailOfBackupAgent));
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
            $healthFinance->backupRelationOther  = null;
          }

          if($healthFinance->save()) {


            if(isset($email) && $email != null) {

              $flag = true;
              if($healthFinanceEmail != null && strlen($healthFinanceEmail) > 0 && strtolower(trim($healthFinanceEmail)) == strtolower(trim($email))) {
                $flag = false;
              }

              if($flag) {
                \Log::info('email getting send for health care power of attorney');
                $arr = [
                    'firstName'  => $tellUsAboutYou->firstname,
                    'middleName' => $tellUsAboutYou->middlename,
                    'lastName'   => $tellUsAboutYou->lastname,
                    'executiveFullName' => $request->fullname,
                    'executiveFirstName' => $request->firstLegalName,
                    'executiveLastName'  => $request->lastLegalName,
                    'token'      =>  Crypt::encryptString($request->userId)

                ];
                Mail::send('new_emails.health_care', $arr, function($mail) use($email, $arr){
                    $mail->from(config('settings.email'), 'Notice for Healthcare Executive');
                    $mail->to(strtolower($email), $arr['executiveFirstName'].' '.$arr['executiveLastName']);
                    $mail->subject('SimplyWilled.com – You have been appointed as a Healthcare Agent');
                });
                if(Mail::failures()) {
                    \Log::info('email sending error for health care power of attorney');
                }
              }

            }

            if(isset($backUpEmail) && $backUpEmail != null) {

              $flag = true;
              if($healthFinanceBackupEmail != null && strlen($healthFinanceBackupEmail) > 0 && strtolower(trim($healthFinanceBackupEmail)) == strtolower(trim($backUpEmail))) {
                $flag = false;
              }

              if($flag) {
                \Log::info('email getting send for backup health care power of attorney');
                $arr = [
                    'firstName'  => $tellUsAboutYou->firstname,
                    'middleName' => $tellUsAboutYou->middlename,
                    'lastName'   => $tellUsAboutYou->lastname,
                    'executiveFullName' => $request->backupFullname,
                    'executiveFirstName' => $request->backupfirstLegalName,
                    'executiveLastName'  => $request->backuplastLegalName,
                    'token'      =>  Crypt::encryptString($request->userId)
                ];
                Mail::send('new_emails.health_care_backup', $arr, function($mail) use($backUpEmail, $arr){
                    $mail->from(config('settings.email'), 'Notice for Healthcare Executive');
                    $mail->to(strtolower($backUpEmail), $arr['executiveFirstName'].' '.$arr['executiveLastName']);
                    $mail->subject('SimplyWilled.com – You have been appointed as a Backup Healthcare Agent');
                });
                if(Mail::failures()) {
                    \Log::info('email sending error for health care power of attorney');
                }
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

          $validator = Validator::make($request->all(), [
             'user_id'    =>  'required|exists:users,id,deleted_at,NULL',
             'type'       =>  'required|numeric|between:0,2|integer',
             'ashes'      =>  'nullable|string|max:255',
             'arrangements' =>  'nullable|string|max:255',
             'some_other_way' => 'nullable|required_if:type,2'
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
          $someOtherWay = $request->some_other_way;

          $checkExistData = FinalArrangements::where('user_id',$userId)->first();
          if(!$checkExistData) {
            $checkExistData = new FinalArrangements();
            $checkExistData->user_id = $userId;
          }

          $checkExistData->type = $type;
          $checkExistData->ashes = $ashes;
          $checkExistData->arrangements = $arrangements;

          if ($type == 2) {
            $checkExistData->some_other_way = $someOtherWay;
          } else {
            $checkExistData->some_other_way = null;
          }

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

        $petGuardian  = PetGuardian::where('user_id', \Auth::user()->id)->first();
        //if step 1 is completed by the user
        //i.e fill up tellUsAboutYou Table

        if($tellUsAboutYou) {

            $referral = $tellUsAboutYou->referral;
            if($referral !== null) {
              if( strtolower(trim($referral)) == 'other') {
                $referral = $tellUsAboutYou->referral_other;
              }
            }

            $referralFlag = strlen(trim($referral)) > 0 ? true : false; 

            //these necessary fields needs to be completed for any basic user
            if(strlen(trim($tellUsAboutYou->fullname)) > 0 
              && strlen(trim($tellUsAboutYou->dob)) > 0 
              && strlen(trim($tellUsAboutYou->gender)) > 0
              && strlen(trim($tellUsAboutYou->phone)) > 0
              && strlen(trim($tellUsAboutYou->email)) > 0
              && strlen(trim($tellUsAboutYou->address)) > 0
              && strlen(trim($tellUsAboutYou->city)) > 0
              && strlen(trim($tellUsAboutYou->state)) > 0
              && strlen(trim($tellUsAboutYou->zip)) > 0
              && $referralFlag) {

            } else {
              return false;
            }

            //if the user has single status : single,widowed,divorced

            //if the number of children is more than 1
            //and no names are inserted for children then step is incomplete
            if($tellUsAboutYou->children > 0) {


                //if childrens info is not absent then this step is incomplete
                if(!$childrens) {
                    $tellUsAboutYou->is_complete = '0';
                    $tellUsAboutYou->save();
                    return false;
                }

                if($tellUsAboutYou->guardian_minor_children == 1) {

                  //if children is present and no guardians are appointed for the minor children
                  //then the step is in complete
                  if(!$guardianInfo) {
                      $tellUsAboutYou->is_complete = '0';
                      $tellUsAboutYou->save();
                      return false;
                  }
                }
            }

            if($tellUsAboutYou->has_pet != 0) {
              if(!$petGuardian) {
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
    * Function to decide the completion flag in provide your loved ones section
    * if all the relative tables are populated it assumes that the provide your loved ones section is complete
    * @return \Illuminate\Http\JsonResponse
    * */
    public function isProvideYourLovedOnesComplete() {
      $user = \Auth::user();
      $pylo = ProvideYourLovedOnes::where('user_id', $user->id)->first();
      $pr   = PersonalRepresentatives::where('user_id', $user->id)->first();

      $flag = false;
      if($pr) {

        if($pylo) {


          if($pylo->specific_gifts == 0) {

            $est = EstateDisrtibute::where('user_id', $user->id)->first();

            if($est) {

              $cnbf = ContingentBeneficiary::where('user_id', $user->id)->first();

              if($cnbf) {

                if($cnbf->is_contingent_beneficiary == 1) {

                  if($cnbf->distribution_type == 'to_my_heirs') {

                    $flag = true;

                  } elseif($cnbf->distribution_type == 'other' && strlen($cnbf->info) > 0 ) {

                    $flag = true;
                  } else {

                    $flag = false;
                  }

                } elseif($cnbf->is_contingent_beneficiary == 0) {

                  $flag = true;
                }

                $ds = Disinherit::where('user_id', $user->id)->first();

                if($ds->disinherit == 1 && strlen($ds->fullname) > 0 && strlen($ds->gender) > 0){

                  if(strtolower($ds->relationship) == 'other' && strlen($ds->other_relationship) > 0) {

                    $flag = true;

                  } elseif(strlen($ds->relationship) > 0) {

                    $flag = true;

                  } else {

                    $flag = false;

                  }
                } elseif($ds->disinherit == 0) {

                  $flag = true;

                } else {

                  $flag = false;

                }

              } else {

                $flag = false;
              }

            } else {

              $flag = false;
            }

          } elseif($pylo->specific_gifts == 1) {

            if( ($pylo->is_tangible_property_distribute == 4 && strlen(trim($pylo->tangible_property_distribute)) > 0) ||
                ($pylo->is_tangible_property_distribute >= 1 && $pylo->is_tangible_property_distribute < 4) ) {

              $gft = Gifts::where('user_id', $user->id)->first();

              if($gft) {
                $flag = true;
              } else {
                  if ($pylo->not_this_time == 1) {
                      $flag = true;
                  } else {
                      $flag = false;
                  }
              }
            }

          }

          $pylo->is_complete = $flag ? '1' : '0';
          $pylo->save;
          return $flag;

        } else {

          $flag = false;
        }

      } else {

        $flag = false;
      }
      return $flag;
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

        //step:12
        array_push($responseDataArray, $this->fetchPetGuardianInfo($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse));

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
     * function to get pet guardian info related to an user and spouse
     * @params user , spouse,  tellUsAboutYou instance for both user and spouse
     * @return response array
     * */
    private function fetchPetGuardianInfo($user, $spouse, $tellUsAboutYouUser, $tellUsAboutYouSpouse) {
      $stepValue  = 12;
      $backupGuardianInfo = PetGuardian::where('user_id',$user->id)->where('is_backup','1')->get();
      $guardianInfo       = PetGuardian::where('user_id',$user->id)->where('is_backup','!=','1')->get();
      $guardianInfoArray  = [
        'isPetGuardian'               =>  $guardianInfo->count() > 0 ? 'Yes' : 'No',
        'petGuardian'                    =>  $guardianInfo == null ? null : $guardianInfo,
        'isBackUpPetGuardian'            =>  $backupGuardianInfo->count() == 0 ? 'No' : 'Yes',
        'backUpPetGuardian'              =>  $backupGuardianInfo
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
       $provideYourLovedOnes = ProvideYourLovedOnes::where('user_id',$user->id)->first();
       foreach ($gifts as $key => $eachGift) {
          array_push($giftsArray, $eachGift);
       }
       $responseArray = [
         'step' =>  $stepValue,
         'data' => [
           'isGift' => count($gifts),
           'gift'   => $giftsArray,
           'not_this_time' => isset($provideYourLovedOnes->not_this_time) ? $provideYourLovedOnes->not_this_time : []
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
             'isSpecificGift' =>  $gift->specific_gifts == 1 ? 'Yes' : 'No',
             'charity'        =>  $gift->charity,
             'individual'     =>  $gift->individual,
             'not_this_time'  =>  $gift->not_this_time
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


    /*
     * function to get Tell Us About You progress API
     * @params none
     * @return json response
    * */
    public function fetchTuayProgress() {

      try {
        return response()->json([
          'status'      => false,
            'message'     => 'Progress data fetched successfully',
            'data'        => self::isTellUsAboutYouComplete()
        ]);
      } catch (\Exception $e) {
          return response()->json([
              'status'      => false,
              'message'     => $e->getMessage(),
              'errorLineNo' => $e->getLine(),
              'data'        => null
          ], 500);
      }
    }

    /*
     * function to get Protect Your loved ones progress API
     * @params none
     * @return json response
    * */
    public function fetchPyloProgress() {

      try {
        return response()->json([
            'status'      => false,
            'message'     => 'Progress data fetched successfully',
            'data'        => self::isProvideYourLovedOnesComplete()
        ]);
      } catch (\Exception $e) {
          return response()->json([
              'status'      => false,
              'message'     => $e->getMessage(),
              'errorLineNo' => $e->getLine(),
              'data'        => null
          ], 500);
      }
    }

    /*
    * function to get Protect Your Finances progress API
    * @params none
    * @return json response
    * */
    public function fetchPyfProgress() {

      try {
        return response()->json([
            'status'      => false,
            'message'     => 'Progress data fetched successfully',
            'data'        => self::isProtectYourFinanceComplete()
        ]);
      } catch (\Exception $e) {
          return response()->json([
              'status'      => false,
              'message'     => $e->getMessage(),
              'errorLineNo' => $e->getLine(),
              'data'        => null
          ], 500);
      }
    }

    /*
    * function to get Health Finance progress API
    * @params none
    * @return json response
    * */
    public function fetchHealthProgress() {
      try {
        return response()->json([
            'status'      => false,
            'message'     => 'Progress data fetched successfully',
            'data'        => self::isHealthFinanceComplete()
        ],200);
      } catch (\Exception $e) {
          return response()->json([
              'status'      => false,
              'message'     => $e->getMessage(),
              'errorLineNo' => $e->getLine(),
              'data'        => null
          ], 500);
      }
    }

    /*
    * function to get Final Arrangements progress API
    * @params none
    * @return json response
    * */
    public function fetchFaProgress() {
      try {
        return response()->json([
            'status'      => false,
            'message'     => 'Progress data fetched successfully',
            'data'        => self::isFinalArrangementsComplete()
        ],200);
      } catch (\Exception $e) {
          return response()->json([
              'status'      => false,
              'message'     => $e->getMessage(),
              'errorLineNo' => $e->getLine(),
              'data'        => null
          ], 500);
      }
    }


    public function fetchTotalCompletion() {
      try {

        return response()->json([
          'status'  =>  true,
          'message' =>  'Total progress fetched successfully',
          'data'    =>  [
            'tell_us_about_you'       =>  self::isTellUsAboutYouComplete(),
            'provide_your_loved_ones' =>  self::isProvideYourLovedOnesComplete(),
            'protect_your_finance'    =>  self::isProtectYourFinanceComplete(),
            'health_finance'          =>  self::isHealthFinanceComplete(),
            'final_arrangements'      =>  self::isFinalArrangementsComplete()
          ]
        ], 200);

      } catch (\Exception $e) {
          return response()->json([
              'status'      => false,
              'message'     => $e->getMessage(),
              'errorLineNo' => $e->getLine(),
              'data'        => null
          ], 500);
      }
    }

}
