<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    public function read(Request $request){
        if (isset($request->q)){
            return Hotel::with(['country', 'images', 'rooms'])->where('id', $request->id)->get();
        } else {
            return Hotel::with(['country', 'images', 'rooms'])->get();
        }
    }
    public function suggest(Request $request){
        $q = $request->q;
        return Hotel::where('name', 'like', "%$q%")->with(['country', 'images', 'rooms'])->get();
    }
    public function add(Request $request) {
        $rules = [
            'name' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'image' => 'required',
            'rating' => 'required|integer',
            'address' => 'required',
            'description' => 'required',
            'country_id' => 'required|integer|exists:countries,id'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response($validator->errors()->all(), Response::HTTP_BAD_REQUEST);
        }
        return Hotel::create($request->all());
    }
    public function getByID(Hotel $hotel){
        return $hotel;
    }
    public function update(Hotel $item,  Request $request){
        return ['status' => $item->update($request->all())];
    }
    public function delete(Hotel $item,  Request $request){
        return ['status' => $item->delete()];
    }
}
