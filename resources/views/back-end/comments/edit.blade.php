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
                <input autocomplete="off" name="hidden" type="text" style="display:none;" value="{{$video->id}}">
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
    <table class="table">
        <tbody>
          <tr>
            <td>
                <div class="form-group">
                  <input type="text" class="form-control" name="comment" value="{{ $comment->comment }}">
                </div>
            </td>
            <td class="td-actions text-right">
                <button type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit {{$module}}">
                    <a href="{{ route('comment.edit', $comment->id) }}"><i class="material-icons">edit</i></a>
                </button>
              <form style="display: inline" action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove comment">
                    <i class="material-icons">close</i>
                </button>
            </form>
            </td>
          </tr>
        </tbody>
      </table>
@endsection