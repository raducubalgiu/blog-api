<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SubcategoryController;
use Illuminate\Support\Facades\Route;


// Common routes
function common(string $scope) {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware(['auth:sanctum', $scope])->group(function() {
        Route::get('user', [AuthController::class, 'user']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::put('users/info', [AuthController::class, 'updateInfo']);
        Route::put('users/password', [AuthController::class, 'updatePassword']);
    });
}

// Admin Routes
Route::prefix('admin')->group(function() {
    common('scope.admin');

    Route::middleware(['auth:sanctum', 'scope.admin'])->group(function() {
        Route::get('subscribers', [SubscriberController::class, 'index']);
        Route::apiResource('brands', BrandController::class);
        Route::apiResource('categories', CategoryController::class);
        Route::apiResource('subcategories', SubcategoryController::class);
        Route::apiResource('products', ProductController::class);
    });
});

// Subscriber Routes
Route::prefix('subscriber')->group(function() {
    common('scope.subscriber');
});
