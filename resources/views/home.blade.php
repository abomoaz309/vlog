@extends('layouts.app')

@section('title')
    @if (request()->has('search') && request()->get('search') != '')
        | {{request()->get('search')}}
    @else
    | Home
    @endif
@endsection

@section('content')
<div class="container">
    <div class="title">
        <h2 style="margin-top: 136px">Latest Videos</h2>
        @if (request()->has('search') && request()->get('search') != '')
        <p>
            <bold style="font-weight: bold; font-size: 12px">You are searching for <span style="color: red">{{request()->get('search')}}</span> |
                <a href="{{route('home')}}">Cancel</a>
            </bold>
        </p>
        @if($videos->count() == 0)
        <p style="font-weight: bold; color: red">
            Not results found !!
        </p>
       @endif
        @endif
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
