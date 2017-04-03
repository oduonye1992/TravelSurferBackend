<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function read(){
        return Country::all();
    }
    public function add(Request $request) {
        $rules = [
            'title' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response($validator->errors()->all(), Response::HTTP_BAD_REQUEST);
        }
        return Country::create($request->all());
    }
    public function getByID(Country $country){
        return $country;
    }
    public function update(Country $country,  Request $request){
        return ['status' => $country->update($request->all())];
    }
    public function delete(Country $item){
        $item->delete();
    }
}
/*
 * 1. Integrating Push Notification
 * 2. Integration Email Dispatching
 * 3. Creating the UI for the Admin Section
 */