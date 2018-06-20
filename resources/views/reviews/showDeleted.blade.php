@extends ('layouts.app')

@section ('title')
    <h1>{!! __('reviews.titles.deleted_reviews') !!}</h1>
@stop

@section('content')

    @foreach($reviews as $review)
        <div class="review">
            @include('reviews._reviews')
            @if (Auth::check())
                @if (Auth::user()->hasRole('Администратор'))
                    <div class="text-right">
                        <a class="button" href="/reviews/restore/{{$review->id}}">{!! __('reviews.buttons.restore') !!}</a>
                        <a class="button" href="/reviews/forcedelete/{{$review->id}}">{!! __('reviews.buttons.remove_db') !!}</a>
                    </div>
                @endif
            @endif

        </div>
    @endforeach
    <div class="pagination">
        {{ $reviews->links() }}
    </div>

@stop