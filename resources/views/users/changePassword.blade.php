@extends('layouts.app')

@section('title')
    <h1>{!! __('users.titles.change_password') !!}</h1>
@stop

@section('content')

    {!! Form::open(['url' => '/changepassword/'.Auth::user()->id, 'class' => 'form-horizontal']) !!}
    {{ csrf_field() }}

    {!! Form::hidden('id', Auth::user()->id) !!}

    <div class="form-group{{ $errors->has('oldPassword') ? ' has-error' : '' }}">
        {!! Form::label('oldPassword', __('users.fields.old_password'), ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::password('oldPassword', ['class' => 'form-control']) !!}
            {!! $errors->has('oldPassword') ? $errors->first('oldPassword', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>

    <div class="form-group{{ $errors->has('newPassword') ? ' has-error' : '' }}">
        {!! Form::label('newPassword', __('users.fields.new_password'), ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::password('newPassword', ['class' => 'form-control']) !!}
            {!! $errors->has('newPassword') ? $errors->first('newPassword', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>

    <div class="form-group{{ $errors->has('newPassword') ? ' has-error' : '' }}">
        {!! Form::label('newPassword', __('users.fields.new_password_2'), ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::password('newPassword_confirmation', ['class' => 'form-control']) !!}
            {!! $errors->has('newPassword') ? $errors->first('newPassword', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group">
        <div class="text-center">
            {!! Form::submit(__('users.buttons.change_password'), ['class' => 'button']) !!}
        </div>
    </div>
    {!! Form::close() !!}

@stop