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

            // التحكم بالمديرين والمستخدمين
            Route::resource('admins', 'AdminController');

            // التحكم بالعملاء
            Route::resource('clients', 'ClientController');

            // التحكم بالمزارعين
            Route::resource('farmers', 'FarmerController');

            // التحكم بالمنتجات من قبل الإدارة
            Route::resource('products', 'ProductController')->except(['create', 'store', 'edit']);
            Route::get('products/{product}/approve', 'ProductController@approve')->name('products.approve');
            Route::get('products/{product}/reject', 'ProductController@reject')->name('products.reject');

            // التحكم بالإعلانات
            Route::resource('ads', 'AdsController');
            Route::get('ads/{ad}/approve', 'AdsController@approve')->name('ads.approve');
            Route::get('ads/{ad}/reject', 'AdsController@reject')->name('ads.reject');

            // التحكم بالأنشطة
            Route::resource('activities', 'ActivityController');
            Route::get('activities/{activity}/approve', 'ActivityController@approve')->name('activities.approve');
            Route::get('activities/{activity}/reject', 'ActivityController@reject')->name('activities.reject');

            // التحكم بالعروض
            Route::resource('offres', 'OffreController');
            Route::get('offres/{offer}/approve', 'OffreController@approve')->name('offres.approve');
            Route::get('offres/{offer}/reject', 'OffreController@reject')->name('offres.reject');
        });

        // صفحات الفلاحين
        Route::middleware('farmer')->name('farmer.')->prefix('farmer')->namespace('Farmer')->group(function () {
            Route::get('/', 'HomeController@index')->name('home');

            // التحكم بالمنتجات
            Route::resource('products', 'ProductController');

            // التحكم بالإعلانات
            Route::resource('ads', 'AdsController');

            // التحكم بالأنشطة
            Route::resource('activities', 'ActivityController');

            // التحكم بالعروض
            Route::resource('offres', 'OffreController');
        });
    });
});