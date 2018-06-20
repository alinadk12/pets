@extends('layouts.app')

@section('title')
    <h1>{!! __('auth.titles.change_password') !!}</h1>
@stop

@section('content')

    {!! Form::open(['url' => '/password/reset', 'class' => 'form-horizontal']) !!}
    {{ csrf_field() }}

    <input type="hidden" name="token" value="{{ $token }}">
    {!! Form::hidden('token', $token) !!}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        {!! Form::label('email', __('auth.fields.enter_emails'), ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::email('email', old('email'), ['class' => 'form-control', 'required', 'autofocus']) !!}
            {!! $errors->has('email') ? $errors->first('email', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        {!! Form::label('password', __('auth.fields.password'), ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
            {!! $errors->has('password') ? $errors->first('password', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        {!! Form::label('password_confirmation', __('auth.fields.password'), ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::password('password_confirmation', ['class' => 'form-control', 'required']) !!}
            {!! $errors->has('password_confirmation') ? $errors->first('password_confirmation', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-6">
            {!! Form::submit(__('auth.buttons.change_passwords'), ['class' => 'button']) !!}
        </div>
    </div>
    {!! Form::close() !!}

@endsection
