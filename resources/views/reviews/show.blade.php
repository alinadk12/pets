@extends ('layouts.app')

@section('title')
    <h1>{!! __('reviews.titles.reviews') !!}</h1>
@stop

@section('content')

    @if (Auth::check())
        @if (Auth::user()->hasRole('Пользователь'))
            @include('reviews._form')
        @endif
    @endif

    @foreach($reviews as $review)
        <div class="review">
            @include('reviews._reviews')
        </div>
    @endforeach
    <div class="pagination">
        {{ $reviews->links() }}
    </div>

@stop