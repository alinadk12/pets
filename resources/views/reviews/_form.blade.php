{!! Form::open(['url' => '/reviews', 'class' => 'form-horizontal']) !!}
{{ csrf_field() }}

@if ($user)
    {!! Form::hidden('user_id', $user->id) !!}
@endif

<div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
    {!! Form::label('text', __('reviews.fields.review').' ', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('text', old('text'), ['class' => 'form-control', 'style' => 'resize: vertical', 'rows' => '6']) !!}
        {!! $errors->has('text') ? $errors->first('text', '<p class="help-block">:message</p>') : ''  !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-2 col-md-offset-9">
        {!! Form::submit(__('reviews.buttons.send_review'), ['class' => 'button']) !!}
    </div>
</div>

{!! Form::close() !!}