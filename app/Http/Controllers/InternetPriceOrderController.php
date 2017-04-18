<?php

namespace App\Http\Controllers;

use App\InternetPriceOrder;
use App\SearchOrder;
use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class InternetPriceOrderController extends Controller
{
    public function read(Request $request){
        $uuid = $request->uuid;
        //$uuid = 'f71bf27f5b05d60f';
        // Get search orders for that email.
        // Ge internet orders for that seaeth order
        $orders = SearchOrder::where('uuid', $uuid)->get();
        $formatted = [];
        foreach ($orders as $order){
            array_push($formatted, $order->id);
        }
        return InternetPriceOrder::with([
            'roomType',
            'searchOrder',
            'hotel'
        ])->whereIn('search_order_id', $formatted)->get();
    }
    public function push(InternetPriceOrder $order) {
        try {
            // Get message
            $search_order = SearchOrder::with(['hotel', 'airport'])->findOrFail($order->search_order_id);
            // Get uuid, from search order;
            // Send message to user
            $message = "New update: ".$search_order->hotel->name." for ".$order->price;
            Utility::push($message, null);
            return response("Notification sent!", Response::HTTP_OK);
        } catch (\Exception $e){
            return response("An erro has occured and has been logged".$e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
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
