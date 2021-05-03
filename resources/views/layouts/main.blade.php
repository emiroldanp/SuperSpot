<!DOCTYPE html>
<head>
    
    <link rel="stylesheet" href="{{ asset('/css/navbar.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/footer.css')}}">
    <script src='../js/app.js'></script>
    <script src="{{ asset('/js/event.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('/css/main.css')}}">
    
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    

  
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
    .fa {
    font-size: 20px;
    cursor: pointer;
    user-select: none;
    text-align:right;
    }

    .fa:hover {
    color: darkblue;
    }
    </style>
</head>

</html>