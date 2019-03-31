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

        if (Auth::check()) {
            //The user is logged in...
            return redirect('/home');
        } else {
            return view('auth.login');
        }
    });
    Auth::routes();
});

Auth::routes();

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['auth', 'admin','localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function () {
    Route::get('/home', 'HomeController@index')->name('home');
/////////////////////////order controll
    Route::get('order/get_order','Backend\OrderController@getAnyDate')->name('order.get_order');

    Route::get('order/get_order_view','Backend\OrderController@get_order_view')->name('order.get_order_view');
    Route::get('order/get_order_assign','Backend\OrderController@getAnyAssien')->name('order.get_order_assign');

    ///////////////////////////////////////////////////
    Route::get('order/get_consultation_view','Backend\OrderController@get_consultation_view')->name('order.get_consultation_view');
    Route::get('order/get_consultation','Backend\OrderController@get_consultation')->name('order.get_consultation');
    /// //////////////////////////    ///////////////////////////////////////////////////
    Route::get('order/get_delay_view','Backend\OrderController@get_delay_view')->name('order.get_delay_view');
    Route::get('order/get_delay','Backend\OrderController@get_delay')->name('order.get_delay');
    /// //////////////////////////    ///////////////////////////////////////////////////
    Route::get('order/get_need_parts_view','Backend\OrderController@get_need_parts_view')->name('order.get_need_parts_view');
    Route::get('order/get_need_parts','Backend\OrderController@get_need_parts')->name('order.get_need_parts');
    /// //////////////////////////    ///////////////////////////////////////////////////
    Route::get('order/get_another_visit_works_view','Backend\OrderController@get_another_visit_works_view')->name('order.get_another_visit_works_view');
    Route::get('order/get_another_visit_works','Backend\OrderController@get_another_visit_works')->name('order.get_another_visit_works');
    /// //////////////////////////    ///////////////////////////////////////////////////
    Route::get('order/get_warranty_view','Backend\OrderController@get_warranty_view')->name('order.get_warranty_view');
    Route::get('order/get_warranty','Backend\OrderController@get_warranty')->name('order.get_warranty');
/////////////////////////////////////////////////////////////////////////////////////update status
    Route::get('order/update_status/{id}','Backend\OrderController@update_status_view')->name('order.update_status');
    Route::post('order/update_status','Backend\OrderController@update_status')->name('order.update_status');
////////////////////////////////////////////////////////////////////////
    Route::get('order/get_finish_view','Backend\OrderController@get_finish_view')->name('order.get_finish_view');
    Route::get('order/get_finish','Backend\OrderController@get_finish')->name('order.get_finish');
    ///////////////////////////////////////// actions
    Route::get('order/get_status_view/{id}','Backend\OrderController@get_status_view')->name('order.get_status_view');
    Route::get('order/get_store_view/{id}','Backend\OrderController@get_store_view')->name('order.get_store_view');
    //////////////////////////////// approve product from admin
    Route::get('order/get_product_view/{id}','Backend\OrderController@get_product_fromTechinel_view')->name('order.get_product_view');
    Route::delete('order/get_product_view/refused_request/{id}','Backend\OrderController@refused_request')->name('refused_request');
    Route::post('order/get_product_view/accpet_request/{id}','Backend\OrderController@accpet_request')->name('accpet_request');


    /// //////////////////////////    ///////////////////////////////////////////////////


    Route::post('order/assien','Backend\OrderController@assien')->name('order.assien');
    Route::resource('order','Backend\OrderController');
    Route::post('get_product','Backend\OrderController@product')->name('get_product');
    Route::post('add_product','Backend\OrderController@add_product')->name('add_product');

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

    //////////////////////////////////////////////////////////// techail
    Route::get('technical/get_technical','Backend\TechnicalController@getAnyDate')->name('technical.get_technical');
    Route::resource('technical','Backend\TechnicalController');
    ////////////////////////////////////////////////////////////     Currency

    Route::get('currency/get_currency','Backend\CurrencyControler@getAnyDate')->name('currency.get_currency');
    Route::resource('currency','Backend\CurrencyControler');
//////////////////////////////////////coupons/////////////////
    Route::get('coupons/get_coupons','Backend\CouponsController@getAnyDate')->name('coupons.get_coupons');
    Route::resource('coupons','Backend\CouponsController');


    /////////////////////////////////////////////////////////setting
    Route::get('get_settings','Backend\AppSettingController@get_setting')->name('get_settings');
    Route::post('post_settings','Backend\AppSettingController@post_settings')->name('post_settings');
    //////////////////////////////////////////////////////////// clients
    Route::get('clients/get_clients','Backend\ClientsController@getAnyDate')->name('clients.get_clients');
    Route::resource('clients','Backend\ClientsController');
    //////////////////////////////////////ministries

    Route::get('ministries/get_ministries','Backend\MinistriesController@getAnyDate')->name('ministries.get_ministries');
    Route::resource('ministries','Backend\MinistriesController');

    //////////////////////////////////////companies

    Route::get('companies/get_companies','Backend\CompaniesController@getAnyDate')->name('companies.get_companies');
    Route::resource('companies','Backend\CompaniesController');
    //////////////////////////////////////country
    Route::resource('nationality','Backend\CountriesController');
    Route::resource('cities','Backend\CitiesController');

/////////////////////////////////////////

    Route::get('holidays/get_holidays','Backend\HolidaysController@getAnyDate')->name('holidays.get_holidays');
    Route::resource('holidays','Backend\HolidaysController');

///////////////////////////////////////// reschedules

    Route::get('reschedules/get_reschedules','Backend\RescheduledsController@getAnyDate')->name('reschedules.get_reschedules');
    Route::resource('reschedules','Backend\RescheduledsController');



});

