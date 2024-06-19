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
use App\Http\Controllers\VariantAttribiuteController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [DashboardController::class, 'index'])->name('Dashboard.index');

Route::get('/customer-groups', [CustomerGroupController::class, 'index'])->name('CustomerGroup.index');
Route::get('/customer-groups/create', [CustomerGroupController::class, 'createView'])->name('CustomerGroup.create');
Route::post('/customer-groups', [CustomerGroupController::class, 'store'])->name('CustomerGroup.store');

Route::get('/customers', [CustomerController::class, 'index'])->name('Customer.index');
// Route::get('/customers/create', [CustomerController::class, 'createView'])->name('Customer.create');
Route::get('/suppliers', [SupplierController::class, 'index'])->name('Supplier.index');
Route::get('/products', [ProductController::class, 'index'])->name('Product.index');
Route::get('/brands', [BrandController::class, 'index'])->name('Brand.index');
Route::get('/categories', [CategoryController::class, 'index'])->name('Category.index');
Route::get('/groups', [GroupController::class, 'index'])->name('Group.index');
Route::get('/inventory', [InventoryController::class, 'index'])->name('Inventory.index');
Route::get('/units', [InventoryController::class, 'index'])->name('Unit.index');
Route::get('/variant-attribute', [VariantAttribiuteController::class, 'index'])->name('VariantAttribiute.index');