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
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
</head>


<body>
    <nav class="mb-5">
        @include('includes.navbar')
     </nav>

    <div class="jumbotron" style="max-height: 100px">
        <h1>Series</h1>

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
                                    <a class="card-title nombre-comic" href="{{route('series.show', $item["id"])}}">{{$item["title"]}}</a>
                                    
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
</body>


</html>
