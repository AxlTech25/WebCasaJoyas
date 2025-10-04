<!doctype html>
    <html lang="es">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','La Casa de las Joyas')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>        
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    @vite('resources/js/app.js')

</head>
<body>
    @include('profile.partials.navbar')
    <main class="py-4">@yield('content')</main>
    @include('profile.partials.footer')
</body>
</html>