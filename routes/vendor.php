<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\vendor\BookingHistoryController;
use App\Http\Controllers\vendor\ReportsController;
use App\Http\Controllers\vendor\VendorAuthController;
use App\Http\Controllers\vendor\HotelController;
use App\Http\Controllers\vendor\ReportController;
use App\Http\Controllers\vendor\PayoutsController;
use App\Http\Controllers\vendor\ExperianceController;
use App\Http\Controllers\vendor\ServiceController;
use App\Http\Controllers\vendor\RoomController;

Route::get('vendor/login', [VendorAuthController::class, 'login'])->name('vendor.login');
Route::post('vendor-login-action', [VendorAuthController::class, 'vendorLoginAction']);

Route::group(['prefix' => 'vendor', 'as' => 'vendor.', 'middleware' => ['App\Http\Middleware\vendorAuth']], function () {
    Route::get('dashboard', [VendorAuthController::class, 'dashboard']);
    Route::get('dashboard-login/{id}', [VendorAuthController::class, 'dashboardLogin']);
    Route::get('logout', [VendorAuthController::class, 'logout']);
    Route::get('my-profile', [VendorAuthController::class, 'myProfile']);
    Route::put('profile/update', [VendorAuthController::class, 'updateVendorProfile'])->name('profile.update');
    Route::put('password/update', [VendorAuthController::class, 'updateVendorPassword'])->name('password.update');
    Route::get('change-password', [VendorAuthController::class, 'changePassword']);
    Route::group(['prefix' => 'reports', 'as' => 'reports.'], function () {
        Route::get('booking-report', [ReportsController::class, 'bookingReports']);
        Route::get('enquiry_report', [ReportsController::class, 'enquiry_report']);
    });
    Route::group(['prefix' => 'booking', 'as' => 'booking.'], function () {
        Route::get('history', [BookingHistoryController::class, 'BookingHistory']);
    });
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('list', [VendorAuthController::class, 'userList']);
    });

    Route::group(['prefix' => 'payouts', 'as' => 'payouts.'], function () {
        Route::get('list', [PayoutsController::class, 'payoutsList']);
    });

    Route::group(['prefix' => 'hotel', 'as' => 'hotel.'], function () {
        Route::get('list', [HotelController::class, 'hotelList']);
        Route::get('add_hotel', [HotelController::class, 'add_hotel']);
        Route::get('edit/{id}', [HotelController::class, 'edit_hotel']);
        Route::post('add-action', [HotelController::class, 'add_hotel_action']);
        Route::post('edit-action/{id}', [HotelController::class, 'edit_hotel_action']);
        Route::get('proprity_type', [HotelController::class, 'proprity_type']);
        Route::get('facility', [HotelController::class, 'facility']);


        // services
        Route::get('hotel_service/{id?}', [ServiceController::class, 'hotel_service']);
        Route::post('service/add-action', [ServiceController::class, 'hotel_service_add_action']);
        Route::post('service/edit-action/{id}', [ServiceController::class, 'hotel_service_add_action']);
        Route::get('service/edit/{id}', [ServiceController::class, 'hotel_service']);
        Route::post('service/delete/{id}', [ServiceController::class, 'hotel_service']);
    });

    Route::group(['prefix' => 'room', 'as' => 'room.'], function () {
        Route::get('amenities', [RoomController::class, 'roomamenities']);
        Route::post('amenity/add-action', [RoomController::class, 'updateOrAddAmenity']);
        Route::get('amenity/edit/{id?}', [RoomController::class, 'amenityEdit'])->name('amenity.edit');
        Route::post('amenity/update/{id?}', [RoomController::class, 'updateOrAddAmenity'])->name('amenity.update');
        Route::get('amenity/delete/{id}', [RoomController::class, 'amenityDelete'])->name('amenity.delete');


        // List all room types
        Route::get('type', [RoomController::class, 'roomTypes'])->name('roomTypes');
        Route::post('type/add-action', [RoomController::class, 'roomTypeUpdateOrAdd']);
        // Edit or add a room type
        Route::get('type/edit/{id?}', [RoomController::class, 'roomTypeEdit'])->name('roomTypeEdit');

        // Update or add a room type
        Route::post('type/update/{id?}', [RoomController::class, 'roomTypeUpdateOrAdd'])->name('roomTypeUpdateOrAdd');

        // Delete a room type
        Route::get('type/delete/{id}', [RoomController::class, 'roomTypeDelete'])->name('roomTypeDelete');


        Route::get('list', [RoomController::class, 'roomList']);
        Route::get('addRoom', [RoomController::class, 'addRoom']);
        Route::post('save_room/{id?}', [RoomController::class, 'saveRoom'])->name('room.save');
        Route::get('edit_room/{id?}', [RoomController::class, 'edit_room']);
        Route::get('delete_room_images/{id?}', [RoomController::class, 'delete_room_images']);
        Route::get('delete_room/{id}', [RoomController::class, 'deleteRoom'])->name('room.delete');


        Route::get('avalibility', [RoomController::class, 'roomAvalibility']);
    });



    Route::group(['prefix' => 'experiance', 'as' => 'experiance.'], function () {
        Route::get('list', [ExperianceController::class, 'experianceList']);
        Route::get('add-new-tour', [ExperianceController::class, 'addNewTour']);
        Route::post('submit-tour-form', [ExperianceController::class, 'submit_tour_form']);


        Route::get('category', [ExperianceController::class, 'category']);
        Route::post('category/add-action-category', [ExperianceController::class, 'categoryAddAction']);
        Route::get('category/edit/{id}', [ExperianceController::class, 'categoryEdit']);
        Route::get('category/delete/{id}', [ExperianceController::class, 'categoryDelete']);


        Route::get('attributes', [ExperianceController::class, 'attributes']);
        Route::post('attribute/add-action-attribute', [ExperianceController::class, 'attributeAddAction']);
        Route::get('attribute/edit/{id}', [ExperianceController::class, 'attributeEdit']);
        Route::get('attribute/delete/{id}', [ExperianceController::class, 'attributeDelete']);
    });
});
