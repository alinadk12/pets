<hr>
<div>
    <p class="text-left"><b>{{$review->user_login}}</b> | {{$review->format_date}}</p>
</div>
<div>
    <p>{{$review->text}}</p>
</div>
<div>
    @if (Auth::check())
        @if (Auth::user()->hasRole('Пользователь') && Auth::id() == $user->id)
            <div class="text-right">
                <a class="button" href="/reviews/edit/{{$review->id}}">{!! __('reviews.buttons.edit') !!}</a>
                <a class="button" href="/reviews/delete/{{$review->id}}">{!! __('reviews.buttons.delete') !!}</a>
            </div>
        @endif
    @endif
</div>

