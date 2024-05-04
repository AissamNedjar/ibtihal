<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers')->group(function () {
    // صفحة تسجيل الدخول
    Route::get('/login', 'LoginController@index')->name('login')->middleware('guest');
    Route::post('/login', 'LoginController@login');

    // صفحة الخروج
    Route::post('/logout', 'LoginController@logout')->name('logout')->middleware('auth');

    // صفحة تسجيل زبون جديد
    Route::get('/register', 'RegisterController@index')->name('register');

    // صفحات المدير العام
    Route::middleware('auth')->group(function () {
        Route::middleware('admin')->name('admin.')->prefix('admin')->namespace('Admin')->group(function () {
            Route::get('/', 'HomeController@index')->name('home');

            Route::resource('admins', 'AdminController');
            Route::resource('clients', 'ClientController');
            Route::resource('farmers', 'FarmerController');

            // التحكم بالمنتجات من قبل الإدارة
            Route::resource('products', 'ProductController')->except(['create', 'store', 'edit']);
            Route::get('products/{product}/approve', 'ProductController@approve')->name('products.approve');
            Route::get('products/{product}/reject', 'ProductController@reject')->name('products.reject');

            Route::resource('ads', 'AdsController');
            Route::resource('activities', 'ActivityController');
            Route::resource('offers', 'OfferController');
        });
    });
});