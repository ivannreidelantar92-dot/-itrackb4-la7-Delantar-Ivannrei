<?php

namespace App\Http\Controllers;

class MovieController extends Controller
{
    public function index()
    {
        $movies = [
            ['title' => 'Interstellar', 'genre' => 'Science Fiction', 'rating' => '9.0/10'],
            ['title' => 'The Dark Knight', 'genre' => 'Action', 'rating' => '9.0/10'],
            ['title' => 'Spirited Away', 'genre' => 'Animation', 'rating' => '8.6/10'],
            ['title' => 'The Grand Budapest Hotel', 'genre' => 'Comedy', 'rating' => '8.1/10'],
            ['title' => 'The Shawshank Redemption', 'genre' => 'Drama', 'rating' => '9.3/10'],
        ];

        return view('movies.index', ['movies' => $movies]);
    }
}
