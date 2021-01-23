@extends('site.layouts.layout')

@section('content')

    <link href="{{ asset('css/mainpage.css') }}" rel="stylesheet">

    <div class="container-fluid homepage-margin-top">

        <div class="row justify-content-center">

            <div class="central-photo">

                <div class="central-photo-inside-block">

                    <span class="central-photo-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>

                </div>

            </div>

        </div>

        <button class="central-photo-sell-button transition">
            <span class="central-photo-sell-button-title transition">К каталогу</span>
        </button>

    </div>



    <script>

        (function () {
            let height = $('.central-photo').width() * 0.45;
            $('.central-photo').height(height);
        }());

        $(window).resize(function () {
            let height = $('.central-photo').width() * 0.45;
            $('.central-photo').height(height);
        });

        $('.central-photo-sell-button-title').click(function () {
            document.location.href = '/category';
        });

    </script>


@endsection
