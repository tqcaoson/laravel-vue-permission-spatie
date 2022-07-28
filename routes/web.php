<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Route for category save
Route::post('/categorySave', 'CategoryController@store')->name('category.store');
//  Route for category list
Route::get('/categoryList', 'CategoryController@index')->name('category.index');
// Route for category edit
Route::get('/categoryById/{id}', 'CategoryController@edit')->name('category.edit');
// Route for category update
Route::post('/categoryUpdate/{id}', 'CategoryController@update')->name('category.update');
// Route for category delete
Route::get('/categoryDelete/{id}', 'CategoryController@destroy')->name('category.destroy');



// Route for sub category save
Route::post('subCategorySave','SubCategoryController@store')->name('subcategory.store');
//  Route for sub category list
Route::get('/subCategoryList', 'SubCategoryController@index')->name('subcategory.index');
// Route for sub category edit
Route::get('/subCategoryById/{id}', 'SubCategoryController@edit')->name('subcategory.edit');
// Route for aub category update
Route::post('/subCategoryUpdate/{id}', 'SubCategoryController@update')->name('subcategory.update');
// Route for sub category delete
Route::get('/subCategoryDelete/{id}', 'SubCategoryController@destroy')->name('subcategory.destroy');


// Route for subCategory by CategoryId 
Route::get('/getSubCategoryByCategoryId/{id}', 'ContentController@getSubCategoryByCategoryId')->name('content.getSubCategoryByCategoryId');



// Route for content save
Route::post('contentSave','ContentController@store')->name('content.store');
//  Route for content list
Route::get('/contentList', 'ContentController@index')->name('content.index');
// Route for content edit
Route::get('/contentById/{id}', 'ContentController@edit')->name('content.edit');
// Route for content update
Route::post('/contentUpdate/{id}', 'ContentController@update')->name('content.update');
// Route for content delete
Route::get('/contentDelete/{id}', 'ContentController@destroy')->name('content.destroy');



// dashboard charts
//  Route for category wise content
Route::get('/categoryWiseContent', 'ContentController@categoryWiseContent')->name('content.categoryWiseContent');
//  Route for category wise content
Route::get('/categoryWiseSubCategory', 'ContentController@categoryWiseSubCategory')->name('content.categoryWiseSubCategory');


// Route for role 

// Route for user save
Route::post('roleSave','RoleController@store')->name('role.store');
//  Route for user list
Route::get('/roleList', 'RoleController@index')->name('role.index');
// Route for user edit
Route::get('/roleById/{id}', 'RoleController@edit')->name('role.edit');
// Route for user update
Route::post('/roleUpdate/{id}', 'RoleController@update')->name('role.update');
// Route for user delete
Route::get('/contentDelete/{id}', 'ContentController@destroy')->name('content.destroy');




// Route for role wise permission 

// Route for user save
Route::post('contentSave','ContentController@store')->name('content.store');
//  Route for user list
Route::get('/permissionList', 'RoleController@getPermission')->name('role.getPermission');


//  Route for user wise permission list
Route::get('/roleWisePermissionList', 'RoleController@roleWisePermissionList')->name('role.roleWisePermissionList');


// Route for user edit
Route::get('/contentById/{id}', 'ContentController@edit')->name('content.edit');
// Route for user update
Route::post('/contentUpdate/{id}', 'ContentController@update')->name('content.update');
// Route for user delete
Route::get('/contentDelete/{id}', 'ContentController@destroy')->name('content.destroy');




// Route for user save
Route::post('userSave','UserController@store')->name('user.store');
//  Route for user list
Route::get('/userList', 'UserController@index')->name('user.index');
// Route for user edit
Route::get('/userById/{id}', 'UserController@edit')->name('user.edit');
// Route for user update
Route::post('/userUpdate/{id}', 'UserController@update')->name('user.update');
// Route for user delete
Route::get('/userDelete/{id}', 'UserController@destroy')->name('user.destroy');


// Route for configuration module
// Route for configuration save
Route::post('configSave','ConfigurationController@store')->name('configuration.store');
//  Route for user list
Route::get('/configList', 'ConfigurationController@index')->name('configuration.index');
// Route for user edit
Route::get('/configById/{id}', 'ConfigurationController@edit')->name('configuration.edit');
// Route for user update
Route::post('/configUpdate/{id}', 'ConfigurationController@update')->name('configuration.update');
// Route for user delete
Route::get('/configDelete/{id}', 'ConfigurationController@destroy')->name('configuration.destroy');


//category and subcategory wise content

// Route for content save
Route::get('/categoryWiseContentList/{id}','ContentController@categoryWiseContentList')->name('content.categoryWiseContentList');
//  Route for content list
Route::get('/subCategoryWiseContent/{id}', 'ContentController@subCategoryWiseContent')->name('content.subCategoryWiseContent');



