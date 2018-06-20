@extends('layouts.app')

@section('title')
    <h1>{!! __('goods.titles.new_good') !!}</h1>
@stop

@section('content')

    {!! Form::open(['url' => 'goods/store', 'class' => 'form-horizontal', 'files' => true]) !!}
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('name_ru') ? ' has-error' : '' }}">
        {!! Form::label('name_ru', __('goods.fields.name').' (RU) ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('name_ru', old('name_ru'), ['class' => 'form-control', 'autofocus']) !!}
            {!! $errors->has('name_ru') ? $errors->first('name_ru', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('name_en') ? ' has-error' : '' }}">
        {!! Form::label('name_en', __('goods.fields.name').' (EN) ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('name_en', old('name_en'), ['class' => 'form-control', 'autofocus']) !!}
            {!! $errors->has('name_en') ? $errors->first('name_en', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('type_id', __('goods.fields.good_type').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::select('type_id', $types, null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('brand_id', __('goods.fields.brand_name').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::select('brand_id', $brands, null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('description_ru') ? ' has-error' : '' }}">
        {!! Form::label('description_ru', __('goods.fields.description').' (RU) ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::textarea('description_ru', old('description_ru'), ['class' => 'form-control', 'style' => 'resize: vertical', 'rows' => '6']) !!}
            {!! $errors->has('description_ru') ? $errors->first('description_ru', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('description_en') ? ' has-error' : '' }}">
        {!! Form::label('description_en', __('goods.fields.description').' (EN) ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::textarea('description_en', old('description_en'), ['class' => 'form-control', 'style' => 'resize: vertical', 'rows' => '6']) !!}
            {!! $errors->has('description_en') ? $errors->first('description_en', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
        {!! Form::label('price', __('goods.fields.price').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::number('price', old('price'), ['class' => 'form-control']) !!}
            {!! $errors->has('price') ? $errors->first('price', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
        {!! Form::label('amount', __('goods.fields.amount').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::number('amount', old('amount'), ['class' => 'form-control']) !!}
            {!! $errors->has('amount') ? $errors->first('amount', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
        {!! Form::label('picture', __('goods.fields.picture').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::file('picture') !!}
            {!! $errors->has('picture') ? $errors->first('picture', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>
    <div class="form-group">
        <div class="text-center">
            {!! Form::submit(__('goods.buttons.create'), ['class' => 'button']) !!}
        </div>
    </div>
    {!! Form::close() !!}

@stop