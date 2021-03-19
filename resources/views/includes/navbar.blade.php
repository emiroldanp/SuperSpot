
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
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
          </ul>
        </div>
      </nav> --}}
</div>

