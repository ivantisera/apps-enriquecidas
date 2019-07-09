<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('estilos.css') }}">
    <title>@yield('title') - {{ env('APP_NAME') }}</title>

</head>
<body>

    <header>
    <h1 id="titulo">Todo en sillas</h1>
        @include('includes.header')
    </header>

    <main role="main" class="container">
        @yield('main')
    </main>

    <footer>
        @include('includes.footer')
    </footer>

    <!-- Javascript -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
