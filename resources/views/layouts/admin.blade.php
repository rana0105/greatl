<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}"/>
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}"/>
    <title>Great Neighbor</title>
     @include('partial.dashstyle')

</head>
<body id="dashboard-body">
    @include('partial.dashboardhead')
    @include('partial.sidebar')
       <div id="flash-msg">
                @include('flash::message')
        </div>
    @yield('content')
   {{--  @include('partial.footer') --}}
    <!-- Scripts -->
    @include('partial.dashjavascript')
    @yield('script')
</body>
</html>