<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('output.css') }}" rel="stylesheet">
        @stack('after-styles')
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <title> @yield('title')</title>
        <meta name="description" content="Obito is an innovative online learning platform that empowers students and professionals with high-quality, accessible courses.">

        <!-- Favicon -->
        <link rel="icon" type="image/png" sizes="32x32" href="assets/images/logos/logo-64.png') }}">
        <link rel="apple-touch-icon" href="assets/images/logos/logo-64.png') }}">

        <!-- Open Graph Meta Tags -->
        <meta property="og:title" content="Obito Online Learning Platform - Learn Anytime, Anywhere">
        <meta property="og:description" content="Obito is an innovative online learning platform that empowers students and professionals with high-quality, accessible courses.">
        <meta property="og:image" content="https://obito-platform.netlify.app/assets/images/logos/logo-64-big.png') }}">
        <meta property="og:url" content="https://obito-platform.netlify.app">
        <meta property="og:type" content="website">
    </head>
    <body>
        @yield('content')

        @stack('after-scripts')
    </body>
</html>