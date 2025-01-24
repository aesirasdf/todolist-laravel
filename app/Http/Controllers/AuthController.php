<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        $validator = validator()->make($request->all(), [
            "name" => "required",
            "password" => "required",
        ]);

        if($validator->fails()){
            return $this->BadRequest($validator);
        }

        if(!auth()->attempt($validator->validated())){
            return $this->Unauthorized();
        }

        $user = auth()->user();

        $token = $user->createToken("")->plainTextToken;


        return $this->Ok($user, "Logged In Success!", ["token" => $token]);
    }


    public function register(Request $request){
        $validator = validator($request->all(), [
            "name" => "required|alpha_dash|max:255|min:4|unique:users",
            "email" => "required|unique:users|email|max:255",
            "password" => "required|min:8|max:255"
        ]);

        if($validator->fails())
            return $this->BadRequest($validator);

        $user = User::create($validator->validated());

        return $this->Ok($user);
    }


    public function checkToken(Request $request){
        return $this->Ok($request->user());
    }
}
