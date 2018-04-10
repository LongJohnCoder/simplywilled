<?php
/**
 * Functional Scope: API for Create,Edit,View,Delete FAQ.
 */

namespace App\Http\Controllers\Api\V1;

use App\Exceptions\HttpBadRequestException;
use App\User;
use App\Role;
use App\Categories;
use App\FaqCategories;
use App\Faqs;
use App\FaqCategoryMapping;
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

class FaqController extends Controller
{

    /*
     * function to get list of faqs
     * @return \Illuminate\Http\Response
     * */
    public function faqList()
    {
        try {
            $getAllFaq = Faqs::with('faqCategory')->get();
            if ($getAllFaq) {
                return response()->json([
                    'status' => true,
                    'message' => 'FAQ List',
                    'data' => ['faqDetails' => $getAllFaq]
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'FAQ not added',
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
     * function to view a faq
     * @return \Illuminate\Http\Response
     * */
    public function viewFaq($faqId)
    {
        try {
            if ($faqId) {
                $getFaq = Faqs::find($faqId)->with('faqCategory')->first();
                if ($getFaq) {
                    return response()->json([
                        'status' => true,
                        'message' => 'FAQ details',
                        'data' => ['faqDetails' => $getFaq]
                    ], 200);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'FAQ not found',
                        'data' => []
                    ], 400);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'FAQ id not found',
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
     * function to create FAQ
     * @return \Illuminate\Http\Response
     * */
    public function createFaq(Request $request)
    {
        try {
            $faqQuestion = $request->faqQuestion;
            $faqAnswer = $request->faqAnswer;
            $faqStatus = $request->faqStatus; // 1--> Publish 0-->unPublish
            $faqCategory = $request->faqCategory;
            $validator = Validator::make($request->all(), [
                'faqQuestion' => 'required',
                'faqAnswer' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator,
                    'data' => []
                ], 400);
            }
            //try to save faq
            $faq = new Faqs;
            $faq->question = $faqQuestion;
            $faq->answer = $faqAnswer;
            $faq->status = $faqStatus;
            if ($faq->save()) {
                $faqId = $faq->id;
                if ($faqCategory) {
                    foreach ($faqCategory as $key => $value) {
                        $saveFaqmap = new FaqCategoryMapping;
                        $saveFaqmap->faq_category_id = $value;
                        $saveFaqmap->faq_id = $faqId;
                        $saveFaqmap->save();
                    }
                }
                $getCreatedFaq = Faqs::where('id', $faqId)->with('faqCategory')->get();
                return response()->json([
                    'status' => true,
                    'message' => 'FAQ created successfully',
                    'data' => ['faqDetails' => $getCreatedFaq]
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
     * function to edit FAQ
     * @return \Illuminate\Http\Response
     * */
    public function editFaq(Request $request)
    {
        try {
            $faqId = $request->faqId;
            if ($faqId) {
                $getFaq = Faqs::findorfail($faqId);
                if ($getFaq) {
                    $faqQuestion = $request->faqQuestion;
                    $faqAnswer = $request->faqAnswer;
                    $faqStatus = $request->faqStatus; // 1--> Publish 0-->unPublish
                    $faqCategory = $request->faqCategory;
                    $validator = Validator::make($request->all(), [
                        'faqQuestion' => 'required',
                        'faqAnswer' => 'required'
                    ]);

                    if ($validator->fails()) {
                        return response()->json([
                            'status' => false,
                            'message' => $validator,
                            'data' => []
                        ], 400);
                    }
                    // try to update FAQ
                    $getFaq->question = $faqQuestion;
                    $getFaq->answer = $faqAnswer;
                    $getFaq->status = $faqStatus;
                    if ($getFaq->save()) {
                        if ($faqCategory) {
                            // try to update faq category
                            $getFaqCategory = FaqCategoryMapping::where('faq_id', $faqId)->get();
                            if ($getFaqCategory) {
                                $deleteFaqCategory = FaqCategoryMapping::where('faq_id', $faqId)->delete();
                                foreach ($faqCategory as $key => $value) {
                                    $saveFaqmap = new FaqCategoryMapping;
                                    $saveFaqmap->faq_category_id = $value;
                                    $saveFaqmap->faq_id = $faqId;
                                    $saveFaqmap->save();
                                }
                            } else {
                                // try to create faq category
                                foreach ($faqCategory as $key => $value) {
                                    $saveFaqmap = new FaqCategoryMapping;
                                    $saveFaqmap->faq_category_id = $value;
                                    $saveFaqmap->faq_id = $faqId;
                                    $saveFaqmap->save();
                                }
                            }
                        }
                        $getCreatedFaq = Faqs::where('id', $faqId)->with('faqCategory')->get();
                        return response()->json([
                            'status' => true,
                            'message' => 'FAQ updated successfully',
                            'data' => ['faqDetails' => $getCreatedFaq]
                        ], 200);
                    }
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'FAQ not found',
                        'data' => []
                    ], 400);
                }
            } else {
                return response()->json([
                    'status' => false,
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
     * function to delete a FAQ
     * @return \Illuminate\Http\Response
     * */
    public function deleteFaq(Request $request)
    {
        try {
            $faqId = $request->faqId;
            if ($faqId) {
                $deleteFaq = Faqs::findorfail($faqId);
                if ($deleteFaq->delete()) {
                    $deleteFaqCategoryMap = FaqCategoryMapping::where('faq_id', $faqId)->delete();
                    return response()->json([
                        'status' => true,
                        'message' => 'FAQ deleted successfully',
                        'data' => []
                    ], 200);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'FAQ not deleted',
                        'data' => []
                    ], 400);
                }
            } else {
                return response()->json([
                    'status' => false,
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
}