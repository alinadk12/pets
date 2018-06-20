@extends('layouts.app')

@section('title')
    <h1>{!! __('requests.titles.puppy_requests') !!}</h1>
@stop

@section('content')
    <table class="table table-bordered text16">
        <thead>
        <th>№</th>
        <th>{!! __('requests.table.login') !!}</th>
        <th>{!! __('requests.table.breed') !!}</th>
        <th>{!! __('requests.table.gender') !!}</th>
        <th>{!! __('requests.table.age') !!}</th>
        <th>{!! __('requests.table.max_price') !!}</th>
        <th>{!! __('requests.table.comment') !!}</th>
        <th>{!! __('requests.table.date') !!}</th>
        <th>{!! __('requests.table.answer') !!}</th>
        </thead>
        <tbody>
        @foreach($requests as $request)
            <tr>
                <td>{{ $request->rank }}</td>
                <td><a href="/profile/{{ $request->user_id }}">{{ $request->user_login }}</a></td>
                <td>{{ $request->breed_name }}</td>
                @if ($request->gender == 0)
                    <td>{!! __('requests.fields.female') !!}</td>
                @else
                    <td>{!! __('requests.fields.male') !!}</td>
                @endif
                <td>{{ $request->age_month }}</td>
                <td>{{ $request->max_price }}</td>
                <td>{{ $request->comments }}</td>
                <td>{{ $request->format_date }}</td>
                @if ($request->reply == 0)
                    <td align="center"><a href="/request/reply/{{ $request->id }}" data-toggle="tooltip" title="{!! __('requests.no_reply') !!}">
                            <img src="{{ asset('images/default/seraya-galochka.png') }}" width="25" height="25">
                        </a></td>
                @else
                    <td align="center"><img src="{{ asset('images/default/zelenaja-galochka.png') }}" width="25"
                                            height="25" data-toggle="tooltip" title="{!! __('requests.reply') !!}"></td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination">
        {{ $requests->links() }}
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