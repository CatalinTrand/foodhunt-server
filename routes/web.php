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

Route::get('/', function () {
    return view('welcome');
});

//offers
Route::post('webservice/createOffer','requestController@createOffer');
Route::post('webservice/deleteOffer','requestController@deleteOffer');
Route::post('webservice/editOffer','requestController@editOffer');
Route::post('webservice/getOffers','requestController@getOffers');
Route::post('webservice/flushOffers','requestController@flushOffers');
//orders
Route::post('webservice/createOrder','requestController@createOrder');
Route::post('webservice/deleteOrders','requestController@deleteOrders');
Route::post('webservice/getOrders','requestController@getOrders');
Route::post('webservice/deliverOrder','requestController@deliverOrder');
Route::post('webservice/archiveOrders','requestController@archiveOrders');
Route::post('webservice/getOrdersArchived','requestController@getOrdersArchived');
//truck
Route::post('webservice/updateTruckPosition','requestController@updateTruckPosition');
//schedules
Route::post('webservice/createSchedule','requestController@createSchedule');
Route::post('webservice/deleteSchedule','requestController@deleteSchedule');
Route::post('webservice/editSchedule','requestController@editSchedule');
Route::post('webservice/getSchedules','requestController@getSchedules');