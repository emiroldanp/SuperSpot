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
                <h1>{{$serie["title"]}}</h1>
            </div>
            
            
        </div>
        <br>
        <div class = "row">
            <div class="col-3">
               
                @if (count($serie["images"]) > 0)
                    <img class="card-img-top img-thumbnail" src="{{$serie["images"][0]["path"]}}/portrait_xlarge.jpg" alt="Card image cap" style="max-width: 200px; max-height:300px;">
                @endif
            </div>
            <div class="col-5">
                <h4>Description</h4>
                <p>
                    {{$serie["description"]}}
                </p>
            </div>
            <div class="col-2">
                <div class="row">
                    <div class="p-3 border bg-light">Issue Number {{$serie["issueNumber"]}}</div>
                    
                </div>  
                <br> 
                <div class="row">
                    <div class="p-3 border bg-light">
                        Creators
                        <br>
                        @foreach ($serie["creators"]["items"] as $item)
                        {{$item["name"]}} 
                        @endforeach
                        
                    </div>
                </div>                     
              
            </div>
        </div>
        <br>
        <div class="row">
         
            
        </div>
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <h4>Comments</h4>
                </div>
                <div class="row">
                    <table class="table">
                        {{-- <tbody>
                            @foreach ($comments as $comment)
                            <tr>
                                <td>    
                                    <div class="row">
                                        <div class="col">
                                            {{$comment->user->name}}
                                        </div>
                                        @if (Auth::user() == $comment->user)
                                        
                                        <div class="col-xs-1-12">
                                            <button  id="{{$comment->id}}1" class="btn btn-link"   type="submit" style="display:block;" onclick="showDiv({{$comment->id}}, {{$comment->id}}1, {{$comment->id}}2, {{$comment->id}}3)" >Editar</button>
                                            <button  id="{{$comment->id}}2" class="btn btn-link"   type="submit" style="display:none;"  onclick="sendUpdate({{$comment->id}}4)">Terminar</button>
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
                                        <div class="col" id ="{{$comment->id}}" style="display:block;">
                                            {{$comment->content}}
                                        </div>  
                                        
                                    </div>   
                                    <form action="{{route('comments.update', $comment -> id)}}" method = "POST">
                                                @csrf
                                                @method('PUT')
                                                
                                                <div class="form-group" id ="{{$comment->id}}3" style="display:none;">
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="{{$comment->content}} " type="text" name='content' value='{{$comment->content}}'></textarea>
                                                </div>  

                                                <button  id="{{$comment->id}}4" class="btn btn-link"   type="submit" style="display:none;"></button>
                                    </form> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody> --}}
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

    
</head>
    

</body>

<script>
    function showDiv(id_comment, id_el1, id_el2, id_el3) {
        document.getElementById(id_comment).style.display = "none";
        document.getElementById(id_el2).style.display = "block";
        document.getElementById(id_el1).style.display = "none";
        document.getElementById(id_el3).style.display = "block";
    }

    function sendUpdate(id_el4) {
        document.getElementById(id_el4).click();
    }
</script>

</html>
