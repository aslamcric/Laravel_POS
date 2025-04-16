<?php

use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\PurchaReturnController;
use App\Http\Controllers\api\PurchaseReturnController;
use App\Http\Controllers\api\purchasesController;
use App\Http\Controllers\api\vue\AuthController;
use App\Http\Controllers\api\vue\CategoryController;
use App\Http\Controllers\api\vue\CustomerController;
use App\Http\Controllers\api\vue\OrderReportController;
use App\Http\Controllers\api\vue\ProductController;
use App\Http\Controllers\api\vue\SupplierController;
use App\Http\Controllers\api\vue\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::resource('ordersLaravel', OrderController::class);
Route::resource('purchases', purchasesController::class);

Route::resource('purchasereturns', PurchaReturnController::class);

Route::get('find_customer',[ OrderController::class, 'find_customer']);
Route::get('find_product',[ OrderController::class, 'find_product']);
Route::post('orders/store_react', [OrderController::class,'store_react']);

Route::get('orders', [OrderController::class,'orders']);

Route::get('orders/{id}', [OrderController::class,'order_invoice']);
Route::get('orderDetails', [OrderController::class,'orderDetail']);
Route::post('api/find_customer', [OrderController::class, 'customer_store']);

Route::get('stock', [OrderController::class,'stock']);

Route::get('product', [OrderController::class,'product']);

Route::get('supplier', [OrderController::class,'supplier']);

Route::get('purchase', [OrderController::class,'purchase']);



// Api for vue
Route::apiResource('customers', CustomerController::class);
Route::apiResource('suppliers', SupplierController::class);
Route::apiResource('products', ProductController::class);
Route::apiResource('categories', CategoryController::class);
Route::get('dropCategory', [CategoryController::class, 'dropCategory']);
Route::apiResource('users', UserController::class);

// login
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::post('logout', [AuthController::class, 'logout']);

// Report
Route::get('/orderReport/data', [OrderReportController::class, 'index']);
Route::post('/orderReport', [OrderReportController::class, 'orderReport']);



// https://stackoverflow.com/questions/54721576/laravel-route-apiresource-difference-between-apiresource-and-resource-in-route
// https://jurin.medium.com/securing-laravel-10-api-using-jwt-a5b6dca58fd7
