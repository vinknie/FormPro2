
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FormPro</title>
    <!-- Lien des CSS -->
    <link rel="stylesheet" href="{{asset('css/stylenav.css')}}">
    <link rel="stylesheet" href="{{asset('css/stylefooter.css')}}">
    <link rel="stylesheet" href="{{asset('css/accueil.css')}}">
    <link rel="stylesheet" href="{{asset('css/admincss.css')}}">

    <!-- lien Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Lien Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    
</head>
<body>
    
    @include('include.header')
    
    
    <div class="container">
        @yield('content')

        

        
        
    </div>
   
    @include("include.footer")
    


    <!-- Lien des JavaScripts -->
    
    <script type="text/javascript" src="js/app.js"></script>
    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>