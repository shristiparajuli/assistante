<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials_admin._head')
</head>

<body class="">
  <div class="wrapper">
      @include('partials_admin._sidebar')
    <div class="main-panel">
      <!-- Navbar -->
      @include('partials_admin._nav')
      <!-- End Navbar -->
      <div class="content">
        @yield('content')
      </div>
    </div>
  </div>
  @include('partials_admin._scripts')
</body>

</html>

{{-- <!doctype html>
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
</html> --}}
