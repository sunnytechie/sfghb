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
Route::post('/auth-verify-otp', [App\Http\Controllers\Api\Auth\OtpVerifyController::class, 'verify']);
Route::post('/auth-send/resend-otp', [App\Http\Controllers\Api\Auth\OtpVerifyController::class, 'sendVerificationTokenToEmail']);
//Get user details with ID
Route::get('/auth-user/{id}', [App\Http\Controllers\Api\Auth\UserInfoController::class, 'user']);

//api for user login
Route::post('/login', [App\Http\Controllers\Api\Auth\LoginController::class, 'login']);
//api for google login
Route::post('/login-google', [App\Http\Controllers\Api\Auth\GoogleLoginController::class, 'googleLogin']);
//api for forgot password
Route::post('/forgot-password', [App\Http\Controllers\Api\Auth\NewPasswordController::class, 'forgotPassword']);
//api for user logout
//Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
//Api lists
//Devotions
Route::get('/devotions', [App\Http\Controllers\Api\DevotionController::class, 'index']);
Route::get('/devotion/today', [App\Http\Controllers\Api\DevotionController::class, 'show']);
Route::get('/devotion/this-week', [App\Http\Controllers\Api\DevotionController::class, 'thisWeek']);
Route::get('/devotion/monthly', [App\Http\Controllers\Api\DevotionController::class, 'monthly']);

//reels
Route::get('/reels', [App\Http\Controllers\Api\ReelController::class, 'index']);
//ebooks
Route::get('/ebook', [App\Http\Controllers\Api\EbookController::class, 'index']);

Route::get('/events', [App\Http\Controllers\Api\EventController::class, 'index']);
Route::get('/news', [App\Http\Controllers\Api\NewsController::class, 'index']);
Route::get('/health', [App\Http\Controllers\Api\HealthController::class, 'index']);
Route::get('/livestream', [App\Http\Controllers\Api\LivestreamController::class, 'liveStream']);
Route::get('/audio', [App\Http\Controllers\Api\AudioController::class, 'index']);
Route::get('/audioseries', [App\Http\Controllers\Api\AudioSeriesController::class, 'index']);
Route::post('/payment', [App\Http\Controllers\Api\PaymentController::class, 'store']);
Route::get('/payment/active-subscribers', [App\Http\Controllers\Api\PaymentController::class, 'index']);
Route::post('/donation', [App\Http\Controllers\Api\DonationController::class, 'store']);
Route::get('/faq', [App\Http\Controllers\Api\FaqController::class, 'index']);
Route::get('/social', [App\Http\Controllers\Api\SocialController::class, 'social']);
Route::get('/info', [App\Http\Controllers\Api\InfoController::class, 'index']);
Route::get('/paykeys', [App\Http\Controllers\Api\PaykeyController::class, 'index']);
Route::get('/chapters', [App\Http\Controllers\Api\ChapterController::class, 'index']);
Route::post('/feedback', [App\Http\Controllers\Api\MessageController::class, 'storeMessage']);
Route::post('/purchase', [App\Http\Controllers\Api\PurchaseController::class, 'store']);
Route::get('/notifications', [App\Http\Controllers\Api\PushNotificationController::class, 'index']);
Route::put('/update-user/{id}', [App\Http\Controllers\Api\UpdateUserController::class, 'update']);
Route::put('/update-password/{id}', [App\Http\Controllers\Api\UpdatePasswordController::class, 'update']);
//Route::post('/feedback', [App\Http\Controllers\Api\FeebackController::class, 'store']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
