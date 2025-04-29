<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductService;

Route::middleware(['web'])->group(function () {
   Route::prefix('product')->controller(ProductService::class)->group(function (){
        Route::post('create', 'create');
        Route::put('update', 'update');
        Route::get('list', 'list');
        Route::get('details', 'details');
        Route::delete('delete', 'delete');
   });
});