
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de usuario</title>

    <link rel="stylesheet" href="{{ asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/registro.css')}}">
    <script src="/js/app.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

</head>
<body class = "image">

    <div class = "container">
        <form action="{{route('auth.do-register')}}" method="POST">
            @csrf
            <div class="card bg-light">
                <div class="row mt-3 d-flex justify-content-center">
                    <a class="rojo3 " href="{{route('series.index')}}" style="font-family: Shaka Pow; font-size:3vw">Comicwire</a>
                </div>
                <article class="card-body mx-auto" style="max-width: 400px;">
                    <h4 class="card-title mt-1 text-center">Create an Account</h4>

                    <p>
                        <a href="/auth/redirect" class="btn btn-block btn-twitter"> <i class="fab fa-github"></i>   Login via Github</a>
                        <a href="{{ url('auth/google') }}" class="btn btn-block btn-facebook"> <i class="fab fa-google"></i>   Login via Google</a>
                    </p>
                    <form>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                         </div>
                        <input name="name" class="form-control" placeholder="Name" type="text">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                         </div>
                        <input name="email" class="form-control" placeholder="Email" type="email">
                        </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input class="form-control" placeholder="Password" type="password" name='password'>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input class="form-control" placeholder="Confirm Password" type="password" name='password_confirmation'>
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <button type="submit" class="btn text-light bg-azul1 btn-block"> Create  </button>
                    </div> <!-- form-group// -->
                    <p class="text-center">Already have an account? <a href="{{route('auth.login')}}">Sign in</a> </p>
                </article>
                </div> <!-- card.// -->

                </div>

        </form>
    </div>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</body>

<style>
    @font-face {
        font-family: "Shaka Pow";
        src: url('/fonts/Shaka Pow.ttf');
        color: black;
    }

    .bg-rojo3{
        background-color: #C72523 !important;
    }

    .rojo3{
        color: #C72523 !important;
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
</html>
