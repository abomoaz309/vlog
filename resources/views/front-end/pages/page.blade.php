@extends('layouts.app')

@section('title')
    | {{ $page->name }}
@endsection

@section('content')
<div class="container" style='min-height: 550px'>
    <div class="row">
        <div class="title">
            <h2 style="margin-top: 136px">{{ $page->name }}</h2>
        </div>
    </div>
    <div class="row">
        <p>{{ $page->des }}</p>
    </div>
</div>
@endsection
