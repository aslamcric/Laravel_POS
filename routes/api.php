<?php

use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\PurchaReturnController;
use App\Http\Controllers\api\PurchaseReturnController;
use App\Http\Controllers\api\purchasesController;
use App\Http\Controllers\PurchaseReturnController as ControllersPurchaseReturnController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::resource('orders', OrderController::class);
Route::resource('purchases', purchasesController::class);

Route::resource('purchasereturns', PurchaReturnController::class);
