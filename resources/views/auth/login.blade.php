<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>log in</h1>
    <form action="{{ route('authenticate')}}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="insert email">
        <input type="password" name="password" placeholder="insert password">
        <button type="submit">Log in</button>
    </form>
    
</body>
</html>