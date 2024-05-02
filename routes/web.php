<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers')->group(function () {
    // صفحة تسجيل الدخول
    Route::get('/login', 'LoginController@index')->name('login')->middleware('guest');
    Route::post('/login', 'LoginController@login');

    // صفحة تسجيل زبون جديد
    Route::get('/register', 'RegisterController@index')->name('register');

    // صفحات المدير العام
    Route::middleware('auth')->group(function () {
        Route::middleware('admin')->name('admin')->prefix('admin')->namespace('Admin')->group(function () {
            Route::get('/', 'HomeController@index');
        });
    });
});