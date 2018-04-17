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
    public function updateProtectFinance(Request $request){
        dd($request->all());
    }


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
}
