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
                        <button class="nav-link" type = "submit">Comics</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="alphabetically" method="GET">
                        @csrf('GET')
                        <button class="nav-link" type = "submit">Alphabetical order</button>
                    </form>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Top 100</a>
                </li>
            </ul>
         </div>
        
          <div class="col-4">
            <form action="character" method="GET">
                @csrf('GET')
                <div class="input-group rounded">
                    <input type="text" name="name" class="form-control rounded" placeholder="Search character" aria-label="Search"
                    aria-describedby="search-addon" required/>
                    <span class="input-group-text border-0" id="search-addon">
                        <button name="" id="" class="btn btn-secundary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </span>
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

  
</script>

</html>
