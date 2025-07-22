<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\CategoryController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('books', BookController::class);
    Route::apiResource('categories', CategoryController::class);
});

/* Route::get('/books', [BookController::class, 'index']); 
Route::post('/books', [BookController::class, 'store']); */

/* Route::apiResource('books', BookController::class);
Route::apiResource('categories', CategoryController::class); */