<!DOCTYPE HTML>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pets</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <!-- jQuery -->
    <script src="/js/jquery/jquery-3.1.1.min.js"></script>

    <!--Yandex map-->
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>

    <style>
        .dropdown:hover > .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body>
@if (Session::has('message'))
    <div id="win">
        <div class="overlay"></div>
        <div class="visible">
            <div class="content-modal">
                <div class="alert alert-success">
                    <p class="text-success text-center">{{ Session::get('message') }}</p>
                </div>
            </div>
            <div class="button-center">
                <button type="button" class="btn btn-default btn-modal"
                        onClick="getElementById('win').style.display='none';">OK
                </button>
            </div>
        </div>
    </div>
@endif
@if (Session::has('error'))
    <div id="win">
        <div class="overlay"></div>
        <div class="visible">
            <div class="content-modal">
                <div class="alert alert-danger">
                    <p class="text-danger text-center">{{ Session::get('error') }}</p>
                </div>
            </div>
            <div class="button-center">
                <button type="button" class="btn btn-default btn-modal"
                        onClick="getElementById('win').style.display='none';">OK
                </button>
            </div>
        </div>
    </div>
@endif

@include('layouts._header')
@include('layouts._navbar')

<div class="row block-title min-width">
    <div class="col-md-8 col-md-offset-2">
        <div class="col-md-8">
            <div class="text-white title">
                @yield('title')
            </div>
        </div>
    </div>
</div>

<div class="row main-background min-width">
    <div class="col-md-8 col-md-offset-2 content">
        <div class="col-md-8">
            <div class="text-justify text18 text-content">
                @yield('content')
            </div>
        </div>
        <div class="col-md-4 block-news">
            <h3 class="text-center"><b>{!! __('news.titles.last_news') !!}</b></h3>
            @foreach($news as $new)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-6">
                            <p class="text-left text15">{{ $new->format_date }}</p>
                            <div class="text-left">
                                <a href="/news/{{ $new->id }}" class="text16 title-news"><b>{{ App::isLocale('en') ? $new->title_en : $new->title_ru }}</b></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            @if ($new->image)
                                <img src="{{asset($new->image)}}" alt="image" class="img-rounded img-responsive"
                                     height="100px"
                                     width="150px">
                            @endif
                        </div>
                        <div class="col-md-12 text14">
                            <p>{{ App::isLocale('en') ? $new->short_text_en : $new->short_text_ru }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="text-right text16">
                <a href="{{ url('/news') }}">{!! __('news.all_news') !!} >></a>
            </div>
        </div>
    </div>
</div>
@include('layouts._footer')

@yield('script')

<script>

    $('#logo').hover(
            function () {
                $(this).addClass('animated rubberBand')
            },
            function () {
                $(this).removeClass('animated rubberBand')
            }
    );
    $(function () {
        $('.nav li a').each(function () {
            var location = window.location.href;
            if ((location.search('home') + 1) || (location.length == 21)) {
                $('#home').addClass('active');
            }
            if (location.search('breeds') + 1) {
                $('#breeds').addClass('active');
            }
            if (location.search('dogs') + 1) {
                $('#dogs').addClass('active');
            }
            if (location.search('puppies') + 1) {
                $('#puppies').addClass('active');
            }
            if (location.search('goods') + 1) {
                $('#goods').addClass('active');
            }
            if (location.search('news') + 1) {
                $('#news').addClass('active');
            }
            if (location.search('reviews') + 1) {
                $('#reviews').addClass('active');
            }
            if (location.search('contacts') + 1) {
                $('#contacts').addClass('active');
            }
            if (location.search('request') + 1) {
                $('#request').addClass('active');
            }
            if (location.search('users') + 1) {
                $('#users').addClass('active');
            }
        });
    });
</script>

</body>
</html>


