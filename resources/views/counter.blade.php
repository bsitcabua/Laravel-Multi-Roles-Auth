@extends('shared.layouts.master')


@section('custom_css')
    @livewireStyles
@endsection

{{-- Title --}}
@section('title','Livewire Counter')

@section('content')
    @livewire('counter')
@endsection

@section('custom_js_plugin')
    @livewireScripts
@endsection