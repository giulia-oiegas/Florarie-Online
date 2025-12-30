<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Florărie Online')</title>

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
<body>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#D5ACE6;">
    <div class="container">
<a class="navbar-brand fw-semibold" href="#">Florărie Online</a>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>
