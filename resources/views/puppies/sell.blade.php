@extends('layouts.app')

@section('title')
    <h1>{!! __('puppies.titles.sale_puppy') !!}</h1>
@stop

@section('content')

    {{ Form::open(['url' => 'puppies/postSell', 'class' => 'form-horizontal']) }}
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('puppy_id') ? ' has-error' : '' }}">
        {!! Form::label('puppy_id', __('puppies.fields.puppy_id').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            @if ($puppy)
                {{ Form::number('puppy_id', $puppy->id, ['class' => 'form-control', 'required']) }}
            @else
                {{ Form::number('puppy_id', old('puppy_id'), ['class' => 'form-control', 'required']) }}
            @endif
            {{ $errors->has('puppy_id') ? $errors->first('puppy_id', '<p class="help-block">:message</p>') : ''  }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('user_id', __('puppies.fields.user').' ', ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{  Form::select('user_id', $users, null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('employee_id', __('puppies.fields.employee').' ', ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{  Form::select('employee_id', $employees, null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <div class="text-center">
            {{ Form::submit(__('puppies.buttons.sell'), ['class' => 'button']) }}
        </div>
    </div>
    {{ Form::close() }}
@stop