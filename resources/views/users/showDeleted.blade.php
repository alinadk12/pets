@extends('layouts.app')

@section('title')
    <h1>{!! __('users.titles.delete_users') !!}</h1>
@stop

@section('content')

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>№</th>
            <th>{!! __('users.fields.surname') !!}</th>
            <th>{!! __('users.fields.name') !!}</th>
            <th>{!! __('users.fields.login') !!}</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->rank }}</td>
                <td><a href="/profile/{{ $user->id }}">{{ $user->surname }}</a></td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->login }}</td>

                <td align="center"><a href="/users/restore/{{ $user->id }}" data-toggle="tooltip" title="{!! __('users.toggles.restore') !!}">
                        <img src="{{asset('/images/default/undelete.png') }}" height="30" width="30">
                    </a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination">
        {{ $users->links() }}
    </div>

@stop

@section('script')

    <script>
        $(function () {
            // инициализировать все элементы на страницы, имеющих атрибут data-toggle="tooltip", как компоненты tooltip
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

@stop