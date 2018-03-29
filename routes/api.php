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

    });
});
