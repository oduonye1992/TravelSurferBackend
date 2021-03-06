<?php

namespace App\Http\Controllers;

use App\Airport;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Http\Request;

class AirportsController extends Controller
{
    public function read(){
        return Airport::with(['country'])->get();
    }
    public function suggest(Request $request){
        $q = $request->q;
        return Airport::where('name', 'like', "%$q%")->with(['country'])->get();
    }
    public function add(Request $request) {
        $rules = [
            'name' => 'required',
            'location' => 'required',
            'country_id' => 'required|integer|exists:countries,id'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response($validator->errors()->all(), Response::HTTP_BAD_REQUEST);
        }
        return Airport::create($request->all());
    }
    public function getByID(Airport $airport){
        return $airport;
    }
    public function update(Airport $airport,  Request $request){
        return ['status' => $airport->update($request->all())];
    }
    public function delete(Airport $item,  Request $request){
        return ['status' => $item->delete()];
    }
}
