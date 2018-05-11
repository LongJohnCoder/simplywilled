<?php
/**
 * Functional Scope: API for Create,Edit,View,Delete Category.
 */
namespace App\Http\Controllers\Api\V1;
use App\Exceptions\HttpBadRequestException;
use App\User;
use App\Role;
use App\Categories;
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

use App\CategoryBLogMapping;

class CategoryController extends Controller {


    /*
     * Function to Display the List of all category
     * @return \Illuminate\Http\Response
     * */

    public function categoryList(){
        try{
            $category = Categories::with('blogMapping.blog')->get();
            if($category){
                return response()->json([
                    'status' => true,
                    'message' => 'Category Details',
                    'data' => ['categoryDetails' => $category]
                ], 200);
            }else{
                return response()->json([
                    'status' => true,
                    'message' => 'Category not added',
                    'data' => []
                ], 400);
            }
        }catch(Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => []
            ], 500);
        }
    }

    /*
     * Function to Create Category
     * @return \Illuminate\Http\JsonResponse
     * */

    public function createCategory(Request $request){
        try{
            $categoryName = $request->categoryName;

            $validator = Validator::make($request->all(), [
                'categoryName' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                    'data' => []
                ], 400);
            }

            $category = new Categories;
            $category->name = $categoryName;
            $category->slug = str_slug($categoryName);

            if($category->save()){
                return response()->json([
                    'status' => true,
                    'message' => 'Category created successfully',
                    'data' => ['categoryDetails' => $category]
                ], 200);
            }
            return response()->json([
                'status' => false,
                'message' => 'Internal Server Error',
                'data' => []
            ], 500);

        } catch (Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => []
            ], 500);
        }

    }

    /*
     *Function to view a category by its id
     * use : use this function to create a view of the particuller category
     * @return \Illuminate\Http\JsonResponse
     * */

    public function viewCategory($categoryId){
        try {
            //dd($categoryId);
            if(!is_numeric($categoryId)) {
              return response()->json([
                  'status' => false,
                  'message' => 'Category id is incorrect',
                  'data' => []
              ], 400);
            }
            $categoryId = (int)$categoryId;
            if ($categoryId) {
                $category = Categories::find($categoryId);
                if ($category) {
                    return response()->json([
                        'status' => true,
                        'message' => 'Category Details',
                        'data' => ['categoryDetails' => $category]
                    ], 200);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Cant find any category',
                        'data' => []
                    ], 400);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Internal Server Error',
                    'data' => []
                ], 500);
            }
        }catch(Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => []
            ], 500);
        }

    }



    /*
     * Function to Edit Category
     * @return \Illuminate\Http\JsonResponse
     * */

    public function editCategory(Request $request){

        try{

          $validator = Validator::make($request->all(), [
              'categoryId'    =>  'required|exists:categories,id,deleted_at,NULL',
              'categoryName'  =>  'required'
          ]);
          if ($validator->fails()) {
              return response()->json([
                  'status'  => false,
                  'message' => $validator->errors(),
                  'data'    => []
              ], 400);
          }

        $categoryId = $request->categoryId;
        $categoryName = $request->categoryName;
        $categoryName = trim($categoryName);
        $categoryId = (int)$categoryId;
        if($categoryId) {
            $category = Categories::find($categoryId);
            if($category){
                $category->name = $categoryName;
                // $category->slug = $categoryName;
                if($category->save()){
                    return response()->json([
                        'status' => true,
                        'message' => 'Category updated successfully',
                        'data' => ['categoryDetails' => $category]
                    ], 200);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'faild to update category ',
                        'data' => []
                    ], 500);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Category not found',
                    'data' => []
                ], 500);
            }

        }else{
            return response()->json([
                'status' => false,
                'message' => 'Internal Server Error',
                'data' => []
            ], 500);
        }
    } catch(Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => []
            ], 500);
        }
    }

    /*
     * Function to Delete a category
     * @return \Illuminate\Http\JsonResponse
     * */

    public function deleteCategory($id){
        try {
            $categoryId = $id;
            if ($categoryId) {
                $category = Categories::find($categoryId);
                if ($category) {
                    $category->blogMapping()->delete();
                    if ($category->delete()) {
                        // CategoryBLogMapping::where('category_id',$categoryId)->delete();
                        return response()->json([
                            'status' => true,
                            'message' => 'Category Deleted',
                            'data' => ['categoryDetails' => $category]
                        ], 200);
                    }else{
                        return response()->json([
                            'status' => false,
                            'message' => 'Category not deleted',
                            'data' => []
                        ], 400);
                    }
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Cant find any category',
                        'data' => []
                    ], 400);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Internal Server Error',
                    'data' => []
                ], 500);
            }
        }catch (Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => []
            ], 500);
        }

    }

}
