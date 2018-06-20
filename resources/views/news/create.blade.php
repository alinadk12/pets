@extends('layouts.app')

@section('title')
    <h1>{!! __('news.titles.new') !!}</h1>
    @stop

@section('content')

    {!! Form::open(['url' => 'news/store', 'class' => 'form-horizontal', 'files' => true]) !!}
    {{ csrf_field() }}
    {!! Form::hidden('user_id', Auth::user()->id) !!}
    {!! Form::hidden('image', null) !!}
    <div class="form-group{{ $errors->has('title_ru') ? ' has-error' : '' }}">
        {!! Form::label('title_ru', __('news.fields.title').' (RU) ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('title_ru', old('title_ru'), ['class' => 'form-control']) !!}
            {!! $errors->has('title_ru') ? $errors->first('title_ru', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('title_en') ? ' has-error' : '' }}">
        {!! Form::label('title_en', __('news.fields.title').' (EN) ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('title_en', old('title_en'), ['class' => 'form-control']) !!}
            {!! $errors->has('title_en') ? $errors->first('title_en', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('text_ru') ? ' has-error' : '' }}">
        {!! Form::label('text_ru', __('news.fields.text').' (RU) ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::textarea('text_ru', old('text_ru'), ['class' => 'form-control', 'style' => 'resize: vertical', 'rows' => '6']) !!}
            {!! $errors->has('text_ru') ? $errors->first('text_ru', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('text_en') ? ' has-error' : '' }}">
        {!! Form::label('text_en', __('news.fields.text').' (EN) ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::textarea('text_en', old('text_en'), ['class' => 'form-control', 'style' => 'resize: vertical', 'rows' => '6']) !!}
            {!! $errors->has('text_en') ? $errors->first('text_en', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
        {!! Form::label('picture', __('news.fields.picture').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::file('picture', ['required']) !!}
            {!! $errors->has('picture') ? $errors->first('picture', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group">
        <div class="text-center">
            {!! Form::submit(__('news.buttons.create'), ['class' => 'button']) !!}
        </div>
    </div>
    {!! Form::close() !!}

@stop