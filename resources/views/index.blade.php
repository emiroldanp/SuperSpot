<!DOCTYPE html>



<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<nav>
    <button><a href="{{route('user.create')}}">Registar</a></button>
</nav>


<h1>Welcome {{$user}}</h1>



<body>
    <h1>Series</h1>
    <ul>
    <table>
        <thead>
            <tr>
                <th>
                    Nombre
                </th>
                <th>
                    Rating
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($series as $item)
                <tr>
                    <td><a href="{{route('series.show', $item->id)}}">{{$item->name}}</a></td>
                    <td>{{$item->rating}}</td>
                    
                </tr>
            @endforeach
        </tbody>
        
    </table>

    </ul>

</body>


</html>