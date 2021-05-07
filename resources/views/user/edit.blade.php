<!DOCTYPE html>
<html lang="en">

    @extends('layouts.main')
    @include('includes.navbar')
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/registro.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>
</head>
<body class = "imageBackground">
    <div class="container bg-white mt-0 mb-0">
        <br>
        <div class="row m-3">
        
            <a name="" class="btn btn-outline-light btn-sm bg-azul1" href="{{route('series.index')}}" role="button">Go back</a> 
        </div>
    
        <div class="m-4">
            <br>
            <h1>Edit User</h1>
            <br>
            <form action="{{route('auth.update-user', ['user' => $user])}}" method = "POST">
                @csrf
                @method('PUT')
                    
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control"  name='name' value="{{$user->name}}"> 
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input class="form-control"  type="email" name='email' value="{{$user->email}}">
                    </div>
            
                
                <br>
                <button type="submit" class="btn btn-outline-light bg-azul1 btn-sm">Edit User</button>
            </form>
        </div>
        <br>
        <div class="m-4">
            <form action="{{route('auth.update-password')}}" method="post">
                @csrf
                @method('PUT')
                <div>
                    <input type="hidden" name="email" value = "{{$user->email}}">
                    <h5>Change Password</h5>
                    <br>
                    <label for="">Old Password </label>
                    <input class="form-control" type="password" name='password' value="">
                    <br>
                    <label for="">New Password</label>
                    <input class="form-control" type="password" name='password_new' value="">
                    
                </div>
                <br>
                <button type="submit" class="btn btn-outline-light bg-azul1 btn-sm">Change Password</button>
            </form>
        </div>
        <br>
        
        
    </div>
    <br>
    <footer>
        @include('includes.footer')
    </footer>
</body>
</html>