<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS Materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/style.css') }}">
    @stack('style')
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/dist/img/logo.png') }}" type="image/png">
    <title>{{ $title ?? 'Perpustakaan' }}</title>
</head>
