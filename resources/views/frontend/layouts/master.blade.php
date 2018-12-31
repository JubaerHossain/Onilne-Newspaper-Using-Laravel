<!DOCTYPE HTML>
<html lang="{{ config('app.locale') }}">
<head>
   @include('frontend.includes.head')
    @stack('css')
</head>
<body>

  @include('frontend.includes.header')
  @include('frontend.includes.banner')
  @yield('content')
  @include('frontend.includes.footer')
  @include('frontend.includes.js')
    @stack('js')


</body>
</html>
