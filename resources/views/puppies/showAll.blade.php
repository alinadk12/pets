@extends('layouts.app')

@section('title')
    <h1>{!! __('puppies.titles.puppies') !!}</h1>
@stop

@section('content')

    <div class="col-md-6">
        <div class="panel panel-default panel-radius">
            <div class="panel-body ">
                <a href="{{ url('/puppies/terrier') }}">
                    <img src="{{asset('images/puppies/jack.png')}}" class="img-responsive" id="terrier">
                </a>
            </div>
            <div class="panel-footer panel-radius text-center">
                <a href="{{ url('/puppies/terrier') }}" class="text-white">{!! __('puppies.titles.terriers') !!}</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default panel-radius">
            <div class="panel-body text-center">
                <a href="{{ url('/puppies/beagle') }}">
                    <img src="{{asset('images/puppies/beagle.png')}}" class="img-responsive" id="beagle">
                </a>
            </div>
            <div class="panel-footer panel-radius text-center">
                <a href="{{ url('/puppies/beagle') }}" class="text-white">{!! __('puppies.titles.beagles') !!}</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default panel-radius">
            <div class="panel-body text-center">
                <a href="{{ url('/puppies/goldenretriever') }}">
                    <img src="{{asset('images/puppies/retriever.png')}}" class="img-responsive" id="retriever">
                </a>
            </div>
            <div class="panel-footer panel-radius text-center">
                <a href="{{ url('/puppies/goldenretriever') }}" class="text-white">{!! __('puppies.titles.retrievers') !!}</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default panel-radius">
            <div class="panel-body text-center">
                <a href="{{ url('/puppies/chihuahua') }}">
                    <img src="{{asset('images/puppies/chihuahua.png')}}" class="img-responsive" id="chihuahua">
                </a>
            </div>
            <div class="panel-footer panel-radius text-center">
                <a href="{{ url('/puppies/chihuahua') }}" class="text-white">{!! __('puppies.titles.chihuahua') !!}</a>
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

