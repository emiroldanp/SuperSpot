<!DOCTYPE html>
<html lang="en">
<head>
    @extends('layouts.main')
    <link rel="stylesheet" href="{{ asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/registro.css')}}">
    <script src="{{ asset('/js/ajax.js')}}"></script>
</head>
@include('includes.navbar')
    

<body class = "imageBackground">
    <div class="container-md" style="background-color:white;">
        
        <br>
        <div class="row m-2">
            <a name="" class="btn btn-outline-light bg-azul1 btn-sm" href="{{route('series.index')}}" role="button">Back</a> 
        </div>
        <br>
        <div class="row m-4">
            <div class="col-6">
                <h1>{{$serie["title"]}}</h1>
            </div>
            
        </div>
        <br>
        <div class = "row m-4">
            <div class="col-3">
                @if (count($serie["images"]) > 0)
                    <img class="card-img-top img-thumbnail" src="{{$serie["images"][0]["path"]}}/portrait_xlarge.jpg" alt="Card image cap" style="max-width: 200px; max-height:300px;">
                @else
                    <img class="card-img-top img-thumbnail" src="../images/comic.jpg" alt="Card image cap" style="max-width: 200px; max-height:300px;"> 
                @endif
            </div>
            <div class="col-5">
                <h4>Description</h4>
                <p>
                    @if ( $serie["description"] == "")
                        No description available
                    @else
                        {{$serie["description"]}}
                    @endif
                   
                </p>
            </div>
            <div class="col-2">
                <div class="row">
                    @if ( $serie["issueNumber"] == "")
                        <div class="p-3 border text-dark bg-gris1">No issue number available</div>
                    @else
                        <div class="p-3 border text-dark bg-gris1">Issue Number {{$serie["issueNumber"]}}</div>
                    @endif
                   
                    
                </div>  
                <br> 
                <div class="row">
                    <div class="p-3 border text-dark bg-gris1">
                        Creators
                        <br>
                        @if ( count($serie["creators"]["items"]) == 0)
                            No creators available
                        @else
                            @foreach ($serie["creators"]["items"] as $item)
                            {{$item["name"]}} 
                            @endforeach
                        @endif
                       
                        
                    </div>
                </div>                     
              
            </div>
        </div>
        <br>
        <div class="row">
         
            
        </div>
        <div class="row m-4">
            <div class="col-6">
                <div class="row">
                    <h4>Comments</h4>
                </div>
                <div class="row">
                    <table class="table" id = "table">
                        <tbody id = "tableComments">
                            @foreach ($comments as $comment)
                            <tr id = "tableRow{{$comment->id}}">
                                <td>    
                                    <div class="row">
                                        <div class="col">
                                            {{$comment->user->name}}
                                        </div>
                                        @if (Auth::user() == $comment->user)
                                        <div class="row">
                                            <div class="col" style="margin-right:7px;">
                                                <i class="fa fa-thumbs-up"></i>
                                                <p id = "likes{{$comment->id}}">{{$comment->likes}}</p>
                                            </div>
                                            <div class="col">
                                                <i  class="fa fa-thumbs-down"></i>
                                                <p id = "dislikes{{$comment->id}}">{{$comment->dislikes}}</p>
                                            </div>
                                            
                                            
                                        </div>
                                        
                                       
                                        @elseif (Auth::check())
                                        <div class="row">
                                            <div class="col" style="margin-right:7px;">
                                                <i onclick=updateLikes({{$comment->id}},{{Auth::user()->id}}) class="fa fa-thumbs-up"></i>
                                                <p id = "likes{{$comment->id}}">{{$comment->likes}}</p>
                                            </div>
                                            <div class="col">
                                                <i onclick=updateDislikes({{$comment->id}},{{Auth::user()->id}}) class="fa fa-thumbs-down"></i>
                                                <p id = "dislikes{{$comment->id}}">{{$comment->dislikes}}</p>
                                            </div>
                                            
                                            
                                        </div>
                                        @else
                                        <div class="row ">
                                            <div class="col-xs-1-12" style="margin-right:7px;">
                                                <i class="fa fa-thumbs-up"></i>
                                                <p id = "likes{{$comment->id}}">{{$comment->likes}}</p>
                                            </div>
                                            <div class="col-xs-1-12">
                                                <i class="fa fa-thumbs-down"></i>
                                                <p id = "dislikes{{$comment->id}}">{{$comment->dislikes}}</p>
                                            </div>
                                            
                                            
                                        </div>
                                         @endif
                                    </div>
                                    <div class="row">
                                        <div class="col" id ="{{$comment->id}}-content" style="display:block;">
                                            {{$comment->content}}
                                        </div>  
                                        @if (Auth::user() == $comment->user)
                                        <div class="row">
                                            <div class="col-xs-1-12">
                                                <button  id="{{$comment->id}}1" class="btn btn-link"   type="submit" style="display:block;" onclick="showDiv({{$comment->id}}, {{$comment->id}}1, {{$comment->id}}2, {{$comment->id}}3)" >Edit</button>
                                                <button  id="{{$comment->id}}2" class="btn btn-link"   type="submit" style="display:none;"  onclick="sendUpdate({{$comment->id}})">Update</button>
                                            </div>
                                            <div class="col-xs-1-12">
                                                    <button  class="btn btn-link" type="submit" onclick = "deleteComic({{$comment->id}}, this)">Delete</button>
                                            </div>
                                        </div>
                                        @endif
                                        
                                    </div>   
                                        <div class="form-group" id ="{{$comment->id}}3" style="display:none;">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="{{$comment->content}} " type="text" name='content' value='{{$comment->content}}'></textarea>
                                        </div>  

                                        <button  id="{{$comment->id}}" class="btn btn-link"   type="submit" style="display:none;"></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if (Auth::check())
                
                    <div>
                        <div class="row">
                            <div class="col">
                                <input id = "description_comment" class = "form-control" type="text" name='content' placeholder="">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <input id="id_comic" type="hidden" name='id_serie' value= {{$serie["id"]}}>
                                <input class = "btn btn-primary bg-rojo1"  value = 'Send' onclick= createCommentAjax()>
                            </div>  
                        </div>
                    </div>
             
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

    function sendUpdate(id) {
        let description = document.getElementById("exampleFormControlTextarea1").value
        let str = 'comments/'+id+''
        console.log(description);
        $.ajax({
            url: str,
            method: 'PUT',
            headers:{
                'Accept': 'application/json',
                'X-CSRF-Token': $('meta[name="csrf-token"').attr('content')
            },
            data:{
                id:id,
                content:description    
            }
        }).done(function(response) {
            console.log("Exito" , response)
            document.getElementById(response.id+"-content").innerHTML =  response.content;
            document.getElementById("exampleFormControlTextarea1").style.display = "none"
            document.getElementById(response.id+"2").style.display = "none"
            document.getElementById(response.id+"1").style.display = "block"
           
        })
        .fail(function(jqXHR, response) {
            console.log('Fallido', response);
        });
        

    }

    function likeDislike(x) {
        x.classList.toggle("fa-thumbs-down");
    }

    function createCommentAjax() {
        let theDescription = $('#description_comment').val();
        let id_comic = $('#id_comic').val();
        console.log("POSt");
        $.ajax({
            url: '{{ route('comments.store') }}',
            method: 'POST',
            headers:{
                'Accept': 'application/json',
                'X-CSRF-Token': $('meta[name="csrf-token"').attr('content')
            },
            data: {
                content: theDescription,
                id_comic: id_comic
            }
        })
        .done(function(response) {
            console.log('Éxitoso',response);
            $("#tableComments").append('<tr id= tableRow'+ response.id +'><td><div class="row"><div class="col">'+response.user.name+'</div><div class="col-xs-1-12"></div><div class="col-xs-1-12"><button  class="btn btn-link" type="submit" onclick = deleteComic('+response.id+',this)>Delete</button></div></div><div class="row"><div class="col" id ="'+response.id+'-content" style="display:block;">'+response.content+'</div></div></td></tr>')
                        
            
        })
        .fail(function(jqXHR, response) {
            console.log('Fallido', jqXHR);
        });
    }
   
    $(document).ready(function () {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
    });
    

    
    
</script>


</html>
