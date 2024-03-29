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
    Route::get('get_product_view/{id}','Backend\OrderController@get_product_fromTechinel_view')->name('get_product_view');
    Route::get('getAnyProduct/{id}','Backend\OrderController@getAnyProduct')->name('getAnyProduct');

        Route::get('refused_show/{id}','Backend\OrderController@refused_show')->name('refused_show');

    Route::delete('get_product_view/refused_request/{id}','Backend\OrderController@refused_request')->name('get_product_view.refused_request');
    Route::delete('get_product_view/accpet_request/{id}','Backend\OrderController@accpet_request')->name('get_product_view.accpet_request');
//////////////////////////////////////////////////////////////////////////////////////get_order_project
    Route::get('order/get_view_project','Backend\OrderController@get_view_project')->name('order.get_view_project');
    Route::get('order/get_order_project','Backend\OrderController@get_order_project')->name('order.get_order_project');
    /////////status admin for project
    Route::get('order/agree_project/{id}','Backend\OrderController@agree_project')->name('order.agree_project');
    Route::get('order/disagree_project/{id}','Backend\OrderController@disagree_project')->name('order.disagree_project');


////////////////////////////////////
////////////////////////////////////////////////////////////////////////
    Route::get('order/get_order_user_view/{id}/{status}','Backend\OrderController@ordderByIdStatus')->name('order.get_order_user_view');
    Route::get('order/get_order_user/{id}/{status}','Backend\OrderController@getorderForeUsere')->name('order.get_order_user');

    Route::get('order/get_order_technical_view/{id}/{status}','Backend\OrderController@ordderByIdStatusTechinel')->name('order.get_order_technical_view');
    Route::get('order/get_order_technical{id}/{status}','Backend\OrderController@getorderForTechinel')->name('order.get_order_technical');


    /// //////////////////////////    ///////////////////////////////////////////////////

    Route::post('order/assien','Backend\OrderController@assien')->name('order.assien');
    Route::resource('order','Backend\OrderController');
    Route::post('get_product','Backend\OrderController@product')->name('get_product');
    Route::post('add_product','Backend\OrderController@add_product')->name('add_product');
    Route::get('assigen_senior/{id}','Backend\OrderController@assigen_senior')->name('assigen_senior');

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


    //////////////////////////////////////////////////////////// Admins
    Route::get('admins/get_admins','Backend\AdminsController@getAnyDate')->name('admins.get_admins');
    Route::resource('admins','Backend\AdminsController');
    ////////////////////////////////////////////////////////////     Currency

    Route::get('currency/get_currency','Backend\CurrencyControler@getAnyDate')->name('currency.get_currency');
    Route::resource('currency','Backend\CurrencyControler');
//////////////////////////////////////coupons/////////////////
    Route::get('get_coupons/{id}','Backend\CouponsController@getAnyDate')->name('get_coupons');
    Route::get('coupons/{id}','Backend\CouponsController@coupons')->name('coupons');
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
    Route::get('get_reschedules_order/{id}','Backend\RescheduledsController@get_reschedules_order')->name('get_reschedules_order');
    Route::get('show_reschedules/{id}','Backend\RescheduledsController@show_reschedules')->name('show_reschedules');
    Route::delete('show_reschedules/destroy_order/{id}','Backend\RescheduledsController@destroy_order')->name('show_reschedules.destroy_order');
    Route::resource('reschedules','Backend\RescheduledsController');
    Route::get('editdataorder/{id}','Backend\RescheduledsController@editDataOrder')->name('editdataorder');
    Route::post('updatedataorder/{id}','Backend\RescheduledsController@updateDataOrder')->name('updatedataorder');

/////////////////////////////////notifications
    Route::get('notifications/get_notifications','Backend\NotificationsController@getAnyDate')->name('notifications.get_notifications');
    Route::resource('notifications','Backend\NotificationsController');
    Route::post('seen','Backend\NotificationsController@seen')->name('seen');

    /////////////////////////////////
    Route::get('bill/{id}','Backend\OrderController@bill')->name('bill');
//////////////////////////////send mail

    Route::get('send_message_view','Backend\MessageController@send_message_view')->name('send_message_view');
    Route::post('send_message','Backend\MessageController@send_message')->name('send_message');
    Route::get('send_message_user_view/{id}','Backend\MessageController@send_message_user_view')->name('send_message_user_view');
    Route::post('send_message_user/{id}','Backend\MessageController@send_message_user')->name('send_message_user');
    ////////////////////////////////contact admin
    Route::get('contact_admin/get_message','Backend\ContactAdminController@getAnyDate')->name('contact_admin.get_message');

    Route::resource('contact_admin','Backend\ContactAdminController');

    Route::resource('roles','Backend\RoleController');

});

