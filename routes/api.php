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
Route::get('date_Order','Api\AllDataForOrderController@dateOrder');

Route::post('check_time_order','Api\OrderController@check_time_order');

Route::get('country','Api\DataRegisterController@country');
Route::get('city','Api\DataRegisterController@city');
Route::get('minstry','Api\DataRegisterController@minstry');
Route::get('company','Api\DataRegisterController@company');

Route::post('personal_register','Api\UserController@personal');
Route::post('government_register','Api\UserController@government');
Route::post('company_register','Api\UserController@company');
Route::post('login','Api\UserController@login');
Route::post('loginsochal','Api\UserController@loginsochal');
Route::post('activation_client','Api\UserController@ActivationClient');
Route::post('send_again_code','Api\UserController@SendAgainCode');

Route::middleware(['auth:api'])->group(function () {

        Route::post('update_location','Api\UserController@update_location');

    Route::get('my_profile','Api\UserController@myProfile');
    Route::get('profile_technical','Api\UserController@ProfileTechnical');
    Route::post('update_personal','Api\UserController@Updatepersonal');
    Route::post('update_government','Api\UserController@Updategovernment');
    Route::post('update_company','Api\UserController@Updatecompany');
    Route::post('edite_imge','Api\UserController@edite_imge');
    Route::post('add_address','Api\UserController@addAddress');
    Route::post('update_address','Api\UserController@UpdateAddress');
    Route::get('get_all_my_aderss','Api\UserController@getAllMyaderss');
    Route::post('add_order','Api\OrderController@AddOrder');
    Route::get('show_order','Api\OrderController@showOrder');
    Route::get('all_orders_for_client','Api\OrderController@allOrdersForClient');
    Route::get('order_details','Api\OrderController@order_details');
    Route::get('get_current_order_price','Api\OrderController@GetCurrentOrderWithPrice');
    Route::get('get_notifications','Api\NotfiyController@getNotifay');
    Route::post('seen_notify','Api\NotfiyController@updateNotify');
    Route::get('count_notify','Api\NotfiyController@countNotifay');
    Route::post('assgin_technical','Api\OrderController@assienTechnical');
    Route::post('rescheduled_order','Api\OrderController@rescheduled_order');
    Route::get('get_product','Api\OrderController@getproduct');
    Route::post('update_product','Api\OrderController@updateproduct');
    Route::post('send_product_order','Api\OrderController@SendProductToOrder');
    Route::post('reschedule_reply','Api\OrderController@reschedule_reply');
    /////////////////////////////////rating
    Route::post('add_rating','Api\RatingController@addRating');

    //////////////////////////////////////////////////////////techainel
    Route::get('all_order_for_technical','Api\OrderTechnicalController@allOrderForTechnical');
    Route::post('update_status_order','Api\OrderTechnicalController@updateStatusOrder');
    Route::post('make_proudect_for_order','Api\OrderTechnicalController@makeProudectForOrder');
       //////////////////////////////////activeWarranty
    Route::post('active_warranty','Api\OrderController@activeWarranty');
    Route::post('send_bill','Api\OrderController@bill');

///////////////////////////////////////////////contact admin
    Route::post('send_message_admin','Api\SettingController@send_message_admin');



});
Route::post('password-reset', 'Api\RessetPassword@sendPasswordResetToken');
Route::post('reset-password', 'Api\RessetPassword@resetPassword');
Route::post('check-code', 'Api\RessetPassword@checkCode');
/////////////////////////////////////////////////data for order

Route::get('times_order','Api\AllDataForOrderController@timesOrder');
Route::get('four_cat_proudect','Api\AllDataForOrderController@FourCatProudect');
Route::get('all_categories','Api\AllDataForOrderController@AllCats');
Route::get('all_sub','Api\AllDataForOrderController@AllSubCat');
Route::get('all_categories_product','Api\AllDataForOrderController@AllCatProudect');
Route::get('all_products','Api\AllDataForOrderController@AllProudect');
Route::post('upload','Api\StorgeController@store');
Route::post('serch_product','Api\AllDataForOrderController@serchProduct');
///////////////////////////////////////////////setting

Route::get('condition','Api\SettingController@condition');
Route::get('how_it_wor','Api\SettingController@how_it_wor');
Route::get('contact','Api\SettingController@contact');