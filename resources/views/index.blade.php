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
    <nav>
        @include('includes.navbar')
     </nav>

    <div class="jumbotron" style="max-height: 100px">
        <h1>Series</h1>

    </div>
    <div class="container">
            <div class="row mt-5" style="margin: 0 auto">
                @foreach($series as $item)
                <div class="col-md-3 mb-3 d-flex justify-content-center">
                    <div class="card-deck">
                            <div class="card" style="width: 12rem;">
                                <img class="card-img-top" src="https://source.unsplash.com/random" alt="Card image cap">
                                <div class="card-body">
                                    <a class="card-title nombre-comic" href="{{route('series.show', $item->id)}}">{{$item->name}}</a>
                                    <p class="card-text"> <small class="text-muted">Rating: {{$item->rating}}</small></p>
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
