<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Serie</title>
</head>

<body>
    <a href="{{route('series.index')}}">Atras</a>
    <h1>{{$serie->name}}</h1>
    <table>
        <thead>
            <tr>
                <th>Volumen</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <th><a href="{{route('comics.index')}}">1</a></th>
        </tbody>
    </table>
</body>
</html>