<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>
</head>
<body>
<nav>
    <button><a href="{{route('user.index')}}">Regresar</a></button>
</nav>
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
    <table>
        <thead>
            <th>Categorias</th>
            <th><button><a href="{{route('category.show', $user->id)}}">Agregar</a></button></th>
        </thead>
        <tbody>
            @foreach ($categories as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>
                        
                        <form action="{{route('category.destroy', $item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <button type="submit">Borrar</button>
                        </form>
                    </td>
                </tr>
               
            @endforeach
        </tbody>
    </table>
</body>
</html>