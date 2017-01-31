<?php

namespace App\Http\Controllers;

use App\InternetPriceOrder;
use Illuminate\Http\Request;
use Validator;

class InternetPriceOrderController extends Controller
{
    public function read(){
        return InternetPriceOrder::with([
            'roomType',
            'boardingType',
            'searchOrder',
            'hotel'
        ])->get();
    }
    public function add(Request $request) {
        $rules = [
            'search_order_id' => 'required|integer|exists:search_orders,id',
            'price' => 'required|integer',
            'flight_included' => 'required|boolean',
            'baggage' => 'required|boolean',
            'travel_start_date' => 'required|date',
            'travel_end_date' => 'required|date',
            'boarding_type' => 'required',
            'hotel_id' => 'required|integer|exists:hotels,id',
            'airport_id' => 'required|integer|exists:airports,id',
            'booking_url' => 'required',
            'room_type' => 'required|integer|exists:hotels_room_type,id'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        return InternetPriceOrder::create($request->all());
    }
    public function getByID(InternetPriceOrder $item){
        return $item;
    }
    public function update(InternetPriceOrder $item,  Request $request){
        return ['status' => $item->update($request->all())];
    }
    public function delete(InternetPriceOrder $item){
        return $item->delete();
    }
}
