<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\APIAuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\GroupBookingController;
use App\Http\Controllers\APIResourceController;


Route::post('/company', [APIResourceController::class, 'company'])->name('company');
Route::get('/company/{id}', [APIResourceController::class, 'showCompany'])->name('showCompany');

Route::post('/flight', [APIResourceController::class, 'Flight'])->name('Flight');
Route::get('/flight/{id}', [APIResourceController::class, 'showFlight'])->name('showFlight');


Route::resource('group_bookings', GroupBookingController::class);

Route::resource('passengers', PassengerController::class);

// Route::resource('flights', FlightController::class);

// 
Route::Post('/logins',[CustomerController::class,'login'])->name('login');
Route::Post('/login',[CustomerController::class,'logins'])->name('logins');
// Route::post('/login',[CustomerController::class,'login']);
Route::post('/register',[CustomerController::class,'register']);
Route::post('/profile',[CustomerController::class,'profile']);
Route::post('/logout',[CustomerController::class,'logout']);
Route::post('/update/{id}',[CustomerController::class,'update']);
Route::post('/delete/{id}',[CustomerController::class,'delete']);
