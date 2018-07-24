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
            define("ID", \Auth::user()->id);
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

    		$filename = 'finalSigningInstructions.pdf';
            $data = ['firstname' => $tellUsAboutYou['firstname']];

            if(!is_dir(public_path().'/'.PATH)) {
                //finding this user directory if directory is not present then create directory
                File::makeDirectory(public_path().'/'.PATH, $mode = 0777, true, true);
                if(is_dir(public_path().'/'.PATH)) {
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
            $custGiftsArr = $totalData['data']['custGiftsArr'];
            $estateDistributeSomeOtherWay = json_decode($estateDistribute['some_other_way'], true);
            $estateDistributeSomeOtherWay = $estateDistributeSomeOtherWay !== null 
                                            && array_key_exists(0, $estateDistributeSomeOtherWay) ? $estateDistributeSomeOtherWay[0] : null;
            $estateDistributeSomeOtherWay = $estateDistributeSomeOtherWay !== null 
                                            && array_key_exists('someOtherWayText', $estateDistributeSomeOtherWay) 
                                            ? $estateDistributeSomeOtherWay['someOtherWayText'] 
                                            : null;
            //dd($estateDistributeSomeOtherWay);
            //dd($toMultipleBeneficiary['beneficiaryYes'][0]);

            // foreach($toMultipleBeneficiary['beneficiaryYes'] as $key => $eachBeneficiary) {
            //     //dd($eachBeneficiary);
            //     dd($eachBeneficiary['beneficiaryRelationship'], $eachBeneficiary['beneficiaryFullName']);
            // }

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
           
            $filename = 'lastWill.pdf';
            
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
                'disinherit'    => $disinherit,
                'custGiftsArr'   => $custGiftsArr,
                'estateDistributeSomeOtherWay' => $estateDistributeSomeOtherWay
            ];
            
            if(!is_dir(public_path().'/'.PATH)) {
                //finding this user directory if directory is not present then create directory
                File::makeDirectory(public_path().'/'.PATH, $mode = 0777, true, true);
                if(is_dir(public_path().'/'.PATH)) {
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

            if(!is_dir(public_path().'/'.PATH)) {   
                //finding this user directory if directory is not present then create directory
                File::makeDirectory(public_path().'/'.PATH, $mode = 0777, true, true);
                if (is_dir (public_path().'/'.PATH ) ) {
                    PDF::loadView('pdf.states.'.$state['abr'], $data)->save(PATH.$filename);
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
                PDF::loadView('pdf.states.'.$state['abr'], $data)->save(PATH.$filename);
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

    public function finalDisposition() {

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
            $state = $totalData['data']['state'];
            $personalRepresentative = $totalData['data']['personalRepresentative'];
            $finalArrangements = $totalData['data']['finalArrangements'];

            $filename = 'finalDisposition.pdf';
            if ($tellUsAboutYou['gender'] == 'F') {
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

            $data = [
                'tellUsAboutYou'    => $tellUsAboutYou,
                'state'             => $state,
                'genderTxt'         => $genderTxt,
                'genderTxt2'        => $genderTxt2,
                'genderTxt3'        => $genderTxt3,
                'genderTxt4'        => $genderTxt4,
                'finalArrangements' => $finalArrangements,
                'personalRepresentative' => $personalRepresentative
            ];

            if(!is_dir(public_path().'/'.PATH)) {   
                //finding this user directory if directory is not present then create directory
                File::makeDirectory(public_path().'/'.PATH, $mode = 0777, true, true);
                if (is_dir (public_path().'/'.PATH ) ) {
                    @PDF::loadView('pdf.finalDisposition', $data)->save(PATH.$filename);
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
                @PDF::loadView('pdf.finalDisposition', $data)->save(PATH.$filename);
                return response()->json([
                            'status'    =>  true,
                            'message'   =>  'Success'
                        ], 200);
            }

        } catch (\Exception $e) {
            return response()->json([
                    'status'    =>  true,
                    'message'   =>  'Error : '. $e->getMessage().' Line : '.$e->getLine()
            ], 500);
        }
    }

    public function financesDoc() {

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
            $estateDistribute = $totalData['data']['estateDistribute'];
            $provideYourLovedOnes = $totalData['data']['provideYourLovedOnes'];
            $financialPowerOfAttorney = $totalData['data']['financialPowerOfAttorney'];
            $attorneyPowers = json_decode($financialPowerOfAttorney['attorney_powers'], true);
            $attorneyHolders = json_decode($financialPowerOfAttorney['attorney_holders'], true);
            $attorneyBackup = json_decode($financialPowerOfAttorney['attorney_backup'], true);
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

            $filename = 'financialPOA.pdf';
            if ($tellUsAboutYou['gender'] == 'F') {
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
                'finalArrangements' => $finalArrangements,
                'estateDistribute'  => $estateDistribute,
                'provideYourLovedOnes' => $provideYourLovedOnes,
                'financialPowerOfAttorney' => $financialPowerOfAttorney,
                'attorneyPowers'    => $attorneyPowers,
                'attorneyBackup'    => $attorneyBackup,
                'attorneyHolders'   => $attorneyHolders,
                'gifts'             => $gifts
            ];
            //dd($data);
            $viewName = '';
            if($state['type'] == 'uniform') {
                $viewName = 'uniform';
            } elseif($state['type'] == 'non-uniform') {
                $viewName = 'non-uniform';
            } else {
                switch ($state['abr']) {
                    
                    case 'FL': $viewName = 'FL'; 
                                break;
                    
                    case 'MD': $viewName = 'MD';
                                break;

                    case 'MN': $viewName = 'MN';
                                break;

                    case 'NY': $viewName = 'NY';
                                break;

                    default:    break;
                }
            }

            if(!is_dir(public_path().'/'.PATH)) {   
                //finding this user directory if directory is not present then create directory
                File::makeDirectory(public_path().'/'.PATH, $mode = 0777, true, true);
                if (is_dir (public_path().'/'.PATH ) ) {
                    @PDF::loadView('pdf.finances.'.$viewName, $data)->save(PATH.$filename);
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
                @PDF::loadView('pdf.finances.'.$viewName, $data)->save(PATH.$filename);
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

    public function docInfo() 
    {
        try 
        {
            $tellUsAboutYou = TellUsAboutYou::where('user_id', ID)->first();
            $finalArrangements = FinalArrangements::where('user_id', ID)->first();
            $state = StatesInfo::where('name', 'LIKE', $tellUsAboutYou->state)->first();
            $personalRepresentative = PersonalRepresentatives::where('user_id', ID)->where('is_backuprepresentative','0')->first();
            $backupPersonalRepresentative = PersonalRepresentatives::where('user_id', ID)->where('is_backuprepresentative','1')->first();
            $healthFinance = HealthFinance::where('userId', ID)->first();
            $children = Children::where('user_id', ID)->get();
            $guardian = GuardianInfo::where('user_id', ID)->where('is_backup','0')->first();
            $backupGuardian = GuardianInfo::where('user_id', ID)->where('is_backup','1')->first();
            $estateDistribute = EstateDisrtibute::where('user_id', ID)->first();
            $provideYourLovedOnes = ProvideYourLovedOnes::where('user_id', ID)->first();
            $petGuardian = PetGuardian::where('user_id', ID)->where('is_backup','0')->first();
            $backupPetGuardian = PetGuardian::where('user_id', ID)->where('is_backup','1')->first();
            $gifts = Gifts::where('user_id', ID)->get();
            $contingentBeneficiary = ContingentBeneficiary::where('user_id', ID)->first();
            $disinherit = Disinherit::where('user_id', ID)->first();
            $financialPowerOfAttorney = FinancialPowerAttorney::where('user_id', ID)->first(); 

            
            $custGiftsArr = [];
            
            foreach($gifts as $key => $gift) {
                switch ($gift->type) {
                    case '1':   $giftData = $gift->cash_description;
                                $giftData = json_decode($giftData, true);
                                if(isset($giftData) && isset($giftData[0]) && array_key_exists('statement', $giftData[0]) && strlen(trim($giftData[0]['statement'])) > 0 ) {
                                    $statement = $giftData[0]['statement'];
                                    $custGiftsArr[] = $statement;
                                }
                                break;

                    case '2':   $giftData = $gift->property_details;
                                $giftData = json_decode($giftData, true);
                                if(isset($giftData) && isset($giftData[0]) && array_key_exists('statement', $giftData[0]) && strlen(trim($giftData[0]['statement'])) > 0) {
                                    $statement = $giftData[0]['statement'];
                                    $custGiftsArr[] = $statement;
                                }
                                break;

                    case '3':   $giftData = $gift->business_details;
                                $giftData = json_decode($giftData, true);
                                if(isset($giftData) && isset($giftData[0]) && array_key_exists('statement', $giftData[0]) && strlen(trim($giftData[0]['statement'])) > 0) {
                                    $statement = $giftData[0]['statement'];
                                    $custGiftsArr[] = $statement;
                                }
                                break;

                    case '4':   $giftData = $gift->asset_details;
                                $giftData = json_decode($giftData, true);
                                if(isset($giftData) && isset($giftData[0]) && array_key_exists('statement', $giftData[0]) && strlen(trim($giftData[0]['statement'])) > 0) {
                                    $statement = $giftData[0]['statement'];
                                    $custGiftsArr[] = $statement;
                                }
                                break;
                    
                    default:    break;
                }
                // dd($gift);
                // if(isset($gift[0]) && isset($gift[0]['statement']) && strlen($gift[0]['statement']) > 0) {
                //     $custGiftsArr[] = $gift[0]['statement'];
                // }
            }
                    

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
                                        'disinherit'    => $disinherit,
                                        'financialPowerOfAttorney' => $financialPowerOfAttorney,
                                        'custGiftsArr' => $custGiftsArr
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

    public function finalSigningInstructionsEmail() {

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

        $arr = [
            'fullname'  => $tellUsAboutYou['fullname'],
            'firstname' => $tellUsAboutYou['firstname'],
            'email'     => $tellUsAboutYou['email'],
            'tellUsAboutYou' => $tellUsAboutYou
        ];
        //dd($arr);
        $filename = 'finalSigningInstructions.pdf';
        
        $pdf = PDF::loadView('pdf.final_signing_instructions', $arr);

        Mail::send('new_emails.pdf.finalSigningInstructions',$arr,
              function($mail) use ($arr, $pdf) {
                $mail->from(trim(config('settings.email')), 'Simplywilled');
                $mail->to(trim(strtolower($arr['email'])), $arr['fullname'])
                        ->subject('Check your final signing Instructions')
                        ->attachData($pdf->output(), 'SigningInstructions.pdf');
            }
        );

        if (Mail::failures()) {
              \Log::info('email sending error for final signing instructions');
              return response()->json([
                  'status'  => false,
                  'message' => 'failed to send email for final signing instructions',
                  'data'    => []
            ], 400);
        }

        return response()->json([
                  'status'  => true,
                  'message' => 'Email Sent successfully',
                  'data'    => []
                ], 200);
        } catch(\Exception $e) {
            return response()->json([
                    'status'    =>  false,
                    'message'   =>  'Error : '.$e->getMessage().' Line : '.$e->getLine(),
                    'data'      =>  []
            ], 500);
        }
        
    }
    
    public function willTemplateEmail() {

        
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
            $custGiftsArr = $totalData['data']['custGiftsArr'];
            $estateDistributeSomeOtherWay = json_decode($estateDistribute['some_other_way'], true);
            $estateDistributeSomeOtherWay = $estateDistributeSomeOtherWay !== null 
                                            && array_key_exists(0, $estateDistributeSomeOtherWay) ? $estateDistributeSomeOtherWay[0] : null;
            $estateDistributeSomeOtherWay = $estateDistributeSomeOtherWay !== null 
                                            && array_key_exists('someOtherWayText', $estateDistributeSomeOtherWay) 
                                            ? $estateDistributeSomeOtherWay['someOtherWayText'] 
                                            : null;

            $giftsArr = [];
            foreach ( $gifts as $key => $gift ) {
                switch ( $gift['type'] ) {
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
            $filename = 'lastWill.pdf';
            
            $arr = [
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
                'disinherit'    => $disinherit,
                'custGiftsArr'   => $custGiftsArr,
                'estateDistributeSomeOtherWay' => $estateDistributeSomeOtherWay
            ];

            $pdf = PDF::loadView('pdf.last_will_and_testament', $arr);

            Mail::send('new_emails.pdf.lastWill',$arr,
                    function($mail) use ($arr, $pdf, $filename) {
                        $mail->from(trim(config('settings.email')), 'Simplywilled');
                        $mail->to(trim(strtolower($arr['tellUsAboutYou']['email'])), $arr['tellUsAboutYou']['fullname'])
                                ->subject('Check your Last Will Docs')
                                ->attachData($pdf->output(), $filename);
                }
            );

            if (Mail::failures()) {
                  \Log::info('email sending error for final signing instructions');
                  return response()->json([
                      'status'  => false,
                      'message' => 'failed to send email for final signing instructions',
                      'data'    => []
                ], 400);
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

    public function statesDocEmail() {

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
            $arr = [
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
            $pdf = PDF::loadView('pdf.states.'.$state['abr'], $arr);
            Mail::send('new_emails.pdf.statesDoc',$arr,
                    function($mail) use ($arr, $pdf) {
                        $mail->from(trim(config('settings.email')), 'Simplywilled');
                        $mail->to(trim(strtolower($arr['tellUsAboutYou']['email'])), $arr['tellUsAboutYou']['fullname'])
                                ->subject('Check your Health Care Power Of Attorney Docs')
                                ->attachData($pdf->output(), 'HealthCarePowerOfAttorney.pdf');
                }
            );

            if (Mail::failures()) {
                  \Log::info('email sending error for states doc email');
                  return response()->json([
                      'status'  => false,
                      'message' => 'failed to send email for states doc email',
                      'data'    => []
                ], 400);
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

    public function finalDispositionEmail() {
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
            $state = $totalData['data']['state'];
            $personalRepresentative = $totalData['data']['personalRepresentative'];
            $finalArrangements = $totalData['data']['finalArrangements'];
            $filename = 'finalDisposition.pdf';
            
            if ($tellUsAboutYou['gender'] == 'F') {
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

            $arr = [
                'tellUsAboutYou'    => $tellUsAboutYou,
                'state'             => $state,
                'genderTxt'         => $genderTxt,
                'genderTxt2'        => $genderTxt2,
                'genderTxt3'        => $genderTxt3,
                'genderTxt4'        => $genderTxt4,
                'finalArrangements' => $finalArrangements,
                'personalRepresentative' => $personalRepresentative
            ];

            $pdf = PDF::loadView('pdf.finalDisposition', $arr);
            Mail::send('new_emails.pdf.finalDisposition',$arr,
                    function($mail) use ($arr, $pdf) {
                        $mail->from(trim(config('settings.email')), 'Simplywilled');
                        $mail->to(trim(strtolower($arr['tellUsAboutYou']['email'])), $arr['tellUsAboutYou']['fullname'])
                                ->subject('Check your Final Disposition Docs')
                                ->attachData($pdf->output(), 'FinalDisposition.pdf');
                }
            );

            if (Mail::failures()) {
                  \Log::info('email sending error for states doc email');
                  return response()->json([
                      'status'  => false,
                      'message' => 'failed to send email for states doc email',
                      'data'    => []
                ], 400);
            }

            return response()->json([
                    'status'    =>  true,
                    'message'   =>  'Success'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                    'status'    =>  true,
                    'message'   =>  'Error : '. $e->getMessage().' Line : '.$e->getLine()
            ], 500);
        }
    }

    public function financesDocEmail() {

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
            $estateDistribute = $totalData['data']['estateDistribute'];
            $provideYourLovedOnes = $totalData['data']['provideYourLovedOnes'];
            $financialPowerOfAttorney = $totalData['data']['financialPowerOfAttorney'];
            $attorneyPowers = json_decode($financialPowerOfAttorney['attorney_powers'], true);
            $attorneyHolders = json_decode($financialPowerOfAttorney['attorney_holders'], true);
            $attorneyBackup = json_decode($financialPowerOfAttorney['attorney_backup'], true);
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

            $filename = 'financialPOA.pdf';
            if ($tellUsAboutYou['gender'] == 'F') {
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
            $arr = [
                'tellUsAboutYou'    => $tellUsAboutYou,
                'healthFinance'     => $healthFinance,
                'state'             => $state,
                'genderTxt'         => $genderTxt,
                'genderTxt2'        => $genderTxt2,
                'genderTxt3'        => $genderTxt3,
                'genderTxt4'        => $genderTxt4,
                'finalArrangements' => $finalArrangements,
                'estateDistribute'  => $estateDistribute,
                'provideYourLovedOnes' => $provideYourLovedOnes,
                'financialPowerOfAttorney' => $financialPowerOfAttorney,
                'attorneyPowers'    => $attorneyPowers,
                'attorneyBackup'    => $attorneyBackup,
                'attorneyHolders'   => $attorneyHolders,
                'gifts'             => $gifts
            ];
            //dd($data);
            
            $viewName = '';
            if($state['type'] == 'uniform') {
                $viewName = 'uniform';
            } elseif($state['type'] == 'non-uniform') {
                $viewName = 'non-uniform';
            } else {
                switch ($state['abr']) {
                    
                    case 'FL': $viewName = 'FL'; 
                                break;
                    
                    case 'MD': $viewName = 'MD';
                                break;

                    case 'MN': $viewName = 'MN';
                                break;

                    case 'NY': $viewName = 'NY';
                                break;

                    default:    break;
                }
            }

            $pdf = PDF::loadView('pdf.finances.'.$viewName, $arr);

            Mail::send('new_emails.pdf.finances',$arr,
                    function($mail) use ($arr, $pdf) {
                        $mail->from(trim(config('settings.email')), 'Simplywilled');
                        $mail->to(trim(strtolower($arr['tellUsAboutYou']['email'])), $arr['tellUsAboutYou']['fullname'])
                                ->subject('Check your Financial Power Of Attorney Docs')
                                ->attachData($pdf->output(), 'FinancialPowerOfAttorney.pdf');
                }
            );

            if (Mail::failures()) {
                  \Log::info('email sending error for states doc email');
                  return response()->json([
                      'status'  => false,
                      'message' => 'failed to send email for states doc email',
                      'data'    => []
                ], 400);
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
}
