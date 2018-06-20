@extends('layouts.app')

@section('title')
    <h1>{!! __('dogs.titles.dogs') !!}</h1>
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
                <p><strong>{!! __('dogs.fields.breed') !!}:</strong> {{ $dog->breed_name }}</p>
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
            @if (Auth::user()->hasRole('Сотрудник'))
                <div class="text-right">
                    <a class="button" href="/dogs/edit/{{$dog->id}}">{!! __('dogs.buttons.edit') !!}</a>
                    <a class="button" href="/dogs/delete/{{$dog->id}}">{!! __('dogs.buttons.delete') !!}</a>
                </div>
            @endif
        @endif
        <p> </p>
        <hr>
        <br>
    @endforeach

    <div class="pagination">
        {{ $dogs->links() }}
    </div>

@stop