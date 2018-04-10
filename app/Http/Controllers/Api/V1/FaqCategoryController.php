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
                    'message' => $validator,
                    'data' => []
                ], 400);
            }
            // try to save faq category
            $faqCategory = new FaqCategories;
            $faqCategory->name = $faqCategoryName;
            $faqCategory->slug = $faqCategoryName;
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
            $faqCategoryId = $request->faqCategoryId;
            if ($faqCategoryId) {
                $editFaqCategory = FaqCategories::findorfail($faqCategoryId);
                if ($editFaqCategory) {
                    $faqCategoryName = $request->faqCategoryName;
                    $validator = Validator::make($request->all(), [
                        'faqCategoryName' => 'required'
                    ]);

                    if ($validator->fails()) {
                        return response()->json([
                            'status' => false,
                            'message' => $validator,
                            'data' => []
                        ], 400);
                    }
                    // try to update faq category
                    $editFaqCategory->name = $faqCategoryName;
                    $editFaqCategory->slug = $faqCategoryName;
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
    public function deleteFaqCategory(Request $request)
    {
        try {
            $faqCategoryId = $request->faqCategoryId;
            if ($faqCategoryId) {
                $deletefaqCategory = FaqCategories::findorfail($faqCategoryId);
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


}