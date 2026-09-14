<nav class="nav mb-3">
    <a class="nav-link" href="{{ route('movies.index') }}">
        Movies
    </a>

    <a class="nav-link" href="{{ route('movies.featured') }}">
        Featured
    </a>

    <a class="nav-link" href="{{ route('movies.filter') }}">
        Filter
    </a>

    <a class="nav-link" href="{{ route('movies.show', ['movie' => 1]) }}">
        Movie #1
    </a>
</nav>