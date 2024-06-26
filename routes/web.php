<?php

use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DevotionController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AudioSerieController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\LivestreamController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PaykeyController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PushNotificationController;
use App\Http\Controllers\ReelController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\YoutubeController;

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
Route::get('/search/analytics', [DashboardController::class, 'analytics'])->name('search.analytics')->middleware('auth', 'verified', 'is_admin');

//Push Notification
Route::patch('/fcm-token', [DashboardController::class, 'updateToken'])->name('fcmToken')->middleware(['auth', 'verified', 'is_admin']);
Route::get('/notification',[NotificationController::class,'create'])->name('notification.create')->middleware(['auth', 'verified', 'is_admin']);
Route::post('/send-notification',[NotificationController::class,'notification'])->name('notification')->middleware(['auth', 'verified', 'is_admin']);
//Push Nofication 2
Route::get('/push-notifications',[PushNotificationController::class,'index'])->name('push.notication.index')->middleware(['auth', 'verified', 'is_admin']);
Route::get('/push-notification',[PushNotificationController::class,'create'])->name('push.notication.create')->middleware(['auth', 'verified', 'is_admin']);
Route::post('/send-push-notification',[PushNotificationController::class,'store'])->name('push.notification.send')->middleware(['auth', 'verified', 'is_admin']);

//error page
Route::get('/hi!', [DashboardController::class, 'error'])->name('error');

//pages
Route::get('/livestream', [LivestreamController::class, 'edit'])->name('livestream.edit')->middleware(['auth', 'verified', 'is_admin']);
Route::put('/livestream/{id}', [LivestreamController::class, 'update'])->name('livestream.update')->middleware(['auth', 'verified', 'is_admin']);
Route::get('/info', [InfoController::class, 'index'])->name('info.index')->middleware(['auth', 'verified', 'is_admin']);
Route::put('/info/{id}', [InfoController::class, 'update'])->name('info.update')->middleware(['auth', 'verified', 'is_admin']);
Route::get('/info/about-us', [InfoController::class, 'aboutUs'])->name('info.about')->middleware(['auth', 'verified', 'is_admin']);
Route::get('/info/contact-us', [InfoController::class, 'contactUs'])->name('info.contact')->middleware(['auth', 'verified', 'is_admin']);
Route::get('/info/recommend', [InfoController::class, 'recommended'])->name('info.recommend')->middleware(['auth', 'verified', 'is_admin']);
Route::get('/info/privacy-policy', [InfoController::class, 'privacyPolicy'])->name('info.policy')->middleware(['auth', 'verified', 'is_admin']);
Route::get('/info/terms-condition', [InfoController::class, 'termsCondition'])->name('info.terms')->middleware(['auth', 'verified', 'is_admin']);
Route::get('/admin-users', [UserController::class, 'adminUser'])->name('admin.users')->middleware(['auth', 'verified', 'is_admin']);
//banner
Route::get('/banner', [BannerController::class, 'show'])->name('show.banner')->middleware(['auth', 'verified', 'is_admin']);
Route::put('/banner/update/{id}', [BannerController::class, 'update'])->name('update.banner')->middleware(['auth', 'verified', 'is_admin']);

//urls for privacy policy and terms and conditions
Route::get('/privacy-policy', [InfoController::class, 'privacyPolicyPage'])->name('privacy.policy');

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
Route::resource('donations', DonationController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::resource('paykeys', PaykeyController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::resource('users', UserController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::resource('chapters', ChapterController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::resource('purchases', PurchaseController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::resource('ebooks', EbookController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::resource('reels', ReelController::class)->middleware(['auth', 'verified', 'is_admin']);
Route::resource('feeds', YoutubeController::class)->middleware(['auth', 'verified', 'is_admin']);

//Import routes
Route::get('user-import-form', [App\Http\Controllers\UserController::class, 'userFileImportForm'])->name('user.import.form')->middleware(['auth', 'verified', 'is_admin']);
Route::post('user-import', [App\Http\Controllers\UserController::class, 'userFileImport'])->name('user.import')->middleware(['auth', 'verified', 'is_admin']);

//paystack-subscribe user
Route::post('/pay', [App\Http\Controllers\CallbackController::class, 'redirectToGateway'])->name('pay');
//Initiate
Route::get('/initiate/basic/{id}', [App\Http\Controllers\PaystackController::class, 'intiateBasic'])->name('intiateBasic');
Route::get('/initiate/premium/{id}', [App\Http\Controllers\PaystackController::class, 'intiatePremium'])->name('intiatePremium');
Route::get('/initiate/silver/{id}', [App\Http\Controllers\PaystackController::class, 'intiateSilver'])->name('intiateSilver');
Route::get('/initiate/gold/{id}', [App\Http\Controllers\PaystackController::class, 'intiateGold'])->name('intiateGold');
//callbacks
Route::get('/subscribe/basic/callback/{id}', [App\Http\Controllers\CallbackController::class, 'callbackSubscribeBasic'])->name('callbackSubscribeBasic');
Route::get('/subscribe/premium/callback/{id}', [App\Http\Controllers\CallbackController::class, 'callbackSubscribePremium'])->name('callbackSubscribePremium');
Route::get('/subscribe/silver/callback/{id}', [App\Http\Controllers\CallbackController::class, 'callbackSubscribeSilver'])->name('callbackSubscribeSilver');
Route::get('/subscribe/gold/callback/{id}', [App\Http\Controllers\CallbackController::class, 'callbackSubscribeGold'])->name('callbackSubscribeGold');
//return back from callback on mobile
Route::get('/subscription/completed', [App\Http\Controllers\PaystackController::class, 'subscribeCompleted'])->name('subscribeCompleted');

//contact
Route::get('/contact', [App\Http\Controllers\PageController::class, 'contact'])->name('page.contact');

//webversion
Route::get('/webversion', [App\Http\Controllers\WebVersionController::class, 'index'])->name('index.webversion');


//new routes use prefix
Route::prefix('monfo')->middleware(['auth', 'verified', 'is_admin'])->group(function () {
    //trainees
    Route::get('/trainees', [App\Http\Controllers\Monfo\TrainingRegController::class, 'index'])->name('monfo.trainees');
    //donations
    Route::get('/donations', [App\Http\Controllers\Monfo\DonationController::class, 'index'])->name('monfo.donations');
});

//Test
Route::get('/debug', [TestController::class, 'debug'])->name('debug');

require __DIR__.'/auth.php';
