<?php

use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("todos", [TodoController::class, "index"]);
Route::post("todos", [TodoController::class, "store"]);
Route::patch("todos/{todo}", [TodoController::class, "update"]);
Route::get("todos/{todo}", [TodoController::class, "show"]);
Route::delete("todos/{todo}", [TodoController::class, "destroy"]);