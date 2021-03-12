<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Serie</title>
</head>

@include('includes.navbar')

<body>
    <a name="" id="" class="btn" href="{{route('series.index')}}" role="button">Atrás</a>
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
    <h4>Comentarios</h4>
    <table>
        <thead>

        </thead>
        <tbody>
            @foreach ($comments as $comment)
            <tr>
                <th>{{$comment->content}}</th>
                <td><a href="{{route('comments.edit', $comment->id)}}">Editar</a></td>
                <th>
                    <form action="{{route('comments.destroy', $comment->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Borrar</button>
                    </form>
                </th>

            </tr>
            @endforeach
        </tbody>
    </table>
    <form action="{{route('comments.store')}}" method = "POST">
        @csrf
        <div>
            <label for="">Apoya a otros con un comentario</label>
            <input type="text" name='content'>
            <input type="hidden" name='id_serie' value= {{$serie->id}}>
        </div>

        <input type = 'submit' value = 'Submit'>
    </form>
</body>
</html>
