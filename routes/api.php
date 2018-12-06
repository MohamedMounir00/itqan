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
Route::get('test','Api\UserController@test');

Route::middleware(['auth:api'])->group(function () {
    Route::get('my_profile','Api\UserController@myProfile');
    Route::post('update_personal','Api\UserController@Updatepersonal');
    Route::post('update_government','Api\UserController@Updategovernment');
    Route::post('update_company','Api\UserController@Updatecompany');
    Route::post('edite_imge','Api\UserController@edite_imge');
    Route::post('add_address','Api\UserController@addAddress');
    Route::get('get_all_my_aderss','Api\UserController@getAllMyaderss');
    Route::get('times_order','Api\AllDataForOrderController@timesOrder');
    Route::get('date_Order','Api\AllDataForOrderController@dateOrder');
    Route::get('all_categories','Api\AllDataForOrderController@AllCats');
    Route::get('all_sub','Api\AllDataForOrderController@AllSubCat');
    Route::get('all_cat_proudect','Api\AllDataForOrderController@AllCatProudect');
    Route::get('all_proudect','Api\AllDataForOrderController@AllProudect');
    Route::post('upload','Api\StorgeController@store');
    Route::post('add_order','Api\OrderController@AddOrder');
    Route::get('show_order','Api\OrderController@showOrder');
    Route::get('all_orders_for_client','Api\OrderController@allOrdersForClient');
   // Route::post('update_status_to_wating','Api\OrderController@updateStatustoWating');
    //Route::get('all_order_for_technical','Api\OrderController@allOrderForTechnical');

});
