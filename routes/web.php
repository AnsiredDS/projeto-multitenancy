<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/login', function () {
//     return view('login');
// });

Route::domain('localhost')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::domain('{tenant}.localhost')->middleware('tenant')->group(function () {
    Route::get('/', function (string $tenant) {
        return view('welcome', compact('tenant'));
    });
});
