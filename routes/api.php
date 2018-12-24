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


Route::get('country','Api\DataRegisterController@country');
Route::get('city','Api\DataRegisterController@city');
Route::get('minstry','Api\DataRegisterController@minstry');
Route::get('company','Api\DataRegisterController@company');

Route::post('personal_register','Api\UserController@personal');
Route::post('government_register','Api\UserController@government');
Route::post('company_register','Api\UserController@company');
Route::post('login','Api\UserController@login');

Route::middleware(['auth:api'])->group(function () {
    Route::get('my_profile','Api\UserController@myProfile');
    Route::get('profile_technical','Api\UserController@ProfileTechnical');
    Route::post('update_personal','Api\UserController@Updatepersonal');
    Route::post('update_government','Api\UserController@Updategovernment');
    Route::post('update_company','Api\UserController@Updatecompany');
    Route::post('edite_imge','Api\UserController@edite_imge');
    Route::post('add_address','Api\UserController@addAddress');
    Route::get('get_all_my_aderss','Api\UserController@getAllMyaderss');
    Route::get('times_order','Api\AllDataForOrderController@timesOrder');
    Route::get('date_Order','Api\AllDataForOrderController@dateOrder');
    Route::get('four_cat_proudect','Api\AllDataForOrderController@FourCatProudect');
    Route::get('all_categories','Api\AllDataForOrderController@AllCats');
    Route::get('all_sub','Api\AllDataForOrderController@AllSubCat');
    Route::get('all_categories_product','Api\AllDataForOrderController@AllCatProudect');
    Route::get('all_products','Api\AllDataForOrderController@AllProudect');
    Route::post('upload','Api\StorgeController@store');
    Route::post('add_order','Api\OrderController@AddOrder');
    Route::get('show_order','Api\OrderController@showOrder');
    Route::get('all_orders_for_client','Api\OrderController@allOrdersForClient');
    Route::get('get_current_order_price','Api\OrderController@GetCurrentOrderWithPrice');
    Route::get('get_notifications','Api\NotfiyController@getNotifay');
    Route::post('assgin_technical','Api\OrderController@assienTechnical');
    Route::get('get_product','Api\OrderController@getproduct');
    Route::post('update_product','Api\OrderController@updateproduct');
    Route::post('send_product_order','Api\OrderController@SendProductToOrder');
    Route::post('serch_product','Api\AllDataForOrderController@serchProduct');
    /////////////////////////////////rating
    Route::post('add_rating','Api\RatingController@addRating');

    //////////////////////////////////////////////////////////techainel
    Route::get('all_order_for_technical','Api\OrderTechnicalController@allOrderForTechnical');
    Route::post('update_status_order','Api\OrderTechnicalController@updateStatusOrder');
    Route::post('make_proudect_for_order','Api\OrderTechnicalController@makeProudectForOrder');



});
