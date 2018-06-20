{!! Form::open(['action' => 'Auth\LoginController@authenticate', 'class' => 'form-horizontal']) !!}
{{ csrf_field() }}

<div class="login">
    <div class="form-group {{$errors->has('email') ? 'has-error' : false}}">
        {!! Form::label('email', 'Email: ', ['class' => 'col-sm-2 control-label text16']) !!}
        <div class="col-sm-10">
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'e-mail']) !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('password') ? 'has-error' : false }}">
        {!! Form::label('password', __('auth.fields.password'), ['class' => 'col-sm-2 control-label text16']) !!}
        <div class="col-sm-10">
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'пароль']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox text16">
                <label>
                    {!! Form::checkbox('remember', 'true') !!} {!! __('auth.remember_me') !!}
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit(__('auth.buttons.enter'), ['class' => 'button']) !!}
            <a href="{{ url('/register') }}" class="btn btn-link text-underline">{!! __('auth.register') !!}</a>
            <a href="{{ url('/password/reset') }}" class=" btn-link text-underline">{!! __('auth.forgot_password') !!}</a>
        </div>
        <div class="col-sm-offset-8 col-sm-10">
        </div>
    </div>
</div>

{!! Form::close() !!}

