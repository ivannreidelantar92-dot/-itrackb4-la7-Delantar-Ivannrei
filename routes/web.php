<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/whoami', function () {
    return 'Ivann Rei M. Delantar | Block 4C | ITRACKB4 Laravel 12';
});

Route::get('/movies/featured', [MovieController::class, 'featured'])
    ->name('movies.featured');

Route::get('/movies/filter/{genre?}', function (?string $genre = null) {
    return redirect()->route('movies.index', $genre ? ['genre' => $genre] : []);
})->name('movies.filter');

Route::resource('movies', MovieController::class)
    ->only(['index', 'create', 'store', 'show']);