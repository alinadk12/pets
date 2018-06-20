@extends('layouts.app')

@section('title')
    <h1>{!! __('auth.titles.recovery_password') !!}</h1>
@stop

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {!! Form::open(['url' => '/password/email', 'class' => 'form-horizontal']) !!}
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        {!! Form::label('email', __('auth.fields.enter_email'), ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::email('email', old('email'), ['class' => 'form-control', 'required', 'autofocus']) !!}
            {!! $errors->has('email') ? $errors->first('email', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-6">
            {!! Form::submit(__('auth.buttons.send_link'), ['class' => 'button']) !!}
        </div>
    </div>
    {!! Form::close() !!}

@endsection
