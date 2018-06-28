<?php

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
use PDF;
use Storage;
use File;

class PdfController extends Controller
{
    function __construct() {
        $this->middleware(function ($request, $next) {
            define("PATH", "documents/".\Auth::user()->id.'/'); 
            return $next($request);
        });  
    }
    

    public function finalSigningInstructions() {

    	try {

    		$completion = app(\App\Http\Controllers\Api\V1\UserManagementController::class)->fetchTotalCompletion();
    		$completion = json_decode($completion->content(), true);
    		foreach ($completion['data'] as $key => $value) {
                //value is of boolean type
                if(!$value)
                    return response()->json([
                        'status'    =>  false,
                        'message'   =>  'cannot generate pdf if all interview steps are not commplete',
                        'data'      =>  []  
                    ],400);
            }
            //$tellUsAboutYou = TellUsAboutYou::where('user_id', \Auth::user()->id)->first();

            $totalData = $this->docInfo();
            $totalData = json_decode($totalData->content(), true);
            $tellUsAboutYou = $totalData['data']['tellUsAboutYou'];
            if(!$tellUsAboutYou) {
                return response()->json([
                    'status'    =>  false,
                    'message'   =>  'Please complete tell us TellUsAboutYou section',
                    'data'      =>  []
                ],400);
            }

            $id = \Auth::user()->id;
    		$filename = 'finalSigningInstructions.pdf';
            $data = ['firstname' => $tellUsAboutYou['firstname']];

            if(!is_dir(public_path().PATH)) {
                //finding this user directory if directory is not present then create directory
                File::makeDirectory(public_path().PATH, $mode = 0777, true, true);
                if(is_dir(public_path().PATH)) {
                    PDF::loadView('pdf.final_signing_instructions', $data)->save(PATH.$filename);
                    return response()->json([
                            'status'    =>  true,
                            'message'   =>  'Success'
                        ], 200);
                } else {
                    // use existing user directory
                    return response()->json([
                            'status'    =>  false,
                            'message'   =>  'Folder is not created successfully, Please change permission'
                        ], 400);
                }

            } else {
                PDF::loadView('pdf.final_signing_instructions', $data)->save(PATH.$filename);
                return response()->json([
                            'status'    =>  true,
                            'message'   =>  'Success'
                        ], 200);
            }
    	} catch(\Exception $e) {
    		return response()->json([
                    'status'    =>  false,
                    'message'   =>  'Error : '.$e->getMessage().' Line : '.$e->getLine(),
                    'data'      =>  []
            ], 500);
        }
    }

    public function willTemplate() {

        try {

            $completion = app(\App\Http\Controllers\Api\V1\UserManagementController::class)->fetchTotalCompletion();
            $completion = json_decode($completion->content(), true);
            foreach ($completion['data'] as $key => $value) {
                //value is of boolean type
                if(!$value)
                    return response()->json([
                        'status'    =>  false,
                        'message'   =>  'cannot generate pdf if all interview steps are not commplete',
                        'data'      =>  []  
                    ],400);
            }
            $id = \Auth::user()->id;
            
            $totalData = $this->docInfo();
            $totalData = json_decode($totalData->content(), true);

            //dd($totalData);
            $tellUsAboutYou = $totalData['data']['tellUsAboutYou'];
            $children = $totalData['data']['children'];
            $state = $totalData['data']['state'];
            $personalRepresentative = $totalData['data']['personalRepresentative'];
            $backupPersonalRepresentative = $totalData['data']['backupPersonalRepresentative'];

            $guardian = $totalData['data']['guardian'];
            $backupGuardian = $totalData['data']['backupGuardian'];

            $provideYourLovedOnes = $totalData['data']['provideYourLovedOnes'];

            $estateDistribute = $totalData['data']['estateDistribute'];

            $toMultipleBeneficiary = json_decode($estateDistribute['to_multiple_beneficiary'], true);
            $toMultipleBeneficiary = $toMultipleBeneficiary[0];
            $toSingleBeneficiary = json_decode($estateDistribute['to_a_single_beneficiary'], true);
            $toSingleBeneficiary = $toSingleBeneficiary[0];
            $petGuardian = $totalData['data']['petGuardian'];
            $backupPetGuardian = $totalData['data']['backupPetGuardian'];
            $petNames = json_decode($tellUsAboutYou['pet_names'], true);
            $gifts = $totalData['data']['gifts'];
            $contingentBeneficiary = $totalData['data']['contingentBeneficiary'];
            $disinherit  = $totalData['data']['disinherit'];

            $giftsArr = [];
            foreach ($gifts as $key => $gift) {
                switch($gift['type']) {
                    case 1 : array_push($giftsArr, json_decode($gift['cash_description'], true));
                             break;

                    case 2 : array_push($giftsArr, json_decode($gift['property_details'], true));
                             break;

                    case 3 : array_push($giftsArr, json_decode($gift['business_details'], true));
                             break;

                    case 4 : array_push($giftsArr, json_decode($gift['asset_details'], true));
                             break;
                    default: break;
                }
            }
            $gifts = $giftsArr;
            //dd($petNames);
            //dd($estateDistribute);
            //dd($toMultipleBeneficiary, $toSingleBeneficiary);

            // if(!$tellUsAboutYou || !$personalRepresentative || !$provideYourLovedOnes || !$estateDistribute) {
            //     return response()->json([
            //         'status'    =>  false,
            //         'message'   =>  'Please complete tell us previous sections section',
            //         'data'      =>  []
            //     ], 400);
            // }
            //dd($gifts);
            //dd($estateDistribute);
            $filename = 'will-template.pdf';
            
            $data = [
                'tellUsAboutYou' => $tellUsAboutYou,
                'children'       => $children,
                'executor_title' => $state['executor_title'],
                'personalRepresentative' => $personalRepresentative,
                'backupPersonalRepresentative' => $backupPersonalRepresentative,
                'guardian'       => $guardian,
                'backupGuardian' => $backupGuardian,
                'provideYourLovedOnes' => $provideYourLovedOnes,
                'state'          => $state['name'],
                'petNames'       => $petNames,
                'petGuardian'    => $petGuardian,
                'backupPetGuardian' => $backupPetGuardian,
                'toSingleBeneficiary' => $toSingleBeneficiary,
                'toMultipleBeneficiary' => $toMultipleBeneficiary,
                'estateDistribute'  => $estateDistribute,
                'gifts' => $gifts,
                'contingentBeneficiary' => $contingentBeneficiary,
                'disinherit'    => $disinherit
            ];
            
            if(!is_dir(public_path().PATH)) {
                //finding this user directory if directory is not present then create directory
                File::makeDirectory(public_path().PATH, $mode = 0777, true, true);
                if(is_dir(public_path().PATH)) {
                    PDF::loadView('pdf.last_will_and_testament', $data)->save(PATH.$filename);
                    return response()->json([
                            'status'    =>  true,
                            'message'   =>  'Success'
                        ], 200);
                } else {
                    // use existing user directory
                    return response()->json([
                            'status'    =>  false,
                            'message'   =>  'Folder is not created successfully, Please change permission'
                        ], 400);
                }

            } else {
                PDF::loadView('pdf.last_will_and_testament', $data)->save(PATH.$filename);
                return response()->json([
                            'status'    =>  true,
                            'message'   =>  'Success'
                        ], 200);
            }
            return response()->json([
                    'status'    =>  true,
                    'message'   =>  'Success'
            ], 200);

        } catch(\Exception $e) {

            return response()->json([
                    'status'    =>  false,
                    'message'   =>  'Error : '.$e->getMessage().' Line : '.$e->getLine(),
                    'data'      =>  []
            ], 500);
        }
    }

    public function statesDoc() {

        try {


            $completion = app(\App\Http\Controllers\Api\V1\UserManagementController::class)->fetchTotalCompletion();
            $completion = json_decode($completion->content(), true);
            foreach ($completion['data'] as $key => $value) {
                //value is of boolean type
                if(!$value)
                    return response()->json([
                        'status'    =>  false,
                        'message'   =>  'cannot generate pdf if all interview steps are not commplete',
                        'data'      =>  []  
                    ],400);
            }

            $totalData = $this->docInfo();
            $totalData = json_decode($totalData->content(), true);

            $tellUsAboutYou = $totalData['data']['tellUsAboutYou'];
            $healthFinance = $totalData['data']['healthFinance'];
            $state = $totalData['data']['state'];
            $finalArrangements = $totalData['data']['finalArrangements'];

            $id = \Auth::user()->id;
            $filename = 'healthCarePOA.pdf';

            
            if($tellUsAboutYou['gender'] == 'F') {
                $genderTxt  = 'her';
                $genderTxt2 = 'herself';
                $genderTxt3 = 'she';
                $genderTxt4 = 'her';
            } else {
                $genderTxt  = 'him';
                $genderTxt2 = 'himself';
                $genderTxt3 = 'he';
                $genderTxt4 = 'his';
            }

            //dd($genderTxt3);
            $data = [
                'tellUsAboutYou'    => $tellUsAboutYou,
                'healthFinance'     => $healthFinance,
                'state'             => $state,
                'genderTxt'         => $genderTxt,
                'genderTxt2'        => $genderTxt2,
                'genderTxt3'        => $genderTxt3,
                'genderTxt4'        => $genderTxt4,
                'finalArrangements' => $finalArrangements
            ];

            /*dd($data);*/

            if(!is_dir(public_path().PATH)) {
                
                //finding this user directory if directory is not present then create directory
                File::makeDirectory(public_path().PATH, $mode = 0777, true, true);
                if (is_dir (public_path().PATH ) ) {
                    @PDF::loadView('pdf.states.'.$state['abr'], $data)->save(PATH.$filename);
                    return response()->json([
                            'status'    =>  true,
                            'message'   =>  'Success'
                        ], 200);
                } else {
                    // use existing user directory
                    return response()->json([
                            'status'    =>  false,
                            'message'   =>  'Folder is not created successfully, Please change permission'
                        ], 400);
                }
            } else {
                @PDF::loadView('pdf.states.'.$state['abr'], $data)->save(PATH.$filename);
                return response()->json([
                            'status'    =>  true,
                            'message'   =>  'Success'
                        ], 200);
            }
            return response()->json([
                    'status'    =>  true,
                    'message'   =>  'Success'
            ], 200);

        } catch(\Exception $e) {

            return response()->json([
                    'status'    =>  false,
                    'message'   =>  'Error : '.$e->getMessage() .' Line : '. $e->getLine(),
                    'data'      =>  []
            ], 500);
        }
    }

    public function docInfo() 
    {
        try 
        {
            
            $id = \Auth::user()->id;
            $tellUsAboutYou = TellUsAboutYou::where('user_id', $id)->first();
            $finalArrangements = FinalArrangements::where('user_id', $id)->first();
            $state = StatesInfo::where('name', 'LIKE', $tellUsAboutYou->state)->first();
            $personalRepresentative = PersonalRepresentatives::where('user_id', $id)->where('is_backuprepresentative','0')->first();
            $backupPersonalRepresentative = PersonalRepresentatives::where('user_id', $id)->where('is_backuprepresentative','1')->first();
            $healthFinance = HealthFinance::where('userId', $id)->first();
            $children = Children::where('user_id', $id)->get();
            $guardian = GuardianInfo::where('user_id', $id)->where('is_backup','0')->first();
            $backupGuardian = GuardianInfo::where('user_id', $id)->where('is_backup','1')->first();
            $estateDistribute = EstateDisrtibute::where('user_id', $id)->first();
            $provideYourLovedOnes = ProvideYourLovedOnes::where('user_id', $id)->first();
            $petGuardian = PetGuardian::where('user_id', $id)->where('is_backup','0')->first();
            $backupPetGuardian = PetGuardian::where('user_id', $id)->where('is_backup','1')->first();
            $gifts = Gifts::where('user_id', $id)->get();
            $contingentBeneficiary = ContingentBeneficiary::where('user_id', $id)->first();
            $disinherit = Disinherit::where('user_id', $id)->first();

            return response()->json([
                    'status'    =>  true,
                    'message'   =>  'Success',
                    'data'      =>  [
                                        'tellUsAboutYou' => $tellUsAboutYou,
                                        'finalArrangements' => $finalArrangements,
                                        'state'    => $state,
                                        'personalRepresentative' => $personalRepresentative,
                                        'backupPersonalRepresentative' => $backupPersonalRepresentative,
                                        'healthFinance' => $healthFinance,
                                        'children' => $children,
                                        'guardian' => $guardian,
                                        'backupGuardian' => $backupGuardian,
                                        'provideYourLovedOnes' => $provideYourLovedOnes,
                                        'estateDistribute' => $estateDistribute,
                                        'petGuardian'   => $petGuardian,
                                        'backupPetGuardian' => $backupPetGuardian,
                                        'gifts' => $gifts,
                                        'contingentBeneficiary' => $contingentBeneficiary,
                                        'disinherit'    => $disinherit
                                    ]
            ] ,200);            

        } catch (\Exception $e) {

            return response()->json([
                    'status'    =>  false,
                    'message'   =>  'Error : '.$e->getMessage().' Line : '.$e->getLine(),
                    'data'      =>  []
            ], 500);

        }

    }
    
}
