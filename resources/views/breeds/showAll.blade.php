@extends('layouts.app')

@section('title')
    <h1>{!! __('breeds.about_breed') !!}</h1>
@stop

@section('content')

    <div class="col-md-6">
        <div class="panel panel-default panel-radius">
            <div class="panel-body ">
                <a href="{{ url('/breeds/terrier') }}">
                    <img src="{{asset('images/breeds/jack.png')}}" class="img-responsive" id="terrier">
                </a>
            </div>
            <div class="panel-footer panel-radius text-center">
                <a href="{{ url('/breeds/terrier') }}" class="text-white">{!! __('breeds.terrier') !!}</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default panel-radius">
            <div class="panel-body text-center">
                <a href="{{ url('/breeds/beagle') }}">
                    <div class="zoom-images">
                        <img src="{{asset('images/breeds/beagle.png')}}" class="img-responsive" id="beagle">
                    </div>
                </a>
            </div>
            <div class="panel-footer panel-radius text-center">
                <a href="{{ url('/breeds/beagle') }}" class="text-white">{!! __('breeds.beagle') !!}</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default panel-radius">
            <div class="panel-body text-center">
                <a href="{{ url('/breeds/goldenretriever') }}">
                    <img src="{{asset('images/breeds/retriever.png')}}" class="img-responsive" id="retriever">
                </a>
            </div>
            <div class="panel-footer panel-radius text-center">
                <a href="{{ url('/breeds/goldenretriever') }}" class="text-white">{!! __('breeds.retriever') !!}</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default panel-radius">
            <div class="panel-body text-center">
                <a href="{{ url('/breeds/chihuahua') }}">
                    <img src="{{asset('images/breeds/chihuahua.png')}}" class="img-responsive" id="chihuahua">
                </a>
            </div>
            <div class="panel-footer panel-radius text-center">
                <a href="{{ url('/breeds/chihuahua') }}" class="text-white">{!! __('breeds.chihuahua') !!}</a>
            </div>
        </div>
    </div>

@stop

@section('script')
    <script>
        $('#terrier').hover(
                function () {
                    $(this).addClass('animated pulse')
                },
                function () {
                    $(this).removeClass('animated pulse')
                }
        );
        $('#beagle').hover(
                function () {
                    $(this).addClass('animated pulse')
                },
                function () {
                    $(this).removeClass('animated pulse')
                }
        );
        $('#retriever').hover(
                function () {
                    $(this).addClass('animated pulse')
                },
                function () {
                    $(this).removeClass('animated pulse')
                }
        );
        $('#chihuahua').hover(
                function () {
                    $(this).addClass('animated pulse')
                },
                function () {
                    $(this).removeClass('animated pulse')
                }
        );
    </script>
@stop
