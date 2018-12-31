<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    @include('admin.includes.head')
    @stack('css')
</head>

<body class="theme-blue-grey">
<div id="app">

    @include('admin.includes.header')

    @include('admin.includes.sidebar')

<section class="content">
    @yield('content')
</section>

    @include('admin.includes.js')

     @stack('js')

</div>
</body>

</html>
