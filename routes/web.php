<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('user/create',[UserController::class,'create'])->name('user.create');
Route::post('user/store',[UserController::class,'store'])->name('user.store');
Route::get('/',[UserController::class,'checkin'])->name('employee.checkin');
Route::post('employee/checkin/store',[UserController::class,'checkin_store'])->name('employee.checkin.store');
Route::get('employee/table',[UserController::class,'User_table'])->name('employee.table');
Route::get('employee/checkout/{id}',[UserController::class,'checkout'])->name('employee.checkout');
Route::post('employee/checkout/store/{id}',[UserController::class,'checkout_store'])->name('employee.checkout.store');
Route::post('employee/search',[UserController::class,'search'])->name('employee.search');








