<?php

use App\Http\Controllers\ProfileController;
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


Route::get('/',[\App\Http\Controllers\LandingController::class,'index'])->name('landing');
Route::get('/search',[\App\Http\Controllers\LandingController::class,'search'])->name('landing.search');
Route::get('/advertising/{advertising}',[\App\Http\Controllers\AdvertisingShowController::class,'show'])->name('advertising');

Route::get('/dashboard', function () {
    return view('/panel/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('/users',\App\Http\Controllers\UserController::class)->middleware('admin');
Route::resource('/categories',\App\Http\Controllers\CategoryController::class)->middleware('authoradmin' );
Route::resource('/advertisings',\App\Http\Controllers\AdvertisingController::class)->middleware('auth' );


require __DIR__.'/auth.php';
