
<style>
    @font-face {
        font-family: "Shaka Pow";
        src: url('/fonts/Shaka Pow.ttf');
        color: black;
    }

    .bg-rojo3{
        background-color: #C72523 !important;
    }

    .bg-azul1{
        background-color: #4D8AB5 !important;
    }

    .bg-rojo1{
        background-color: #4D1518 !important;
    }

    .bg-rojo2{
        background-color: #951E22 !important;
    }



    .bg-gris1{
        background-color: #B9BEBA !important;
    }

    .bg-azul2{
        background-color: #1E2639 !important;
    }
    
   
   
</style>
<div>
    <nav class="navbar navbar-expand-lg navbar-secondary bg-rojo3">
        <a class="navbar-brand" href="{{route('series.index')}}" style="font-family: Shaka Pow">Comicwire</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavId">
                @if (Auth::check())
                @auth
                    @if (Auth::user()->password !=null)
                    <h4>
                        <input type="hidden" id= "currentUser" value="{{Auth::user()->id}}">
                        <a  class="btn btn-secundary" href="{{route('auth.show')}}"  role="button">{{ auth()->user()->name}}</a>

                        <a name="" id="" class="btn text-light bg-azul1" href="{{route('auth.logout')}}" role="button">Exit</a>
                    </h4>
                    @else
                    <h4>
                        
                        <a  class="btn btn-secundary" >{{ auth()->user()->name}}</a>

                        <a name="" id="" class="btn text-light bg-azul1" href="{{route('auth.logout')}}" role="button">Exit</a>
                    </h4>
                    @endif
                    

                @endauth
                @else
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a name="" id="" class="btn btn-secundary" href="{{route('auth.login')}}" role="button">Sign in</a>
                    </li>
                    <li class="nav-item">
                        <a name="" id="" class="btn text-light bg-azul1" href="{{route('auth.register')}}" role="button">Sign up</a>
                    </li>
                </ul>

                @endif
        </div>
    </nav>
    <div class="toast" data-delay="8000" style="position: absolute; top: 10; right: 10px;z-index: 5;">
      <div class="toast-header">
        <svg class=" rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"  role="img">
                      <rect fill="#007aff" width="100%" height="100%" /></svg>
        <strong class="mr-auto">Hey!!</strong>
        <small class="text-muted"></small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
      </div>
      <div class="toast-body" >
        Someone liked your comment
      </div>
    </div>
    
</div>

