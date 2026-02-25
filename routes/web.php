<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::view('/', 'pages::home.index')->name('home');
Route::view('program', 'pages::program.index')->name('program');
Route::view('program/detail/{program:slug}', 'pages::program.detail.index')->name('program.detail');

Route::view('dashboard', 'pages::dashboard.dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/settings.php';
