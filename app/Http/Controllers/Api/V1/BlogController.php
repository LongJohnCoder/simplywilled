<?php
/**
 * Functional Scope: API for Create,Edit,View,Delete Blog.
 */

namespace App\Http\Controllers\Api\V1;

use App\Exceptions\HttpBadRequestException;
use App\User;
use App\Role;
use App\Categories;
use App\Models\PasswordReset;
use App\Blogs;
use App\CategoryBlogMapping;
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

class BlogController extends Controller
{

    /*
     * function to fetch list of blogs
     *
     * */
    public function blogList()
    {
        try {
            $blogs = Blogs::with('blogCategory')->get();
            if ($blogs) {
                return response()->json([
                    'status' => true,
                    'message' => 'Blog List',
                    'data' => ['BlogDetails' => $blogs]
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Blog not added',
                    'data' => ['BlogDetails' => $blogs]
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => []
            ], 500);
        }
    }

    /*
     * function to view blog
     * use : use this function to create a view of the particuller Blog
     * @return \Illuminate\Http\JsonResponse
     * */
    public function viewBlog($blogId)
    {
        try {
            if ($blogId) {
                $blogs = Blogs::where('id', $blogId)->with('blogCategory')->first();
                if ($blogs) {
                    return response()->json([
                        'status' => true,
                        'message' => 'Blog details',
                        'data' => ['blogDetails' => $blogs]
                    ], 200);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Blog not found ',
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
                'data' => []
            ], 500);
        }
    }

    /*
     * Function to Create Blog
     * @return \Illuminate\Http\JsonResponse
     * */
    public function createBlog(Request $request)
    {
        try {
            $blogAuthorId = Auth::user()->id;
            $blogTitle = $request->blogTitle;
            $blogBody = $request->blogBody;
            $blogStatus = $request->blogStatus;
            $blogFeatured = $request->blogFeatured;
            $blogCategorys = $request->blogCategorys;
            $supportedImageFormat = array('jpeg', 'jpg', 'png', 'gif');
            $generateFileName = date("YmdHis");
            $blogSeoTitle = $request->blogSeoTitle;
            $blogMetaDesc = $request->blogMetaDescription;
            $blogMetaKeyword = $request->blogMetaKeyword;

            $validator = Validator::make($request->all(), [
                'blogTitle' => 'required',
                'blogBody' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator,
                    'data' => []
                ], 400);
            }
            // Check file is in param
            if ($request->hasFile('blogImage')) {

                $extension = $request->blogImage->extension();

                if (in_array($extension, $supportedImageFormat)) {

                    // Save new file
                    $imageName = $generateFileName . '.' . $extension;
                    $request->blogImage->move(public_path('/blogImage'), $imageName);
                    $imagePath = asset('blogImage/' . $imageName);

                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'File format not supported',
                        'data' => []
                    ], 400);

                }
            } else {
                $imageName = "";
            }

            //try to save the blog
            $saveBlog = new Blogs;
            $saveBlog->title = $blogTitle;
            $saveBlog->body = $blogBody;
            $saveBlog->image = $imageName;
            $saveBlog->author_id = $blogAuthorId;
            $saveBlog->slug = $blogTitle;
            $saveBlog->meta_description = $blogMetaDesc;
            $saveBlog->meta_keywords = $blogMetaKeyword;
            $saveBlog->status = $blogStatus;
            $saveBlog->featured = $blogFeatured;
            $saveBlog->seo_title = $blogSeoTitle;
            if ($saveBlog->save()) {
                $blogId = $saveBlog->id;
                if ($blogCategorys) {
                    foreach ($blogCategorys as $key => $value) {
                        $saveBlogcategory = new CategoryBlogMapping;
                        $saveBlogcategory->blog_id = $blogId;
                        $saveBlogcategory->category_id = $value;
                        $saveBlogcategory->save();
                    }
                }
                $getBlogInfo = $saveBlog::where('id', $blogId)->with('blogCategory')->get(); // query to get created blog data
                return response()->json([
                    'status' => true,
                    'message' => 'Blog created successfully',
                    'data' => ['blogDetails' => $getBlogInfo]
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Failed to create blog',
                    'data' => []
                ], 400);
            }

        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => []
            ], 500);
        }
    }

    /*
     * Function to Edit a blog
     * @return \Illuminate\Http\JsonResponse
     * */
    public function editBlog(Request $request)
    {
        try {
            $blogId = $request->blogId;
            $blogAuthorId = Auth::user()->id;
            $blogTitle = $request->blogTitle;
            $blogBody = $request->blogBody;
            $blogStatus = $request->blogStatus;
            $blogFeatured = $request->blogFeatured;
            $blogCategorys = $request->blogCategorys;
            $supportedImageFormat = array('jpeg', 'jpg', 'png', 'gif');
            $generateFileName = date("YmdHis");
            $blogSeoTitle = $request->blogSeoTitle;
            $blogMetaDesc = $request->blogMetaDescription;
            $blogMetaKeyword = $request->blogMetaKeyword;
            if ($blogId) {
                $getBlogInfo = Blogs::findorfail($blogId);
                if ($getBlogInfo) {
                    $validator = Validator::make($request->all(), [
                        'blogTitle' => 'required',
                        'blogBody' => 'required'
                    ]);

                    if ($validator->fails()) {
                        return response()->json([
                            'status' => false,
                            'message' => $validator,
                            'data' => []
                        ], 400);
                    }
                    // Check file is in param
                    if ($request->hasFile('blogImage')) {

                        $extension = $request->blogImage->extension();

                        if (in_array($extension, $supportedImageFormat)) {

                            // Save new file
                            $imageName = $generateFileName . '.' . $extension;
                            $request->blogImage->move(public_path('/blogImage'), $imageName);
                            $imagePath = asset('blogImage/' . $imageName);

                        } else {
                            return response()->json([
                                'status' => false,
                                'message' => 'File format not supported',
                                'data' => []
                            ], 400);

                        }
                    } else {
                        $imageName = $getBlogInfo->image;
                    }
                    //try to update the blog
                    $getBlogInfo->title = $blogTitle;
                    $getBlogInfo->body = $blogBody;
                    $getBlogInfo->image = $imageName;
                    $getBlogInfo->author_id = $blogAuthorId;
                    $getBlogInfo->slug = $blogTitle;
                    $getBlogInfo->meta_description = $blogMetaDesc;
                    $getBlogInfo->meta_keywords = $blogMetaKeyword;
                    $getBlogInfo->status = $blogStatus;
                    $getBlogInfo->featured = $blogFeatured;
                    $getBlogInfo->seo_title = $blogSeoTitle;
                    if ($getBlogInfo->save()) {
                        $getBlogCategorys = CategoryBlogMapping::where('blog_id', $blogId)->get(); // get blog category's
                        if ($getBlogCategorys) {
                            $deleteOldCategoryMap = CategoryBlogMapping::where('blog_id', $blogId)->delete(); // delete old category map and create new category map
                            foreach ($blogCategorys as $key => $value) {
                                $saveBlogcategory = new CategoryBlogMapping;
                                $saveBlogcategory->blog_id = $blogId;
                                $saveBlogcategory->category_id = $value;
                                $saveBlogcategory->save();
                            }
                        } else {
                            foreach ($blogCategorys as $key => $value) {
                                $saveBlogcategory = new CategoryBlogMapping;
                                $saveBlogcategory->blog_id = $blogId;
                                $saveBlogcategory->category_id = $value;
                                $saveBlogcategory->save();
                            }
                        }
                        $getBlogInfo = $getBlogInfo::where('id', $blogId)->with('blogCategory')->get(); // query to get created blog data
                        return response()->json([
                            'status' => true,
                            'message' => 'Blog updated successfully',
                            'data' => ['blogDetails' => $getBlogInfo]
                        ], 200);
                    } else {
                        return response()->json([
                            'status' => false,
                            'message' => 'Blog not updated !',
                            'data' => []
                        ], 400);
                    }
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Blog not found for update ',
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
     * Function to delete a blog
     *@return \Illuminate\Http\JsonResponse
     * */
    public function deleteBlog(Request $request)
    {
        try {
            $blogId = $request->blogId;
            if ($blogId) {
                $deleteBlog = Blogs::findorfail($blogId);   // find the blog
                $deleteBlogCategoryMap = CategoryBlogMapping::where('blog_id', $blogId)->delete();   //delete blog and category map
                if ($deleteBlog->delete()) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Blog deleted',
                        'data' => []
                    ], 400);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Blog not deleted ',
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
