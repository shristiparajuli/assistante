<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials._head')
</head>
<body>
    @include('partials._nav')

        <main class="py-4">
            @include('partials._message')
            @yield('content')
        </main>
    </div>
</body>
@include('partials._script')
</html>
