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
            $getAllFaq = Faqs::with('faqCategory.getFaqCategory')->get();
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
                $getFaq = Faqs::find($faqId);
                if(!$getFaq) {
                  return response()->json([
                      'status' => true,
                      'message' => 'This id is invalid!',
                      'data' => []
                  ], 400);
                }

                $faqDetails = new \stdClass;
                $faqDetails->id = $getFaq->id;
                $faqDetails->question = $getFaq->question;
                $faqDetails->answer = $getFaq->answer;
                $faqDetails->status = $getFaq->status;
                $faqDetails->created_at = $getFaq->created_at;
                $faqDetails->faq_category = $getFaq->faqCategory->pluck('faq_category_id');

                return response()->json([
                    'status' => true,
                    'message' => 'FAQ details',
                    'data' => ['faqDetails' => $faqDetails]
                ], 200);
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

            $faqCategory = $request->faqCategorys;
            if(!isset($faqCategory[0])) {
              return response()->json([
                  'status'  => false,
                  'message' => 'faqCategory must be an array type field, and contain category ids',
                  'data'    => []
              ], 400);
            }
            $faqCategory = explode(',',$faqCategory[0]);
            $faqQuestion = $request->faqQuestion;
            $faqAnswer = $request->faqAnswer;
            $faqStatus = $request->faqStatus; // 1--> Publish 0-->unPublish
            $validator = Validator::make($request->all(), [
                'faqQuestion' => 'required',
                'faqAnswer' => 'required',
                'faqStatus' =>  'required|numeric|between:0,1|integer',
                'faqCategorys' =>  'nullable|array'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                    'data' => []
                ], 400);
            }

            foreach ($faqCategory as $key => $value) {
              if(!FaqCategories::find($value)) {
                  return response()->json([
                    'status'  =>  false,
                    'message' =>  'faq category id '.$value.' does not exists',
                    'data'    =>  []
                  ],400);
              }
            }

            //try to save faq
            $faq = new Faqs;
            $faq->question  = $faqQuestion;
            $faq->answer    = $faqAnswer;
            $faq->status    = (string)$faqStatus;

            //interchanging value with key to hash search for faster results
            $validCategoryId = array_flip(FaqCategories::pluck('id')->toArray());
            if ($faq->save()) {
                $faqId = $faq->id;
                if (count($faqCategory) > 0) {
                    foreach ($faqCategory as $key => $value) {
                      if(isset($validCategoryId[$value])) {
                        $saveFaqmap = new FaqCategoryMapping;
                        $saveFaqmap->faq_category_id = $value;
                        $saveFaqmap->faq_id = $faqId;
                        $saveFaqmap->save();
                      }
                    }
                }
                $getCreatedFaq = Faqs::where('id', $faqId)->first();

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
          $faqId       = $request->faqId;
          $faqQuestion = $request->faqQuestion;
          $faqAnswer   = $request->faqAnswer;
          $faqStatus   = $request->faqStatus;
          $getFaq      = Faqs::find($faqId);
          if (!$getFaq) {
            return response()->json([
                'status'  => false,
                'message' => 'Faq is not existed',
                'data'    => []
            ], 400);
          }
          $faqCategories = $request->faqCategorys;
          if(empty($faqCategories)) {
            return response()->json([
                'status'  => false,
                'message' => 'faqCategory must be an array type field, and contain category ids',
                'data'    => []
            ], 400);
          } else {
            $deleteFaqCategory = FaqCategoryMapping::where('faq_id', $faqId)
                  ->whereNotIn('faq_category_id', $faqCategories)
                  ->delete();
            foreach ($faqCategories as $key => $value) {
              if(!FaqCategories::find($value)) {
                  return response()->json([
                    'status'  =>  false,
                    'message' =>  'faq category id '.$value.' does not exists',
                    'data'    =>  []
                  ],400);
              } else {
                $faqCategory = FaqCategoryMapping::where('faq_id', $faqId)->where('faq_category_id', $value)->first();
                if (!$faqCategory) {
                  $saveFaqmap = new FaqCategoryMapping;
                  $saveFaqmap->faq_category_id = $value;
                  $saveFaqmap->faq_id = $faqId;
                  $saveFaqmap->save();
                }
              }
            }
          }

          $getFaq->question = $faqQuestion;
          $getFaq->answer   = $faqAnswer;
          $getFaq->status   = $faqStatus;
          if ($getFaq->save()) {
            return response()->json([
                'status' => true,
                'message' => 'FAQ updated successfully',
                'data' => []
            ], 200);
          }

          return response()->json([
              'status' => false,
              'message' => 'FAQ updated failed',
              'data' => []
          ], 400);

          // $validator = Validator::make($request->all(), [
          //   'faqQuestion'   =>  'required',
          //   'faqAnswer'     =>  'required',
          //   'faqId'         =>  'required|exists:faqs,id,deleted_at,NULL',
          //   // 'faqCategorys'  =>  'array',
          //   'faqStatus'     =>  'required|numeric|between:0,1|integer'
          // ]);
          //
          // if ($validator->fails()) {
          //     return response()->json([
          //         'status' => false,
          //         'message' => $validator->errors(),
          //         'data' => []
          //     ], 400);
          // }
          //
          //   $faqCategory = $request->faqCategorys;
          //   if(empty($faqCategory)) {
          //     return response()->json([
          //         'status'  => false,
          //         'message' => 'faqCategory must be an array type field, and contain category ids',
          //         'data'    => []
          //     ], 400);
          //   }
          //   $validator = Validator::make($request->all(), [
          //     'faqQuestion'   =>  'required',
          //     'faqAnswer'     =>  'required',
          //     'faqId'         =>  'required|exists:faqs,id,deleted_at,NULL',
          //     'faqCategorys'  =>  'array',
          //     'faqStatus'     =>  'required|numeric|between:0,1|integer'
          //   ]);
          //
          //   if ($validator->fails()) {
          //       return response()->json([
          //           'status' => false,
          //           'message' => $validator->errors(),
          //           'data' => []
          //       ], 400);
          //   }
          //
          //   foreach ($faqCategory as $key => $value) {
          //     if(!FaqCategories::find($value)) {
          //         return response()->json([
          //           'status'  =>  false,
          //           'message' =>  'faq category id '.$value.' does not exists',
          //           'data'    =>  []
          //         ],400);
          //     }
          //   }
          //
          //   $faqQuestion = $request->faqQuestion;
          //   $faqAnswer = $request->faqAnswer;
          //   $faqStatus = (string)$request->faqStatus; // 1--> Publish 0-->unPublish
          //
          //   $faqId = (int)$request->faqId;
          //   if ($faqId) {
          //       $getFaq = Faqs::find($faqId);
          //       if ($getFaq) {
          //           $faqQuestion  = $request->faqQuestion;
          //           $faqAnswer    = $request->faqAnswer;
          //           $faqStatus    = $request->faqStatus; // 1--> Publish 0-->unPublish
          //           $faqCategory  = $request->faqCategory;
          //           //interchanging value with key to hash search for faster results
          //           $validCategoryId = array_flip(FaqCategories::pluck('id')->toArray());
          //           // try to update FAQ
          //           $getFaq->question = $faqQuestion;
          //           $getFaq->answer   = $faqAnswer;
          //           $getFaq->status   = $faqStatus;
          //           if ($getFaq->save()) {
          //               if ($faqCategory) {
          //                   // try to update faq category
          //                   $getFaqCategory = FaqCategoryMapping::where('faq_id', $faqId)->get();
          //                   if ($getFaqCategory) {
          //                       $deleteFaqCategory = FaqCategoryMapping::where('faq_id', $faqId)->delete();
          //                       foreach ($faqCategory as $key => $value) {
          //                         if(isset($validCategoryId[$value])) {
          //                           $saveFaqmap = new FaqCategoryMapping;
          //                           $saveFaqmap->faq_category_id = $value;
          //                           $saveFaqmap->faq_id = $faqId;
          //                           $saveFaqmap->save();
          //                         }
          //                       }
          //                   } else {
          //                       // try to create faq category
          //                       foreach ($faqCategory as $key => $value) {
          //                         if(isset($validCategoryId[$value])) {
          //                           $saveFaqmap = new FaqCategoryMapping;
          //                           $saveFaqmap->faq_category_id = $value;
          //                           $saveFaqmap->faq_id = $faqId;
          //                           $saveFaqmap->save();
          //                         }
          //                       }
          //                   }
          //               }
          //               $getCreatedFaq = Faqs::where('id', $faqId)->first();
          //               return response()->json([
          //                   'status' => true,
          //                   'message' => 'FAQ updated successfully',
          //                   'data' => ['faqDetails' => $getCreatedFaq]
          //               ], 200);
          //           }
          //       } else {
          //           return response()->json([
          //               'status' => false,
          //               'message' => 'FAQ not found',
          //               'data' => []
          //           ], 400);
          //       }
          //   } else {
          //       return response()->json([
          //           'status' => false,
          //           'message' => 'Something went wrong',
          //           'data' => []
          //       ], 400);
          //   }
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
    public function deleteFaq($id)
    {
        try {
            $faqId = $id;
            if(!is_numeric($faqId)) {
              return response()->json([
                  'status'  => false,
                  'message' => 'Id is invalid',
                  'data' => []
              ], 400);
            }
            $faqId = (int)$faqId;

            if ($faqId) {
                $deleteFaq = Faqs::find($faqId);
                if(!$deleteFaq) {
                  return response()->json([
                      'status' => false,
                      'message' => 'This FAQ could not be found',
                      'data' => []
                  ], 400);
                }
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
