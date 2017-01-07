<?php

namespace App\Http\Controllers;

use App\Airport;
use App\Country;
use App\Hotel;
use App\HotelImages;
use App\HotelRoomType;
use App\SearchOrder;
use App\SplashScreen;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function hotels(){
        $hotels = Hotel::with(['country'])->get()->toArray();
        $countries = Country::all();
        return view('hotel.hotel', ['hotels' => $hotels, 'countries' => $countries]);
    }
    public function hotelImages(Hotel $hotel){
        $images = HotelImages::with(['hotel'])->where('hotel_id', $hotel->id)->get()->toArray();
        return view('hotel.images', ['hotel' => $hotel, 'images' => $images]);
    }
    public function hotelRooms(Hotel $hotel){
        $rooms = HotelRoomType::with(['hotel'])->where('hotel_id', $hotel->id)->get()->toArray();
        return view('hotel.rooms', ['hotel' => $hotel, 'rooms' => $rooms]);
    }
    public function airports(){
        $airport = Airport::with(['country'])->get()->toArray();
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
    public function searchOrders(){
        $orders = SearchOrder::with([
            'hotel',
            'airport',
            'children',
            'roomType',
            'boardingType',
            'internetPriceOrder',
            'specialPriceOrder'
        ])->get()->toArray();
        return view('search_order.search_order', ['orders' => $orders]);
    }
}
