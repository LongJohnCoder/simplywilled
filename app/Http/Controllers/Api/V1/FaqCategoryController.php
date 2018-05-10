<?php
/**
 * Functional Scope: API for Create,Edit,View,Delete Faq Category.
 */

namespace App\Http\Controllers\Api\V1;

use App\Exceptions\HttpBadRequestException;
use App\User;
use App\Role;
use App\Categories;
use App\FaqCategories;
use App\Models\PasswordReset;
use Auth;
use Crypt;
use DB;
use Validator;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use JWTAuthException;
use Log;
use Mail;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Faqs;
use App\FaqCategoryMapping;

class FaqCategoryController extends Controller
{

    /*
     * function to get a list of all the faq category
     * @return \Illuminate\Http\Response
     * */
    public function faqCategoryList()
    {
        try {
            $faqCategory = FaqCategories::get();
            if ($faqCategory) {
                return response()->json([
                    'status' => true,
                    'message' => 'FAQ category Details',
                    'data' => ['faqCategoryDetails' => $faqCategory]
                ], 200);
            } else {
                return response()->json([
                    'status' => true,
                    'message' => 'FAQ Category not added',
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
     * function to view a faq category
     * @return \Illuminate\Http\Response
     * */
    public function viewFaqCategory($faqCategoryId)
    {
        try {
            if ($faqCategoryId) {
                $faqCategory = FaqCategories::find($faqCategoryId);
                if ($faqCategory) {
                    return response()->json([
                        'status' => true,
                        'message' => 'FAQ category Details',
                        'data' => ['faqCategoryDetails' => $faqCategory]
                    ], 200);
                } else {
                    return response()->json([
                        'status' => true,
                        'message' => 'FAQ category details not found',
                        'data' => []
                    ], 400);
                }
            } else {
                return response()->json([
                    'status' => true,
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
     * function to create a faq category
     * @return \Illuminate\Http\Response
     * */
    public function createFaqCategory(Request $request)
    {
        try {
            $faqCategoryName = $request->faqCategoryName;
            $validator = Validator::make($request->all(), [
                'faqCategoryName' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                    'data' => []
                ], 400);
            }
            // try to save faq category
            $faqCategory = new FaqCategories;
            $faqCategory->name = $faqCategoryName;
            $faqCategory->slug = str_slug($faqCategoryName);
            if ($faqCategory->save()) {
                return response()->json([
                    'status' => true,
                    'message' => 'FAQ category created successfully',
                    'data' => ['faqCategoryDetails' => $faqCategory]
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'FAQ category not created',
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
     * function to edit faq category
     * @return \Illuminate\Http\Response
     * */
    public function editFaqCategory(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'faqCategoryName' =>  'required',
                'faqCategoryId'   =>  'required|exists:faqCategories,id,deleted_at,NULL'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                    'data' => []
                ], 400);
            }

            $faqCategoryId = $request->faqCategoryId;
            if ($faqCategoryId) {
                $editFaqCategory = FaqCategories::find($faqCategoryId);
                if ($editFaqCategory) {
                    $faqCategoryName = $request->faqCategoryName;
                    $editFaqCategory->name = $faqCategoryName;
                    // $editFaqCategory->slug = $faqCategoryName;
                    if ($editFaqCategory->save()) {
                        return response()->json([
                            'status' => true,
                            'message' => 'FAQ category updated successfully',
                            'data' => ['faqCategoryDetails' => $editFaqCategory]
                        ], 200);
                    } else {
                        return response()->json([
                            'status' => false,
                            'message' => 'FAQ category not update',
                            'data' => []
                        ], 400);
                    }
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'FAQ category not found',
                        'data' => []
                    ], 400);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'something went wrong',
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
     * Function to delete faq category
     * @return \Illuminate\Http\Response
     * */
    public function deleteFaqCategory($id)
    {
        try {
            $faqCategoryId = $id;

            if(!is_numeric($faqCategoryId)) {
              return response()->json([
                  'status'  => false,
                  'message' => 'Id is incorrect',
                  'data' => []
              ], 400);
            }
            $faqCategoryId = (int)$faqCategoryId;
            if ($faqCategoryId) {
                $deletefaqCategory = FaqCategories::find($faqCategoryId);
                if(!$deletefaqCategory) {
                  return response()->json([
                      'status'  => false,
                      'message' => 'This FAQ Category is not found',
                      'data'    => []
                  ], 400);
                }

                if ($deletefaqCategory->delete()) {
                    return response()->json([
                        'status' => true,
                        'message' => 'FAQ category deleted successfully',
                        'data' => []
                    ], 200);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Faq category not deleted',
                        'data' => []
                    ], 400);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'something went wrong',
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

    /**
    * get faq from a faqs object
    */
    private function getQAs($faqMapping, $admin = true) {
      $retArr = [];
      foreach($faqMapping as $key => $eachMapping)
        if(!$admin) {
          if($eachMapping->getFaq->first()->status == '1')
          $retArr[] = $eachMapping->getFaq->toArray();
        } else {
          $retArr[] = $eachMapping->getFaq->toArray();
        }
      return $retArr;
    }

    /*
     * Function to get category list and all questions and answers in ordered maner for that category
     * @return \Illuminate\Http\Response
     * */
    public function faqCategoryListUser() {
      try {
        //$faqCategories = FaqCategories::whereHas('getFaqMapping.getFaq')->get();
        $faqCategories = FaqCategories::orderBy('created_at','DESC')->with('faq')->get();
        // $result = [];
        // foreach($faqCategories as $key => $eachCategory) {
        //   $result[] = [
        //     'id'          =>  $eachCategory->id,
        //     'name'        =>  $eachCategory->name,
        //     'faq-details' =>  $this->getQAs($eachCategory->getFaqMapping, false)
        //   ];
        // }
        return response()->json([
            'status'  => true,
            'message' => 'All Faq Category with Related Faqs',
            'data'    => $faqCategories
        ], 200);
      } catch (\Exception $e) {
        return response()->json([
            'status'      => false,
            'message'     => $e->getMessage(),
            'errorLineNo' => $e->getLine(),
            'data'        => []
        ], 500);
      }
    }

    /*
     * Function to get all questions and answers from faq in ordered maner for that category
     * @return \Illuminate\Http\Response
     * */
    public function allFaqQuestions() {
      try {
        $faqs = Faqs::where('status','1')->get()->toArray();
        return response()->json([
            'status'  => true,
            'message' => 'All Faq Questions',
            'data'    => $faqs
        ], 200);
      } catch(\Exception $e) {
        return response()->json([
            'status'      => false,
            'message'     => $e->getMessage(),
            'errorLineNo' => $e->getLine(),
            'data'        => []
        ], 500);
      }
    }
}
