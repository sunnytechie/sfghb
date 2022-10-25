<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DevotionController;

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

// Dashboard routes
Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.home')->middleware('auth', 'verified', 'is_admin');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard')->middleware('auth', 'verified', 'is_admin');
//error page
Route::get('/not-found', [App\Http\Controllers\DashboardController::class, 'error'])->name('error');

//route resource
Route::resource('devotions', DevotionController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::resource('events', EventController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::resource('news', NewsController::class)->middleware(['auth', 'verified', 'is_admin']);

require __DIR__.'/auth.php';
