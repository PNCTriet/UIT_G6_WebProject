<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail-page</title>
</head>
<body>
    <form action="/t" method="post">
        @csrf
        @method('post')
        <label>Id</label>
        <input type="number" name="id">
        <label for="username">Username</label>
        <input type="text" name="username">
        <label for="">password</label>
        <input type="text" name="password">
        <button type="submit">Submit</button>
    </form>
    @php
       
    @endphp
</body>
</html>