<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title>{{ trans('title.admin') }}</title>
    <base href="{{ asset('') }}">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/mycss.css">
    
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('layout.menu')
            </div>

            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>
  

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap  JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/myjs.js"></script>
</body>

</html>
