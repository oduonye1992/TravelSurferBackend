<?php

namespace App\Http\Controllers;

use App\SplashScreen;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class SplashController extends Controller
{
    public function read(){
        return SplashScreen::all();
    }
    public function add(Request $request) {
        $rules = [
            'img' => 'required',
            'title' => 'required',
            'description' => 'required',
            'backgroundColor' => 'required',
            'fontColor' => 'required',
            'level' => 'required|integer'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response($validator->errors()->all(), Response::HTTP_BAD_REQUEST);
        }
        return SplashScreen::create($request->all());
    }
    public function getByID(SplashScreen $item){
        return $item;
    }
    public function update(SplashScreen $item,  Request $request){
        return ['status' => $item->update($request->all())];
    }
    public function delete(SplashScreen $item){
        return [
            'status' => $item->delete()
        ];
    }
}
