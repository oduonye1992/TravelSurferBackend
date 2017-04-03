<?php

namespace App\Http\Controllers;

use App\HotelImages;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Http\Request;

class HotelImageController extends Controller
{
    public function read(){
        return HotelImages::all();
    }
    public function add(Request $request) {
        $rules = [
            'image' => 'required',
            'hotel_id' => 'required|integer|exists:hotels,id'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response($validator->errors()->all(), Response::HTTP_BAD_REQUEST);
        }
        return HotelImages::create($request->all());
    }
    public function getByID(HotelImages $hi){
        return $hi;
    }
    public function update(HotelImages $hi,  Request $request){
        return ['status' => $hi->update($request->all())];
    }
    public function delete(HotelImages $hi){
        $hi->delete();
    }
}
