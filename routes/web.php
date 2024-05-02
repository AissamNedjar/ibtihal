<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers')->group(function () {
    // صفحة تسجيل الدخول
    Route::get('/login', 'LoginController@index')->name('login')->middleware('guest');
    Route::post('/login', 'LoginController@login');

    // صفحة الخروج
    Route::get('/logout', 'LoginController@index')->name('logout')->middleware('auth');

    // صفحة تسجيل زبون جديد
    Route::get('/register', 'RegisterController@index')->name('register');

    // صفحات المدير العام
    Route::middleware('auth')->group(function () {
        Route::middleware('admin')->name('admin.')->prefix('admin')->namespace('Admin')->group(function () {
            Route::get('/', 'HomeController@index')->name('home');

            Route::resource('admins', 'AdminController');
            Route::resource('clients', 'ClientController');
            Route::resource('farmers', 'FarmerController');
            Route::resource('products', 'ProductController');
            Route::resource('ads', 'AdsController');
            Route::resource('activities', 'ActivityController');
            Route::resource('offers', 'OfferController');
        });
    });
});