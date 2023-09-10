<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\PetController;
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

Route::get('/', [HomeController::class, 'index']);



Route::get('/users', [UserController::class, 'index']);

Route::get('/register', [UserController::class, 'create']);

Route::post('/users/store', [UserController::class, 'store']);



Route::get('/staff', [UserController::class, 'staff']);

Route::get('/staff/add', [UserController::class, 'createStaff']);

Route::post('/staff/store', [UserController::class, 'storeStaff']);



Route::get('/pets', [PetController::class, 'index']);

Route::get('/pets/add', [PetController::class, 'create']);

Route::post('/pets/store', [PetController::class, 'store']);



Route::get('/records/{pet}', [MedicalRecordController::class, 'index']);

Route::get('/records/{pet}/create', [MedicalRecordController::class, 'create']);

Route::post('/records/{pet}/store', [MedicalRecordController::class, 'store']);
