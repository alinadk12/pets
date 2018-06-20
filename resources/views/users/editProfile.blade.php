@extends('layouts.app')

@section('title')
    <h1>{!! __('users.titles.edit_profile') !!}</h1>
@stop

@section('content')

    {!! Form::open(['url' => '/edit/'.$user->id, 'class' => 'form-horizontal', 'files' => true]) !!}
    {{ csrf_field() }}

    {!! Form::hidden('id', $user->id) !!}
    {!! Form::hidden('image', $user->image) !!}

    <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
        {!! Form::label('surname', __('users.fields.surname').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('surname', $user->surname, ['class' => 'form-control', 'autofocus']) !!}
            {!! $errors->has('surname') ? $errors->first('surname', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {!! Form::label('name', __('users.fields.name').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
            {!! $errors->has('name') ? $errors->first('name', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>

    <div class="form-group{{ $errors->has('patronymic') ? ' has-error' : '' }}">
        {!! Form::label('patronymic', __('users.fields.patronymic').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('patronymic', $user->patronymic, ['class' => 'form-control', 'placeholder' => 'необязательно']) !!}
            {!! $errors->has('patronymic') ? $errors->first('patronymic', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>

    <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
        {!! Form::label('phone_number', __('users.fields.phone').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('phone_number', $user->phone_number, ['class' => 'form-control', 'maxlength' => '11']) !!}
            {!! $errors->has('phone_number') ? $errors->first('surname', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
        {!! Form::label('picture', __('users.fields.photo').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::file('picture') !!}
            {!! $errors->has('picture') ? $errors->first('image', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group">
        <div class="text-center">
            {!! Form::submit(__('users.buttons.edit'), ['class' => 'button']) !!}
        </div>
    </div>
    {!! Form::close() !!}

@stop