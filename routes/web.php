<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController as AdminAuth;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Customer\AuthController as CustomerAuth;

Route::get('/', function() {
    return redirect()->route('customer.login');
})->name('login');

//Customer routes
Route::prefix('customer')->group(function() {

    //Guest only routes (not logged in)
    Route::middleware('guest:customer')->group(function(){
        Route::get('/login', [CustomerAuth::class, 'showLogin'])->name('customer.login');
        Route::post('/login', [CustomerAuth::class, 'login'])->name('customer.loggedin');
        Route::get('/register', [CustomerAuth::class, 'showRegister'])->name('customer.register');
        Route::post('/register', [CustomerAuth::class, 'register'])->name('customer.registration');
    });

    //Authenticated routes
    Route::middleware('auth:customer')->group(function () {
        Route::get('/dashboard', [CustomerAuth::class, 'dashboard'])->name('customer.dashboard');
        Route::get('/logout', [CustomerAuth::class, 'logout'])->name('customer.logout');
    });
});

//Admin routes
Route::prefix('admin')->group(function () {

    //Guest only routes (not logged in)
    Route::middleware('guest:admin')->group(function(){
        Route::get('/login', [AdminAuth::class, 'showLogin'])->name('admin.login');
        Route::post('/login', [AdminAuth::class, 'login'])->name('admin.loggedin');
        Route::get('/register', [AdminAuth::class, 'showRegister'])->name('admin.register');
        Route::post('/register', [AdminAuth::class, 'register'])->name('admin.registration');
    });
    
    //Authenticated routes  
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminAuth::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [AdminAuth::class, 'logout'])->name('admin.logout');

        //Product module routes
        Route::prefix('product')->group(function() {
            Route::get('index', [ProductController::class, 'index'])->name('admin.product.index');
            Route::get('create', [ProductController::class, 'create'])->name('admin.product.create');
            Route::post('store', [ProductController::class, 'store'])->name('admin.product.store');
            Route::get('view/{product_id}', [ProductController::class, 'view'])->name('admin.product.show');
            Route::get('edit/{product_id}', [ProductController::class, 'edit'])->name('admin.product.edit');
            Route::post('update/{product_id}', [ProductController::class, 'update'])->name('admin.product.update');
            Route::get('delete/{product_id}', [ProductController::class, 'delete'])->name('admin.product.destroy');
            Route::get('export', [ProductController::class, 'export'])->name('admin.product.export');            
            Route::post('import', [ProductController::class, 'import'])->name('admin.product.import');                                          
        });
    });
});
