<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/onboard/services', 'onboard.services')->name('onboard.services');
Route::view('/onboard/about', 'onboard.about')->name('onboard.about');
Route::view('/onboard/contact', 'onboard.contact')->name('onboard.contact');

Route::view('/admin/roles-permissions', 'admin.roles-perm')->name('admin.roles-perm');
Route::view('/admin/models', 'admin.models')->name('admin.models');
Route::view('/admin/users', 'admin.users')->name('admin.users');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/admin.php';
