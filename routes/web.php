<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodPostController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth','verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('food', FoodPostController::class);
});

Route::middleware(['auth','verified'])->group(function () {
    Route::resource('food', FoodPostController::class);
});

Route::middleware(['auth','verified'])->group(function () {
    Route::post('/food/{food}/reserve', [ReservationController::class, 'reserve'])
        ->name('food.reserve');

    Route::post('/food/{food}/claim', [ReservationController::class, 'claim'])
        ->name('food.claim');
});

Route::middleware(['auth','verified','admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class,'dashboard'])
        ->name('admin.dashboard');

    Route::get('/admin/foods', [AdminController::class,'foodList'])
        ->name('admin.foods');

    Route::delete('/admin/foods/{food}', [AdminController::class,'deleteFood'])
        ->name('admin.food.delete');
});
