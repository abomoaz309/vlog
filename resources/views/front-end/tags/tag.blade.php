@extends('layouts.app')

@section('title')
    | {{ $tag->name }}
@endsection

@section('content')
<div class="container">
    <div class="title">
        <h2 style="margin-top: 136px">{{ $tag->name }} Videos</h2>
    </div>
    <div class="row">
        @foreach($videos as $video)
        <div class="col-lg-4">
              @include('front-end.video-card')
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-lg-12">
            {{ $videos->links() }}
        </div>
    </div>
</div>
@endsection
