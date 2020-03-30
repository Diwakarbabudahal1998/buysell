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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// API For Auth
Route::get('/v1/listing','Api\RealestateController@mylisting');
Route::post('/v1/facebook','Api\AuthController@loginFacebook');
Route::post('/v1/google','Api\AuthController@loginGoogle');
Route::post('/v1/register','Api\AuthController@register');
Route::post('/v1/login','Api\AuthController@login');
//API for Job
Route::apiresource('admin/job','Admin\JobController');





//API for Realestate
Route::apiResource('/v1/realestates','Api\RealestateController');
Route::post('/v1/realestates/{id}/edit/update','Api\RealEstateController@update');
Route::get('/v1/realestates/{id}/delete','Api\RealEstateController@destroy');
Route::get('/v1/realestates/{id}/photos/{photoid}/delete','Api\RealestateController@deletePhotos');
Route::get('/v1/realestates/{id}/comment','Api\CommentController@index');
Route::post('/v1/realestates/{id}/comment','Api\CommentController@store');
Route::post('/v1/realestates/{id}/comment/{commentid}/reply','Api\ReplyController@store');
Route::get('/v1/realestates/{id}/comment/{commentid}/reply','Api\ReplyController@index');
Route::post('/v1/realestates/search','Api\RealestateController@search');


//API For Featured
Route::apiResource('/v1/featured','Api\FeaturedController');


//API For MetaData
Route::get('/v1/aboutus','Api\MetadataController@index');
Route::post('/v1/contact','Api\ContactusController@store');

//Api for Category
Route::apiResource('/v1/realestate/category','Api\RealestateCategoryController');

