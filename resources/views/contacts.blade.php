@extends('layouts.app')

@section('title')
    <h1>{!! __('contacts.contact_info') !!}</h1>
@stop

@section('content')
    <p><strong>{!! __('contacts.address') !!}:</strong> {!! __('contacts.street') !!}</p>
    <p><strong>{!! __('contacts.phone') !!}:</strong> 8 909 999 7874</p>
    <p><strong>E-mail:</strong> royalpet@hotmail.com</p>
    <p><strong>{!! __('contacts.mode') !!}:</strong> {!! __('contacts.schedule') !!}.</p>
    <h3><b>{!! __('contacts.on_map') !!}:</b></h3>
    <div id="map" style="width: 600px; height: 400px"></div>
@stop

@section('script')
    <script type="text/javascript">
        ymaps.ready(init);
        var myMap,
                myPlacemark;

        function init() {
            myMap = new ymaps.Map("map", {
                center: [56.51727157, 84.99273500],
                zoom: 16
            });

            myPlacemark = new ymaps.Placemark([56.51727157, 84.99273500], {
                hintContent: 'Royal Pet',
                balloonContent: 'Питомник домашних животных Royal Pet'
            });

            myMap.geoObjects.add(myPlacemark);
        }
    </script>
@stop