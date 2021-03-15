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
    <div class="container">
        <div class="row">
            <a name="" id="" class="btn" href="{{route('series.index')}}" role="button">Atrás</a> 
        </div>
        <div class="row">
            <h1>{{$serie->name}}</h1>
        </div>
        <div class = "row">
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
        </div>
        <div class="col-6">
            <div class="row h-100">
                <h4>Comentarios</h4>
            </div>
            <div class="row">
                <table class="table" width>
                    <tbody>
                        @foreach ($comments as $comment)
                        <tr>
                            <td>    
                                <div class="row">
                                    <div class="col">
                                        {{$comment->user->name}}
                                    </div>
                                    @if (Auth::user() == $comment->user)
                            
                                    <div class="col-xs-1-12">
                                        <form action="{{route('comments.edit', $comment->id)}}">
                                            <button  class="btn btn-link"   type="submit">Editar</button>
                                        </form>
                                    </div>
                                    <div class="col-xs-1-12">
                                        <form action="{{route('comments.destroy', $comment->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button  class="btn btn-link" type="submit">Borrar</button>
                                        </form>
                                    </div>
                                
                                @endif
                                </div>
                                <div class="row">
                                    <div class="col">
                                        {{$comment->content}}
                                    </div>
                                </div>    
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if (Auth::check())
            <form action="{{route('comments.store')}}" method = "POST">
                @csrf
                <div>
                    <div class="row">
                        <div class="col">
                            <input class = "form-control" type="text" name='content' placeholder="Apoya a otros con un comentario">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name='id_serie' value= {{$serie->id}}>
                        <input class = "btn btn-primary" type = 'submit' value = 'Submit'>
                        </div>  
                    </div>
                </div>
            </form>
        @endif
        </div>
        
    </div>
    
    
    
    
   
    
    @include('includes.footer')
</body>
</html>
