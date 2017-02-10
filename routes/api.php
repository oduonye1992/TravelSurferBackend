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
/*
/hotels
/airports
/country
/hotel_image
/hotel_room_type
/hotel_room_type
/boarding_type
/internet_price_order
/search_order
/special_search_order
/splash_screen

Methods (using /country as an example)
GET /country
POST /country
GET /country/1
PUT /country/1
DELETE /country/1

The required fields will be stated when you attempt to post
For /hotels and /airports, there is an additional endpoint called
GET /suggest
*/
Route::group(['prefix' => 'country'], function () {
    Route::get('', 'CountryController@read');
    Route::post('', 'CountryController@add');
    Route::get('/{country}', 'CountryController@getByID');
    Route::put('/{country}', 'CountryController@update');
    Route::delete('/{country}', 'CountryController@delete');
});

Route::group(['prefix' => 'hotels'], function () {
    Route::get('', 'HotelsController@read');
    Route::get('suggest', 'HotelsController@suggest');
    Route::post('', 'HotelsController@add');
    Route::get('/{hotel}', 'HotelsController@getByID');
    Route::put('/{hotel}', 'HotelsController@update');
    Route::delete('/{hotel}', 'HotelsController@delete');
});

Route::group(['prefix' => 'airports'], function () {
    Route::get('', 'AirportsController@read');
    Route::get('suggest', 'AirportsController@suggest');
    Route::post('', 'AirportsController@add');
    Route::get('/{airport}', 'AirportsController@getByID');
    Route::put('/{airport}', 'AirportsController@update');
    Route::delete('/{airport}', 'AirportsController@delete');
});

Route::group(['prefix' => 'hotel_image'], function () {
    Route::get('', 'HotelImageController@read');
    Route::post('', 'HotelImageController@add');
    Route::get('/{hotel_images}', 'HotelImageController@getByID');
    Route::put('/{hotel_images}', 'HotelImageController@update');
    Route::delete('/{hotel_images}', 'HotelImageController@delete');
});

Route::group(['prefix' => 'hotel_room_type'], function () {
    Route::get('', 'HotelRoomTypeController@read');
    Route::post('', 'HotelRoomTypeController@add');
    Route::get('/{hotel_room_type}', 'HotelRoomTypeController@getByID');
    Route::put('/{hotel_room_type}', 'HotelRoomTypeController@update');
    Route::delete('/{hotel_room_type}', 'HotelRoomTypeController@delete');
});

Route::group(['prefix' => 'boarding_type'], function () {
    Route::get('', 'BoardingTypeController@read');
    Route::post('', 'BoardingTypeController@add');
    Route::get('/{boarding_type}', 'BoardingTypeController@getByID');
    Route::put('/{boarding_type}', 'BoardingTypeController@update');
    Route::delete('/{boarding_type}', 'BoardingTypeController@delete');
});

Route::group(['prefix' => 'internet_price_order'], function () {
    Route::get('', 'InternetPriceOrderController@read');
    Route::post('', 'InternetPriceOrderController@add');
    Route::get('/{internet_price_order}', 'InternetPriceOrderController@getByID');
    Route::put('/{internet_price_order}', 'InternetPriceOrderController@update');
    Route::delete('/{internet_price_order}', 'InternetPriceOrderController@delete');
});

Route::group(['prefix' => 'search_order'], function () {
    Route::get('', 'SearchOrderController@read');
    Route::post('', 'SearchOrderController@add');
    Route::get('/{search_order}', 'SearchOrderController@getByID');
    Route::put('/{search_order}', 'SearchOrderController@update');
    Route::delete('/{search_order}', 'SearchOrderController@delete');
});

Route::group(['prefix' => 'special_search_order'], function () {
    Route::get('', 'SpecialPriceController@read');
    Route::post('', 'SpecialPriceController@add');
    Route::get('/{special_search_order}', 'SpecialPriceController@getByID');
    Route::put('/{special_search_order}', 'SpecialPriceController@update');
    Route::delete('/{special_search_order}', 'SpecialPriceController@delete');
});

Route::group(['prefix' => 'splash_screen'], function () {
    Route::get('', 'SplashController@read');
    Route::post('', 'SplashController@add');
    Route::get('/{splash_screen}', 'SplashController@getByID');
    Route::put('/{splash_screen}', 'SplashController@update');
    Route::delete('/{splash_screen}', 'SplashController@delete');
});



Route::model('hotel', 'App\Hotel');
Route::model('airport', 'App\Airport');
Route::model('country', 'App\Country');
Route::model('boarding_type', 'App\BoardingType');
Route::model('hotel_images', 'App\HotelImages');
Route::model('hotel_room_type', 'App\HotelRoomType');
Route::model('internet_price_order', 'App\InternetPriceOrder');
Route::model('search_order', 'App\SearchOrder');
Route::model('search_order_children', 'App\SearchOrderChildren');
Route::model('special_search_order', 'App\SpecialSearchOrder');
Route::model('splash_screen', 'App\SplashScreen');
/*
 * jarsigner -verbose -keystore debug.keystore formelo324.apk sampleName
 */
