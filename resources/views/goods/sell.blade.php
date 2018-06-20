@extends('layouts.app')

@section('title')
    <h1>{!! __('goods.titles.sell_good') !!}</h1>
@stop

@section('content')

    {{ Form::open(['url' => 'goods/postSell', 'class' => 'form-horizontal']) }}
    {{ csrf_field() }}
    <div class="form-group">
        {!! Form::label('good_id', __('goods.fields.good').' ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::select('good_id', $goods, null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('user_id', __('goods.fields.user').' ', ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{  Form::select('user_id', $users, null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('employee_id', __('goods.fields.employee').' ', ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{  Form::select('employee_id', $employees, null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <div class="text-center">
            {{ Form::submit(__('goods.buttons.sell'), ['class' => 'button']) }}
        </div>
    </div>
    {{ Form::close() }}

@stop