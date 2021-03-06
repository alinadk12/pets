@extends('layouts.app')

@section('title')
    <h1>{!! __('dogs.titles.edit_dog') !!}</h1>
@stop

@section('content')

    {!! Form::open(['url' => 'dogs/update/'.$dog->id, 'class' => 'form-horizontal']) !!}
    {{ csrf_field() }}
    {!! Form::hidden('image', $dog->image) !!}
    <div class="form-group{{ $errors->has('name_ru') ? ' has-error' : '' }}">
        {!! Form::label('name_ru',  __('dogs.fields.name').' (RU) ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('name_ru', $dog->name_ru, ['class' => 'form-control']) !!}
            {!! $errors->has('name_ru') ? $errors->first('name_ru', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('name_en') ? ' has-error' : '' }}">
        {!! Form::label('name_en', __('dogs.fields.name').' (EN) ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('name_en', $dog->name_en, ['class' => 'form-control']) !!}
            {!! $errors->has('name_en') ? $errors->first('name_en', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('breed_id') ? ' has-error' : '' }}">
        {!! Form::label('breed_id', __('dogs.fields.breed').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            @foreach($breeds as $breed)
                {{ Form::radio('breed_id', $breed->id, ($breed->id == $dog->breed_id) ? true : false )}} {{App::isLocale('en') ? $breed->name_en : $breed->name_ru}}
                <br>
            @endforeach
        </div>
    </div>
    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
        {!! Form::label('gender', __('dogs.fields.gender').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {{ Form::radio('gender', '1', ($dog->gender == 1) ? true : false ) }} {!! __('dogs.fields.genders.male') !!}<br>
            {{ Form::radio('gender', '0', ($dog->gender == 0) ? true : false ) }} {!! __('dogs.fields.genders.female') !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
        {!! Form::label('birthdate', __('dogs.fields.birthdate').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::date('birthdate', $dog->birthdate, ['class' => 'form-control', 'required']) !!}
            {!! $errors->has('birthdate') ? $errors->first('birthdate', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('color_ru') ? ' has-error' : '' }}">
        {!! Form::label('color_ru', __('dogs.fields.color').' (RU) ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('color_ru', $dog->color_ru, ['class' => 'form-control']) !!}
            {!! $errors->has('color_ru') ? $errors->first('color_ru', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('color_en') ? ' has-error' : '' }}">
        {!! Form::label('color_en', __('dogs.fields.color').' (EN) ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('color_en', $dog->color_en, ['class' => 'form-control']) !!}
            {!! $errors->has('color_en') ? $errors->first('color_en', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('description_ru') ? ' has-error' : '' }}">
        {!! Form::label('description_ru', __('dogs.fields.description').' (RU) ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::textarea('description_ru', $dog->description_ru, ['class' => 'form-control', 'style' => 'resize: vertical', 'rows' => '6']) !!}
            {!! $errors->has('description_ru') ? $errors->first('description_ru', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('description_en') ? ' has-error' : '' }}">
        {!! Form::label('description_en', __('dogs.fields.description').' (EN) ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::textarea('description_en', $dog->description_en, ['class' => 'form-control', 'style' => 'resize: vertical', 'rows' => '6']) !!}
            {!! $errors->has('description_en') ? $errors->first('description_en', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
        {!! Form::label('picture', __('dogs.fields.photo').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::file('picture') !!}
            {!! $errors->has('picture') ? $errors->first('picture', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group">
        <div class="text-center">
            {!! Form::submit(__('dogs.buttons.edit'), ['class' => 'button']) !!}
        </div>
    </div>
    {!! Form::close() !!}

@stop