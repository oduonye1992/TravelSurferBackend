<?php

namespace App\Http\Controllers;

use App\BoardingType;
use Validator;
use Illuminate\Http\Request;

class BoardingTypeController extends Controller
{
    public function read(){
        return BoardingType::all();
    }
    public function add(Request $request) {
        $rules = [
            'name' => 'required',
            'hotel_id' => 'required|integer|exists:hotels,id'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        return BoardingType::create($request->all());
    }
    public function getByID(BoardingType $item){
        return $item;
    }
    public function update(BoardingType $item,  Request $request){
        return ['status' => $item->update($request->all())];
    }
    public function delete(BoardingType $item){
        return $item->delete();
    }
}
