@extends('layouts.app')

@section('title')
    <h1>{!! __('dogs.titles.deleted_dogs') !!}</h1>
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
            @if (Auth::user()->hasRole('Сотрудник') || Auth::user()->hasRole('Администратор'))
                <div class="text-right">
                        <a class="button" href="/dogs/restore/{{$dog->id}}">{!! __('dogs.buttons.restore') !!}</a>
                        <a class="button" href="/dogs/forcedelete/{{$dog->id}}">{!! __('dogs.buttons.remove_db') !!}</a>
                </div>
            @endif
        @endif
        <br>
    @endforeach
    <div class="pagination">
        {{ $dogs->links() }}
    </div>

@stop