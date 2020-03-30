<?php

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes(['register' => false]);
Route::get('/admin','Admin\AdminController@index')->middleware('auth');

    //Roles Route
// Route::get('admin/role','Admin\RoleController@index')->middleware('auth');
// Route::get('/admin/role/addrole', 'Admin\RoleController@create')->middleware('auth');
// Route::post('/admin/role/addrole/submit', 'Admin\RoleController@store')->middleware('auth');
// Route::get('/admin/role/editrole/{id}', 'Admin\RoleController@edit')->middleware('auth');
// Route::post('admin/role/editrole/{id}/submit','Admin\RoleController@update')->middleware('auth');
// Route::get('/admin/role/viewpermission/{id}', 'Admin\RoleController@viewPermissions')->middleware('auth');
// Route::get('admin/role/delete/{id}','Admin\RoleController@destroy')->middleware('auth');

//Permission Route
// Route::get('/admin/permission','Admin\PermissionController@index')->middleware('auth');
// Route::get('/admin/permission/addpermission','Admin\PermissionController@create')->middleware('auth');
// Route::post('/admin/permission/addpermission/submit','Admin\PermissionController@store')->middleware('auth');
// Route::get('/admin/permission/edit/{id}','Admin\PermissionController@edit')->middleware('auth');
// Route::post('admin/permission/edit/{id}/submit','Admin\PermissionController@update')->middleware('auth');
// Route::get('admin/permission/delete/{id}','Admin\PermissionController@destroy')->middleware('auth');




//USER
Route::resource('/admin/user','Admin\UserController');



//REALESTATE
Route::group(['middleware'=>'auth'],function(){
    Route::resource('/admin/realestate','Admin\RealEstateController');
    Route::resource('/admin/realestate/{id}/photos','Admin\PhotoController');
    Route::get('/admin/realestate/category/create','Admin\RealEstateController@viewCategory');
    Route::post('/admin/realestate/category','Admin\RealEstateController@addCategory');
    Route::get('/admin/realestate/category/delete/{id}','Admin\RealEstateController@deleteCategory');

    // Route::get('/admin/realestate/{id}/photos','Admin\RealEstateController@viewPhotos')->name('viewphotos');
    // Route::post('/admin/realestate/{id}/photos/store','Admin\RealEstateController@addPhotos')->name('addphotos');
    // Route::get('/admin/realestate/{id}/photos/{photoid}/delete','Admin\RealEstateController@deletePhotos');
});



//ABOUT US
Route::resource('/admin/aboutus','Metadata\MetadataController')->middleware('auth');

//Job Vacancy
Route::group(['middleware'=>'auth'],function(){
Route::resource('admin/job','Admin\JobController');
Route::get('/jobsearch','Admin\JobController@search');
Route::get('/admin/job/category/create','Admin\JobController@viewCategory');
Route::post('/admin/job/category','Admin\JobController@addCategory');
Route::get('/admin/job/category/delete/{id}','Admin\JobController@deleteCategory');
});

