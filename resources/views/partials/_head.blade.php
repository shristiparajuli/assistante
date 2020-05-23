<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/css/mdb.min.css" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}" />
<!--====== nice select css ======-->
<link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}" />
<!--====== Magnific Popup css ======-->
<link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}" />
<!--====== Slick css ======-->
<link rel="stylesheet" href="{{asset('assets/css/slick.css')}}" />
<!--====== Default css ======-->
<link rel="stylesheet" href="{{asset('assets/css/default.css')}}" />
<!--====== Style css ======-->
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
@yield('stylesheets')
