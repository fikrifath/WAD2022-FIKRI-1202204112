<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShowRoomController;
use App\Http\Controllers\ProfileController;

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

// HOME
Route::get('/', [HomeController::class, 'index']);
// END HOME

// AUTH
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/doLogin', [AuthController::class, 'doLogin']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/doRegister', [AuthController::class, 'doRegister']);
Route::get('/doLogout', [AuthController::class, 'doLogout']);
// END AUTH

// CAR
Route::get('/list-car', [ShowRoomController::class, 'index']);
Route::get('/add-car', [ShowRoomController::class, 'create']);
Route::post('/save-car', [ShowRoomController::class, 'store']);
Route::get('/detail-car/{id}', [ShowRoomController::class, 'show']);
Route::get('/edit-car/{id}', [ShowRoomController::class, 'edit']);
Route::put('/update-car/{id}', [ShowRoomController::class, 'update']);
Route::delete('/delete-car/{id}', [ShowRoomController::class, 'destroy']);
// END CAR

// PROFIL
Route::get('/profile', [ProfileController::class, 'index']);
Route::put('/update-profile/{id}', [ProfileController::class, 'update']);
// END PROFIL
