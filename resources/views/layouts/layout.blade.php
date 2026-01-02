<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Flori cu Sens')</title>

    <!-- Bootstrap (CDN) – exact ca în fișa profei -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <style>
    .btn-mov {
        background-color: #6A1B9A;
        color: white;
        border: none;
    }

    .btn-mov:hover {
        background-color: #4A148C;
        color: white;
    }
</style>

</head>
<body class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#D5ACE6;">
    <div class="container">
        <a href="{{ route('buchete.index') }}" class="navbar-brand text-white text-decoration-none"><strong>
            🌸 Flori cu Sens
        </strong></a>
        <div>
            <a href="{{ route('evenimente.index') }}" class="btn btn-mov">
                 Evenimente
            </a>
        </div>
    </div>
</nav>

<div class="container mt-4 flex-grow-1">
    @yield('content')
</div>

<footer class="py-3 mt-5 text-center text-white" style="background-color: #D5ACE6;">
    <div class="container">
        <p class="mb-0 small">
            &copy; {{ date('Y') }} Flori cu Sens. Creat cu dragoste pentru flori.
        </p>
    </div>
</footer>

</body>
</html>
