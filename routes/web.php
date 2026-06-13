<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');;

Route::post('/logout', [AuthController::class, 'logout']);


Route::middleware('auth')->group(function () {


    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index']);
        Route::get('/users',[AdminController::class, 'users']);
        Route::patch(
            '/users/{user}/toggle-role',
            [AdminController::class, 'toggleRole']
        );

        Route::get(
        '/categories',
        [AdminController::class, 'categories']
        );

        Route::post(
            '/categories',
            [AdminController::class, 'storeCategory']
        );

        Route::put(
            '/categories/{category}',
            [AdminController::class, 'updateCategory']
        );

        Route::delete(
            '/categories/{category}',
            [AdminController::class, 'destroyCategory']
        );

            Route::get(
            '/products',
            [AdminController::class, 'products']
        );

        Route::delete(
    '/products/{product}',
    [AdminController::class, 'destroyProduct']
);


    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::get( '/dashboard/products', [ProductController::class, 'dashboard'] );
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/create', [ProductController::class, 'create']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get( '/products/{product}/edit',[ProductController::class, 'edit']);    
    Route::put('/products/{product}',[ProductController::class, 'update']);
    Route::delete('/products/{product}',[ProductController::class, 'destroy']);
    Route::get( '/products/{product}',[ProductController::class, 'show']);

    Route::get('/artisans/{user}',[ArtisanController::class, 'show']);
    Route::get( '/dashboard/profile', [ArtisanController::class, 'edit']);
    Route::put('/dashboard/profile', [ArtisanController::class, 'update']);
    

});