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

          $validator = Validator::make($request->all(), [
              'userId'  =>  'required|exists:users,id,deleted_at,NULL',
              'step'    =>  'required|numeric|between:1,2|integer'
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
              'userId'          =>  'required|integer|exists:users,id',
              'fullLegalName'   =>  'required|string|min:1',
              'relation'        =>  'required',
              'address'         =>  'required',
              'city'            =>  'required',
              'state'           =>  'required',
              'zip'             =>  'required|regex:/^[0-9]{5}(\-[0-9]{4})?$/',
              'country'         =>  'required',
              'isInform'        =>  'required|numeric|between:0,1|integer',
              'emailOfAgent'    =>  'required|email',
              'isBackupAgent'   =>  'nullable|numeric|between:0,1|integer'
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
                'backupFullLegalName' =>  'required|string|min:1',
                'backupRelation'      =>  'required',
                'backupAddress'       =>  'required',
                'backupCity'          =>  'required',
                'backupState'         =>  'required',
                'backupZip'           =>  'required|regex:/^[0-9]{5}(\-[0-9]{4})?$/',
                'backupCountry'       =>  'required',
                'isInformBackup'      =>  'required|numeric|between:0,1|integer',
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

          $validator = Validator::make($request->all(), [
             'userId'       =>  'required|exists:users,id,deleted_at,NULL',
             'type'         =>  'required|numeric|between:0,1|integer',
             'ashes'        =>  'required|string|max:255',
             'agreements'   =>  'required|string|max:255'
          ]);
          if($validator->fails()) {
              return response()->json([
                  'status' => false,
                  'message' => $validator->errors(),
                  'data' => []
              ], 400);
          }

          $userId = (int)$request->userId;
          $type = (string)$request->type; // 0--> buried 1--> Cremated
          $ashes = $request->ashes;
          $agreements = $request->agreements;
          try {
              if($userId) {
                  $checkExistData = FinalArrangements::where('user_id',$userId)->first();
                  if(count($checkExistData)) {
                      // update
                      $checkExistData->user_id = $userId;
                      $checkExistData->type = $type;
                      $checkExistData->ashes = $ashes;
                      $checkExistData->arrangements = $agreements;
                      if($checkExistData->save()) {
                          return response()->json([
                              'status' => true,
                              'message' => 'Final Agreement created/updated successfully',
                              'data' => ['FinalAgreement' => $checkExistData]
                          ], 200);
                      } else {
                          return response()->json([
                              'status' => false,
                              'message' => 'Final Agreement not created/updated successfully',
                              'data' => []
                          ], 400);
                      }
                  } else {
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
                      } else {
                          return response()->json([
                              'status' => false,
                              'message' => 'Final Agreement not created/updated successfully',
                              'data' => []
                          ], 400);
                      }
                  }
              } else {
                  return response()->json([
                      'status' => false,
                      'message' => 'something went wrong,user not found ',
                      'data' => []
                  ], 400);
              }
          } catch (Exception $e) {
              return response()->json([
                  'status'  => false,
                  'message' => $e->getMessage(). ' line : '.$e->getLine(),
                  'data'    => []
              ], 500);
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
        'isDesceasedChildren'   =>  $isDeceasedChildren,
        'deceasedChildreNames'  =>  $deceasedChildrenNames
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
        'isGuardianMinorChildren' =>  $tellUsAboutYouUser != null && $tellUsAboutYouUser->guardian_minor_children == '1' ? 'Yes' : 'No',
        'guardian'                =>  $guardianInfo == null ? null : $guardianInfo,
        'isBackUpGurdian'         =>  $backupGuardianInfo->count() == 0 ? 'No' : 'Yes',
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
          'data' => [
            'isBusinessInterest'      =>  $lovedOnes->business_interest == 1 ? 'Yes' : 'No',
            'isFarmOrRanch'           =>  $lovedOnes->farm_or_ranch,
            'isGetCompensate'         =>  $lovedOnes->is_getcompensate,
            'isPercentage'            =>  $lovedOnes->is_percentage,
            'compensateAmount'        =>  $lovedOnes->compensation_specific_amount,
            'isPercentageBasedOnNet'  =>  $lovedOnes->net_value_percent == 1 ? 'Yes' : 'No'
          ]
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

      $representativeArray = [];
      foreach ($representatives as $key => $eachRepresentative) {
        if($eachRepresentative->is_backuprepresentative == '1') {
          $representativeArray = [
            'isBackUpRepresentative'  => 'Yes',
            'backUpRepresentative'    => [
              'fullName'      => $eachRepresentative->fullname,
              'relationShip'  => $eachRepresentative->relationship_with,
              'address'       => $eachRepresentative->address,
              'city'          => $eachRepresentative->city,
              'state'         => $eachRepresentative->state,
              'zip'           => $eachRepresentative->zip,
              'country'       => $eachRepresentative->country,
              'isInform'      => $eachRepresentative->email_notification,
              'email'         => $eachRepresentative->email
            ]
          ];
        } else {
          $representativeArray = [
            'personalRepresentative'    => [
              'fullName'      => $eachRepresentative->fullname,
              'relationShip'  => $eachRepresentative->relationship_with,
              'address'       => $eachRepresentative->address,
              'city'          => $eachRepresentative->city,
              'state'         => $eachRepresentative->state,
              'zip'           => $eachRepresentative->zip,
              'country'       => $eachRepresentative->country,
              'isInform'      => $eachRepresentative->email_notification,
              'email'         => $eachRepresentative->email
            ]
          ];
        }
        return [
          'step'  => $stepValue,
          'data'  => $representativeArray
        ];
      }

      return [
        'step'  => $stepValue,
        'data'  => null
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
       $data = PersonalRepresentatives::where('user_id',$user->id)->first();

       if($data) {
         $responseArray = [
           'step' =>  $stepValue,
           'data' => [
             'toTangiblePropertyDistribute' => $data->is_tangible_property_distribute + 1,
             'tangiblePropertyDistribute'   => $data->tangible_property_distribute
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
             'isContingentBeneficiary' => $beneficiary->is_contingent_beneficiary == 1 ? 'Yes' : 'No'
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
         $data = [
           'idChoice'       =>  $disinherit->disinherit == '1' ? 'Yes' : 'No',
           'fullLegalName'  =>  $disinherit->fullname,
           'relationship'   =>  $disinherit->relationship
         ];
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
