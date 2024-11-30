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
        Route::get('delete/{id}', [UserManagementController::class, 'destroyUser']);
    
    });


    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('list', [CategoryController::class, 'categoryList'])->name('list');
        Route::post('categoryForm', [CategoryController::class, 'categoryForm'])->name('add');
        Route::get('edit/{id}', [CategoryController::class, 'editCategory'])->name('edit');
        Route::get('delete/{id}', [CategoryController::class, 'destroyCategory'])->name('delete');
    });
    

    Route::group(['prefix' => 'sd', 'as' => 'sd.'], function () {
        Route::get('list', [CategoryController::class, 'sdList']);
        Route::post('sdForm', [CategoryController::class, 'sdForm']);
        Route::get('edit/{id}', [CategoryController::class, 'editSD']);
        Route::get('delete/{id}', [CategoryController::class, 'destroySD']);
        
    });

    Route::group(['prefix' => 'warehouse', 'as' => 'warehouse.'], function () {
        Route::get('list', [CategoryController::class, 'warehouseList']);
        Route::post('warehouseForm', [CategoryController::class, 'warehouseForm']);
        Route::get('edit/{id}', [CategoryController::class, 'editWarehouse']);
        Route::get('delete/{id}', [CategoryController::class, 'destroyWarehouse']);
        
    });

    Route::group(['prefix' => 'uom', 'as' => 'uom.'], function () {
        Route::get('list', [CategoryController::class, 'uomList']);
        Route::post('uomForm', [CategoryController::class, 'uomForm']);
        Route::get('edit/{id}', [CategoryController::class, 'editUom']);
        Route::get('delete/{id}', [CategoryController::class, 'destroyUom']);
        
    });


    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('list', [ProductController::class, 'productList']);
        Route::get('add', [ProductController::class, 'productAdd']);
        Route::post('save_product', [ProductController::class, 'saveProduct']);
        Route::post('save_product/{id}', [ProductController::class, 'saveProduct']);
        Route::get('edit/{id}', [ProductController::class, 'productEdit']);
        Route::get('delete/{id}', [ProductController::class, 'destroyProduct']);
        



        Route::get('stock', [ProductController::class, 'stockList']);
        Route::get('stockAdd', [ProductController::class, 'stockAdd']);
        Route::post('stockSave', [ProductController::class, 'stockSave']);
        Route::post('stockSave/{id}', [ProductController::class, 'stockSave']);
        Route::get('stockEdit/{id}', [ProductController::class, 'stockEdit']);
        Route::get('stockDelete/{id}', [ProductController::class, 'stockDelete']);
        
    });


    Route::group(['prefix' => 'billing', 'as' => 'billing.'], function () {
        Route::get('list', [BillingController::class, 'billingList']);
        Route::get('add', [BillingController::class, 'billingAdd']);
        Route::post('print_billing', [BillingController::class, 'print_billing']);
    });
    
    

    Route::group(['prefix' => 'cartoon', 'as' => 'cartoon.'], function () {
        Route::get('list', [CartoonController::class, 'cartoonList']);
        Route::get('add', [CartoonController::class, 'cartoonAdd']);

        Route::post('cartoonSave', [CartoonController::class, 'cartoonSave']);
        Route::post('cartoonSave/{id}', [CartoonController::class, 'cartoonSave']);
        Route::get('cartoonEdit/{id}', [CartoonController::class, 'cartoonEdit']);
        Route::get('cartoonDelete/{id}', [CartoonController::class, 'cartoonDelete']);

    });
    
    

    Route::group(['prefix' => 'requerment', 'as' => 'requerment.'], function () {
        Route::get('list', [RequirmentController::class, 'requirementList']);



        Route::get('condition', [RequirmentController::class, 'requirementCondition']);
        Route::get('condition-add', [RequirmentController::class, 'requirementConditionAdd']);
        Route::post('conditionSave', [RequirmentController::class, 'conditionSave']);
        Route::post('conditionSave/{id}', [RequirmentController::class, 'conditionSave']);
        Route::get('conditionEdit/{id}', [RequirmentController::class, 'conditionEdit']);
        Route::get('conditionDelete/{id}', [RequirmentController::class, 'conditionDelete']);

    });




});
