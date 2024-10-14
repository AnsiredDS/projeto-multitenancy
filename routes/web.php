<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/login', function () {
//     return view('login');
// });

// Route::domain(env('APP_DOMAIN'))->group(function () {
//     Route::get('/', function () {
//         return view('welcome');
//     });
// });

// Route::domain('{tenant}.' . env('APP_DOMAIN'))->middleware('tenant')->group(function () {
//     Route::get('/', function (string $tenant) {
//         return view('welcome', compact('tenant'));
//     });
// });

Route::domain('{tenant}.' . config('app.base-domain'))
    ->middleware('tenant')
    ->group(function () {
        Route::get('/', function (string $tenant) {
            return view('welcome', compact('tenant'));
        });
    });

Route::domain(config('app.base-domain'))
    ->group(function () {
        Route::get('/', function () {
            return view('welcome');
        });
    });
