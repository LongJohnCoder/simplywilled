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
use File;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Blogs;
use App\CategoryBlogMapping;

class CategoryController extends Controller {


    /*
     * Function to Display the List of all category
     * @return \Illuminate\Http\Response
     * */

    public function categoryList(){
        try{
            $category = Categories::with('blogMapping.blog')->where('id', '!=', 1)->get();
          //  $this->trackmetaJSON();
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
            // $keywords = explode(',', $request->meta_keywords);

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
            $category->seo_title = $request->seo_title;
            $category->meta_description = $request->meta_description;
            $category->meta_keywords = $request->meta_keywords;
            // $category->slug = str_slug($categoryName).strtotime("now");

            if($category->save()){
                $this->trackmetaJSON();
                $this->sitemap();
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
                  //  $this->trackmetaJSON();
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
        // $keywords = explode(',', $request->meta_keywords);
        $categoryId = (int)$categoryId;
        if($categoryId) {
            $category = Categories::find($categoryId);
            if($category){
                $category->name = $categoryName;
                $category->seo_title = $request->seo_title;
                $category->meta_description = $request->meta_description;
                $category->meta_keywords = $request->meta_keywords;
                if($category->save()){
                    $this->trackmetaJSON();
                    $this->sitemap();
                    return response()->json([
                        'status' => true,
                        'message' => 'Category updated successfully',
                        'data' => ['categoryDetails' => $category]
                    ], 200);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'failed to update category ',
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
                    $blogs = CategoryBlogMapping::where('category_id', $categoryId)->get();
                    foreach ($blogs as $fkey => $fvalue) {
                        $blogCat = CategoryBlogMapping::where('blog_id', $fvalue->blog_id)->count();
                        if ($blogCat == 1) {
                          $newBlogCat = new CategoryBlogMapping;
                          $newBlogCat->blog_id = $fvalue->blog_id;
                          $newBlogCat->category_id = 1;
                          $newBlogCat->save();
                        }
                    }
                    $category->blogMapping()->delete();
                    if ($category->delete()) {
                        $this->trackmetaJSON();
                        $this->sitemap();
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

    public function trackmetaJSON() {
       /* $filePath = resource_path('assets/metas/categorymetadatas.json');
        if (File::exists($filePath)) {
            File::delete($filePath);
        }*/
        $categoryList = Categories::with('blogMapping.blog')->where('id', '!=', 1)->get();

        foreach ($categoryList as $key => $category) {
            $categoryDetails['seo_title'] = !is_null($category) && isset($category->seo_title) && !is_null($category->seo_title) ? $category->seo_title : null;
            $categoryDetails['meta_description'] = !is_null($category) && isset($category->meta_description) && !is_null($category->meta_description) ? $category->meta_description : null;
            $categoryDetails['meta_keywords'] = !is_null($category) && isset($category->meta_keywords) && !is_null($category->meta_keywords) ? $category->meta_keywords : null;
            $categories[$category->slug] = $categoryDetails;
        }
        $categories['imageLink'] = env('BASE_URL').'/blogImage/';
        $file = 'categorymetadatas.json';
        $destinationPath= public_path('metas/');
        if (!is_dir($destinationPath)) {  mkdir($destinationPath,0777,true);  }
        File::put($destinationPath.$file,json_encode($categories));
        //dd(json_encode($blogs));
    }

    public function sitemap()
    {

        $categories         = Categories::all();
        $blogs              = Blogs::all();
        $data               = [];
        $data['categories'] = $categories;
        $data['blogs']      = $blogs;
        $data['blogPages']  = floor(count($blogs)/10);
        $content            = view('sitemap')->with($data);
        \Storage::disk('sitemap')->put('sitemap.xml', $content);
        /*return response($content)
            ->header('Content-Type', 'text/xml');*/
    }
}
