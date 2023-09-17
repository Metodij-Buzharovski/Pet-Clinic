<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\ContactController;
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



Route::get('/users', [UserController::class, 'index'])->middleware('auth');

Route::get('/register', [UserController::class, 'create'])->middleware('guest');

Route::get('/users/create', [UserController::class, 'create'])->middleware('auth');

Route::post('/users/store', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::post('/authenticate', [UserController::class, 'authenticate'])->middleware('guest');

Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('auth');

Route::put('/users/{user}', [UserController::class, 'update'])->middleware('auth');

Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware('auth');




Route::get('/staff', [UserController::class, 'staff'])->middleware('auth');

Route::get('/staff/add', [UserController::class, 'createStaff'])->middleware('auth');

Route::post('/staff/store', [UserController::class, 'storeStaff'])->middleware('auth');

Route::get('/staff/{user}/edit', [UserController::class, 'editStaff'])->middleware('auth');

Route::put('/staff/{user}', [UserController::class, 'updateStaff'])->middleware('auth');

Route::delete('/staff/{user}', [UserController::class, 'destroyStaff'])->middleware('auth');




Route::get('/pets', [PetController::class, 'index'])->middleware('auth');

Route::get('/pets/add', [PetController::class, 'create'])->middleware('auth');

Route::post('/pets/store', [PetController::class, 'store'])->middleware('auth');

Route::get('/pets/{pet}/edit', [PetController::class, 'edit'])->middleware('auth');

Route::put('/pets/{pet}', [PetController::class, 'update'])->middleware('auth');

Route::delete('/pets/{pet}', [PetController::class, 'destroy'])->middleware('auth');



Route::get('/records/{pet}', [MedicalRecordController::class, 'index'])->middleware('auth');

Route::get('/records/{pet}/create', [MedicalRecordController::class, 'create'])->middleware('auth');

Route::post('/records/{pet}/store', [MedicalRecordController::class, 'store'])->middleware('auth');



Route::get('/appointments', [AppointmentController::class, 'index'])->middleware('auth');

Route::get('/appointments/create', [AppointmentController::class, 'create'])->middleware('auth');

Route::post('/appointments/store', [AppointmentController::class, 'store'])->middleware('auth');



Route::get('/contacts', [ContactController::class, 'index'])->middleware('auth');

Route::post('/contacts/store', [ContactController::class, 'store'])->middleware('auth');



Route::get('/blogs', [BlogPostController::class, 'index'])->middleware('auth');

Route::get('/blogs/create', [BlogPostController::class, 'create'])->middleware('auth');

Route::get('/blogs/{blogPost}', [BlogPostController::class, 'show'])->middleware('auth');

Route::post('/blogs/store', [BlogPostController::class, 'store'])->middleware('auth');

Route::get('/blogs/{blogPost}/edit', [BlogPostController::class, 'edit'])->middleware('auth');

Route::put('/blogs/{blogPost}/edit', [BlogPostController::class, 'update'])->middleware('auth');

Route::delete('/blogs/{blogPost}/delete', [BlogPostController::class, 'destroy'])->middleware('auth');
