<?php

namespace App\Http\Controllers;

use App\Hotel;
use Validator;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    public function read(){
        return Hotel::all();
    }
    public function add(Request $request) {
        $rules = [
            'name' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'description' => 'required',
            'country_id' => 'required|integer|exists:countries,id'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        return Hotel::create($request->all());
    }
    public function getByID(Hotel $hotel){
        return $hotel;
    }
    public function update(Hotel $item,  Request $request){
        return ['status' => $item->update($request->all())];
    }
}
