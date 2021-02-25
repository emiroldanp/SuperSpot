<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>

    <form action="{{route('user.update', ['user' => $user])}}" method = "POST">
        @csrf
        @method('PUT')
        <div>
            <label for="">Name</label>
            <input type="text" name='name' value="{{$user->name}}">
        </div>
        <div>
            <label for="">Email</label>
            <input type="text" name='email' value="{{$user->email}}">
        </div>
        <div>
            <label for="">Password</label>
            <input type="text" name='password' value="{{$user->password}}">
        </div>

        <input type = 'submit' value = 'Submit'>
    </form>
</body>
</html>