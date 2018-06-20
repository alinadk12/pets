@extends('layouts.app')

@section('title')
    <h1>{!! __('news.titles.edit') !!}</h1>
    @stop

@section('content')

    {!! Form::open(['url' => 'news/update/'.$new->id, 'class' => 'form-horizontal', 'files' => true]) !!}
    {{ csrf_field() }}
    {!! Form::hidden('image', $new->image) !!}
    {!! Form::hidden('user_id', $new->user_id) !!}
    <div class="form-group{{ $errors->has('title_ru') ? ' has-error' : '' }}">
        {!! Form::label('title_ru', __('news.fields.title').' (RU) ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('title_ru', $new->title_ru, ['class' => 'form-control']) !!}
            {!! $errors->has('title_ru') ? $errors->first('title_ru', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('title_en') ? ' has-error' : '' }}">
        {!! Form::label('title_en', __('news.fields.title').' (EN) ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('title_en', $new->title_en, ['class' => 'form-control']) !!}
            {!! $errors->has('title_en') ? $errors->first('title_en', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('text_ru') ? ' has-error' : '' }}">
        {!! Form::label('text_ru', __('news.fields.text').' (RU) ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::textarea('text_ru', $new->text_ru, ['class' => 'form-control', 'style' => 'resize: vertical', 'rows' => '6']) !!}
            {!! $errors->has('text_ru') ? $errors->first('text_ru', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('text_en') ? ' has-error' : '' }}">
        {!! Form::label('text_en', __('news.fields.text').' (EN) ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::textarea('text_en', $new->text_en, ['class' => 'form-control', 'style' => 'resize: vertical', 'rows' => '6']) !!}
            {!! $errors->has('text_en') ? $errors->first('text_en', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
        {!! Form::label('picture', __('news.fields.picture').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::file('picture') !!}
            {!! $errors->has('picture') ? $errors->first('picture', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group">
        <div class="text-center">
            {!! Form::submit(__('news.buttons.edit'), ['class' => 'button']) !!}
        </div>
    </div>
    {!! Form::close() !!}

@stop