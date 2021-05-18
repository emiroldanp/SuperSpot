<!DOCTYPE html>

@extends('layouts.main')

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/index.css')}}">
    <script src="{{ asset('/js/ajax.js')}}"></script>
    
    <script src="/js/app.js"></script>
    
    
   
</head>


<body class = "imageBackground">
    @include('includes.navbar')
   @if ($fail == true)
        <body onLoad="javascript:failSearch()">
   @endif
  
    <div class="container-md" style="background-color:white;">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" style=" width:100%;">
                @foreach ($news as $item)
                    <div class="carousel-item justify-content-center">
                        <a href="{{$item["url"]}}" target="_blank">
                         <img class="d-block w-100" src={{$item["urlToImage"]}} alt="Second slide" height="400" >
                        </a>
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{$item["title"]}}</h5>
                            <p>{{$item["description"]}}</p>
                        </div>
                       
                    </div>
               
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>

     <br>
     <div class="row">
         <div class="col-8">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <form action="series" method="GET">
                        @csrf('GET')
                        <button class="nav-link" type = "submit">New Release</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="upcoming" method="GET">
                        @csrf('GET')
                        <button class="nav-link" type = "submit">Up Coming</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="alphabetically" method="GET">
                        @csrf('GET')
                        <button class="nav-link" type = "submit">Alphabetical order</button>
                    </form>
                </li>
            </ul>
         </div>
        
          <div class="col-4">
            <form action="character" method="GET">
                @csrf('GET')
                <div class="input-group rounded">
                    
                    <input type="text" name="name" class="form-control rounded" placeholder="Search character" aria-label="Search"
                    aria-describedby="search-addon" required/>
                    <button name="" id="" class="btn btn-secundary" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                   
                </div>
            </form>
          </div>
          
     </div>  
    
    <div class="container">
            <div id = "cardContainer" class="row mt-5" style="margin: 0 auto">
                @foreach($series["results"] as $item)
                <div class="col-md-4 col-lg-3 mb-3 d-flex justify-content-center">
                    <div class="card-deck">
                            <div class="card" style="width: 12rem;">
                                
                                @if (count($item["images"]) > 0)
                                    <img class="card-img-top img-thumbnail" src="{{$item["images"][0]["path"]}}/portrait_incredible.jpg" alt="Card image cap" style="max-width: 200px; max-height:300px;">
                                @else
                                    <img class="card-img-top img-thumbnail" src="images/comic.jpg" alt="Card image cap" style="max-width: 200px; max-height:300px;">
                                @endif
                                <div class="card-body">
                                    <a class="card-title" href="{{route('series.show', $item["id"])}}">{{$item["title"]}}</a>   
                                </div>
                            </div>

                    </div>
                </div>
                @endforeach
            </div>
    </div>

    <footer>
        @include('includes.footer')
    </footer>
    </div>
   
</body>
<script>
    $(document).ready(function () {
        $('#carouselExampleControls').find('.carousel-item').first().addClass('active');
    });
    function failSearch(){
        alert("Fail to search that character. Try again");
    }

  
</script>

</html>
