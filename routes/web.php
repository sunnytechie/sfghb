<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DevotionController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AudioSerieController;
use App\Http\Controllers\LivestreamController;

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
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.home')->middleware('auth', 'verified', 'is_admin');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth', 'verified', 'is_admin');

//error page
Route::get('/not-found', [DashboardController::class, 'error'])->name('error');

//pages
Route::get('/livestream', [LivestreamController::class, 'edit'])->name('livestream.edit');
Route::put('/livestream/{id}', [LivestreamController::class, 'update'])->name('livestream.update');
Route::get('/info', [InfoController::class, 'index'])->name('info.index');
Route::put('/info/{id}', [InfoController::class, 'update'])->name('info.update');
Route::get('/info/about-us', [InfoController::class, 'aboutUs'])->name('info.about');
Route::get('/info/contact-us', [InfoController::class, 'contactUs'])->name('info.contact');
Route::get('/info/recommend', [InfoController::class, 'recommended'])->name('info.recommend');
Route::get('/info/privacy-policy', [InfoController::class, 'privacyPolicy'])->name('info.policy');
Route::get('/info/terms-condition', [InfoController::class, 'termsCondition'])->name('info.terms');

//route resource
Route::resource('devotions', DevotionController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::resource('events', EventController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::resource('news', NewsController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::resource('healths', HealthController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::resource('audioseries', AudioSerieController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::resource('audio', AudioController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::resource('payment', PaymentController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::resource('faq', FaqController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::resource('social', SocialController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::resource('feedback', FeedbackController::class)->middleware(['auth', 'verified', 'is_admin']);

require __DIR__.'/auth.php';
