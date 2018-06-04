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
     * Route for posting contact us form
     *
     * */
    Route::post('contact-us',[
        'uses'=>'Api\V1\ContactusController@postContactUs',
        'as'=>'api.v1.postContactUs.post'
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
        Route::get('roles', [
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
        Route::delete('role-delete/{id}', [
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
        Route::delete('delete-category/{id}', [
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
        Route::delete('delete-blog/{id}', [
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
        Route::delete('delete-faq-category/{id}', [
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
        Route::delete('delete-faq/{id}', [
            'uses' => 'Api\V1\FaqController@deleteFaq',
            'as'   => 'api.v1.DeleteFaq.post'
        ]);

        /*
         * Route for create package
         * */
        Route::post('create-package', [
            'uses' => 'Api\V1\PackageController@createPackage',
            'as'   => 'api.v1.createPackage.post'
        ]);

        /*
         * Route for delete package
         * */
        Route::delete('delete-package/{id}', [
            'uses' => 'Api\V1\PackageController@deletePackage',
            'as'   => 'api.v1.deletePackage.delete'
        ]);

        /*
         * Route for create package
         * */
        Route::post('edit-package', [
            'uses' => 'Api\V1\PackageController@editPackage',
            'as'   => 'api.v1.editPackage.post'
        ]);

        /*
         * Route for get packages
         * */
        Route::get('get-packages', [
            'uses' => 'Api\V1\PackageController@getPackages',
            'as'   => 'api.v1.getPackages.get'
        ]);

        /*
         * Route for create coupon
         * */
        Route::post('create-coupon', [
            'uses' => 'Api\V1\CouponsController@createCoupon',
            'as'   => 'api.v1.createCoupon.post'
        ]);

        /*
         * Route for delete coupon
         * */
        Route::delete('delete-coupon/{id}', [
            'uses' => 'Api\V1\CouponsController@deleteCoupon',
            'as'   => 'api.v1.deleteCoupon.delete'
        ]);

        /*
         * Route for edit coupon
         * */
        Route::post('edit-coupon', [
            'uses' => 'Api\V1\CouponsController@editCoupon',
            'as'   => 'api.v1.editCoupon.post'
        ]);

        /*
         * Route for view coupon
         * */
        Route::get('view-coupons', [
            'uses' => 'Api\V1\CouponsController@viewCoupons',
            'as'   => 'api.v1.viewCoupons.get'
        ]);

        /**
        * Route for approving a comment
        */
        Route::post('approve-comment', [
        'uses' => 'Api\V1\BlogController@approveBlogComments',
        'as' => 'api.v1.approveBlogComment.post'
        ]);

        /**
        * Route for deleting a comment
        */
        Route::delete('delete-comment/{id}', [
        'uses' => 'Api\V1\BlogController@deleteBlogComments',
        'as' => 'api.v1.deleteBlogComment.delete'
        ]);

        /**
        * Route for fetching all comments for a blog
        */
        Route::post('fetch-all-comments', [
         'uses' => 'Api\V1\BlogController@fetchAllBlogCommentsAdmin',
         'as' => 'api.v1.fetchAllBlogCommentsAdmin.post'
        ]);

        /**
        * Route for fetching comments and replies for a single comment
        */
        Route::post('fetch-sub-comments', [
          'uses' => 'Api\V1\BlogController@fetchBlogSubCommentsAdmin',
          'as' => 'api.v1.fetchBlogSubCommentsAdmin.post'
        ]);

        /**
        * Route for fetching dashboard contents for admin panel
        */
        Route::get('dashboard', [
           'uses' => 'Api\V1\DashboardController@fetchDashboard',
           'as' => 'api.v1.fetchDashboard.get'
        ]);

        /**
         * Route for editing a comment from admin
         *
         * */
        Route::post('edit-comment', [
            'uses' => 'Api\V1\BlogController@editBlogCommentsAdmin',
            'as' => 'api.v1.editBlogCommentsAdmin.post'
        ]);

        /**
         * Route for view a comment from admin
         *
         * */
        Route::get('view-comment/{commentId}', [
            'uses' => 'Api\V1\BlogController@viewBlogCommentsAdmin',
            'as' => 'api.v1.viewBlogCommentsAdmin.post'
        ]);

        /**
        * Lists of all comments without association with their blog and subcomments
        */
        Route::get('comments-list', [
            'uses' => 'Api\V1\BlogController@commentsList',
            'as'   => 'api.v1.commentsList.get'
        ]);

    });

    /**
     * Route for Authenticated user panel
     */

    Route::group(['prefix' => 'user'], function() {

        /**
        * Route for fetching faq with status 1
        */
        Route::get('all-faq-questions', [
          'uses' => 'Api\V1\FaqCategoryController@allFaqQuestions',
          'as' => 'api.v1.allFaqQuestions.get'
        ]);

        /**
        * Route for fetching faq categorylist with question and answers
        */
        Route::get('faq-category-list/{query?}', [
          'uses' => 'Api\V1\FaqCategoryController@faqCategoryListUser',
          'as' => 'api.v1.faqCategoryListUser.get'
        ]);


        /**
         * Route for getting blog list
         */
        Route::get('blog-list',[
            'uses'=>'Api\V1\BlogController@blogListUser',
            'as' => 'api.v1.blogListUser.get'
        ]);

        /**
         * Route for getting blog category list
         */
        Route::get('blog-category-list/{query?}',[
            'uses'=>'Api\V1\BlogController@blogCategoryListUser',
            'as' => 'api.v1.blogCategoryListUser.get'
        ]);

        /*
         *Route for getting latest blog list
         * */
        Route::get('latest-post',[
            'uses'=>'Api\V1\BlogController@getLatestPosts',
            'as' => 'api.v1.getLatestPosts.get'
        ]);

        /*
         *Route for getting popular blog list
         * */
        Route::get('popular-post',[
            'uses'=>'Api\V1\BlogController@getPopularPosts',
            'as' => 'api.v1.getPopularPosts.get'
        ]);

        /*
         *Route for getting popular blog list
         * */
        Route::get('view-blog/{query?}',[
            'uses'=>'Api\V1\BlogController@viewBlogUser',
            'as' => 'api.v1.viewBlog.get'
        ]);

        /**
        * Route for Commenting to a blog
        */
        Route::any('comment', [
          'uses' => 'Api\V1\BlogController@addBlogComments',
          'as' => 'api.v1.addBlogComment.post'
        ]);

        /**
        * Route for getting blog from blog category slug
        */
        Route::any('get-blog-details', [
          'uses' => 'Api\V1\BlogController@getBLogDetails',
          'as' => 'api.v1.getBLogDetails.post'
        ]);

        /**
         * Route for creating a newsletter subscriber
         */
        Route::any('create-newsletter-subscriber', [
            'uses' => 'Api\V1\NewsletterController@createSubscriber',
            'as' => 'api.v1.createNewsletterSubscriber.post'
        ]);

        //user routes where authentication is needed
        Route::group(['middleware' => ['jwt.auth','user.auth']], function(){

            /**
            * Route for getting states information for tellUsAboutYou first step for a user
            */
            Route::get('get-state-info', [
                'uses' => 'Api\V1\UserManagementController@getStateInfo',
                'as' => 'api.v1.UserManagementController.post'
            ]);

            /**
            * Route for getting protect-your-finance details
            * power of attorney details
            */
            Route::get('get-poa-user-data', [
                'uses' => 'Api\V1\UserManagementController@getPYFUserData',
                'as' => 'api.v1.getPYFUserData.get'
            ]);

            /**
            * related to protect-your-finance
            * getting power of attorney for user
            * Route for posting data of attorney holders and backup attorney
            */
            Route::post('post-poa-user-data', [
                'uses' => 'Api\V1\UserManagementController@postPYFUserData',
                'as' => 'api.v1.postPYFUserData.get'
            ]);

            /**
            * Route for deleting a gift
            */
            Route::delete('delete-gift/{id}', [
                'uses' => 'Api\V1\UserManagementController@deleteGift',
                'as' => 'api.v1.deleteGift.delete'
            ]);


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
            * Route for fetching all comments for a blog
            */
            Route::post('fetch-all-comments', [
              'uses' => 'Api\V1\BlogController@fetchAllBlogComments',
              'as' => 'api.v1.fetchAllBlogComments.post'
            ]);

            /**
            * Route for fetching comments and replies for a single comment
            */
            Route::post('fetch-sub-comments', [
              'uses' => 'Api\V1\BlogController@fetchBlogSubComments',
              'as' => 'api.v1.fetchBlogSubComments.post'
            ]);

            /*
             * Route for edit user profile
             * */
            Route::post('edit-profile', [
                'uses' => 'Api\V1\UserController@editProfile',
                'as' => 'api.v1.editProfile.post'
            ]);

            /*
             * Route for update gift
             * */
            Route::post('update-gift', [
                'uses' => 'Api\V1\UserController@updateProfileGift',
                'as' => 'api.v1.updateProfileGift.post'
            ]);

            /*
             *Route for add/update protect finance
             * */
            Route::post('protect-finance',[
                'uses'=>'Api\V1\UserManagementController@updateProtectFinance',
                'as' => 'api.v1.protectFinance.post'
            ]);

            /*
             *Route for health finance
             * */
            Route::post('health-finance',[
                'uses'=>'Api\V1\UserManagementController@createHealthFinance',
                'as' => 'api.v1.createHealthFinance.post'
            ]);

            /*
             *Route for get health finance
             * */
            Route::get('fetch-health-finance',[
                'uses'=>'Api\V1\UserManagementController@fetchHealthFinance',
                'as' => 'api.v1.fetchHealthFinance.post'
            ]);

            /**
             *Route for add / update final-agreement
             */
            Route::post('final-arrangement',[
                'uses'=>'Api\V1\UserManagementController@updateFinalAgrangement',
                'as' => 'api.v1.finalAgreement.post'
            ]);

            Route::get('final-arrangement',[
                'uses'=>'Api\V1\UserManagementController@getFinalArrangements',
                'as' => 'api.v1.getFinalArrangements.get'
            ]);

            /*
             *Route for getting user details
             * */
            Route::get('get-user-details/{id}',[
                'uses'=>'Api\V1\UserManagementController@getUserDetails',
                'as' => 'api.v1.getUserDetails.get'
            ]);

            /*
             * Route for get packages
             * */
            Route::post('purchase-package', [
                'uses' => 'Api\V1\PackageController@purchasePackage',
                'as'   => 'api.v1.purchasePackage.post'
            ]);
        });

        /*
         * Route for get packages
         * */
        Route::get('get-packages', [
            'uses' => 'Api\V1\PackageController@getPackages',
            'as'   => 'api.v1.getuserPackages.get'
        ]);
        /**
         * Route for success paypal payment
         */
        Route::get('paypal-package-success', [
            'uses' => 'Api\V1\PackageController@paypalPackageSuccess',
            'as' => 'api.v1.paypalPackageSuccess.get'
        ]);
        /**
         * Route for failed paypal payment
         */
        Route::get('paypal-package-failed', [
            'uses' => 'Api\V1\PackageController@paypalPackageFailed',
            'as' => 'api.v1.paypalPackageFailed.get'
        ]);

        Route::get('paypal-flow-button', [
            'uses' => 'Api\V1\PackageController@paypalFlowButton',
            'as' => 'api.v1.paypalFlowButton.get'
        ]);

        Route::post('paypal-direct-payment', [
            'uses' => 'Api\V1\PackageController@paypalDirectPayment',
            'as' => 'api.v1.paypalDirectPayment.post'
        ]);
    });
});

/**
* Generate sitemap.xml
*/
Route::get('sitemap.xml',[
    'uses'=>'Api\SitemapController@sitemap',
    'as' => 'api.sitemap'
]);
