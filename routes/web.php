<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/onboard/services', 'onboard.services')->name('onboard.services');
Route::view('/onboard/about', 'onboard.about')->name('onboard.about');
Route::view('/onboard/contact', 'onboard.contact')->name('onboard.contact');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
