<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet">
</head>
<body class="container text-bg-dark">
    
    <h1 class="text-center p-4">My Movies</h1>
    <p>Prepared by: Ivann Rei M. Delantar </p>
    @include('partials._nav')

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/
            dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
