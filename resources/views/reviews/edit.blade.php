@extends('layouts.app')

@section('title')
    <h1>{!! __('reviews.titles.edit_review') !!}</h1>
@stop

@section('content')

    {!! Form::open(['url' => '/reviews/update', 'class' => 'form-horizontal']) !!}
    {{ csrf_field() }}

        {!! Form::hidden('id', $review->id) !!}

    <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
        {!! Form::label('text', __('reviews.fields.review').' ', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-9">
            {!! Form::textarea('text', $review->text, ['class' => 'form-control', 'style' => 'resize: vertical', 'rows' => '6']) !!}
            {!! $errors->has('text') ? $errors->first('text', '<p class="help-block">:message</p>') : ''  !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2 col-md-offset-9">
            {!! Form::submit(__('reviews.buttons.edit'), ['class' => 'button']) !!}
        </div>
    </div>

    {!! Form::close() !!}

@endsection