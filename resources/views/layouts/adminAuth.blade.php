<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{__('cp.clinic')}}</title>
    <!-- Styles -->
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('css/login-3.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>


    @yield('content')

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
