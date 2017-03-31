<?php

namespace App\Http\Controllers;

use App\Airport;
use App\BoardingType;
use App\Country;
use App\Hotel;
use App\HotelImages;
use App\HotelRoomType;
use App\InternetPriceOrder;
use App\SearchOrder;
use App\SpecialPriceOrder;
use App\SplashScreen;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function hotels(Request $request){
        if (isset($request->q)){
            $hotels = Hotel::with(['country'])->where('id', $request->q)->get()->toArray();
        } else {
            $hotels = Hotel::with(['country'])->get()->toArray();
        }
        $countries = Country::all();
        return view('hotel.hotel', ['hotels' => $hotels, 'countries' => $countries]);
    }
    public function hotelImages(Hotel $hotel, Request $request){
        if (isset($request->q)){
            $images = HotelImages::with(['hotel'])->where(['hotel_id' => $hotel->id, 'id' => $request->q])->get()->toArray();
        } else {
            $images = HotelImages::with(['hotel'])->where('hotel_id', $hotel->id)->get()->toArray();
        }
        return view('hotel.images', ['hotel' => $hotel, 'images' => $images]);
    }
    public function hotelRooms(Hotel $hotel, Request $request){
        $rooms = HotelRoomType::with(['hotel'])->where('hotel_id', $hotel->id)->get()->toArray();
        return view('hotel.rooms', ['hotel' => $hotel, 'rooms' => $rooms]);
    }
    public function airports(Request $request){
        if (isset($request->q)){
            $airport = Airport::with(['country'])->where(['id' => $request->q])->get()->toArray();
        } else {
            $airport = Airport::with(['country'])->get()->toArray();
        }
        $countries = Country::all();
        return view('airport.airport', ['airports' => $airport, 'countries' => $countries]);
    }
    public function countries(){
        $countries = Country::all();
        return view('country.country', ['countries' => $countries]);
    }
    public function splashScreen(){
        $splashes = SplashScreen::all();
        return view('splash.splash', ['splashes' => $splashes]);
    }
    public function searchOrders(Request $request){
        if (isset($request->q)){
            $orders = SearchOrder::with([
                'hotel',
                'airport',
                'roomType',
                'boardingType',
                'internetPriceOrder',
                'specialPriceOrder'
            ])->get()->where(['id', $request->q])->toArray();
        } else {
            $orders = SearchOrder::with([
                'hotel',
                'airport',
                'roomType',
                'boardingType',
                'internetPriceOrder',
                'specialPriceOrder'
            ])->get()->toArray();
        }
        return view('search_order.search_order', ['orders' => $orders]);
    }
    public function internetOrders(SearchOrder $order){
        $internet_order = InternetPriceOrder::where('search_order_id', $order->id)->with(['roomType', 'hotel'])->get()->toArray();
        //get hotel id
        $hotel = $order->hotel_id;
        // roomtype
        $rooms = HotelRoomType::where('hotel_id', $hotel)->get();
        $boardings = BoardingType::all();
        return view('internet_order.internet_order', ['orders' => $internet_order, 'search_order' => $order, 'boardings'=>$boardings, 'rooms'=>$rooms]);
    }
    public function specialOrders(SearchOrder $order){
        $internet_order = SpecialPriceOrder::where('search_order_id', $order->id)->with(['roomType', 'hotel'])->get()->toArray();
        //get hotel id
        $hotel = $order->hotel_id;
        // roomtype
        $rooms = HotelRoomType::where('hotel_id', $hotel)->get();
        $boardings = BoardingType::all();
        return view('special_order.special_order', ['orders' => $internet_order, 'search_order' => $order, 'boardings'=>$boardings, 'rooms'=>$rooms]);
    }
}
