@extends('layouts.app')

@section('title')
    <h1>{!! __('requests.titles.puppy_request') !!}</h1>
@stop

@section('content')

    {!! Form::open(['url' => '/request', 'class' => 'form-horizontal']) !!}
    {{ csrf_field() }}
    {!! Form::hidden('user_id', $user->id) !!}

    <div class="form-group{{ $errors->has('breed_id') ? ' has-error' : '' }}">
        {!! Form::label('breed_id', __('requests.fields.breed').' * ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            @foreach($breeds as $breed)
                {{ Form::radio('breed_id', $breed->id) }} {{ App::isLocale('en') ? $breed->name_en : $breed->name_ru }}<br>
            @endforeach
        </div>
    </div>

    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
        {!! Form::label('gender', __('requests.fields.gender').' * ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::radio('gender', '1') !!} {!! __('requests.fields.male') !!}<br>
            {!! Form::radio('gender', '0') !!} {!! __('requests.fields.female') !!}
        </div>
    </div>

    <div class="form-group{{ $errors->has('age_month') ? ' has-error' : '' }}">
        {!! Form::label('age_month', __('requests.fields.age').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('age_month', old('age_month'), ['class' => 'form-control']) !!}
            {!! $errors->has('age_month') ? $errors->first('age_month', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>

    <div class="form-group{{ $errors->has('max_price') ? ' has-error' : '' }}">
        {!! Form::label('max_price', __('requests.fields.max_price').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('max_price', old('max_price'), ['class' => 'form-control']) !!}
            {!! $errors->has('max_price') ? $errors->first('max_price', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>

    <div class="form-group{{ $errors->has('comments') ? ' has-error' : '' }}">
        {!! Form::label('comments', __('requests.fields.comments').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::textarea('comments', old('comments'), ['class' => 'form-control', 'style' => 'resize: vertical', 'rows' => '4']) !!}
            {!! $errors->has('comments') ? $errors->first('comments', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>

    <div class="form-group">
        <div class="text-center">
            {!! Form::submit(__('requests.buttons.send'), ['class' => 'button']) !!}
        </div>
    </div>
    {!! Form::close() !!}

@stop