@extends('layouts.app')

@section('title')
    <h1>{!! __('puppies.titles.edit_puppy') !!}</h1>
@stop

@section('content')

    {!! Form::open(['url' => 'puppies/update/'.$puppy->id, 'class' => 'form-horizontal', 'files' => true]) !!}
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('breed_id') ? ' has-error' : '' }}">
        {!! Form::label('breed_id',  __('puppies.fields.breed').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            @foreach($breeds as $breed)
                {{ Form::radio('breed_id', $breed->id, $puppy->breed_id == $breed->id ? true : false)}} {{ App::isLocale('en') ? $breed->name_en : $breed->name_ru}}
                <br>
            @endforeach
        </div>
    </div>
    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
        {!! Form::label('gender', __('puppies.fields.gender').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {{ Form::radio('gender', '1', $puppy->gender == 1 ? true : false) }} {!! __('puppies.fields.genders.male') !!}<br>
            {{ Form::radio('gender', '0',  $puppy->gender == 0 ? true : false) }} {!! __('puppies.fields.genders.female') !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
        {!! Form::label('birthdate', __('goods.fields.birthdate').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::date('birthdate', $puppy->birthdate, ['class' => 'form-control', 'required']) !!}
            {!! $errors->has('birthdate') ? $errors->first('birthdate', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('male_id', __('puppies.fields.male').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::select('male_id', $males, null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('female_id', __('puppies.fields.female').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::select('female_id', $females, null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('color_ru') ? ' has-error' : '' }}">
        {!! Form::label('color_ru', __('puppies.fields.color').' (RU) ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('color_ru', $puppy->color_ru, ['class' => 'form-control']) !!}
            {!! $errors->has('color_ru') ? $errors->first('color_ru', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('color_en') ? ' has-error' : '' }}">
        {!! Form::label('color_en', __('puppies.fields.color').' (EN) ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('color_en', $puppy->color_en, ['class' => 'form-control']) !!}
            {!! $errors->has('color_en') ? $errors->first('color_en', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('notes_ru') ? ' has-error' : '' }}">
        {!! Form::label('notes_ru', __('puppies.fields.notes').' (RU) ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::textarea('notes_ru', $puppy->notes_ru, ['class' => 'form-control', 'style' => 'resize: vertical', 'rows' => '6']) !!}
            {!! $errors->has('notes_ru') ? $errors->first('notes_ru', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('notes_en') ? ' has-error' : '' }}">
        {!! Form::label('notes_en', __('puppies.fields.notes').' (EN) ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::textarea('notes_en', $puppy->notes_en, ['class' => 'form-control', 'style' => 'resize: vertical', 'rows' => '6']) !!}
            {!! $errors->has('notes_en') ? $errors->first('notes_en', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
        {!! Form::label('price', __('puppies.fields.price').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::number('price', $puppy->price, ['class' => 'form-control']) !!}
            {!! $errors->has('price') ? $errors->first('price', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
        {!! Form::label('picture', __('puppies.fields.photo').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::file('picture') !!}
            {!! $errors->has('picture') ? $errors->first('picture', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group">
        <div class="text-center">
            {!! Form::submit(__('puppies.buttons.edit'), ['class' => 'button']) !!}
        </div>
    </div>
    {!! Form::close() !!}

@stop