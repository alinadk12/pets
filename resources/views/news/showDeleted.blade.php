@extends('layouts.app')

@section('title')
    <h1>{!! __('news.titles.deleted_news') !!}</h1>
@endsection
@section('content')

    @foreach($newsAll as $new)
        <div class="col-md-10">
            <hr>
            <h3><a href="/news/{{ $new->id }}">{{ App::isLocale('en') ? $new->title_en : $new->title_ru }}</a></h3>
            <p>{{ $new->format_date }}</p>
            @if ($new->image)
                <div style="margin: 10px"><img src="{{ asset($new->image) }}" alt="image" class="img-rounded"
                                               height="225"></div>
            @endif
            <p>{{ App::isLocale('en') ? $new->text_en : $new->text_ru }}</p>
        </div>
        @if (Auth::check())
            @if (Auth::user()->hasRole('Сотрудник') || Auth::user()->hasRole('Администратор'))
                <div class="text-right">
                    <a class="button" href="/news/restore/{{$new->id}}">{!! __('news.buttons.restore') !!}</a>
                    <a class="button" href="/news/forcedelete/{{$new->id}}">{!! __('news.buttons.remove_db') !!}</a>
                </div>
            @endif
        @endif
        <br>
    @endforeach

    <div class="pagination">
        {{ $newsAll->links() }}
    </div>

@stop