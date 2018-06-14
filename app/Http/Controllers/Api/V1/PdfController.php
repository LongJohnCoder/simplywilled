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

class PdfController extends Controller
{
    
    public function finalSigningInstructions(Request $request) {

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
            
            $tuay = TellUsAboutYou::where('user_id', \Auth::user()->id)->first();
            if(!$tuay) {
                return response()->json([
                    'status'    =>  false,
                    'message'   =>  'Please complete tell us TellUsAboutYou section',
                    'data'      =>  []
                ],400);
            }

            $destinationPath = 'pdf/step1/';

            

    		$filename = 'pdf1-'.\Auth::user()->id . '.pdf';
            $data = ['firstname' => $tuay->firstname];
            PDF::loadView('pdf.final_signing_instructions', $data)->save('pdf/step1/'.$filename);
            return response()->json([
                    'status'    =>  true,
                    'message'   =>  'Success',
                    'data'      =>  ['link' => url('/').'/pdf/step1/'.$filename,
                                    'filename' => $filename]
            ],200);

    	} catch(\Exception $e) {

    		return response()->json([
                    'status'    =>  false,
                    'message'   =>  'Error : '.$e->getMessage().' Line : '.$e->getLine(),
                    'data'      =>  []
            ], 500);
    	
        }
    }

    public function willTemplate(Request $request) {

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
            
            $tellUsAboutYou = TellUsAboutYou::where('user_id', \Auth::user()->id)->first();
            $children = Children::where('user_id', \Auth::user()->id);

            $state = StatesInfo::where('name', 'LIKE', $tellUsAboutYou->state)->first();
            $executor_title = $state->executor_title;
            $personalRepresentative = PersonalRepresentatives::where('user_id', \Auth::user()->id)->where('is_backuprepresentative','0')->first();
            $backupPersonalRepresentative = PersonalRepresentatives::where('user_id', \Auth::user()->id)->where('is_backuprepresentative','1')->first();
            $guardian = GuardianInfo::where('user_id', \Auth::user()->id)->where('is_backup','0')->first();
            $backupGuardian = GuardianInfo::where('user_id', \Auth::user()->id)->where('is_backup','1')->first();
            $provideYourLovedOnes = ProvideYourLovedOnes::where('user_id', \Auth::user()->id)->first();


            if(!$tellUsAboutYou || !$personalRepresentative || !$provideYourLovedOnes) {
                return response()->json([
                    'status'    =>  false,
                    'message'   =>  'Please complete tell us previous sections section',
                    'data'      =>  []
                ],400);
            }

            $destinationPath = 'pdf/step1/';

            $filename = 'pdf2-'.\Auth::user()->id . '.pdf';
            $data = [
                'tellUsAboutYou' => $tellUsAboutYou,
                'children'       => $children,
                'executor_title' => $executor_title,
                'personalRepresentative' => $personalRepresentative,
                'backupPersonalRepresentative' => $backupPersonalRepresentative,
                'guardian'       => $guardian,
                'backupGuardian' => $backupGuardian,
                'provideYourLovedOnes' => $provideYourLovedOnes,
                'state'          => $state->name
            ];
            PDF::loadView('pdf.last_will_and_testament', $data)->save('pdf/step1/'.$filename);
            return response()->json([
                    'status'    =>  true,
                    'message'   =>  'Success',
                    'data'      =>  ['link' => url('/').'/pdf/step1/'.$filename,
                                    'filename' => $filename]
            ],200);

        } catch(\Exception $e) {

            return response()->json([
                    'status'    =>  false,
                    'message'   =>  'Error : '.$e->getMessage().' Line : '.$e->getLine(),
                    'data'      =>  []
            ], 500);
        
        }

    }

    public function finalDispositionPdf(Request $request) {

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

            $tellUsAboutYou = TellUsAboutYou::where('user_id', \Auth::user()->id)->first();
            $finalArrangements = FinalArrangements::where('user_id', \Auth::user()->id)->first();
            $state = StatesInfo::where('name', 'LIKE', $tellUsAboutYou->state)->first();
            $personalRepresentative = PersonalRepresentatives::where('user_id', \Auth::user()->id)->where('is_backuprepresentative','0')->first();
            $backupPersonalRepresentative = PersonalRepresentatives::where('user_id', \Auth::user()->id)->where('is_backuprepresentative','1')->first();

            return response()->json([
                    'status'    =>  true,
                    'message'   =>  'Success',
                    'data'      =>  [
                                        'tellUsAboutYou' => $tellUsAboutYou,
                                        'finalArrangements' => $finalArrangements,
                                        'state'    => $state,
                                        'personalRepresentative' => $personalRepresentative,
                                        'backupPersonalRepresentative' => $backupPersonalRepresentative,
                                        'link' => null,
                                        'filename' => null
                                    ]
            ],200);            

        } catch (\Exception $e) {

            return response()->json([
                    'status'    =>  false,
                    'message'   =>  'Error : '.$e->getMessage().' Line : '.$e->getLine(),
                    'data'      =>  []
            ], 500);

        }

    }
    
}
