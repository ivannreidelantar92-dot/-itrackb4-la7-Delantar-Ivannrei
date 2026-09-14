<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return view('movies.index', ['movies' => $this->movies()]);
    }

    public function show($id)
    {
        $movies = $this->movies();

        if (!isset($movies[$id])) {
            abort(404);
        }

        return view('movies.show', ['movie' => $movies[$id]]);
    }

    public function filter($genre = null)
    {
        $movies = $this->movies();

        if ($genre === null) {
            return view('movies.filter', [
                'movies' => $movies,
                'genre' => null
            ]);
        }

        $filteredMovies = array_filter($movies, function ($movie) use ($genre) {
            return strtolower($movie['genre']) === strtolower($genre);
        });

        return view('movies.filter', [
            'movies' => $filteredMovies,
            'genre' => $genre
        ]);
    }

    private function movies()
    {
        return [
            1 => ['id' => 1, 'title' => 'Interstellar', 'director' => 'Christopher Nolan', 'genre' => 'Science Fiction', 'rating' => '9.0/10'],
            2 => ['id' => 2, 'title' => 'The Dark Knight', 'director' => 'Christopher Nolan', 'genre' => 'Action', 'rating' => '9.0/10'],
            3 => ['id' => 3, 'title' => 'Spirited Away', 'director' => 'Hayao Miyazaki', 'genre' => 'Animation', 'rating' => '8.6/10'],
            4 => ['id' => 4, 'title' => 'The Grand Budapest Hotel', 'director' => 'Wes Anderson', 'genre' => 'Comedy', 'rating' => '8.1/10'],
            5 => ['id' => 5, 'title' => 'The Shawshank Redemption', 'director' => 'Frank Darabont', 'genre' => 'Drama', 'rating' => '9.3/10'],
            6 => ['id' => 6, 'title' => 'Inception', 'director' => 'Christopher Nolan', 'genre' => 'Action', 'rating' => '8.8/10'],
        ];
    }
}