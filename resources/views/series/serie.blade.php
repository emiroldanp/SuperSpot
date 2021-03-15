<!DOCTYPE html>
<html lang="en">



    @extends('layouts.main')
    @include('includes.navbar')


<body>
    <div class="container-md">
        <br>
        <div class="row">
            <a name="" class="btn btn-outline-secondary btn-sm" href="{{route('series.index')}}" role="button">Atrás</a> 
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <h1>{{$serie->name}}</h1>
            </div>
            
            
        </div>
        <br>
        <div class = "row">
            <div class="col-3">
                <img class="card-img-top img-thumbnail" src="https://source.unsplash.com/random" alt="Card image cap" style="max-width: 200px; max-height:300px;">
            </div>
            <div class="col-6">
                <h4>Resumen</h4>
                <p>
                    Aqui va el resumen de la serie
                </p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Volumen</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <th>1</th>
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <div class="row">
                    <h4>Comentarios</h4>
                </div>
                <div class="row">
                    <table class="table">
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
                            <input class = "btn btn-primary" type = 'submit' value = 'Subir'>
                            </div>  
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
        <br>
        
    

    </div>
    @include('includes.footer')
    
    

</body>


</html>
