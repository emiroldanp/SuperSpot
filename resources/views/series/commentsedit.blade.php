
<a href="{{route('series.show', $comment -> serie_id)}}">Atras</a>

<h1>Edita tu comentario</h1>

<form action="{{route('comments.update', $comment -> id)}}" method = "POST">
        @csrf
        @method('PUT')
        <div>
            <label for="">Comentario</label>
            <input type="text" name='content'value= {{$comment->content}}>
        </div>

        <input type = 'submit' value = 'Cambiar'>
</form>