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

});