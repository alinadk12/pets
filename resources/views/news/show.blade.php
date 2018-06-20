@extends('layouts.app')

@section('title')
    <h1>{!! __('news.titles.news') !!}</h1>
@stop

@section('content')

    <div class="col-md-10">
        <h3><b>{{ App::isLocale('en') ? $new->title_en : $new->title_ru }}</b></h3>
        <p>{{ $new->format_date }}</p>
        @if ($new->image)
            <div style="margin: 10px"><img src="{{ asset($new->image) }}" alt="image" class="img-rounded"
                                           height="225"></div>
        @endif
        <p>{{ App::isLocale('en') ? $new->text_en : $new->text_ru }}</p>
    </div>
    @if (Auth::check())
        @if (Auth::user()->hasRole('Сотрудник'))
            <div class="text-right">
                <a class="button" href="/news/edit/{{$new->id}}">{!! __('news.buttons.edit') !!}</a>
                <a class="button" href="/news/delete/{{$new->id}}">{!! __('news.buttons.delete') !!}</a>
            </div>
        @endif
    @endif

@stop