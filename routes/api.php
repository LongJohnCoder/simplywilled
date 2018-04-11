<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

/**
 * Routes group for API Version 1
 */
Route::group(['prefix' => 'v1'], function() {
    /**
     * Routes for unauthenticated user
     */

    Route::post('sign-up', [
        'uses' => 'Api\V1\AuthController@signUp',
        'as' => 'api.v1.signUp.post'
    ]);
    Route::post('sign-in', [
        'uses' => 'Api\V1\AuthController@signIn',
        'as' => 'api.v1.signIn.post'
    ]);
    Route::post('forgot-password', [
       'uses' => 'Api\V1\AuthController@forgetPassword',
        'as' => 'api.v1.forgetPassword.post'
    ]);
    Route::post('reset-password', [
        'uses' => 'Api\V1\AuthController@resetPassword',
        'as' => 'api.v1.resetPassword.post'
    ]);
	Route::post('validate-email',[
        'uses' => 'Api\V1\AuthController@validationEmail',
        'as'   => 'api.v1.validationEmail.post'
    ]);

    /**
     * Routes for Admin login
    */

    Route::post('admin-panel/sign-in',[
        'uses' => 'Api\V1\AdminController@logIn',
        'as'   => 'api.v1.adminLogin.post'
    ]);

    /**
     * Route for Authenticated Admin panel
    */

    Route::group(['middleware' => ['jwt.auth','admin'], 'prefix' => 'admin-panel' ], function() {

        /**
        * Route for Sign-out from Admin panel
        */

        Route::post('sign-out',[
            'uses' => 'Api\V1\AdminController@logOut',
            'as'   => 'api.v1.adminSignout.post'
        ]);

        /**
        * Route for Change Password
        */

        Route::post('change-password',[
            'uses' => 'Api\V1\AdminController@changePassword',
            'as'   => 'api.v1.ChangePassword.post'
        ]);

        /**
        * Lists of roles
        */
        Route::post('roles', [
            'uses' => 'Api\V1\RoleController@roleLists',
            'as'   => 'api.v1.RoleLists.post'
        ]);

        /**
        * Create roles
        */
        Route::post('role-create', [
            'uses' => 'Api\V1\RoleController@createRole',
            'as'   => 'api.v1.RoleCreate.post'
        ]);

        /**
        * Role Details
        */
        Route::post('role-details', [
            'uses' => 'Api\V1\RoleController@roleDetails',
            'as'   => 'api.v1.RoleDetails.post'
        ]);

        /**
        * Role Update
        */
        Route::post('role-update', [
            'uses' => 'Api\V1\RoleController@roleUpdate',
            'as'   => 'api.v1.RoleUpdate.post'
        ]);

        /**
        * Role Delete
        */
        Route::post('role-delete', [
            'uses' => 'Api\V1\RoleController@roleDelete',
            'as'   => 'api.v1.RoleDelete.post'
        ]);

        /*
         * Route for getting the all category list
         * */
        Route::get('category-list', [
            'uses' => 'Api\V1\CategoryController@categoryList',
            'as'   => 'api.v1.DeleteCategory.get'
        ]);

        /**
         *Route for Create Category
         */
        Route::post('create-category', [
            'uses' => 'Api\V1\CategoryController@createCategory',
            'as'   => 'api.v1.CreateCategory.post'
        ]);

       /*
        * Route for view category
        */
        Route::get('view-category/{categoryId}', [
            'uses' => 'Api\V1\CategoryController@viewCategory',
            'as'   => 'api.v1.ViewCategory.get'
        ]);

        /**
         *Route for Edit Category
         */
        Route::post('edit-category', [
            'uses' => 'Api\V1\CategoryController@editCategory',
            'as'   => 'api.v1.EditCategory.post'
        ]);

        /*
         *Route for Delete category
         *
         * */
        Route::post('delete-category', [
            'uses' => 'Api\V1\CategoryController@deleteCategory',
            'as'   => 'api.v1.DeleteCategory.post'
        ]);

        /*
         * Route for Create Blog
         * */
        Route::post('create-blog', [
            'uses' => 'Api\V1\BlogController@createBlog',
            'as'   => 'api.v1.CreateBlog.post'
        ]);

        /*
         * Route for Edit Blog
         * */
        Route::post('edit-blog', [
            'uses' => 'Api\V1\BlogController@editBlog',
            'as'   => 'api.v1.EditBlog.post'
        ]);

        /*
         * Route for Edit Blog
         * */
        Route::get('blog-list', [
            'uses' => 'Api\V1\BlogController@blogList',
            'as'   => 'api.v1.blogList.get'
        ]);

        /*
         * Route for view Blog
         * */
        Route::get('view-blog/{blogId}', [
            'uses' => 'Api\V1\BlogController@viewBlog',
            'as'   => 'api.v1.blogView.get'
        ]);

        /*
         * Route for delete a blog
         * */
        Route::post('delete-blog', [
            'uses' => 'Api\V1\BlogController@deleteBlog',
            'as'   => 'api.v1.DeleteBlog.post'
        ]);

        /*
         * Route for create faq category
         * */
        Route::post('create-faq-category', [
            'uses' => 'Api\V1\FaqCategoryController@createFaqCategory',
            'as'   => 'api.v1.CreateFaqCategory.post'
        ]);

        /*
         * Route for Edit faq category
         * */
        Route::post('edit-faq-category', [
            'uses' => 'Api\V1\FaqCategoryController@editFaqCategory',
            'as'   => 'api.v1.EditFaqCategory.post'
        ]);

        /*
         * Route for faq category list
         * */
        Route::get('faq-category-list', [
            'uses' => 'Api\V1\FaqCategoryController@faqCategoryList',
            'as'   => 'api.v1.FaqCategoryList.get'
        ]);

        /*
         * Route for faq category list
         * */
        Route::get('view-faq-category/{faqCategoryId}', [
            'uses' => 'Api\V1\FaqCategoryController@viewFaqCategory',
            'as'   => 'api.v1.FaqCategoryView.get'
        ]);

        /*
         * Route for delete faq category
         * */
        Route::post('delete-faq-category', [
            'uses' => 'Api\V1\FaqCategoryController@deleteFaqCategory',
            'as'   => 'api.v1.DeleteFaqCategory.post'
        ]);

        /*
         * Route for creating a FAQ
         * */
        Route::post('create-faq', [
            'uses' => 'Api\V1\FaqController@createFaq',
            'as'   => 'api.v1.CreateFaq.post'
        ]);

        /*
         * Route for creating a FAQ
         * */
        Route::post('edit-faq', [
            'uses' => 'Api\V1\FaqController@editFaq',
            'as'   => 'api.v1.EditFaq.post'
        ]);

        /*
         * Route for FAQ List
         * */
        Route::get('faq-list', [
            'uses' => 'Api\V1\FaqController@faqList',
            'as'   => 'api.v1.FaqList.get'
        ]);

        /*
         * Route for view a FAQ
         * */
        Route::get('view-faq/{faqId}', [
            'uses' => 'Api\V1\FaqController@viewFaq',
            'as'   => 'api.v1.ViewFaq.get'
        ]);

        /*
         * Route for deleting a FAQ
         * */
        Route::post('delete-faq', [
            'uses' => 'Api\V1\FaqController@deleteFaq',
            'as'   => 'api.v1.DeleteFaq.post'
        ]);



    });

    /**
     * Route for Authenticated user panel
     */

    Route::group(['middleware' => ['jwt.auth','user.auth'], 'prefix' => 'user' ], function() {

       /**
        * Route for Change Password
        */

        Route::post('change-password',[
            'uses' => 'Api\V1\UserController@changePassword',
            'as'   => 'api.v1.ChangePassword.post'
        ]);

        Route::post('sign-out', [
            'uses' => 'Api\V1\UserController@signOut',
            'as' => 'api.v1.signOut.post'
        ]);

        /**
         * Route for Commenting to a blog
         */
         Route::post('comment', [
             'uses' => 'Api\V1\BlogController@addBlogComments',
             'as' => 'api.v1.makeComment'
         ]);

    });
});
