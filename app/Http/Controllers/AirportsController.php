<?php

namespace App\Http\Controllers;

use App\Airport;
use Validator;
use Illuminate\Http\Request;

class AirportsController extends Controller
{
    public function read(){
        return Airport::all();
    }
    public function add(Request $request) {
        $rules = [
            'name' => 'required',
            'location' => 'required',
            'country_id' => 'required|integer|exists:countries,id'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        return Airport::create($request->all());
    }
    public function getByID(Airport $airport){
        return $airport;
    }
    public function update(Airport $airport,  Request $request){
        return ['status' => $airport->update($request->all())];
    }
}
