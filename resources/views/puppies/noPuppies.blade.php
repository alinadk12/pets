@extends('layouts.app')

@section('title')

    @if($puppies['breed'] == 1)
        <h1>{!! __('puppies.titles.terriers') !!}</h1>
    @elseif($puppies['breed'] == 2)
        <h1>{!! __('puppies.titles.beagles') !!}</h1>
    @elseif($puppies['breed'] == 3)
        <h1>{!! __('puppies.titles.retrievers') !!}</h1>
    @elseif($puppies['breed'] == 4)
        <h1>{!! __('puppies.titles.chihuahua') !!}</h1>
    @endif

@stop

@section('content')

    <p><strong>{!! __('puppies.no_puppy') !!} @include('puppies._breed') {!! __('puppies.for_sale') !!}.</strong></p>

    <p>{!! __('puppies.no_puppy_text') !!}
        @if (Auth::check())
            <a href="/request/{{ Auth::user()->id }}">{!! __('puppies.request') !!}</a>
        @else
            {!! __('puppies.request') !!}
        @endif
        {!! __('puppies.our_site') !!}</p>
@stop