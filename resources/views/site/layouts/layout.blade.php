<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crm</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{ asset('css/open-iconic-master/font/css/open-iconic-bootstrap.css') }}" rel="stylesheet"
          type="text/css" media="screen">
</head>
<body data-token="{{ csrf_token() }}">

<script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<div class="container-fluid">

    <div class="row">

        <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10 offset-lg-1 offset-xl-1 background-for-all-pages">

            <header>

                @include('site.components.header')

            </header>

            @yield('content')

        </div>

    </div>

</div>


</body>
</html>
