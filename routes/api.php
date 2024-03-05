<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::apiResource('/products',\App\Http\Controllers\ProductController::class);
Route::prefix('product')->group(function (){
    Route::apiResource('/{product}/reviews',\App\Http\Controllers\ReviewController::class);
});
