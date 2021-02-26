<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
</head>
<body>
<nav>
    <button><a href="{{route('user.index')}}">Regresar</a></button>
</nav>
    <h1>User</h1>

    <form action="{{route('user.store')}}" method = "POST">
        @csrf
        <div>
            <label for="">Name</label>
            <input type="text" name='name'>
        </div>
        <div>
            <label for="">Email</label>
            <input type="text" name='email'>
        </div>
        <div>
            <label for="">Password</label>
            <input type="text" name='password'>
        </div>

        <input type = 'submit' value = 'Submit'>
    </form>
</body>
</html>