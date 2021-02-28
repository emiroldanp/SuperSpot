
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form action="{{route('auth.do-login')}}" method="POST">
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