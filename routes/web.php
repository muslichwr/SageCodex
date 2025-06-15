<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/pricing', [FrontController::class, 'pricing'])->name('front.pricing');

Route::match(['get', 'post'], 'booking/payment/midtrans/notification', [FrontController::class, 'paymentMidtransNotification'])->name('front.payment_midtrans_notification');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('role:student')->group(function () {
        Route::get('/dashboard/subscriptions/', [DashboardController::class, 'subscriptions'])->name('dashboard.subscriptions');
        Route::get('/dashboard/subscriptions/{transaction}', [DashboardController::class, 'subscription_details'])->name('dashboard.subscriptions.details');

        Route::get('/dashboard/courses/', [CourseController::class, 'index'])->name('dashboard');
        Route::get('/dashboard/courses/{courses:slug', [CourseController::class, 'details'])->name('dashboard.course.details');
        Route::get('/dashboard/search/courses/', [CourseController::class, 'search_courses'])->name('dashboard.search.courses');

        Route::middleware('check.subscription')->group(function () {
            Route::get('/dashboard/join/{courses:slug}', [CourseController::class, 'join'])->name('dashboard.course.join');
            Route::get('/dashboard/learning/{courses:slug}/{courseSection}/{sectionContent}', [CourseController::class, 'learning'])->name('dashboard.course.learning');
            Route::get('/dashboard/learning/{courses:slug}/finished', [CourseController::class, 'learning_finished'])->name('dashboard.course.learning.finished');
        });

        Route::get('/checkout/success', [FrontController::class, 'checkout_success'])->name('front.checkout.succcess');
        Route::get('/checkout/{pricing}', [FrontController::class, 'checkout'])->name('front.checkout');

        Route::post('/booking/payment/midtrans', [FrontController::class, 'paymentStoreMidtrans'])->name('front.payment_store_midtrans');
    });
});

require __DIR__.'/auth.php';
