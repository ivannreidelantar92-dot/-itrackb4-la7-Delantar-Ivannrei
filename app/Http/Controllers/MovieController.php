<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function index(Request $request)
    {
        $allMovies = $this->movies();
        $search = trim((string) $request->query('search', ''));
        $genre = $request->query('genre', 'all');
        $director = $request->query('director', 'all');

        $movies = $allMovies;

        if ($search !== '') {
            $movies = array_values(array_filter($movies, function ($movie) use ($search) {
                return stripos($movie['title'], $search) !== false
                    || stripos($movie['director'], $search) !== false
                    || stripos($movie['genre'], $search) !== false;
            }));
        }

        if ($genre !== 'all') {
            $movies = array_values(array_filter($movies, function ($movie) use ($genre) {
                return strcasecmp($movie['genre'], $genre) === 0;
            }));
        }

        if ($director !== 'all') {
            $movies = array_values(array_filter($movies, function ($movie) use ($director) {
                return strcasecmp($movie['director'], $director) === 0;
            }));
        }

        $genres = collect($allMovies)->pluck('genre')->unique()->sort()->values()->all();
        $directors = collect($allMovies)->pluck('director')->unique()->sort()->values()->all();

        return view('movies.index', [
            'movies' => $movies,
            'search' => $search,
            'genre' => $genre,
            'director' => $director,
            'genres' => $genres,
            'directors' => $directors,
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(string $id)
    {
        $movies = $this->movies();

        if (!isset($movies[$id])) {
            abort(404);
        }

        return view('movies.show', ['movie' => $movies[$id]]);
    }

    public function edit(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id)
    {
    }

    public function featured()
    {
        $movies = $this->movies();
        $movie = $movies[1];

        return view('movies.featured', ['movie' => $movie]);
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