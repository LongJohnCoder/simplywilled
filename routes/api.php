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
    Route::post('sign-out', [
       'uses' => 'Api\V1\AuthController@signOut',
        'as' => 'api.v1.signOut.post'
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
     * Route for Authenticated user
     */
    Route::group(['middleware' => ['jwt.auth']], function() {
        // TODO: every logged in user route will be here & remove this comments
    });
});
