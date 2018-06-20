@extends('layouts.app')

@section('title')
    <h1>{!! __('reviews.titles.reviews') !!}</h1>
@stop

@section('content')


    @foreach($reviews as $review)
        <div class=" review {{ $review->published ? '' : 'not-published' }}">
            @include('reviews._reviews')
            <div>
                @if (Auth::check())
                    @if (Auth::user()->hasRole('Администратор'))
                        <div class="text-right">
                            @if ($review->published == 0)
                                <a class="button" href="/reviews/publish/{{$review->id}}">{!! __('reviews.buttons.publish') !!}</a>
                            @endif
                            <a class="button" href="/reviews/delete/{{$review->id}}">{!! __('reviews.buttons.delete') !!}</a>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    @endforeach
    <div class="pagination">
        {{ $reviews->links() }}
    </div>
@stop