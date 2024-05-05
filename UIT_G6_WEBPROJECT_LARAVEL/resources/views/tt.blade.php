<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('thuong em')</title>
</head>
<body>
    @extends('layout.test_tt')
    @section('sidebar')

        <h1>Hello sidebar</h1>
        @parent
    @endsection
    @section('content')
        <p>this is a part inside container</p>
    @endsection
</body>
</html>