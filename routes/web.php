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
Route::post('webservice/createOffer','requestController@createOffer')->middleware(\App\Http\Middleware\authHandler::class);
Route::post('webservice/deleteOffer','requestController@deleteOffer')->middleware(\App\Http\Middleware\authHandler::class);
Route::post('webservice/editOffer','requestController@editOffer')->middleware(\App\Http\Middleware\authHandler::class);
Route::post('webservice/getOffers','requestController@getOffers')->middleware(\App\Http\Middleware\authHandler::class);
Route::post('webservice/flushOffers','requestController@flushOffers')->middleware(\App\Http\Middleware\authHandler::class);
//orders
Route::post('webservice/createOrder','requestController@createOrder')->middleware(\App\Http\Middleware\authHandler::class);
Route::post('webservice/deleteOrders','requestController@deleteOrders')->middleware(\App\Http\Middleware\authHandler::class);
Route::post('webservice/getOrders','requestController@getOrders');
Route::post('webservice/deliverOrder','requestController@deliverOrder')->middleware(\App\Http\Middleware\authHandler::class);
Route::post('webservice/archiveOrders','requestController@archiveOrders')->middleware(\App\Http\Middleware\authHandler::class);
Route::post('webservice/getOrdersArchived','requestController@getOrdersArchived')->middleware(\App\Http\Middleware\authHandler::class);
//truck
Route::post('webservice/updateTruckPosition','requestController@updateTruckPosition')->middleware(\App\Http\Middleware\authHandler::class);
//schedules
Route::post('webservice/createSchedule','requestController@createSchedule')->middleware(\App\Http\Middleware\authHandler::class);
Route::post('webservice/deleteSchedule','requestController@deleteSchedule')->middleware(\App\Http\Middleware\authHandler::class);
Route::post('webservice/editSchedule','requestController@editSchedule')->middleware(\App\Http\Middleware\authHandler::class);
Route::post('webservice/getSchedules','requestController@getSchedules')->middleware(\App\Http\Middleware\authHandler::class);
//user
Route::post('webservice/createUser','requestController@createUser');
Route::post('webservice/editUser','requestController@editUser');
Route::post('webservice/deleteUser','requestController@deleteUser');
Route::post('webservice/loginUser','requestController@loginUser');
Route::post('webservice/logoutUser','requestController@logoutUser');