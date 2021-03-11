<link rel="stylesheet" href="{{ asset('/css/app.css')}}">
<script src="/js/app.js"></script>

<div>
    <nav class="navbar sticky-top navbar-expand-sm">
        <a class="navbar-brand" href="{{route('series.index')}}">Comicwire</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavId">
                @if (Auth::check())
                @auth
                    <h4>
                        <ul class="navbar-nav ml-auto">
                            <a href="{{route('auth.show')}}">{{ auth()->user()->name}}</a>
                        </ul>
                        <a name="" id="" class="btn btn-primary" href="{{route('auth.logout')}}" role="button">Salir</a>                        
                    </h4>
                    
                @endauth    
                @else
                <ul class="nav">
                    <li class="nav-item">
                        <a name="" id="" class="btn btn-secundary" href="{{route('auth.login')}}" role="button">Ingresar</a>
                    </li>
                    <li class="nav-item">
                        <a name="" id="" class="btn btn-primary" href="{{route('auth.register')}}" role="button">Registro</a>
                    </li>
                </ul>
                
                @endif
        </div>
    </nav>
</div>

