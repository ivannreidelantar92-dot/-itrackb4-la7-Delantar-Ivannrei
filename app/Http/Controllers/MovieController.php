<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('movies.index', ['movies' => $this->movies()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movies = $this->movies();

        if (!isset($movies[$id])) {
            abort(404);
        }

        return view('movies.show', ['movie' => $movies[$id]]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function featured()
    {
        $movies = $this->movies();
        $movie = $movies[1];

        return view('movies.featured', ['movie' => $movie]);
    }

    public function filter($genre = null)
    {
        $movies = $this->movies();

        if ($genre === null) {
            return view('movies.filter', ['movies' => $movies, 'genre' => null]);
        }

        $filteredMovies = [];

        foreach ($movies as $movie) {
            if (strcasecmp($movie['genre'], $genre) === 0) {
                $filteredMovies[] = $movie;
            }
        }

        return view('movies.filter', ['movies' => $filteredMovies, 'genre' => $genre]);
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