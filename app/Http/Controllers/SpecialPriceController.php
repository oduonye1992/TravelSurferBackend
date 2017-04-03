<?php

namespace App\Http\Controllers;

use App\SearchOrder;
use App\SpecialPriceOrder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class SpecialPriceController extends Controller
{
    public function read(){
        $uuid = $request->uuid;
        //$uuid = '7F1B63F4-A2BC-4290-8ABC-2A6EB8C118CE';
        // Get search orders for that email.
        // Ge internet orders for that seaeth order
        $orders = SearchOrder::where('uuid', $uuid)->get();
        $formatted = [];
        foreach ($orders as $order){
            array_push($formatted, $order->id);
        }
        return SpecialPriceOrder::with([
            'roomType',
            'searchOrder',
            'hotel'
        ])->whereIn('search_order_id', $formatted)->get();
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
            return response($validator->errors()->all(), Response::HTTP_BAD_REQUEST);
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
