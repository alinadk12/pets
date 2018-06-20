@extends('layouts.app')

@section('title')
    <h1>{!! __('news.titles.news') !!}</h1>
@stop

@section('content')

    @foreach($newsAll as $new)

        <div class="col-md-10">
            <hr>
            <h3><a href="/news/{{ $new->id }}"><b>{{ App::isLocale('en') ? $new->title_en : $new->title_ru }}</b></a></h3>
            <p>{{ $new->format_date }}</p>
            @if ($new->image)
                <div style="margin: 10px"><img src="{{ asset($new->image) }}" alt="image"
                                                                   class="img-rounded"
                                                                   height="225"></div>
            @endif
            <p>{{ $new->short_text }}</p>
            <a href="/news/{{ $new->id }}">{!! __('news.more') !!}>></a>
        </div>
        @if (Auth::check())
            @if (Auth::user()->hasRole('Сотрудник'))
                <div class="text-right">
                    <a class="button" href="/news/edit/{{$new->id}}">{!! __('news.buttons.edit') !!}</a>
                    <a class="button" href="/news/delete/{{$new->id}}">{!! __('news.buttons.delete') !!}</a>
                </div>
            @endif
        @endif
        <br>
    @endforeach

    <div class="pagination">
        {{ $newsAll->links() }}
    </div>

@stop

