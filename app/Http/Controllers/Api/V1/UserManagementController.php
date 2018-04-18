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

class UserManagementController extends Controller
{
    /*
     * function to add/update Protect finance
     * @return \Illuminate\Http\JsonResponse
     * */

    public function updateProtectFinance(Request $request){
        try {
        $step = $request->step;
        $userId = $request->userId;
        $isBackupAttorney = $request->isBackupAttorney;
        $attorneyPowers = $request->attorneyPowers;
        $attorneyHolders = $request->attorneyHolders;
        $backupAttorney = $request->backupAttorney;
            if ($step && $userId) {
                $checkExistData = FinancialPowerAttorney::where('user_id',$userId)->first();
                if($step == 1) {
                    if (count($checkExistData)){
                        // update
                        $checkExistData->user_id = $userId;
                        $checkExistData->attorney_powers = json_encode($attorneyPowers);
                        if($checkExistData->save()){
                            return response()->json([
                                'status' => true,
                                'message' => 'User profile updated successfully',
                                'data' => ['userDetails' => $checkExistData]
                            ], 200);
                        }else{
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
                }if($step == 2){
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
                            if($backupAttorney[0]['isInformBackup'] == 1){
                                $emailType = 5; // backup Attroney
                                $fullLegalName = $backupAttorney[0]['backupFullLegalName'];
                                $emailId = $backupAttorney[0]['emailOfBackupAttroney'];
                                app(\App\Http\Controllers\Api\V1\UserController::class)->sendEmail($userId, $fullLegalName, $emailId, $emailType);
                            }
                            if($attorneyHolders[0]['isInform'] == 1){
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
              'userId'          =>  'required|integer|exists:users,id',
              'fullLegalName'   =>  'required|min:1',
              'relation'        =>  'required',
              'address'         =>  'required',
              'city'            =>  'required',
              'state'           =>  'required',
              'zip'             =>  'required|min:5',
              'country'         =>  'required',
              'isInform'        =>  'required|boolean',
              'emailOfAgent'    =>  'required|email',
          ]);
          if ($validator->fails()) {
              return response()->json([
                  'status' => false,
                  'message' => $validator->errors(),
                  'data' => []
              ], 400);
          }

          if($request->has('isBackupAgent') && ($request->isBackupAgent == 1)) {
            $validator = Validator::make($request->all(), [
                'backupFullLegalName' =>  'required|min:1',
                'backupRelation'      =>  'required',
                'backupAddress'       =>  'required',
                'backupCity'          =>  'required',
                'backupState'         =>  'required',
                'backupZip'           =>  'required|min:5',
                'backupCountry'       =>  'required',
                'isInformBackup'      =>  'required|boolean',
                'emailOfBackupAgent'  =>  'required|email'
            ]);

            if($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                    'data' => []
                ], 400);
            }
          }

          $healthFinance = new HealthFinance();
          $healthFinance->userId        = $request->userId;
          $healthFinance->fullLegalName = $request->fullLegalName;
          $healthFinance->relation      = $request->relation;
          $healthFinance->address       = $request->address;
          $healthFinance->city          = $request->city;
          $healthFinance->state         = $request->state;
          $healthFinance->zip           = $request->zip;
          $healthFinance->country       = $request->country;
          $healthFinance->isInform      = $request->isInform;
          $healthFinance->emailOfAgent  = $request->emailOfAgent;
          $healthFinance->isBackupAgent = $request->isBackupAgent;

          $healthFinance->backupFullLegalName = $request->backupFullLegalName;
          $healthFinance->backupRelation      = $request->backupRelation;
          $healthFinance->backupAddress       = $request->backupAddress;
          $healthFinance->backupCity          = $request->backupCity;
          $healthFinance->backupState         = $request->backupState;
          $healthFinance->backupZip           = $request->backupZip;
          $healthFinance->backupCountry       = $request->backupCountry;
          $healthFinance->isInformBackup      = $request->isInformBackup;
          $healthFinance->emailOfBackupAgent  = $request->emailOfBackupAgent;

          if($healthFinance->save()) {
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

    /*
     * function to create/update final-agreement table
     * @return \Illuminate\Http\JsonResponse
     * */
     public function updateFinalAgreement(Request $request){

            $userId = $request->userId;
            $type = $request->type; // 0--> buried 1--> Cremated
            $ashes = $request->ashes;
            $agreements = $request->agreements;
            try{
                if($userId){
                    $checkExistData = FinalArrangements::where('user_id',$userId)->first();
                    if(count($checkExistData)){
                        // update
                        $checkExistData->user_id = $userId;
                        $checkExistData->type = $type;
                        $checkExistData->ashes = $ashes;
                        $checkExistData->arrangements = $agreements;
                        if($checkExistData->save()){
                            return response()->json([
                                'status' => true,
                                'message' => 'Final Agreement created/updated successfully',
                                'data' => ['FinalAgreement' => $checkExistData]
                            ], 200);
                        }else{
                            return response()->json([
                                'status' => false,
                                'message' => 'Final Agreement not created/updated successfully',
                                'data' => []
                            ], 400);
                        }
                    }else{
                        // insert
                        $saveData = new FinalArrangements;
                        $saveData->user_id = $userId;
                        $saveData->type = $type;
                        $saveData->ashes = $ashes;
                        $saveData->arrangements = $agreements;
                        if($saveData->save()){
                            return response()->json([
                                'status' => true,
                                'message' => 'Final Agreement created/updated successfully',
                                'data' => ['FinalAgreement' => $saveData]
                            ], 200);
                        }else{
                            return response()->json([
                                'status' => false,
                                'message' => 'Final Agreement not created/updated successfully',
                                'data' => []
                            ], 400);
                        }
                    }
                }else{
                    return response()->json([
                        'status' => false,
                        'message' => 'something went wrong,user not found ',
                        'data' => []
                    ], 400);
                }
            }catch (Exception $e){
                return response()->json([
                    'status'  => false,
                    'message' => $e->getMessage(). ' line : '.$e->getLine(),
                    'data'    => []
                ], 400);
            }
     }

}
