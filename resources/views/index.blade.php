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
    <script src="/js/app.js"></script>
   
</head>


<body class = "imageBackground">
    @include('includes.navbar')
   
  
    <div class="container-md" style="background-color:white;">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" style=" width:100%;">
                @foreach ($news as $item)
                    <div class="carousel-item justify-content-center">
                        <a href="{{$item["url"]}}">
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

     
       
    <div class="jumbotron" style="max-height: 50px">
        <h1>Comics</h1>

    </div>
    <div class="container">
            <div class="row mt-5" style="margin: 0 auto">
                @foreach($series["results"] as $item)
                <div class="col-md-4 col-lg-3 mb-3 d-flex justify-content-center">
                    <div class="card-deck">
                            <div class="card" style="width: 12rem;">
                                @if (count($item["images"]) > 0)
                                    <img class="card-img-top img-thumbnail" src="{{$item["images"][0]["path"]}}/portrait_incredible.jpg" alt="Card image cap" style="max-width: 200px; max-height:300px;">
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
