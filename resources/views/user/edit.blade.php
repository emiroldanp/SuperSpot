<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>
</head>
<body>

    <a href="{{route('series.index')}}">Regresar</a>
    
    <h1>Edit User</h1>

    <form action="{{route('auth.update-user', ['user' => $user])}}" method = "POST">
        @csrf
        @method('PUT')
        <div>
            <label for="">Nombre</label>
            <input type="text" name='name' value="{{$user->name}}">
        </div>
        <div>
            <label for="">Correo</label>
            <input type="text" name='email' value="{{$user->email}}">
        </div>
        <button type="submit">Submit</button>
    </form>
    
    <form action="{{route('auth.update-password')}}" method="post">
        @csrf
        @method('PUT')
        <div>
            <input type="hidden" name="email" value = "{{$user->email}}">
            <h3>Cambiar Contraseña</h3>
            <label for="">Contraseña Actual</label>
            <input type="password" name='password' value="">
            <br>
            <label for="">Nueva Contraseña</label>
            <input type="password" name='password_new' value="">
            
        </div>

        <button type="submit">Submit</button>
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