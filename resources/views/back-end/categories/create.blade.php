@extends('back-end.layout.app')

@php
    $module = "Category";
    $pageTitle = "Add " . $module;
    $formTitle = "Add " . $module;
    $formDesc = "Here you can add " . $module . " profile";
@endphp

@section('title')
    {{$pageTitle}}
@endsection

@section('content')
    @component('back-end.layout.header')
        @slot('nav_title')
            {{$pageTitle}}
        @endslot
    @endcomponent

    <div class="card-body">
        <form action="{{ route('categories.store') }}" method="POST">
            @include('back-end.categories.form')
            <button type="submit" class="btn btn-primary pull-right">Add {{ $module }}</button>
            <div class="clearfix"></div>
        </form>
    </div>
@endsection
