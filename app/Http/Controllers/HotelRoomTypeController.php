<?php

namespace App\Http\Controllers;

use App\HotelRoomType;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Http\Request;

class HotelRoomTypeController extends Controller
{
    public function read(){
        return HotelRoomType::all();
    }
    public function add(Request $request) {
        $rules = [
            'name' => 'required',
            'hotel_id' => 'required|integer|exists:hotels,id'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response($validator->errors()->all(), Response::HTTP_BAD_REQUEST);
        }
        return HotelRoomType::create($request->all());
    }
    public function getByID(HotelRoomType $roomType){
        return $roomType;
    }
    public function update(HotelRoomType $roomType,  Request $request){
        return ['status' => $roomType->update($request->all())];
    }
    public function delete(HotelRoomType $roomType){
        return $roomType->delete();
    }
}
