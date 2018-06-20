@extends('layouts.app')

@section('title')
    <h1>{!! __('auth.titles.register') !!}</h1>
@stop

@section('content')


    <div >

        {!! Form::open(['url' => '/register', 'class' => 'form-horizontal', 'files' => true]) !!}
        {{ csrf_field() }}
        {!! Form::hidden('image', null) !!}
        <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
            {!! Form::label('surname', __('auth.fields.surname'), ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('surname', old('surname'), ['class' => 'form-control', 'autofocus']) !!}
                {!! $errors->has('surname') ? $errors->first('surname', '<p class="help-block">:message</p>') : ''  !!}
            </div>
        </div>

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', __('auth.fields.name'), ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                {!! $errors->has('name') ? $errors->first('name', '<p class="help-block">:message</p>') : ''  !!}
            </div>
        </div>

        <div class="form-group{{ $errors->has('patronymic') ? ' has-error' : '' }}">
            {!! Form::label('patronymic', __('auth.fields.patronymic'), ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('patronymic', old('patronymic'), ['class' => 'form-control', 'placeholder' => 'необязательно']) !!}
                {!! $errors->has('patronymic') ? $errors->first('patronymic', '<p class="help-block">:message</p>') : ''  !!}
            </div>
        </div>

        <div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">
            {!! Form::label('login', __('auth.fields.login'), ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('login', old('login'), ['class' => 'form-control']) !!}
                {!! $errors->has('login') ? $errors->first('login', '<p class="help-block">:message</p>') : ''  !!}
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::label('email', 'Email ', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                {!! $errors->has('email') ? $errors->first('email', '<p class="help-block">:message</p>') : ''  !!}
            </div>
        </div>

        <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
            {!! Form::label('phone_number', __('auth.fields.phone'), ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('phone_number', old('phone_number'), ['class' => 'form-control', 'maxlength' => '11']) !!}
                {!! $errors->has('phone_number') ? $errors->first('phone_number', '<p class="help-block">:message</p>') : ''  !!}
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::label('password', __('auth.fields.password'), ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::password('password', ['class' => 'form-control']) !!}
                {!! $errors->has('password') ? $errors->first('password', '<p class="help-block">:message</p>') : ''  !!}
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::label('password', __('auth.fields.repeat_password'), ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                {!! $errors->has('password') ? $errors->first('password', '<p class="help-block">:message</p>') : ''  !!}
            </div>
        </div>

        <div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
            {!! Form::label('picture', __('auth.fields.photo'), ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::file('picture') !!}
                {!! $errors->has('picture') ? $errors->first('picture', '<p class="help-block">:message</p>') : ''  !!}
            </div>
        </div>

        <div class="form-group text-center">
            {!! Form::submit(__('auth.buttons.register'), ['class' => 'button']) !!}
        </div>
        {!! Form::close() !!}
    </div>


@endsection
