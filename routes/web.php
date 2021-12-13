<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::middleware(['auth','isadmin'])->group(function () {
    Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
        Route::get('/','DashboardController')->name('dashboard');
        Route::resource('products',ProductController::class);
        Route::resource('banks',BankController::class);
        Route::resource('sliders',SliderController::class)->except('show','edit','update');
        Route::post('sliders/{id}/set-status','SliderController@setStatus')->name('sliders.set-status');
        Route::resource('users',UserController::class);
        Route::resource('couriers',CourierController::class)->except('show');
        Route::get('profile','ProfileController@show')->name('profile');
        Route::post('profile','ProfileController@update')->name('profile.update');
        Route::get('transactions', 'TransactionController@index')->name('transactions.index');
        Route::delete('transactions/{id}', 'TransactionController@destroy')->name('transactions.destroy');
        Route::get('transactions/set-status/{id}', 'TransactionController@setStatus')->name('transactions.set-status');
        Route::get('transactions/{id}', 'TransactionController@show')->name('transactions.show');
    });
});
Route::get('/','HomeController@index')->name('home');
Route::get('profile','ProfileController@index')->name('profile');
Route::post('profile','ProfileController@update')->name('profile.update');
Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('cart', 'CartController@index')->name('cart.index')->middleware('auth');
Route::delete('cart/{id}', 'CartController@destroy')->name('cart.destroy')->middleware('auth');
Route::post('add-to-cart', 'CartController@store')->name('carts.store')->middleware('auth');
Route::post('checkout', 'CheckoutController')->name('checkout')->middleware('auth');
Route::get('transaction', 'TransactionController@index')->name('transaction.index')->middleware('auth');
Route::get('transaction/success/{code}', 'TransactionController@success')->name('transaction.success')->middleware('auth');
Route::get('/{slug}', 'ProductController@show')->name('products.show');
