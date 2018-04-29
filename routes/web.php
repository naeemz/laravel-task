<?php

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

// Authentication
Auth::routes();

// Language set
Route::get('lang/{lang?}', 'LanguagesController@set')->name('set.lang');

// Frontend
Route::get('/', 'HomeController@index')->name('home');
Route::get('/ads/{slug}', 'HomeController@ad_show')->name('ads.show');

// User panel prefix
Route::name('user.')->prefix('user')->middleware('auth')->group(function () {
    Route::get('/', 'UserController@dashboard')->name('dashboard');
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::get('/profile/edit', 'UserController@profile_edit')->name('profile.edit');
    Route::put('/profile/update', 'UserController@profile_update')->name('profile.update');
    // User Password update
    Route::get('/password/edit', 'UserController@password_edit')->name('password.edit');
    Route::put('/password/update', 'UserController@password_update')->name('password.update');
    // User Ads
    Route::get('products/payment/{id}', 'User\ProductsController@payment')->name('products.payment');
    Route::resource('products', 'User\ProductsController', ['names' => 'products']);
    // Payment
    Route::post('first-payment', 'User\PaymentController@first_payment')->name('first-payment');
    Route::get('ads-charge/{id}', 'User\PaymentController@charge')->name('ads-charge');
});