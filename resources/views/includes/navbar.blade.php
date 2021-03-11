<link rel="stylesheet" href="{{ asset('/css/app.css')}}">
<script src="/js/app.js"></script>

<div class = "navbar">
    <nav class="navbar sticky-top navbar-expand-sm ">
        <a class="navbar-brand" href="{{route('series.index')}}">Comicwire</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto">
                @if (Auth::check())
                @auth
                    <h4>
                        <button type="button" name="" id="" class="btn btn-primary btn-lg btn-block"><a href="{{route('auth.logout')}}">Logout</a></button>
                        <a href="{{route('auth.show')}}">{{ auth()->user()->name}}</a>
                        <button><a href="{{route('auth.logout')}}">Logout</a></button>
                    </h4>
                    
                @endauth    
                @else
                <li class="nav-item">
                    <button type="button" name="" id="" class="btn btn-primary"><a href="{{route('auth.login')}}">Login</a></button>
                </li>
                <li class="nav-item">
                    <button type="button" name="" id="" class="btn btn-primary"><a href="{{route('auth.register')}}">Registro</a></button>
                </li>
                @endif
            </ul>
            
    </nav>
</div>