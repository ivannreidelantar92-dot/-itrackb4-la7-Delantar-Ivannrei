<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/whoami', function () {
    return 'Ivann Rei M. delantar | 2023-70931 | Block 4C | ITRACKB4 Laravel 12';
});

Route::get('/movies', [MovieController::class, 'index']);