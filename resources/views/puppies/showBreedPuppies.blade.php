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

    <p>{!! __('puppies.want_buy') !!} <strong>@include('puppies._breed')</strong>{!! __('puppies.call') !!} <a
                href="#">{!! __('puppies.request') !!}</a> {!! __('puppies.our_site') !!}</p>

    <p>{!! __('puppies.our_nursery') !!}
        @if ($puppies['allAmount'] == 1)
            {{ $puppies['allAmount'] }} {!! __('puppies.fields.puppy') !!}
        @elseif(in_array($puppies['allAmount'], array(2,3,4)))
            {{ $puppies['allAmount'] }} {!! __('puppies.puppies1') !!}
        @else
            {{ $puppies['allAmount'] }} {!! __('puppies.puppies2') !!}
        @endif
        @include('puppies._breed') {!! __('puppies.for_sale') !!} (
        @if ($puppies['maleAmount'] != 0)
            @if ($puppies['maleAmount'] == 1)
                {{ $puppies['maleAmount'] }} {!! __('puppies.fields.genders.male') !!}
            @elseif(in_array($puppies['maleAmount'], array(2,3,4)))
                {{ $puppies['maleAmount'] }} {!! __('puppies.males1') !!}
            @else
                {{ $puppies['maleAmount'] }} {!! __('puppies.males2') !!}
            @endif
        @endif
        @if (($puppies['maleAmount'] != 0) && ($puppies['femaleAmount'] != 0))
            и
        @endif
        @if ($puppies['femaleAmount'] != 0)
            @if ($puppies['femaleAmount'] == 1)
                {{ $puppies['femaleAmount'] }} {!! __('puppies.fields.genders.female') !!}
            @elseif(in_array($puppies['femaleAmount'], array(2,3,4)))
                {{ $puppies['femaleAmount'] }} {!! __('puppies.females1') !!}
            @else
                {{ $puppies['femaleAmount'] }} {!! __('puppies.females2') !!}
            @endif
        @endif
     )</p>

    <p>{!! __('puppies.birthdate') !!}: {{ $puppies['birthdate'] }}</p>

    {!! __('puppies.description') !!}

@stop
