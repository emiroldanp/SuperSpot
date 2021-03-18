<!DOCTYPE html>
<html lang="en">

    @extends('layouts.main')
    @include('includes.navbar')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>
</head>
<body>
    <div class="container-md">
        <br>
        <div class="row">
        
            <a name="" class="btn btn-outline-secondary btn-sm" href="{{route('series.index')}}" role="button">Atrás</a> 
        </div>
    
    
        <br>
        <h1>Edit User</h1>
        <br>
        <form action="{{route('auth.update-user', ['user' => $user])}}" method = "POST">
            @csrf
            @method('PUT')
                
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control"  name='name' value="{{$user->name}}"> 
                </div>
                <div class="form-group">
                    <label for="">Correo</label>
                    <input class="form-control"  type="email" name='email' value="{{$user->email}}">
                </div>
           
            
            <br>
            <button type="submit" class="btn btn-outline-secondary btn-sm">Submit</button>
        </form>
        <br>
        <form action="{{route('auth.update-password')}}" method="post">
            @csrf
            @method('PUT')
            <div>
                <input type="hidden" name="email" value = "{{$user->email}}">
                <h3>Cambiar Contraseña</h3>
                
                <label for="">Contraseña Actual</label>
                <input class="form-control" type="password" name='password' value="">
                <br>
                <label for="">Nueva Contraseña</label>
                <input class="form-control" type="password" name='password_new' value="">
                
            </div>
            <br>
            <button type="submit" class="btn btn-outline-secondary btn-sm">Submit</button>
        </form>
        <br>
        <h3>Mis categorias</h3>
        <table>
            <thead>
           
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
                                <button type="submit" class="btn btn-outline-secondary btn-sm">Borrar</button>
                            </form>
                        </td>
                    </tr>
                
                @endforeach
            </tbody>
        </table>
        <br>
        <label> Agregar Nuevas Categorias</label>
        <a href="{{route('category.show', $user->id)}}" class="btn btn-outline-secondary btn-sm">Agregar +</a>
        
    </div>
    <br>
    <footer>
        @include('includes.footer')
    </footer>
</body>
</html>