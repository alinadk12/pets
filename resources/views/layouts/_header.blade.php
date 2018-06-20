<div class="main-background row min-width">
    <div class="col-md-8 col-md-offset-2">
        <div class="col-md-8 logo">
            <a href="/"><img src="{{ asset('images/default/logo.png') }}" id="logo" alt="LOGO" height="150" width="400"></a>
        </div>
        @if (Auth::check())
            <div class="col-md-2 col-md-offset-2 login-after">
                <div class="text-right dropdown login">
                    <a href="/profile/{{Auth::user()->id}}" class="dropdown-toggle text-underline text20"
                       data-toggle="dropdown"><b>{{Auth::user()->login}}</b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/logout') }}">{!! __('header.exit') !!}</a></li>
                        @if (Auth::user()->hasRole('Пользователь'))
                            <li><a href="/request/{{ Auth::user()->id }}">{!! __('header.order_puppy') !!}</a></li>
                        @endif
                        <li><a href="/edit/{{ Auth::user()->id }}">{!! __('header.edit') !!}</a></li>
                        <li><a href="/changepassword/{{ Auth::user()->id }}">{!! __('header.change_password') !!}</a></li>
                        <li><a href="/delete/account/{{ Auth::user()->id }}">{!! __('header.delete_account') !!}</a></li>
                    </ul>
                    <img src="{{ asset(Auth::user()->image ? Auth::user()->image : 'images/default/avatar.png')}}"
                         class="img-circle" height="50px">
                </div>
            </div>
        @else
            <div class="col-md-4">
                @include('auth.login')
            </div>
        @endif
        {!! Form::open(['url' => '/change_lang', 'class' => 'form-horizontal']) !!}
        {{ csrf_field() }}
        <div class="onoffswitch ">
            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch"  onchange="this.form.submit()" {!! App::isLocale('en') ? 'checked' : '' !!}>
            <label class="onoffswitch-label" for="myonoffswitch">
                <span class="onoffswitch-inner"></span>
                <span class="onoffswitch-switch"></span>
            </label>
        </div>
        {!! Form::close() !!}
    </div>
</div>