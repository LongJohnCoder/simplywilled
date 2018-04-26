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
use App\RoleUser;

class BlogController extends Controller
{

    /*
     * function to fetch list of blogs
     *
     * */
    public function blogList()
    {
        try {
            $blogs = Blogs::with('blogCategory')->orderBy('created_at','DESC')->get();
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
     * function to fetch list of blogs for user
     *
     * */
    public function blogListUser()
    {
        try {
            $blogs = Blogs::where('status','1')->with('blogCategory')->orderBy('created_at','DESC')->get();
            if ($blogs) {
                return response()->json([
                    'status'  => true,
                    'message' => 'Blog List Fetched successfully',
                    'data'    => ['BlogDetails' => $blogs]
                ], 200);
            } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'Blog not added',
                    'data'    => ['BlogDetails' => $blogs]
                ], 400);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => $e->getMessage(),
                'data'    => []
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

            $blogCategorys = $request->blogCategorys;
            if(!isset($blogCategorys[0])) {
              return response()->json([
                  'status'  => false,
                  'message' => 'blogCategories must be an array type field, and contain category ids',
                  'data'    => []
              ], 400);
            }
            $blogCategorys = explode(',',$blogCategorys[0]);
            $validator = Validator::make($request->all(), [
                'blogTitle'       =>  'required',
                'blogBody'        =>  'required',
                'blogStatus'      =>  'required|numeric|integer|between:0,1',
                'blogFeatured'    =>  'required|numeric|integer|between:0,1',
                'blogCategorys'   =>  'nullable|array'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status'  => false,
                    'message' => $validator->errors(),
                    'data'    => []
                ], 400);
            }
            foreach ($blogCategorys as $key => $value) {
              if(!Categories::find($value)) {
                  return response()->json([
                    'status'  =>  false,
                    'message' =>  'category id '.$value.' does not exists',
                    'data'    =>  []
                  ],400);
              }
            }

            $blogAuthorId = Auth::user()->id;
            $blogTitle = $request->blogTitle;
            $blogBody = $request->blogBody;
            $blogStatus = $request->blogStatus;
            $blogFeatured = $request->blogFeatured;
            //$blogCategorys = $request->blogCategorys;
            $supportedImageFormat = array('jpeg', 'jpg', 'png', 'gif');
            $generateFileName = date("YmdHis");
            $blogSeoTitle = $request->blogSeoTitle;
            $blogMetaDesc = $request->blogMetaDescription;
            $blogMetaKeyword = $request->blogMetaKeyword;

            $validator = Validator::make($request->all(), [
                'blogTitle' => 'required|string|max:255',
                'blogBody' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
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

            //interchanging value with key to hash search for faster results
            $validCategoryId = array_flip(Categories::pluck('id')->toArray());

            //try to save the blog
            $saveBlog = new Blogs;
            $saveBlog->title = $blogTitle;
            $saveBlog->body = $blogBody;
            $saveBlog->image = $imageName;
            $saveBlog->author_id = $blogAuthorId;
            $saveBlog->slug = $blogTitle;
            $saveBlog->meta_description = $blogMetaDesc;
            $saveBlog->meta_keywords = $blogMetaKeyword;
            $saveBlog->status = (string)$blogStatus;
            $saveBlog->featured = (string)$blogFeatured;
            $saveBlog->seo_title = $blogSeoTitle;
            if ($saveBlog->save()) {
                $blogId = $saveBlog->id;
                if (count($blogCategorys) > 0) {
                    foreach ($blogCategorys as $key => $value) {
                        if(isset($validCategoryId[$value])) {
                          $saveBlogcategory = new CategoryBlogMapping;
                          $saveBlogcategory->blog_id = $blogId;
                          $saveBlogcategory->category_id = $value;
                          $saveBlogcategory->save();
                        }
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

            $blogCategorys = $request->blogCategorys;
            if(!isset($blogCategorys[0])) {
              return response()->json([
                  'status'  => false,
                  'message' => 'blogCategories must be an array type field, and contain category ids',
                  'data'    => []
              ], 400);
            }
            $blogCategorys = explode(',',$blogCategorys[0]);
            $validator = Validator::make($request->all(), [
                'blogTitle'       =>  'required',
                'blogBody'        =>  'required',
                'blogId'          =>  'required|integer|exists:blogs,id,deleted_at,NULL',
                'blogStatus'      =>  'required|numeric|integer|between:0,1',
                'blogFeatured'    =>  'required|numeric|integer|between:0,1',
                'blogCategorys'   =>  'nullable|array'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status'  => false,
                    'message' => $validator->errors(),
                    'data'    => []
                ], 400);
            }
            foreach ($blogCategorys as $key => $value) {
              if(!Categories::find($value)) {
                  return response()->json([
                    'status'  =>  false,
                    'message' =>  'category id '.$value.' does not exists',
                    'data'    =>  []
                  ],400);
              }
            }

            $blogId = $request->blogId;
            $blogId = (int)$blogId;
            $blogAuthorId = Auth::user()->id;
            $blogTitle = $request->blogTitle;
            $blogBody = $request->blogBody;
            $blogStatus = $request->blogStatus;
            $blogFeatured = $request->blogFeatured;
            $supportedImageFormat = array('jpeg', 'jpg', 'png', 'gif');
            $generateFileName = date("YmdHis");
            $blogSeoTitle = $request->blogSeoTitle;
            $blogMetaDesc = $request->blogMetaDescription;
            $blogMetaKeyword = $request->blogMetaKeyword;
            if ($blogId) {

                $getBlogInfo = Blogs::find($blogId);
                if ($getBlogInfo) {

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
                    $getBlogInfo->status = (string)$blogStatus;
                    $getBlogInfo->featured = (string)$blogFeatured;
                    $getBlogInfo->seo_title = $blogSeoTitle;

                    if ($getBlogInfo->save()) {

                        $getBlogCategorys = CategoryBlogMapping::where('blog_id', $blogId)->orderBy('created_at','DESC')->get(); // get blog category's
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
                        //$getBlogInfo = $getBlogInfo::where('id', $blogId)->with('blogCategory')->orderBy('created_at','DESC')->get(); // query to get created blog data
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
                    'message' => 'blogId field has incorrect value',
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
    public function deleteBlog($id)
    {
        try {
            $blogId = (int)$id;
            if ($blogId) {
                $deleteBlog = Blogs::find($blogId);   // find the blog

                if(!$deleteBlog) {
                  return response()->json([
                      'status'  => false,
                      'message' => 'Invalid id',
                      'data'    => []
                  ], 400);
                }
                $deleteBlogCategoryMap = CategoryBlogMapping::where('blog_id', $blogId)->delete();   //delete blog and category map

                if ($deleteBlog->delete()) {
                    return response()->json([
                        'status'  => true,
                        'message' => 'Blog deleted',
                        'data'    => []
                    ], 200);
                } else {
                    return response()->json([
                        'status'  => false,
                        'message' => 'Blog not deleted ',
                        'data'    => []
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
     *  @params [Request :: name, email, message, parentCommentId, blogId : (required, integer)]
     *  @return \Illuminate\Http\JsonResponse
     * */
     public function addBlogComments(Request $request)
     {
         try {
            //if User assosiated with this session is not found return valid error
            if(!\Auth::check()) {
              return response()->json([
                  'status'   => false,
                  'message'  => 'User data not found! Please log in again.',
                  'data'     => []
              ], 400);
            }
            $userId = \Auth::user()->id;

            $validator = Validator::make($request->all(), [
                'blogId'  =>  'required|exists:blogs,id,deleted_at,NULL',
                'message' =>  'required',
                'name'    =>  'required|string|max:255',
                'email'   =>  'required|email',
                'parentCommentId' => 'nullable|exists:blogComments,id,deleted_at,NULL'
            ]);


            if($validator->fails()) {
                return response()->json([
                    'status'  => false,
                    'message' => $validator->errors(),
                    'data'    => []
                ], 400);
            }
            $blogId   = (int)$request->blogId;
            $email    = $request->email;
            $name     = $request->name;
            $message  = $request->message;
            $parentCommentId = isset($request->parentCommentId) ? (int)$request->parentCommentId : 0;

            //if another comment has the same parentCommentId then 2 messages cannot have the same parentCommentId
            // if($parentCommentId != 0) {
            //   $count = BlogComment::where('parent_comment_id', $request->parentCommentId)->count();
            //   if($count > 0 && $request->parentCommentId != 0 ) {
            //     return response()->json([
            //         'status'   => false,
            //         'message'  => 'Other message share the same parentCommentId, thus invalid',
            //         'data'     => []
            //     ], 400);
            //   }
            // }
            // find the blog to which the comment should be added

            //the parent comment id must be an independant comment and have its parent comment id 0
            if($parentCommentId != 0) {
              $blogComment = BlogComment::find((int)$parentCommentId);
              if($blogComment->parent_comment_id > 0) {
                return response()->json([
                    'status'   => false,
                    'message'  => 'You cannot comment on a sub-comment!',
                    'data'     => []
                ], 400);
              }

              if($blogComment->blog_id != $blogId) {
                return response()->json([
                    'status'   => false,
                    'message'  => 'Blog id of parent comment and sub-comment does not match!',
                    'data'     => []
                ], 400);
              }
            }

            $blog                       = Blogs::find($blogId);
            $comment                    = new BlogComment();
            $comment->blog_id           = $blogId;
            $comment->email             = $email;
            $comment->name              = $name;
            $comment->message           = $message;
            $comment->status            = config('default_values.BlogComment.defaultBlogCommentStatus');
            $comment->parent_comment_id = $parentCommentId;
            $comment->user_id           = $userId;

            if($comment->save()) {
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

     /*
      *  Function to delete comments from a blog
      *  @params [Request :: id : (required, integer : type[blogComment id])]
      *  @return \Illuminate\Http\JsonResponse
      * */
      public function deleteBlogComments($id)
      {
          try {
            //rejecting delete request if blogComment id is invalid
            if(!is_numeric($id)) {
             return response()->json([
                 'status'   => false,
                 'message'  => 'Invalid BlogComment id!'
             ], 400);
            }
            $id = (int)$id;

            //only permit operation if the logged in user is admin
            if(!\Auth::check()) {
              return response()->json([
                  'status'   => false,
                  'message'  => 'User data not found! Please log in again.',
                  'data'     => []
              ], 400);
            }
            $user = \Auth::user();
            $userRoleId = Role::where('name', 'Admin')->first();

            if(!$userRoleId) {
              return response()->json([
                  'status'   => false,
                  'message'  => 'Permissions not configured properly, no role User',
                  'data'     => []
              ], 400);
            }
            $userRoleId = $userRoleId->id;
            $permission = RoleUser::where('user_id',$user->id)->where('role_id', $userRoleId)->first();
            if(!$permission) {
              return response()->json([
                  'status'   => false,
                  'message'  => 'You are not accessible for this operation',
                  'data'     => []
              ], 400);
            }

            if(BlogComment::find($id)->delete() && BlogComment::where('parent_comment_id',$id)->delete()) {
              return response()->json([
                  'status'    =>  true,
                  'message'   =>  'Comment Deleted Successfully!',
                  'data'      =>  []
              ], 200);
            } else {
              return response()->json([
                  'status'    =>  false,
                  'message'   =>  'Comment cannot be found!',
                  'data'      =>  []
              ], 400);
            }
          } catch(ModelNotFoundException $me) {
            return response()->json([
                'status'       => false,
                'message'      => $me->getMessage(),
                'errorLineNo'  => $me->getLine(),
                'data'         => []
            ], 500);
          } catch (\Exception $e) {
            return response()->json([
                'status'       => false,
                'message'      => $e->getMessage(),
                'errorLineNo'  => $e->getLine()
            ], 500);
          }
      }

      /*
       *  Function to delete comments from a blog
       *  @params [Request :: [id : (required, integer : type[blogComment id]), status : type: string,  [0(unapproved)/1(approved)]]]
       *  @return \Illuminate\Http\JsonResponse
       * */
       public function approveBlogComments(Request $request)
       {
           try {

             $validator = Validator::make($request->all(), [
                 'id'     =>  'required|exists:blogComments,id,deleted_at,NULL',
                 'status' =>  'required|numeric|between:0,1|integer',
             ]);

             if ($validator->fails()) {
                 return response()->json([
                     'status'  => false,
                     'message' => $validator->errors(),
                     'data'    => []
                 ], 400);
             }

             $id = (int)$request->id;

             //only permit operation if the logged in user is admin
             if(!\Auth::check()) {
               return response()->json([
                   'status'   => false,
                   'message'  => 'User data not found! Please log in again.',
                   'data'     => []
               ], 400);
             }
             $user = \Auth::user();
             $userRoleId = Role::where('name', 'Admin')->first();

             if(!$userRoleId) {
               return response()->json([
                   'status'   => false,
                   'message'  => 'Permissions not configured properly, no role User',
                   'data'     => []
               ], 400);
             }
             $userRoleId = $userRoleId->id;
             $permission = RoleUser::where('user_id',$user->id)->where('role_id', $userRoleId)->first();
             if(!$permission) {
               return response()->json([
                   'status'   => false,
                   'message'  => 'You are not accessible for this operation',
                   'data'     => []
               ], 400);
             }

             $status = (string)$request->status;
             $blogComment = BlogComment::find($id);
             $blogComment->status = (string)$status;
             if($blogComment->save()) {

               return response()->json([
                   'status'   => true,
                   'message'  => $blogComment->status == 1 ? 'Comment Approval Successful!' : 'Comment  Disapproval Successful!'
               ], 200);
             } else {
               return response()->json([
                   'status'   => false,
                   'message'  => 'Database connectivity error!'
               ], 400);
             }
           } catch(ModelNotFoundException $me) {
             return response()->json([
                 'status'       => false,
                 'message'      => $me->getMessage(),
                 'errorLineNo'  => $me->getLine(),
                 'data'         => []
             ], 500);
           } catch (\Exception $e) {
             return response()->json([
                 'status'       => false,
                 'message'      => $e->getMessage(),
                 'errorLineNo'  => $e->getLine()
             ], 500);
           }
       }



       /*
        *  Function to fetch sub-comments for a particular comment
        *  @params blogComment object
        *  @return array of sub-comments
        * */
       private function getBlogComments($blogComments , $admin = true) {
         $commentArray = [];
         if($blogComments) {
           \Log::info('blog comment id : '.$blogComments->id);
           if($admin) {
             $nextComment = BlogComment::where('parent_comment_id', $blogComments->id)->orderBy('created_at','DESC')->get();
           } else {
             $nextComment = BlogComment::where('parent_comment_id', $blogComments->id)->where('status','1')->orderBy('created_at','DESC')->get();
           }
           return $nextComment;
           // if($nextComment) {
           //   $blogComments = $nextComment;
           //   //user ccan see only approved comments by admin
           //   //where as admin can see all the comments whether they are approved or disapproved
           //   if(!$admin) {
           //     if($nextComment->status == '1') {
           //       $commentArray[] = $nextComment->toArray();
           //     }
           //   } else {
           //     $commentArray[] = $nextComment->toArray();
           //   }
           // } else {
           //   break;
           // }
         }
         return [];
       }

       /*
        *  Function to fetch a particular comment and assosiated replies for a blog
        *  @params [Request :: [id : (required, integer : type[blogComment id])]]
        *  @return \Illuminate\Http\JsonResponse
        * */
       public function fetchBlogSubCommentsAdmin(Request $request) {
         try {

           $validator = Validator::make($request->all(), [
               'id' =>  'required|exists:blogComments,id,deleted_at,NULL',
           ]);
           if ($validator->fails()) {
               return response()->json([
                   'status'  => false,
                   'message' => $validator->errors(),
                   'data'    => []
               ], 400);
           }

           $commentId     = $request->id;
           $commentId     = (int)$commentId;
           $commentArray  = [];
           $blogComments  = BlogComment::find($commentId);

           if(!$blogComments) {
             return response()->json([
                 'status'   =>  false,
                 'message'  =>  'Invalid id',
                 'data'     =>  []
             ], 400);
           }

           $commentArray = $this->getBlogComments($blogComments);
            return response()->json([
               'status'       => true,
               'message'      => 'Successful',
               'data'         => $commentArray
            ], 200);
         } catch (\Exception $e) {
           return response()->json([
               'status'       => false,
               'message'      => $e->getMessage(),
               'errorLineNo'  => $e->getLine()
           ], 500);
         }
       }

       /*
        *  Function to fetch comments for a blog
        *  @params [Request :: [id : (required, integer : type[blog id])]]
        *  @return \Illuminate\Http\JsonResponse
        * */
       public function fetchAllBlogCommentsAdmin(Request $request) {
         try {

           $validator = Validator::make($request->all(), [
               'id' =>  'required|exists:blogComments,blog_id,deleted_at,NULL',
           ]);
           if ($validator->fails()) {
               return response()->json([
                   'status'  => false,
                   'message' => $validator->errors(),
                   'data'    => []
               ], 400);
           }

           $blogId = $request->id;
           $blogId = (int)$blogId;
           $blogComments  = BlogComment::where('blog_id',$blogId)->where('parent_comment_id',0)->get();
           $commentsArray = [];
           foreach($blogComments as $key => $eachBlogComment) {
             $commentsArray[] = [
               'comment'      => $eachBlogComment->toArray(),
               'sub-comments' => $this->getBlogComments($eachBlogComment)
             ];
           }
           return response()->json([
              'status'       => true,
              'message'      => 'Successful',
              'data'         => $commentsArray
           ], 200);
         } catch (\Exception $e) {
           return response()->json([
               'status'       => false,
               'message'      => $e->getMessage(),
               'errorLineNo'  => $e->getLine()
           ], 500);
         }
       }

       /*
        *  Function to fetch a particular comment and assosiated replies for a blog
        *  @params [Request :: [id : (required, integer : type[blogComment id])]]
        *  @scope user
        *  @return \Illuminate\Http\JsonResponse
        * */
       public function fetchBlogSubComments(Request $request) {
         try {

           $validator = Validator::make($request->all(), [
               'id' =>  'required|exists:blogComments,id,deleted_at,NULL',
           ]);
           if ($validator->fails()) {
               return response()->json([
                   'status'  => false,
                   'message' => $validator->errors(),
                   'data'    => []
               ], 400);
           }
           $commentId     = $request->id;
           $commentId     = (int)$commentId;
           $blogComments  = BlogComment::find($commentId);
           if(!$blogComments) {
             return response()->json([
                 'status'       => false,
                 'message'      => $e->getMessage(),
                 'errorLineNo'  => $e->getLine()
             ], 400);
           }
           $commentArray  = [];
           if($blogComments->status == '1') {
             $commentArray  = $this->getBlogComments($blogComments, false);
           }
            return response()->json([
               'status'       => true,
               'message'      => 'Successful',
               'data'         => $commentArray
            ], 200);
         } catch (\Exception $e) {
           return response()->json([
               'status'       => false,
               'message'      => $e->getMessage(),
               'errorLineNo'  => $e->getLine()
           ], 500);
         }
       }

       /*
        *  Function to fetch comments for a blog
        *  @scope user
        *  @params [Request :: [id : (required, integer : type[blog id])]]
        *  @return \Illuminate\Http\JsonResponse
        * */
       public function fetchAllBlogComments(Request $request) {
         try {

           $validator = Validator::make($request->all(), [
               'id' =>  'required|exists:blogComments,blog_id,deleted_at,NULL',
           ]);
           if ($validator->fails()) {
               return response()->json([
                   'status'  => false,
                   'message' => $validator->errors(),
                   'data'    => []
               ], 400);
           }

           $blogId = $request->id;
           $blogId = (int)$blogId;
           $blogComments = BlogComment::where('blog_id',$blogId)->where('status', '1')->where('parent_comment_id',0)->get();
           $commentsArray = [];
           foreach($blogComments as $key => $eachBlogComment) {
             $commentsArray[] = [
               'comment'      => $eachBlogComment->toArray(),
               'sub-comments' => $this->getBlogComments($eachBlogComment, false)
             ];
           }
           return response()->json([
              'status'       => true,
              'message'      => 'Successful',
              'data'         => $commentsArray
           ], 200);
         } catch (\Exception $e) {
           return response()->json([
               'status'       => false,
               'message'      => $e->getMessage(),
               'errorLineNo'  => $e->getLine()
           ], 500);
         }
       }

       /*
        *  Function to fetch popular posts for a blog
        *  @scope user
        *  @params null
        *  @return \Illuminate\Http\JsonResponse
        * */
       public function getPopularPosts() {
         try {
           if(!\Auth::check()) {
             return response()->json([
               'status'   =>  true,
               'message'  =>  'Session expired. PLease Log in again!',
               'data'     =>  null
             ],400);
           }

           $user  = \Auth::user();
           $blogs = Blogs::where('status','1')->where('featured','1')->orderBy('created_at','DESC')->get();
           return response()->json([
             'status'   =>  true,
             'message'  =>  'Most popular blogs fetched successfully',
             'data'     =>  $blogs
           ],200);
         } catch(\Exception $e) {
           return response()->json([
               'status'       => false,
               'message'      => $e->getMessage(),
               'errorLineNo'  => $e->getLine()
           ], 500);
         }
       }

       /*
        *  Function to fetch latest posts for a blog
        *  @scope user
        *  @params null
        *  @return \Illuminate\Http\JsonResponse
        * */
       public function getLatestPosts() {
         try {
           if(!\Auth::check()) {
             return response()->json([
               'status'   =>  true,
               'message'  =>  'Session expired. PLease Log in again!',
               'data'     =>  null
             ],400);
           }

           $user  = \Auth::user();
           $blogs = Blogs::where('status','1')->orderBy('created_at','DESC')->get();
           return response()->json([
             'status'   =>  true,
             'message'  =>  'Most recent blogs fetched successfully',
             'data'     =>  $blogs
           ],200);
         } catch (\Exception $e) {
           return response()->json([
               'status'       => false,
               'message'      => $e->getMessage(),
               'errorLineNo'  => $e->getLine()
           ], 500);
         }
       }

        /*
         *
         * function to edit a comment from admin
         *@return \Illuminate\Http\JsonResponse
         * */
       public function editBlogCommentsAdmin(Request $request){
            try{


                $validator = Validator::make($request->all(), [
                    'name'      =>  'required',
                    'email'     =>  'required|email',
                    'commentId' =>  'required|exists:blogComments,id',
                    'status'    =>  'required|numeric|between:0,1|integer',
                    'message'   =>  'required'
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'status'  => false,
                        'message' => $validator->errors(),
                        'data'    => []
                    ], 400);
                }

                $commentId  = (int)$request->commentId;
                $name       = $request->name;
                $email      = $request->email;
                $message    = $request->message;
                $status     = (string)$request->status;

                if($commentId && $status) {
                    $commentId = $commentId;
                    $checkForComment = BlogComment::find($commentId);
                    if(!$checkForComment) {
                      return response()->json([
                          'status'    => false,
                          'message'   => 'This comment could not be found',
                          'data'      => []
                      ], 500);
                    }
                    $checkForComment->email   = $email;
                    $checkForComment->name    = $name;
                    $checkForComment->message = $message;
                    $checkForComment->status  = $status;
                    if ( $checkForComment->save() ) {
                        return response()->json([
                            'status'  => true,
                            'message' => 'comment updated ',
                            'data'    => $checkForComment
                        ], 200);
                    } else {
                        return response()->json([
                            'status'  => false,
                            'message' => 'comment not updated',
                            'data'    => []
                        ], 400);
                    }
                } else {
                    return response()->json([
                        'status'  => false,
                        'message' => 'something went wrong,comment not found',
                        'data'    => []
                    ], 400);
                }
            } catch(Exception $e){
                return response()->json([
                    'status'       => false,
                    'message'      => $e->getMessage(),
                    'errorLineNo'  => $e->getLine()
                ], 500);
            }
       }

       /***
        *
        *function view a comment
        *@return \Illuminate\Http\JsonResponse
        * @params $commentId
        */
        public  function viewBlogCommentsAdmin($commentId){
            try{
                $comment = BlogComment::find($commentId);
                if($comment){
                    return response()->json([
                        'status' => true,
                        'message' => 'comment found ',
                        'data' => $comment
                    ], 200);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'comment not found',
                        'data' => []
                    ], 400);
                }
            } catch (Exception $e){
                return response()->json([
                    'status'       => false,
                    'message'      => $e->getMessage(),
                    'errorLineNo'  => $e->getLine()
                ], 500);
            }
        }

}
