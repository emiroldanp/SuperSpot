
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
</head>
<body>
    <form action="{{route('auth.do-register')}}" method="POST">
        @csrf
        <h1>Registro</h1>
        <div>
            <label for="">Name</label>
            <input type="text" name='name' id="">
        </div>
        <div>
            <label for="">Email</label>
            <input type="text" name='email'>
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name='password'>
        </div>
        <div>
            <label for="">Confirma Password</label>
            <input type="password" name='password_confirmation'>
        </div>

        <input type = 'submit' value = 'Submit'>
    </form>
    <a href="{{route('auth.login')}}">Ingresa</a>
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