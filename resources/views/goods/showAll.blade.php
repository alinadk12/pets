@extends('layouts.app')

@section('title')
    <h1>{!! __('goods.titles.all_goods') !!}</h1>
@stop

@section('content')

    @foreach($goods as $good)
        <hr>
        <div class="row-fluid">
            <div style="display: inline-block; vertical-align: top; margin: 10px">
                <img src="{{asset($good->image)}}" alt="image" class="img-rounded" height="150">
            </div>
            <div style="display: inline-block; vertical-align: top; margin: 10px">
                <p><strong>{!! __('goods.fields.name') !!}:</strong> {{ $good->name }}</p>
                <p><strong>{!! __('goods.fields.type') !!}:</strong> {{ $good->good_type }}</p>
                <p><strong>{!! __('goods.fields.brand') !!}:</strong> {{ $good->good_brand }}</p>
                <p><strong>{!! __('goods.fields.price') !!}:</strong> {{ $good->price}} {!! __('goods.fields.rub') !!}.</p>
                <p><strong>{!! __('goods.fields.in_stock') !!}:</strong> {{ $good->amount }}</p>
            </div>
        </div>
        <div class="col-md-12">
            <p><strong>{!! __('goods.fields.description') !!}:</strong> {{ $good->description }}</p>
        </div>
        @if (Auth::check())
            @if (Auth::user()->hasRole('Сотрудник'))
                <div class="text-right">
                    <a class="button" href="/goods/edit/{{$good->id}}">{!! __('goods.buttons.edit') !!}</a>
                    <a class="button" href="/goods/delete/{{$good->id}}">{!! __('goods.buttons.delete') !!}</a>
                </div>
            @endif
        @endif
        <br>
    @endforeach
    <div class="pagination">
        {{ $goods->links() }}
    </div>

@stop