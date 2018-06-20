@extends('layouts.app')

@section ('title')

    <h1>
        @if ($dogs[0]->breed_id == 1)
            {!! __('dogs.titles.terriers') !!}
        @elseif ($dogs[0]->breed_id == 2)
            {!! __('dogs.titles.beagles') !!}
        @elseif ($dogs[0]->breed_id == 3)
            {!! __('dogs.titles.retrievers') !!}
        @elseif ($dogs[0]->breed_id == 4)
            {!! __('dogs.titles.chihuahua') !!}
        @endif
    </h1>

@stop

@section('content')

    @foreach($dogs as $dog)
        <hr>
        <div class="row-fluid">
            <div style="display: inline-block; vertical-align: top; margin: 10px">
                <img src="{{asset($dog->image)}}" alt="Картинка" class="img-rounded" height="180">
            </div>
            <div style="display: inline-block; vertical-align: top; margin: 10px">
                <p><strong>{!! __('dogs.fields.name') !!}:</strong> {{ $dog->name }}</p>
                <p><strong>{!! __('dogs.fields.gender') !!}:</strong>
                    @if ($dog->gender == 0) {!! __('dogs.fields.genders.female') !!}
                    @else {!! __('dogs.fields.genders.male') !!}
                    @endif</p>
                <p><strong>{!! __('dogs.fields.birthdate') !!}:</strong> {{ $dog->format_date}}</p>
                <p><strong>{!! __('dogs.fields.color') !!}:</strong> {{ $dog->color }}</p>
            </div>
        </div>
        <div class="col-md-12">
            <p><strong>{!! __('dogs.fields.description') !!}:</strong> {{ $dog->description }}</p>
        </div>
        @if (Auth::check())
            @if (Auth::user()->hasRole('Сотрудник') || Auth::user()->hasRole('Администратор'))
                <div class="text-right">
                    <a class="button" href="/dogs/edit/{{$dog->id}}">{!! __('dogs.buttons.edit') !!}</a>
                    <a class="button" href="/dogs/delete/{{$dog->id}}">{!! __('dogs.buttons.delete') !!}</a>
                </div>
            @endif
        @endif
        <br>
    @endforeach

@stop