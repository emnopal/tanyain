<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login form</title>

    <!-- Font Icon -->
    {{-- <link rel="stylesheet" href="secure_asset('Admin/fonts/material-icon/css/material-design-iconic-font.min.css')}}"> --}}

    {{-- boostrap --}}

    <!-- Main css -->
    {{-- <link rel="stylesheet" href="secure_asset('Admin/css/style.css')}}"> --}}

    <link href="{{ secure_asset('Argon/assets/img/brand/favicon.png')}}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ secure_asset('Argon/assets/js/plugins/nucleo/css/nucleo.css')}}" rel="stylesheet" />
    <link href="{{ secure_asset('Argon/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{ secure_asset('Argon/assets/css/argon-dashboard.css?v=1.1.2')}}" rel="stylesheet" />
</head>
<body class="bg-default">
    <div class="main-content">
        @yield('content')
    </div>
<!-- JS -->
{{-- <script src="secure_asset('Admin/vendor/jquery/jquery.min.js')}}"></script> --}}
{{-- <script src="secure_asset('js/main.js')}}"></script> --}}

<script src="{{ secure_asset('Argon/assets/js/plugins/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ secure_asset('Argon/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<!--   Optional JS   -->
<!--   Argon JS   -->
<script src="{{ secure_asset('Argon/assets/js/argon-dashboard.min.js?v=1.1.2')}}"></script>
<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
