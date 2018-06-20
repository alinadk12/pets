@extends('layouts.app')

@section('title')
    <h1>{!! __('puppies.titles.for_sale') !!}</h1>
@stop

@section('content')

    @foreach($puppies as $puppy)
        <hr>
        <div class="row-fluid">
            <div style="display: inline-block; vertical-align: top; margin: 10px">
                <img src="{{asset($puppy->image)}}" alt="image" class="img-rounded" height="180">
            </div>
            <div style="display: inline-block; vertical-align: top; margin: 10px">
                <p><strong>{!! __('puppies.fields.number_id') !!}:</strong> {{ $puppy->id }}</p>
                <p><strong>{!! __('puppies.fields.breed') !!}:</strong> {{ App::isLocale('en') ? $puppy->breed_en : $puppy->breed_ru }}</p>
                <p><strong>{!! __('puppies.fields.gender') !!}:</strong>
                    @if ($puppy->gender == 0) {!! __('puppies.fields.genders.female') !!}
                    @else {!! __('puppies.fields.genders.male') !!}
                    @endif</p>
                <p><strong>{!! __('puppies.fields.birthdate') !!}:</strong> {{ $puppy->birthdate}}</p>
                <p><strong>{!! __('puppies.fields.color') !!}:</strong> {{ App::isLocale('en') ? $puppy->color_en : $puppy->color_ru }}</p>
                <p><strong>{!! __('puppies.fields.female') !!}:</strong> {{ App::isLocale('en') ? $puppy->female_en : $puppy->female_ru }}</p>
                <p><strong>{!! __('puppies.fields.male') !!}:</strong> {{ App::isLocale('en') ? $puppy->male_en : $puppy->male_ru }}</p>
            </div>
        </div>
        <div class="col-md-12">
            <p><strong>{!! __('puppies.fields.notes') !!}:</strong> {{ App::isLocale('en') ? $puppy->notes_en : $puppy->notes_ru }}</p>
        </div>
        <div class="col-md-12">
            <p><strong>{!! __('puppies.fields.price') !!}:</strong> {{ $puppy->price }} {!! __('puppies.fields.rub') !!}</p>
        </div>

        @if (Auth::check())
            @if (Auth::user()->hasRole('Сотрудник'))
                <div class="text-right">
                    <a class="button" href="/puppies/sell/{{$puppy->id}}">{!! __('puppies.buttons.sell') !!}</a>
                    <a class="button" href="/puppies/edit/{{$puppy->id}}">{!! __('puppies.buttons.edit') !!}</a>
                    <a class="button" href="/puppies/delete/{{$puppy->id}}">{!! __('puppies.buttons.delete') !!}</a>
                </div>
            @endif
        @endif
        <br>
    @endforeach
    <div class="pagination">
        {{ $puppies->links() }}
    </div>

@stop
