<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::group(["prefix"=> "todos", "middleware" => "auth:sanctum"], function () {
    Route::get("", [TodoController::class, "index"]);
    Route::post("", [TodoController::class, "store"]);
    Route::patch("{todo}", [TodoController::class, "update"]);
    Route::get("{todo}", [TodoController::class, "show"]);
    Route::delete("{todo}", [TodoController::class, "destroy"]);
});


Route::post("login", [AuthController::class, "login"]);
Route::post("register", [AuthController::class, "register"]);
Route::get( "user", [AuthController::class, "checkToken"])->middleware("auth:sanctum");