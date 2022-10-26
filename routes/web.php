<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\DevotionController;
use App\Http\Controllers\AudioSerieController;

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

//pages
Route::get('/livestream', [App\Http\Controllers\LivestreamController::class, 'edit'])->name('livestream.edit');
Route::put('/livestream/{id}', [App\Http\Controllers\LivestreamController::class, 'update'])->name('livestream.update');

//route resource
Route::resource('devotions', DevotionController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::resource('events', EventController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::resource('news', NewsController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::resource('healths', HealthController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::resource('audioseries', AudioSerieController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::resource('audio', AudioController::class)->middleware(['auth', 'verified', 'is_admin']);

require __DIR__.'/auth.php';
