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
use App\Models\BlogComment;

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

    /*
     *  Function to add comments to a blog
     *  @params [Request :: name, email, message, parentCommentId]
     *  @return \Illuminate\Http\JsonResponse
     * */
     public function addBlogComments(Request $request)
     {
         try {

            //checking valid blogid
            if(!$request->has('blogId') || !is_numeric($request->blogId)) {
              print_r($request->blogId);die();
             return response()->json([
                 'status'   => false,
                 'message'  => 'Invalid blogId!',
                 'data'     => []
             ], 400);
            }
            $blogId = $request->blogId;

            //checking valid message
            if(!$request->has('message') || strlen(trim($request->message)) == 0) {
             return response()->json([
                 'status'   => false,
                 'message'  => 'Invalid Message!',
                 'data'     => []
             ], 400);
            }
            $message = $request->message;

            //checking valid name
            if(!$request->has('name') || strlen(trim($request->name)) == 0) {
              return response()->json([
                  'status'   => false,
                  'message'  => 'Name is invalid',
                  'data'     => []
              ], 400);
            }
            $name    = $request->name;

            //checking valid email
            if(!$request->has('email') || strlen(trim($request->email)) == 0 || !(filter_var($request->email, FILTER_VALIDATE_EMAIL))) {
              return response()->json([
                  'status'   => false,
                  'message'  => 'Email is invalid',
                  'data'     => []
              ], 400);
            }
            $email  = $request->email;

            //checking valid parentCommentId
            if(!$request->has('parentCommentId') || !is_numeric($request->parentCommentId)) {
              return response()->json([
                  'status'   => false,
                  'message'  => 'Incorrect parentCommentId',
                  'data'     => []
              ], 400);
            }

            if($request->parentCommentId > 0 && !BlogComment::find($request->parentCommentId)) {
              return response()->json([
                  'status'   => false,
                  'message'  => 'Incorrect parentCommentId, this parentCommentId does not exist',
                  'data'     => []
              ], 400);
            }

            //if another comment has the same parentCommentId then 2 messages cannot have the same parentCommentId
            $count = BlogComment::where('parent_comment_id', $request->parentCommentId)->where('status' , '1')->count();
            if($count > 0) {
              return response()->json([
                  'status'   => false,
                  'message'  => 'Other message share the same parentCommentId, thus invalid',
                  'data'     => []
              ], 400);
            }

            $parentCommentId  = $request->parentCommentId;

            // find the blog to which the comment should be added
            $blog                       = Blogs::findorfail($blogId);
            $comment                    = new BlogComment();
            $comment->blog_id           = $blogId;
            $comment->email             = $email;
            $comment->name              = $name;
            $comment->message           = $message;
            $comment->status            = '1';
            $comment->parent_comment_id = $parentCommentId;

            if ($comment->save()) {
               return response()->json([
                   'status'   => true,
                   'message'  => 'Message saved',
                   'data'     => ['message' => $comment]
               ], 200);
            } else {
               return response()->json([
                   'status'   => false,
                   'message'  => 'Message not saved. Database Connectivity Error!',
                   'data'     => []
               ], 400);
            }
         } catch(ModelNotFoundException $me) {
           return response()->json([
               'status'       => false,
               'message'      => $me->getMessage(),
               'errorLineNo'  => $me->getLine(),
               'data'         => []
           ], 500);
         } catch (Exception $e) {
             return response()->json([
                 'status'       => false,
                 'message'      => $e->getMessage(),
                 'errorLineNo'  => $e->getLine(),
                 'data'         => []
             ], 500);
         }
     }
}
