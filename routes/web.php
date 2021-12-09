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

Route::get('/','HomeController@index')->name('home');
Route::get('/products', 'ProductController@index')->name('products.index');
Route::post('add-to-cart', 'CartController@store')->name('carts.store');
Route::get('/{slug}', 'ProductController@show')->name('products.show');

Auth::routes();

Route::middleware(['auth','isadmin'])->group(function () {
    Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
        Route::get('/','DashboardController')->name('dashboard');
        Route::resource('products',ProductController::class);
        Route::resource('banks',BankController::class);
        Route::resource('users',UserController::class);
        Route::get('profile','ProfileController@show')->name('profile');
        Route::post('profile','ProfileController@update')->name('profile.update');
        Route::get('transactions', 'TransactionController@index')->name('transactions.index');
        Route::delete('transactions/{id}', 'TransactionController@destroy')->name('transactions.destroy');
        Route::get('transactions/set-status/{id}', 'TransactionController@setStatus')->name('transactions.set-status');
        Route::get('transactions/{id}', 'TransactionController@show')->name('transactions.show');
    });
});
