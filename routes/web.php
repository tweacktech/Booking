<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\CompanyController;
use Illuminate\Http\Request;


Route::get('/home', function () {
  return view('welcome');
});


Route::get('/', function () {
  return view('auth.login');
});

Auth::routes();

//on and off site
Route::get('/onsite', function () {
  $on = DB::table('manage_site')
    ->update(['value' => 1]);

  return redirect()->back();
})->name('onsite');

Route::get('/offsite', function () {
  $on = DB::table('manage_site')
    ->update(['value' => 0]);

  return redirect()->back();
})->name('offsite');



Route::get('/activity', function () {
  return view('activity');
})->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// User Account
Route::get('/manage-users', [UserController::class, 'manage_users'])->name('manage_user_account');
Route::post('/register-users', [UserController::class, 'register_user'])->name('register_user');
Route::get('/suspend-user/{id}', [UserController::class, 'suspend_user'])->name('suspend_user');
Route::get('/unsuspend-user/{id}', [UserController::class, 'unsuspend_user'])->name('unsuspend_user');
Route::get('/delete-user/{id}', [UserController::class, 'delete_user'])->name('delete_user');
Route::get('/edit-user/{id}', [UserController::class, 'edit_user_page'])->name('edit_user_page');
Route::put('/edit-user', [UserController::class, 'edit_user'])->name('edit_user');
Route::get('/user-role/{id}', [UserController::class, 'user_role'])->name('user_role');
Route::get('/add-user-menu/{id}', [UserController::class, 'add_user_menu'])->name('add_user_menu');
Route::get('/remove-user-menu/{id}', [UserController::class, 'remove_user_menu'])->name('remove_user_menu');
Route::get('/reset-password', [UserController::class, 'reset_password'])->name('reset-password');


// Managing flight
Auth::routes();
Route::get('/flight', [FlightController::class, 'indexFlight'])->name('flight');
Route::post('/add-Flight', [FlightController::class, 'addFlight'])->name('addFlight');
Route::get('/hideFlight/{id}', [FlightController::class, 'hideFlight'])->name('hideFlight');
Route::get('/unhideFlight/{id}', [FlightController::class, 'unhideFlight'])->name('unhideFlight');
Route::get('/editFlight/{id}', [FlightController::class, 'editFlight'])->name('editFlight');
Route::put('/updateFlight/{id}', [FlightController::class, 'updateFlight'])->name('updateFlight');
Route::get('/deleteFlight/{id}', [FlightController::class, 'deleteFlight'])->name('deleteFlight');

// managing Passengers
Auth::routes();
Route::get('/passenger', [PassengerController::class, 'passenger'])->name('passenger');
Route::post('/add-Passenger', [PassengerController::class, 'addPassenger'])->name('addPassenger');
Route::get('/hidePassenger/{id}', [PassengerController::class, 'hidePassenger'])->name('hidePassenger');
Route::get('/unhidePassenger/{id}', [PassengerController::class, 'unhidePassenger'])->name('unhidePassenger');
Route::get('/editPassenger/{id}', [PassengerController::class, 'editPassenger'])->name('editPassenger');
Route::put('/updatePassenger/{id}', [PassengerController::class, 'updatePassenger'])->name('updatePassenger');
Route::get('/deletePassenger/{id}', [PassengerController::class, 'deletePassenger'])->name('deletePassenger');






// managing company
Auth::routes();
Route::get('/profile', [CompanyController::class, 'profile'])->name('profile');
Route::get('/company', [CompanyController::class, 'company'])->name('company');
Route::post('/add-Company', [CompanyController::class, 'addCompany'])->name('addCompany');
Route::get('/hideCompany/{id}', [CompanyController::class, 'hideCompany'])->name('hideCompany');
Route::get('/unhideCompany/{id}', [CompanyController::class, 'unhideCompany'])->name('unhideCompany');
Route::get('/editCompany/{id}', [CompanyController::class, 'editCompany'])->name('editCompany');
Route::put('/updateCompany/{id}', [CompanyController::class, 'updateCompany'])->name('updateCompany');
Route::get('/deleteCompany/{id}', [CompanyController::class, 'deleteCompany'])->name('deleteCompany');
