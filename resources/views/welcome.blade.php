<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 text-center">
        <h1 class="display-4">{{ config('app.name', 'Laravel') }}</h1>
        <p class="lead">We offer a variety of exciting events for you to participate in. Explore and discover new experiences!</p>
        <a href="{{ route('events.index') }}" class="btn btn-primary">Explore Events</a>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jY38PB4EMTIiNp2Cln5zBO78jT6L" crossorigin="anonymous"></script>
</body>
</html>
