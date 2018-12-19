<?php

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
Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    Route::get('/', function () {
        return view('welcome');
    });
    Auth::routes();
});

Auth::routes();

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['auth', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('project/get_project','Backend\OrderController@getAnyDate')->name('project.get_project');
    Route::post('project/assien','Backend\OrderController@assien')->name('project.assien');
    Route::resource('project','Backend\OrderController');
////////////////////////////////////////////////////// cat
    Route::get('category/get_category','Backend\CategoryController@getAnyDate')->name('category.get_category');
    Route::get('category/sub/{id}','Backend\CategoryController@AllSub')->name('category.sub');
    Route::get('category/sub_category/{id}','Backend\CategoryController@getsubDate')->name('category.sub_category');
    Route::delete('category/sub/category_sub_delete/{id}','Backend\CategoryController@delete')->name('category_sub_delete');
    Route::resource('category','Backend\CategoryController');
    ////////////////////////////////////////////////////////////category_product
        Route::get('category_product/get_category','Backend\CategoryProductController@getAnyDate')->name('category_product.get_category');
    Route::resource('category_product','Backend\CategoryProductController');

//////////////////////////////////////////////product
    Route::get('product/get_product','Backend\ProductController@getAnyDate')->name('product.get_product');
    Route::resource('product','Backend\ProductController');

    //////////////////////////////////////////////time
    Route::get('time_work/get_time','Backend\TimeController@getAnyDate')->name('time_work.get_time');
    Route::resource('time_work','Backend\TimeController');
});