<?php

namespace App\Http\Controllers;

use App\SearchOrder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Validator;

class SearchOrderController extends Controller
{
    public function read(){
        return SearchOrder::with([
            'hotel',
            'airport',
            'children',
            'roomType',
        ])->get();
    }
    public function add(Request $request) {
        Log::info('Submitting search order for: '.json_encode($request->all()));
        $rules = [
            'hotel_id' => 'required|integer|exists:hotels,id',
            'airport_id' => 'required|integer|exists:airports,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'room_type' => 'required|integer|exists:hotels_room_type,id',
            'boarding' => 'required|boolean',
            //'transport' => 'required|boolean',
            'adults' => 'required|integer',
            'children' => 'required|integer',
            'uuid' => 'required',
            //'uuid' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response($validator->errors()->all(), Response::HTTP_BAD_REQUEST);
        }
        return SearchOrder::create($request->all());
    }
    public function getByID(SearchOrder $item){
        return $item;
    }
    public function update(SearchOrder $item,  Request $request){
        return ['status' => $item->update($request->all())];
    }
    public function delete(SearchOrder $item){
        return $item->delete();
    }
}
