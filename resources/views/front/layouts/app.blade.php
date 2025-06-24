<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/output.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/content.css') }}" rel="stylesheet">
    @stack('after-styles')
    <title>@yield('title') - SageCodex Esports Learning Platform</title>
    <meta name="description" content="Your purchase has been completed successfully on SageCodex, the premier esports learning platform.">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/logos/sagecodex-logo-32.png">
    <link rel="apple-touch-icon" href="assets/images/logos/sagecodex-logo-180.png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
    <body>
        @yield('content')

        @stack('after-scripts')
    </body>
</html>