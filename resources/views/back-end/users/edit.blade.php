@extends('back-end.layout.app')

@php
    $module = "User";
    $pageTitle = "Edit " . $module;
    $formTitle = "Edit " . $module;
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
        <form action="{{ route('users.update', $user->id) }}" method="POST" autocomplete="off">
            <input autocomplete="off" name="hidden" type="text" style="display:none;">
            @method('PATCH')
            @include('back-end.users.form')
            <button type="submit" class="btn btn-primary pull-right">Edit {{ $module }}</button>
            <div class="clearfix"></div>
        </form>
    </div>

@endsection
