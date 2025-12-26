<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\{AuthController, EmailVerificationController};
//
use App\Http\Controllers\Admin\{AdminController, RoleController};
//
use App\Http\Controllers\Contact\{CustomerController, SupplierController};
//
use App\Http\Controllers\Product\{BrandController, CategoryController, ProductController, UnitController};
//
use App\Http\Controllers\Purchase\{PurchaseController, PurchaseReturnController};
//
use App\Http\Controllers\Sale\{SaleController, SaleReturnController};
//
use App\Http\Controllers\User\UserController;
//
use App\Http\Controllers\Accounting\{
    AccountController,
    DepositController,
    ExpenseCategoryController,
    ExpenseController,
    PaymentMethodController
};

//Authentication
Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login',  'loginView')->name('login')->middleware('guest');
        Route::get('/signup', 'index')->name('signup')->middleware('guest');
    });
    Route::post('/signup', 'signup');
    Route::post('/login', 'login');
});

Route::middleware('auth')->group(function () {
    //
    Route::post('/logout', [AuthController::class, 'logout']);
    // User Routes (Authenticated)
    Route::controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');
        Route::get('/profile', 'profile')->name('profile');
        Route::put('/profile/edit/{user}', 'update')->name('profile.update');
        Route::put('/profile/update-password/{user}', 'updatePassword')->name('profile.updatePassword');
        Route::put('/profile/update-picture/{user}', 'updateProfilePicture')->name('profile.updatePicture');
    });

    //admin
    Route::middleware('role:admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/login-histories', 'loginHistory');
            Route::get('/users', 'users')->name('users');
            Route::get('users/role/{user}', 'userEdit')->name('user.assignRole');
            Route::put('users/role/{user}', 'updateRole')->name('user.updateRole');
        });
    });

    // Product Routes (CRUD Operations)
    Route::resource('/products', ProductController::class);
    Route::post('/products/create/store-standard', [ProductController::class, 'storeStandard'])->name('products.storeStandard');
    Route::post('/products/create/store-variable', [ProductController::class, 'storeVariable'])->name('products.storeVariable');

    Route::middleware('role:admin,purchase-manager')->group(function () {
        // POS Routes Purchases
        Route::resource('purchases', PurchaseController::class);
        Route::controller(PurchaseController::class)->group(function () {
            Route::post('purchases/update-status/{id}', 'updateDeliveryStatus')->name('purchases.updateStatus');
            Route::get('/purchases/pay/{id}', 'showPaymentForm')->name('purchases.pay.show');
            Route::post('/purchases/pay/', 'addPaymentforPurchases')->name('purchases.pay');
        });
        // Purchase Return Routes (CRUD Operations)
        Route::controller(PurchaseReturnController::class)->group(function () {
            Route::get('/purchase-returns', 'index')->name('purchase-returns.index');
            Route::get('/purchase-returns/create/{id}', 'create')->name('purchase-returns.create');
            Route::post('/purchase-returns', 'store')->name('purchase-returns.store');
            Route::get('/purchase-returns/{id}', 'show')->name('purchase-returns.show');
            Route::post('/purchase-returns/update-status/{id}', 'updateStatus')->name('purchase-returns.updateStatus');
        });
    });

    Route::middleware('role:admin,sales-manager')->group(function () {
        // POS Routes Sales
        Route::resource('sales', SaleController::class);
        Route::post('sales/update-status/{id}', [SaleController::class, 'updateDeliveryStatus'])->name('sales.updateStatus');
        // Sale Return Routes (CRUD Operations)
        Route::controller(SaleReturnController::class)->group(function () {
            Route::get('/sale-returns/create/{sale}', 'create')->name('sale-returns.create');
            Route::post('/sale-returns', 'store')->name('sale-returns.store');
            Route::get('/sale-returns', 'index')->name('sale-returns.index');
            Route::get('/sale-returns/{id}', 'show')->name('sale-returns.show');
            Route::post('/sale-returns/update-status/{id}', 'updateStatus')->name('sale-returns.updateStatus');
        });
    });

    // Email Verification Routes
    Route::get('/email/verify', [EmailVerificationController::class, 'notice'])->middleware('auth')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'handler'])->middleware(['auth', 'signed'])->name('verification.verify');
    Route::post('/email/verification-notification', [EmailVerificationController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

    //Roles
    Route::resource('/roles', RoleController::class);
    // Contact Routes (CRUD Operations)
    Route::resource('/customers', CustomerController::class);
    Route::resource('/suppliers', SupplierController::class);
    // Product Attribute Routes (CRUD Operations)
    Route::resource('/brands', BrandController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/units', UnitController::class);
    // Accounting Routes (CRUD Operations)
    Route::middleware('role:admin')->group(function () {
        Route::resource('/accounting/accounts', AccountController::class);
        Route::resource('/accounting/payment-methods', PaymentMethodController::class);
        Route::resource('/accounting/deposits', DepositController::class);
        Route::resource('/accounting/expense-categories', ExpenseCategoryController::class);
        Route::resource('/accounting/expenses', ExpenseController::class);
    });
});


//VIEW TESTING
Route::get('/check', function () {
    // Set a session alert message
    //session()->flash('alert', 'a flesh message!');

    return view('zz.check');
});
