<?php

use App\Http\Controllers\Front\BookController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ShoppingCartController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
/**
 * Shopping cart route list
 */
Route::controller(BookController::class)->prefix('books')->as('books.')->group(function(){
    Route::get('all', 'allBooks')->name('all');
    Route::get('detail/{slug}', 'singleDetail')->name('singleDetail');
    Route::middleware('auth')->group(function(){
        Route::post('review', 'storeReview')->name('review');
    });
});

Route::controller(ShoppingCartController::class)->group(function(){
    Route::get('cart', 'cartList')->name('cart.list');
    Route::post('cart', 'addToCart')->name('cart.store');
    Route::post('update-cart', 'updateCart')->name('cart.update');
    Route::post('remove', 'removeCart')->name('cart.remove');
    Route::post('clear', 'clearAllCart')->name('cart.clear');
});
