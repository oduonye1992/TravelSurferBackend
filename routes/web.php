<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function(){
    return redirect('/admin/hotels');
});

Route::group(['prefix' => 'admin'], function () {
    // Hotels
    Route::get('hotels', 'ViewController@hotels');
    Route::get('hotels/{hotel}/images', 'ViewController@hotelImages');
    Route::get('hotels/{hotel}/rooms', 'ViewController@hotelRooms');
    Route::get('airports', 'ViewController@airports');
    Route::get('countries', 'ViewController@countries');
    Route::get('splash', 'ViewController@splashScreen');
    Route::get('search_order', 'ViewController@searchOrders');
    Route::get('search_order/{search_order}/internet_order', 'ViewController@internetOrders');
    Route::get('search_order/{search_order}/special_order', 'ViewController@specialOrders');
    // Search Orders
    // Countries
    // Search Orders
});
Route::model('hotel', 'App\Hotel');
Route::model('search_order', 'App\SearchOrder');
/**
 * [{"id":1,
 * "created_at":"2017-01-02 15:07:13",
 * "updated_at":"2017-01-02 15:07:13",
 * "hotel_id":1,
 * "airport_id":1,
 * "start_date":"2017-01-17",
 * "end_date":"2017-01-26",
 * "room_type":{"id":11,"created_at":"2017-01-01 15:11:05","updated_at":"2017-01-01 15:11:05","name":"Grang huate hotel","hotel_id":1},
 * "boarding":1,
 * "adults":5,
 * "children":[],
 * "email":"Dsdsd@skslmd.com",
 * "hotel":{"id":1,"created_at":"2016-12-29 06:37:28","updated_at":"2017-01-03 10:58:41","name":"Grang huate hotel","longitude":"12.121","latitude":"12112","description":"Hong Kong","country_id":1},
 * "airport":{"id":1,"created_at":"2016-12-30 15:47:10","updated_at":"2016-12-30 15:47:10","name":"Grang huate hotel","location":"Lagos Nigeria","image":null,"country_id":1},
 * "boarding_type":null
 *
 *
 * },{"id":2,"created_at":"2017-01-02 15:42:51","updated_at":"2017-01-02 15:42:51","hotel_id":1,"airport_id":1,"start_date":"2017-01-17","end_date":"2017-01-26","room_type":{"id":11,"created_at":"2017-01-01 15:11:05","updated_at":"2017-01-01 15:11:05","name":"Grang huate hotel","hotel_id":1},"boarding":1,"adults":5,"children":[],"email":"Dsdsd@skslmd.com","hotel":{"id":1,"created_at":"2016-12-29 06:37:28","updated_at":"2017-01-03 10:58:41","name":"Grang huate hotel","longitude":"12.121","latitude":"12112","description":"Hong Kong","country_id":1},"airport":{"id":1,"created_at":"2016-12-30 15:47:10","updated_at":"2016-12-30 15:47:10","name":"Grang huate hotel","location":"Lagos Nigeria","image":null,"country_id":1},"boarding_type":null},{"id":3,"created_at":"2017-01-02 15:50:15","updated_at":"2017-01-02 15:50:15","hotel_id":1,"airport_id":1,"start_date":"2017-01-17","end_date":"2017-01-26","room_type":{"id":11,"created_at":"2017-01-01 15:11:05","updated_at":"2017-01-01 15:11:05","name":"Grang huate hotel","hotel_id":1},"boarding":1,"adults":5,"children":[],"email":"Dsdsd@skslmd.com","hotel":{"id":1,"created_at":"2016-12-29 06:37:28","updated_at":"2017-01-03 10:58:41","name":"Grang huate hotel","longitude":"12.121","latitude":"12112","description":"Hong Kong","country_id":1},"airport":{"id":1,"created_at":"2016-12-30 15:47:10","updated_at":"2016-12-30 15:47:10","name":"Grang huate hotel","location":"Lagos Nigeria","image":null,"country_id":1},"boarding_type":null},{"id":4,"created_at":"2017-01-02 16:29:25","updated_at":"2017-01-02 16:29:25","hotel_id":1,"airport_id":1,"start_date":"2017-01-17","end_date":"2017-01-26","room_type":{"id":11,"created_at":"2017-01-01 15:11:05","updated_at":"2017-01-01 15:11:05","name":"Grang huate hotel","hotel_id":1},"boarding":1,"adults":5,"children":[],"email":"Dsdsd@skslmd.com","hotel":{"id":1,"created_at":"2016-12-29 06:37:28","updated_at":"2017-01-03 10:58:41","name":"Grang huate hotel","longitude":"12.121","latitude":"12112","description":"Hong Kong","country_id":1},"airport":{"id":1,"created_at":"2016-12-30 15:47:10","updated_at":"2016-12-30 15:47:10","name":"Grang huate hotel","location":"Lagos Nigeria","image":null,"country_id":1},"boarding_type":null}]

 */