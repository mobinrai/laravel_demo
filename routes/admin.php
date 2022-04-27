<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\BookFaqController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\BookSaleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardContoller;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\BookTypeController;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Auth\AdminAuthContoller;

Route::prefix('admin')->as('admin.')->group(function() {
    Route::controller(AdminAuthContoller::class)->group(function(){
        Route::get('/login', 'loginForm')->name('login.show');
        Route::post('/login', 'login')->name('login.submit');
        Route::post('/logout', 'logout')->name('logout');
    });

    Route::middleware('isAdmin')->group(function(){
        Route::controller(DashboardContoller::class)->group(function() {
            Route::get('dashboard', 'index')->name('dashboard');
            Route::get('get-book-request', 'bookRequest')->name('book-request');
            Route::get('get-book-sale-request', 'bookSaleRequest')->name('book-sale-request');
            Route::get('latest-sale-orders','latestSaleOrder')->name('latest-sale-orders');
        });
        /** All resources list */
        Route::resource('books', BookController::class);
        Route::resource('book-faqs', BookFaqController::class);
        Route::resource('genres', GenreController::class);
        Route::resource('book-sales', BookSaleController::class);
        Route::resource('languages', LanguageController::class);
        Route::resource('countries', CountryController::class);
        Route::resource('publications', PublicationController::class);
        Route::resource('categories', CategoryController::class)->except('show');
        Route::resource('authors', AuthorController::class);
        Route::resource('book-types', BookTypeController::class);
        Route::resource('sliders', SliderController::class);
    
        Route::prefix('users')->as('users.')->group(function(){
            Route::controller(UserController::class)->group(function(){
                Route::get('index','index')->name('index');
            });
        });
        Route::prefix('orders')->as('orders.')->group(function(){
            Route::controller(OrderController::class)->group(function(){
                Route::get('new','newOrders')->name('new');
                Route::get('pending','pendingOrders')->name('pending');
                Route::get('refund','refundOrders')->name('refund');
            });
        });
    });
});
