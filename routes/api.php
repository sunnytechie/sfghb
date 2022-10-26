<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//api for user register
Route::post('/register', [App\Http\Controllers\Api\Auth\RegisterController::class, 'register']);
//api for user login
Route::post('/login', [App\Http\Controllers\Api\Auth\LoginController::class, 'login']);
//api for google login
Route::post('/login-google', [App\Http\Controllers\Api\Auth\GoogleLoginController::class, 'googleLogin']);
//api for forgot password
Route::post('/forgot-password', [App\Http\Controllers\Api\Auth\NewPasswordController::class, 'forgotPassword']);
//api for user logout
//Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
//Api lists
Route::get('/devotions', [App\Http\Controllers\Api\DevotionController::class, 'index']);
Route::get('/events', [App\Http\Controllers\Api\EventController::class, 'index']);
Route::get('/news', [App\Http\Controllers\Api\NewsController::class, 'index']);
Route::get('/health', [App\Http\Controllers\Api\HealthController::class, 'index']);
Route::get('/livestream', [App\Http\Controllers\Api\LivestreamController::class, 'liveStream']);
Route::get('/audio', [App\Http\Controllers\Api\AudioController::class, 'index']);
Route::get('/audioseries', [App\Http\Controllers\Api\AudioSeriesController::class, 'index']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
