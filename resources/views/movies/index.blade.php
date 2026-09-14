@extends('layouts.app')

@section('title', 'Movies')

@section('content')

    

    <table class="table table-striped mt-4" border="1" cellpadding="8">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Rating</th>
        </tr>

        @forelse ($movies as $movie)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $movie['title'] }}</td>
                <td>{{ $movie['genre'] }}</td>
                <td>{{ $movie['rating'] }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No movies found.</td>
            </tr>
        @endforelse
    </table>

@endsection