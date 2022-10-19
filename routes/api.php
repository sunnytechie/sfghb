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
//Api to reset password


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
