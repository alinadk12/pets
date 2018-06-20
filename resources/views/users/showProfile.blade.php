@extends('layouts.app')

@section('title')
    <h1>{!! __('users.titles.profile') !!}</h1>
@stop

@section('content')

    <div class="col-md-5">
        <img src="{{ asset($user->image ? $user->image : 'images/default/avatar.png') }}" alt="avatar" height="200">
    </div>
    <div class="col-md-6" style="margin-top: 25px">
        <p><strong>{!! __('users.fields.surname') !!}:</strong> {{ $user->surname }}</p>
        <p><strong>{!! __('users.fields.name') !!}:</strong> {{ $user->name }}</p>
        @if($user->patronymic)
            <p><strong>{!! __('users.fields.patronymic') !!}:</strong> {{ $user->patronymic }}</p>
        @endif
        <p><strong>E-mail:</strong> {{ $user->email }}</p>
        <p><strong>{!! __('users.fields.login') !!}:</strong> {{ $user->login }}</p>
        <p><strong>{!! __('users.fields.phone') !!}:</strong> {{ $user->phone_number }}</p>
    </div>
@stop