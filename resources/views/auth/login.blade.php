
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
        <form action="{{route('auth.do-login')}}" method="POST">
            @csrf
            <div class="card bg-light">
                <article class="card-body mx-auto" style="max-width: 400px;">
                    <h4 class="card-title mt-3 text-center">Ingresar</h4>
                    
                    <p>
                        <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Ingresar via Twitter</a>
                        <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Ingresar via facebook</a>
                    </p>
                    <form>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                         </div>
                        <input name="email" class="form-control" placeholder="Correo electronico" type="email">
                        </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input class="form-control" placeholder="Contraseña" type="password" name='password'>
                    </div> <!-- form-group// -->
                                        
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Ingresar  </button>
                    </div> <!-- form-group// -->      
                    <p class="text-center">No tienes cuenta? <a href="{{route('auth.register')}}">Crear Cuenta</a> </p>                                                                 
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
</html>