<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Filipino Street Foods Menu')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <header class="bg-warning text-dark p-3 mb-4">
        <h1 class="text-center">Filipino Street Foods Menu List</h1>
    </header>

    <div class="container">
        @yield('content')
    </div>

    <footer class="bg-light text-center p-3 mt-4">
        &copy; 2026 Filipino Street Foods
    </footer>
</body>
</html>