<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\UserManagementController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\BillingController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CartoonController;
use App\Http\Controllers\admin\RequirmentController;

Route::get('login', [AdminAuthController::class, 'login'])->name('login');
Route::get('back-to-admin', [AdminAuthController::class, 'backToAdmin']);
Route::post('admin-login-action', [AdminAuthController::class, 'adminLoginAction']);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['App\Http\Middleware\AdminAuth']], function () {
    Route::get('dashboard', [AdminAuthController::class, 'dashboard']);
    Route::get('profile', [AdminAuthController::class, 'profile']);
    Route::put('/admin/profile/update', [AdminAuthController::class, 'updateProfile'])->name('profile.update');
    Route::put('/admin/password/update', [AdminAuthController::class, 'updatePassword'])->name('password.update');

    Route::get('logout', [AdminAuthController::class, 'logout']);

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('list', [UserManagementController::class, 'userList']);
        Route::get('add', [UserManagementController::class, 'userAdd']);
        Route::get('edit/{id}', [UserManagementController::class, 'edit'])->name('admin.user.edit');
        Route::post('save_user/{id?}', [UserManagementController::class, 'save_user'])->name('admin.user.save');
    });


    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('list', [CategoryController::class, 'categoryList']);
        Route::get('add', [CategoryController::class, 'categoryAdd']);
    });


    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('list', [ProductController::class, 'productList']);
        Route::get('add', [ProductController::class, 'productAdd']);
        Route::get('quantity', [ProductController::class, 'quantity']);
        Route::get('quantityAdd', [ProductController::class, 'quantityAdd']);
    });


    Route::group(['prefix' => 'billing', 'as' => 'billing.'], function () {
        Route::get('list', [BillingController::class, 'billingList']);
        Route::get('add', [BillingController::class, 'billingAdd']);
    });
    
    

    Route::group(['prefix' => 'cartoon', 'as' => 'cartoon.'], function () {
        Route::get('list', [CartoonController::class, 'cartoonList']);
        Route::get('add', [CartoonController::class, 'cartoonAdd']);
    });
    
    

    Route::group(['prefix' => 'requerment', 'as' => 'requerment.'], function () {
        Route::get('list', [RequirmentController::class, 'requirementList']);
        Route::get('condition', [RequirmentController::class, 'requirementCondition']);
        Route::get('condition-add', [RequirmentController::class, 'requirementConditionAdd']);
    });




});
