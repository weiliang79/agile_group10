<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\SenderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['middleware' => ['guest']], function () {

    //landing page
    Route::get('/', [LandingController::class, "index"])->name('landing');
    Route::get('/tracking', [LandingController::class, 'tracking'])->name('landing.tracking');

    //login & logout
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login-process', [LoginController::class, 'process'])->name('login.process');
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/register-process', [LoginController::class, 'registerProcess'])->name('register.process');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/logout', [LoginController::class, 'destory'])->name('logout');

    Route::group(['middleware' => ['can:isNormalUser']], function () {
        Route::get('/normal_user/home', [SenderController::class, 'index'])->name('normal_user.home');
        Route::post('/normal_user/save_parcel', [SenderController::class, 'saveParcel'])->name('normal_user.save_parcel');
    });

    Route::group(['middleware' => ['can:isCourier']], function () {
        Route::get('/courier/home', [CourierController::class, 'index'])->name('courier.home');
        Route::post('/courier/update_parcel', [CourierController::class, 'updateParcel'])->name('courier.update_parcel');
        Route::get('/courier/{parcel:tracking_number}/deliver_screen', [CourierController::class, 'deliverScreen'])->name('courier.deliver_screen');
        Route::post('/courier/deliver_screen_submit', [CourierController::class, 'deliverScreenSubmit'])->name('courier.deliver_screen_submit');
        Route::post('/courier/deliver_parcel', [CourierController::class, 'deliverParcel'])->name('courier.deliver_parcel');
        Route::get('/courier/tracking_page',[CourierController::class, 'trackingPage'])->name('courier.tracking_page');
        Route::get('/courier/parcel_request_list',[CourierController::class, 'parcelRequestList'])->name('courier.parcel_request_list');
        Route::get('/courier/parcel_request_form/{request_id}',[CourierController::class, 'parcelRequestForm'])->name('courier.parcel_request_form');
        Route::get('/courier/parcel_request_respond',[CourierController::class, 'parcelRequestRespond'])->name('courier.parcel_request_respond');
    });

    Route::group(['middleware' => ['can:isManager']], function () {
        Route::get('/manager/home', [ManagerController::class, 'index'])->name('manager.home');
        Route::get('/manager/tracking_in_transit', [ManagerController::class, 'trackingInTransit'])->name('manager.tracking_in_transit');
        Route::get('/manager/tracking_in_transit_single/{courier_id}', [ManagerController::class, 'trackingInTransitSingle'])->name('manager.tracking_in_transit_single');
        Route::get('/manager/tracking_not_dispatched', [ManagerController::class, 'trackingNotDispatched'])->name('manager.tracking_not_dispatched');
        Route::get('/manager/tracking_delivered', [ManagerController::class, 'trackingDelivered'])->name('manager.tracking_delivered');
        Route::get('/manager/tracking_not_pickup', [ManagerController::class,'trackingNotPickUp'])->name('manager.tracking_not_pickup');
        Route::get('/manager/tracking_not_pickup_single/{parcel_id}', [ManagerController::class, 'trackingNotPickupSingle'])->name('manager.tracking_not_pickup_single');
        Route::post('manager/tracking_not_pickup_single/process', [ManagerController::class, 'trackingNotPickupSingleProcess'])->name('manager.tracking_not_pickup_single.process');
    });
    //test pull request
});
