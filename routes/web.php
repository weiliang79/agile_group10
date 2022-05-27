<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ParcelController;
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

//landing page
Route::get('/', [LandingController::class, "index"])->name('landing');

//login & logout
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-process', [LoginController::class, 'process'])->name('login.process');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-process', [LoginController::class, 'registerProcess'])->name('register.process');
Route::get('/logout', [LoginController::class, 'destory'])->name('logout');

Route::get('/home', [ParcelController::class, 'index'])->name('home');

Route::post('/parcel-send', [ParcelController::class, 'sendParcel'])->name('parcel.send');
Route::post('/parcel-update', [ParcelController::class, 'updateParcel'])->name('parcel.update');
Route::post('/delivery-screen',[ParcelController::class, 'completeDelivery'])->name('delivery.screen');
Route::post('/parcel-delivered',[ParcelController::class, 'deliveredParcel'])->name('parcel.delivered');