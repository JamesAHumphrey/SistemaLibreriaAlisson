<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\ProductPurchaseController;
use App\Http\Controllers\ProductSaleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::get('/products/{id}', [ProductController::class, 'getProductDetails']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::prefix('/profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    Route::resource('categories', CategoryController::class);
    Route::resource('providers', ProviderController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('units', UnitController::class);
    Route::resource('products', ProductController::class);

    //
    Route::resource('movements', MovementController::class);
    Route::resource('purchases', PurchaseController::class);
    Route::resource('product-purchases', ProductPurchaseController::class);
    Route::resource('sales', SaleController::class);
    Route::resource('product-sales', ProductSaleController::class);
    //Route::resource('brands', BrandController::class);

    Route::get('/purchases/create', [PurchaseController::class, 'create'])->name('purchases.create');
    Route::post('/purchases/store', [PurchaseController::class, 'store'])->name('purchases.store');

Route::resource('brands', BrandController::class);
});




require __DIR__ . '/auth.php';
