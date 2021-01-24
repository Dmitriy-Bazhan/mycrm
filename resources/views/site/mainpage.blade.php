@extends('site.layouts.layout')

@section('content')

    <link href="{{ asset('css/mainpage.css') }}" rel="stylesheet">

    <div class="container-fluid">

        <div class="row">

            <div
                class="d-none d-sm-none d-md-none d-lg-block col-lg-10 col-xl-10 offset-lg-1 offset-xl-1 central-photo">

                <div class="central-photo-inside-block">

                    <img class="mainpage-main-photo" src="{{ asset('image/homepage/20.jpg') }}" alt="">

                </div>

                <div class="central-photo-title">

                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 offset-lg-2 offset-xl-2 central-photo-sell-button">

                <span class="central-photo-sell-button-title">К каталогу</span>

            </div>

        </div>

        <br>

        <div class="row">

            @php($products = $popularProducts)

            @foreach($products as $product)

                @include('site.products.product-card')

            @endforeach

        </div>

    </div>

    <script>

        $('.central-photo-sell-button-title').click(function () {
            document.location.href = '/category';
        });

    </script>


@endsection
