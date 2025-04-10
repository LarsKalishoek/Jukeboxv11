<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dit zijn alle users</title>
</head>
<body>
    <h1>Dit zijn alle users: </h1>
    @foreach($users as $user)
    {{$user->name}}
    @endforeach
</body>
</html>