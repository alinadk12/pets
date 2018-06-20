@extends ('layouts/app')

@section ('title')
    <h1>{{ $breed->name }}</h1>
@stop

@section('content')

    <p><strong>{!! __('breeds.country') !!}</strong> {{ $breed->breed_country }}</p>
    <p><strong>{!! __('breeds.height') !!}</strong> {{ $breed->height }}</p>
    <p><strong>{!! __('breeds.weight') !!}</strong> {{ $breed->weight }}</p>
    <p><strong>{!! __('breeds.description') !!}</strong> {{ $breed->description }}</p>

@stop
