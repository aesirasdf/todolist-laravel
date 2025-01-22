<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function store(Request $request){
        $validator = validator($request->all(), [
            "title"=> ["required", "max:255", "string"],
        ]);

        if($validator->fails()){
            return response()->json([
                "errors"=> $validator->errors(),
                "ok" => false,
                "message" => "Bad Request!"
            ], 400);
        }


        $todo = Todo::create($request->all());

        return response()->json([
            "data" => $todo,
            "ok" => true,
            "message"=> "Todo has been created!"
        ], 201);
    }
    public function update(Request $request, Todo $todo){
        $validator = validator($request->all(), [
            "title"=> ["required", "max:255", "string"],
        ]);

        if($validator->fails()){
            return response()->json([
                "errors"=> $validator->errors(),
                "ok" => false,
                "message" => "Bad Request!"
            ], 400);
        }


        $todo->update($request->all());

        return response()->json([
            "data" => $todo,
            "ok" => true,
            "message"=> "Todo has been updated!"
        ], 200);
    }


    public function index(){
        return response()->json([
            "data" => Todo::all(),
            "message" => "Successfully retrieved!",
            "ok" => true
        ]);
    }
    public function show(Todo $todo){
        return response()->json([
            "data" => $todo,
            "message" => "Successfully retrieved!",
            "ok" => true
        ]);
    }
    public function destroy(Todo $todo){
        $todo->delete();
        return response()->json([
            "message" => "Successfully deleted!",
            "ok" => true
        ]);
    }

}
