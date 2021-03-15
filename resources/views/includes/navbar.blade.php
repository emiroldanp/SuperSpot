
@include('layouts.main')
<div>
    <nav class="navbar sticky-top navbar-expand-sm">
        <div class = "justify-content-center">
            <a class="navbar-brand" href="{{route('series.index')}}">Comicwire</a>
        </div>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavId">
                @if (Auth::check())
                @auth
                    <h4>
                        
                        <a  class="btn btn-secundary" href="{{route('auth.show')}}"  role="button">{{ auth()->user()->name}}</a>
                        
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

