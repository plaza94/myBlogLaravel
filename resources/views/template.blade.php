<!DOCTYPE html>
<html lang="en">


<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('titulo')
    </title>

</head>

<div class="container my-5">
    <a href="{{route('index')}}" class="btn btn-primary">Home</a>
    <a href="{{route('showCharacter')}}" class="btn btn-primary">Ejercicios Personajes</a>
</div>

<body>
    @yield('seccion')
</body>
</html>



 <script src="{{ asset('js/boot.js') }}"></script>
