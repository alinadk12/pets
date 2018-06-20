@extends('layouts.app')

@section('title')
    <h1>{!! __('users.titles.users') !!}</h1>
@stop

@section('content')

    <table class="table table-bordered text16">
        <thead>
        <tr>
            <th rowspan="2">№</th>
            <th rowspan="2">{!! __('users.fields.surname') !!}</th>
            <th rowspan="2">{!! __('users.fields.name') !!}</th>
            <th rowspan="2">{!! __('users.fields.login') !!}</th>
            <th class="text-center" colspan="3">{!! __('users.fields.roles') !!}</th>
            <th rowspan="2" colspan="2"></th>
        </tr>
        <tr>
            <th>{!! __('users.fields.role.user') !!}</th>
            <th>{!! __('users.fields.role.employee') !!}</th>
            <th>{!! __('users.fields.role.admin') !!}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr data-id="{{$user->id}}">
                <td>{{ $user->rank }}</td>
                <td><a href="/profile/{{ $user->id }}">{{ $user->surname }}</a></td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->login }}</td>
                {!! Form::open(['url' => '/users/editRoles']) !!}
                {!! csrf_field() !!}
                {!! Form::hidden('id', $user->id) !!}
                <td align="center">{!! Form::checkbox('user', '1', $user->user, ['class' => 'set-role', 'id' => '3']) !!}</td>
                <td align="center">{!! Form::checkbox('employee', '1', $user->employee, ['class' => 'set-role', 'id' => '2']) !!}</td>
                <td align="center">{!! Form::checkbox('admin', '1', $user->admin, ['class' => 'set-role', 'id' => '1']) !!}</td>
                <td align="center"> {!! Form::image(url('/images/default/edit.png'), 'edit', ['height' => '25', 'weight' => '25', 'data-toggle' => 'tooltip', 'title' => __('users.toggles.edit')]) !!}</td>
                {!! Form::close() !!}
                <td align="center"><a href="users/delete/{{ $user->id }}" data-toggle="tooltip" title="{!! __('users.toggles.delete') !!}">
                        <img src="{{asset('/images/default/delete.png') }}" height="25" width="25">
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
//            $('[data-toggle="tooltip"]').tooltip();

            $('.set-role').click(function(event) {

                //event.preventDefault();
                var userId = $(this).parents('tr').data('id');
                var roleId = $(this).prop('id');
                /*alert(userId);
                alert(roleId);*/

                $.ajax({
                    url : '/users/set/role/' + roleId + '/user/' + userId,
                    method : 'post',
                    dataType : 'json',
                    data : {
                        '_token' : $('meta[name="csrf-token"]').prop('content')
                    }
                }).done(function(data) {
                    if(data.success) {

                    } else {
                        //Старое состояние
                        $(this).prop('checked', !$(this).is(':checked'));
                    }
                });
            });
        })
    </script>

@stop