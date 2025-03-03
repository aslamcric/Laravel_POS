<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\OrderReportController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseReportController;
use App\Http\Controllers\PurchasesDetailController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatuController;
use App\Http\Controllers\StockAdjustmentController;
use App\Http\Controllers\StockAdjustmentDetailController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StockReportController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionTypeController;
use App\Http\Controllers\UomController;
use App\Http\Controllers\WarehouseController;
use App\Models\PaymentStatuse;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::post('supplier/search', [SupplierController::class,'search']);
Route::resource('supplier', SupplierController::class);

Route::post('category/search', [CategoryController::class,'search']);
Route::resource('category', CategoryController::class);


Route::resource('manufacturers', ManufacturerController::class);

Route::resource('customers', CustomerController::class);

Route::resource('roles', RoleController::class);

Route::resource('status', StatuController::class);
Route::resource('paymentstatuse', PaymentStatuse::class);

Route::resource('uoms', UomController::class);

Route::resource('warehouses', WarehouseController::class);

Route::resource('orders', OrderController::class);

Route::resource('orderdetails', OrderDetailController::class);

Route::resource('products', ProductController::class);

Route::resource('purchases', PurchaseController::class);

Route::resource('purchasesdetails', PurchasesDetailController::class);

Route::resource('stocks', StockController::class);

Route::resource('stockadjustments', StockAdjustmentController::class);

Route::resource('stockadjustmentdetails', StockAdjustmentDetailController::class);

Route::resource('transactiontypes', TransactionTypeController::class);



Route::post('find_supplier', [PurchaseController::class, 'find_supplier'])->name('find_supplier');

Route::post('find_customer', [OrderController::class, 'find_customer'])->name('find_customer');
Route::post('find_product', [OrderController::class, 'find_product']);



Route::get('/purchase-report', [PurchaseReportController::class, 'index']);
Route::post('/purchase-report', [PurchaseReportController::class, 'show']);


Route::get('/order-report', [OrderReportController::class, 'index']);
Route::post('/order-report', [OrderReportController::class, 'show']);


Route::get('/stock-report', [StockReportController::class, 'index'])->name('stock.report');
Route::post('/stock-report', [StockReportController::class, 'show']);
