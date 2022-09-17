<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('products',[ProductController::class,'index'])
        ->name('products.index');
    Route::get('products/create',[ProductController::class,'create'])
        ->name('products.create');
    Route::post('products',[ProductController::class,'store'])
        ->name('products.store');
    Route::get('products/{product}',[ProductController::class,'edit'])
        ->name('products.edit');
    Route::post('products/{product}',[ProductController::class,'update'])
        ->name('products.update');
});
