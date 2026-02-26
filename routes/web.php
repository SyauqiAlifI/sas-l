<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::view('/', 'pages::home.index')->name('home');
Route::view('program', 'pages::program.index')->name('program');
Route::get('program/detail/{program:slug}', function (App\Models\Program $program) {
    return view('pages::program.detail.index', ['program' => $program]);
})->name('program.detail');

Route::view('dashboard', 'pages::dashboard.dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/settings.php';
