<?php

namespace App\Http\Controllers;

abstract class Controller
{
    
    protected function BadRequest($validator){
        return response()->json([
            "errors" => $validator->errors(),
            "message" => "Bad Request!",
            "ok" => false
        ], 400);
    }
    protected function Unauthorized(){
        return response()->json([
            "message" => "Unauthorized!",
            "ok" => false
        ], 401);
    }
    protected function Ok($data = [], $message = "Ok!", $others = null){
        return response()->json([
            "data" => $data,
            "message" => $message,
            "others" => $others,
            "ok" => true
        ]);
    }

    protected function Forbidden($message = "Forbidden!"){
        return response()->json([
            "ok" => false,
            "message" => $message
        ], 403);
    }
}
