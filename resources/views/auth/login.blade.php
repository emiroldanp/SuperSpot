
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<<<<<<< Updated upstream:resources/views/user/login_create_user.blade.php
<nav>
    <button><a href="{{route('series.index')}}">Volver al inicio</a></button>
</nav>
    <h1>User</h1>

    <form action="{{route('user.store')}}" method = "POST">
=======
    <form action="{{route('auth.do-login')}}" method="POST">
>>>>>>> Stashed changes:resources/views/auth/login.blade.php
        @csrf
        <h1>Login</h1>
        <div>
            <label for="">Email</label>
            <input type="text" name='email'>
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name='password'>
        </div>
       
        <input type = 'submit' value = 'Submit'>
    </form>
    <a href="{{route('auth.register')}}">Crear Cuenta</a>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</body>
</html>