<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sample', function() {
    return view('sample');
});

Route::get('/about', function() {
    return view('about');
});

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/sample', [App\Http\Controllers\sampleController::class, 'index']);
Route::get('/about', [App\Http\Controllers\sampleController::class, 'about']);
Route::get('/contact', [App\Http\Controllers\sampleController::class, 'contact']);
