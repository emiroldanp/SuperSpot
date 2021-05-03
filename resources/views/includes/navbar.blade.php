
<style>
    @font-face {
        font-family: "Shaka Pow";
        src: url('/fonts/Shaka Pow.ttf');
    }
</style>
<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{route('series.index')}}" style="font-family: Shaka Pow">Comicwire</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavId">
                @if (Auth::check())
                @auth
                    <h4>
                        <input type="hidden" id= "currentUser" value="{{Auth::user()->id}}">
                        <a  class="btn btn-secundary" href="{{route('auth.show')}}"  role="button">{{ auth()->user()->name}}</a>

                        <a name="" id="" class="btn btn-primary" href="{{route('auth.logout')}}" role="button">Salir</a>
                    </h4>

                @endauth
                @else
                <ul class="navbar-nav">
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
    <div class="toast"  style="position: absolute; top: 10; right: 0;">
      <div class="toast-header">
        <svg class=" rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                      <rect fill="#007aff" width="100%" height="100%" /></svg>
        <strong class="mr-auto">Hey!!</strong>
        <small class="text-muted"></small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
      </div>
      <div class="toast-body">
        Someone liked your comment
      </div>
    </div>
    
</div>

