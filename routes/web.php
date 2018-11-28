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

Route::post('webservice/createOffer','requestController@createOffer');
Route::post('webservice/getOffers','requestController@getOffers');
Route::post('webservice/flushOffers','requestController@flushOffers');
Route::post('webservice/createOrder','requestController@createOrder');
Route::post('webservice/getOrders','requestController@getOrders');
Route::post('webservice/deliverOrder','requestController@deliverOrder');
Route::post('webservice/archiveOrders','requestController@archiveOrders');
Route::post('webservice/getOrdersArchived','requestController@getOrdersArchived');
Route::post('webservice/updateTruckPosition','requestController@updateTruckPosition');