<?php

namespace App\Http\Controllers;

use App\Token;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function add (Request $request){
        $rules = [
            'token' => 'required|unique:tokens',
            'uuid' => 'required|unique:tokens'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        return Token::create($request->all());
    }
    public function update (Token $token, Request $request){
        $token->token = $request->token;
        return [
            'status' => $token->save()
        ];
    }
}
