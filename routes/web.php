<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerGroupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\VariantAttribiuteController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [DashboardController::class, 'index'])->name('Dashboard.index');

Route::get('/customer-groups', [CustomerGroupController::class, 'index'])->name('CustomerGroup.index');
Route::post('/customer-groups', [CustomerGroupController::class, 'store'])->name('CustomerGroup.store');
Route::delete('/customer-groups/{customer_group}', [CustomerGroupController::class, 'delete'])->name('CustomerGroup.destroy');

Route::get('/customers', [CustomerController::class, 'index'])->name('Customer.index');
Route::post('/customers', [CustomerController::class, 'store'])->name('Customer.store');
Route::delete('/customers/{customer}', [CustomerController::class, 'delete'])->name('Customer.destroy');

Route::get('/suppliers', [SupplierController::class, 'index'])->name('Supplier.index');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('Supplier.store');
Route::delete('/suppliers/{supplier}', [SupplierController::class, 'delete'])->name('Supplier.destroy');

Route::get('/brands', [BrandController::class, 'index'])->name('Brand.index');
Route::post('/brands', [BrandController::class, 'store'])->name('Brand.store');
Route::delete('/brands/{brand}', [BrandController::class, 'delete'])->name('Brand.destroy');

Route::get('/categories', [CategoryController::class, 'index'])->name('Category.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('Category.store');
Route::delete('/categories/{category}', [CategoryController::class, 'delete'])->name('Category.destroy');

Route::get('/groups', [GroupController::class, 'index'])->name('Group.index');
Route::post('/groups', [GroupController::class, 'store'])->name('Group.store');
Route::delete('/groups/{group}', [GroupController::class, 'delete'])->name('Group.destroy');

Route::get('/inventory', [InventoryController::class, 'index'])->name('Inventory.index');

Route::get('/units', [UnitController::class, 'index'])->name('Unit.index');
Route::post('/units', [UnitController::class, 'store'])->name('Unit.store');
Route::delete('/units/{unit}', [UnitController::class, 'delete'])->name('Unit.destroy');

Route::get('/variant-attribute', [VariantAttribiuteController::class, 'index'])->name('VariantAttribiute.index');
Route::post('/variant-attribute', [VariantAttribiuteController::class, 'store'])->name('VariantAttribiute.store');
Route::delete('/variant-attribute/{attribute}', [VariantAttribiuteController::class, 'delete'])->name('VariantAttribiute.destroy');

Route::get('/products', [ProductController::class, 'index'])->name('Product.index');