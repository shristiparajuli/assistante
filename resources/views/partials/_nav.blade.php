<header class="header-area header-absolute" style="">
    <div class="header-top d-md-flex align-items-center d-none d-md-block" style="background-color: black;border:none;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-top-item d-flex justify-content-between">
                        <div class="header-info">
                            <ul>
                                <li>
                                    <span>If your any query:</span><br />
                                    <span>info@bclean.com</span>
                                    <i class="flaticon-e-mail-envelope"></i>
                                </li>
                                <li>
                                    <span>Have any question?</span><br />
                                    <span>Free: +12 365 5233</span>
                                    <i class="flaticon-phone-call"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="header-contact-info">
                            <div class="d-flex align-items-center justify-content-end">
                                <p>Opening Hour: 9:30AM - 5:30PM</p>
                                <a class="main-btn main-btn-3" href="#">Contact Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav" style="background-color: black;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navigation">
                        <nav class="navbar navbar-expand-lg navbar-light ">
                            <a class="navbar-brand" href="index.html"><img src="assets/images/logo-2.png"
                                    alt="Queak" /></a>

                            <!-- logo -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <!-- navbar toggler -->

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul class="navbar-nav m-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{route('pages.welcome')}}">Home
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="about.html"> Shop Now
                                        </a>

                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('pages.about')}}">About</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('pages.services')}}">Services
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="project.html">Project
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        @guest
                                        <a class="nav-link" href="#">Profile
                                        </a>
                                        @else
                                        <a class="nav-link" href="{{route('profile.index',auth()->user()->id)}}">Profile
                                        </a>
                                        @endguest
                                        {{--        <ul class="sub-menu">
                                        <li>
                                                <a href="blog.html">Login</a>
                                            </li>
                                            <li>
                                                <a href="single-blog.html">Register</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                --}}
                                        <ul class="sub-menu">
                                            @guest
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                            @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                    href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                            @endif
                                            @else
                                            <li class="nav-item">

                                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                </form>

                                            </li>
                                            @endguest

                                        </ul>
                            </div>
                            <!-- navbar collapse -->
                            <div class="navbar-social d-none d-sm-block">
                                <div class="header-social">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-google"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <!-- navigation -->
                </div>
            </div>
        </div>
    </div>
</header>
{{--
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
{{ config('app.name', 'Laravel') }}
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav mr-auto">

    </ul>


    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        @endif
        @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
        @endguest
    </ul>
</div>
</div>
</nav>
--}}
