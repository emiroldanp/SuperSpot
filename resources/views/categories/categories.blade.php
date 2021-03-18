<!DOCTYPE html>
<html lang="en">

    @extends('layouts.main')
    @include('includes.navbar')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
</head>
<body>
    <div class="container-md">
        <br>
        <div class="row">
        
            <a name="" class="btn btn-outline-secondary btn-sm" href="{{route('auth.show')}}" role="button">Atrás</a> 
        </div>
        <br>
        <table>
            <thead>
                <th class="h3">Mis categorias</th>
                
            </thead>
            
            <tbody>
                @foreach ($categories as $item)
                    <tr>
                  
                        <td>{{$item->name}}</td>
                        <th>
                            <form action="{{route('category.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$item->id}}">
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <button type="submit" class="btn btn-outline-secondary btn-sm">Agregar +</button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
    <footer>
        @include('includes.footer')
    </footer>
</body>
</html>