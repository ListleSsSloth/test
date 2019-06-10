@extends('layout')

@section('title')
    {{$url_data['page_title']}}
@endsection

@section('content')
    <h1><a href="/">Two Window Component</a></h1>

    <div id="vue-app">
        <two-window-component :vuedata="{{json_encode($url_data['vue_component_data'])}}"></two-window-component>
    </div>
@endsection