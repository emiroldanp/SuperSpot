<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comic</title>
</head>

@include('includes.navbar')

<body>

    <a href="{{route('series.index')}}">Atras</a>

    <h1>Comic</h1>
    <h3>Fecha de lanzamiento</h3>
    <h2>Resumen</h2>


    <h1>Comentarios</h1>

    <form action="{{route('comments.store')}}" method = "POST">
        @csrf
        <div>
            <label for="">Apoya a otros con un comentario</label>
            <input type="text" name='content'>
            <input type="hidden" name='id_serie'>
            
        </div>

        <input type = 'submit' value = 'Submit'>
    </form>
</body>
</html>