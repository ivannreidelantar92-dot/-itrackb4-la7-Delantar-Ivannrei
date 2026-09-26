@php
    $isFeatured = request()->routeIs('movies.featured');
    $isMovies = request()->is('movies*') && !$isFeatured;
@endphp

<nav class="nav mb-3">
    <a class="nav-link {{ $isMovies ? 'active fw-bold' : '' }}" href="{{ route('movies.index') }}">
        Movies
    </a>

    <a class="nav-link {{ $isFeatured ? 'active fw-bold' : '' }}" href="{{ route('movies.featured') }}">
        Featured
    </a>

    <a class="nav-link" href="{{ route('movies.show', ['movie' => 1]) }}">
        Movie #1
    </a>
</nav>