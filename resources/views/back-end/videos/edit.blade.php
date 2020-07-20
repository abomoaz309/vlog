@extends('back-end.layout.app')

@php
    $module = "Video";
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

    <div class="row">
        <div class="col-lg-8">
            <div class="card" style="padding: 20px">
                @if(count($errors))
                @include('layouts.errors')
            @endif
            <form action="{{ route('videos.update', $video->id) }}" method="POST" autocomplete="off"  enctype="multipart/form-data">
                <input autocomplete="off" name="hidden" type="text" style="display:none;">
                @method('PATCH')
                @include('back-end.videos.form')
                <button type="submit" class="btn btn-primary pull-right">Edit {{ $module }}</button>
                <div class="clearfix"></div>
            </form>
            </div>
        </div>
        <div class="col-lg-4">
            @php
                $url = getYoutubeID($video->youtube_link)
            @endphp
        <div class="card" style="padding: 20px">
            <iframe width="292" src="https://www.youtube.com/embed/{{ $url }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <br>
        <img width="292" height="300" src="{{  asset('storage/uploads/'.$video->image)  }}" alt="{{$video->name}}">
        </div>
        </div>
    </div>
    <div class="row">
    <form class="col-lg-8" action="{{ route('comment.create', $video->id) }}" method="POST">
            {{ csrf_field() }}
            @include('back-end.comments.create')
            <button type="submit" class="btn btn-primary pull-right">Add Comment</button>
        </form>
    </div>
    @include('back-end.comments.index')
@endsection