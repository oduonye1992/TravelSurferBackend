<?php

namespace App\Http\Controllers;

use App\SpecialPriceOrder;
use Illuminate\Http\Request;
use Validator;

class SpecialPriceController extends Controller
{
    public function read(){
        return SpecialPriceOrder::with([
            'roomType',
            'boardingType',
            'searchOrder'
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
            'transport_included' => 'required|boolean',
            'hotel_id' => 'required|integer|exists:hotels,id',
            'airport_id' => 'required|integer|exists:airports,id',
            'booking_url' => 'required',
            'room_type' => 'required|integer|exists:hotels_room_type,id'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        return SpecialPriceOrder::create($request->all());
    }
    public function getByID(SpecialPriceOrder $item){
        return $item;
    }
    public function update(SpecialPriceOrder $item,  Request $request){
        return ['status' => $item->update($request->all())];
    }
    public function delete(SpecialPriceOrder $item){
        return $item->delete();
    }
}
