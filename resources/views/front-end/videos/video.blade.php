@extends('layouts.app')
<style>
    p .nc-icon, div .nc-icon {
        font-size: 12px;
        padding-right: 10px;
    }
</style>
@section('title')
    | {{ $video->name }}
@endsection

@section('content')
<div class="container">
    <div class="title">
        <h2 style="margin-top: 136px">{{ $video->name }}</h2>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @php
                $url = getYoutubeID($video->youtube_link)
            @endphp
            <iframe width="100%" height="500" src="https://www.youtube.com/embed/{{ $url }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
    <div class="row" style="margin-top: 35px">
        <div class="col-lg-3">
            <p><i class="nc-icon nc-circle-10"></i> {{ $video->user->name }}</p>
        </div>
        <div class="col-lg-5">
            <i class="nc-icon nc-calendar-60"></i> {{ $video->created_at }}
        </div>
        <div class="col-lg-4">
            <i class="nc-icon nc-single-copy-04"></i> <a class="badge badge-success" href="{{ route('frontend.category', $video->category->id) }}">{{ $video->category->name }}</a>
        </div>
    </div>
    <div class="row" style="margin-top: 15px">
        <div class="col-lg-6">
            <i class="nc-icon nc-settings"></i>
            @foreach ($video->skills as $skill)
                <a class="badge badge-primary" href="{{ route('frontend.skill', $skill->id) }}">{{ $skill->name }}</a>
            @endforeach
        </div>
        <div class="col-lg-6">
            <i class="nc-icon nc-tag-content"></i>
            @foreach ($video->tags as $tag)
                <a class="badge badge-danger" href="{{ route('frontend.tag', $tag->id) }}">{{ $tag->name }}</a>
            @endforeach
        </div>
    </div>
    <div class="row" style="margin-top: 15px">
        <div class="col-lg-12">
            <h5>Description</h5>
            <p>{{ $video->des }}</p>
        </div>
    </div>
    @if(auth()->user())
    <div  id="addcomments" class="row">
        <div class="col-lg-12"style="margin-top: 70px">
            <form method='post' action='{{ route('comments.create') }}'>
                @csrf
                <div class="form-group">
                    <textarea style="border:none; border-bottom:1px solid #BBB;border-radius:0" class="form-control" name="comment" id="" rows="1" placeholder='add a comment'></textarea>
                    @error('comment' )
                    <strong style="color: red; font-size: 12px; font-weight:bold">* {{ $message }}</strong>
                    @enderror
                    <input type="hidden" value="{{$video->id}}" name="video_id">
                </div>
                <button type="submit" class="btn btn-primary pull-right">Add comment</button>
            </form>
        </div>
    </div>
    @endif
    <div class="row">
        @if (count($video->comments))
            <div class="card card-nav-tabs" style="width: 100%; margin-top: 10px">
                <div id="comments" class="card-header card-header-danger">
                  Comments ({{ count($video->comments) }})
                </div>
                <ul class="list-group list-group-flush">
                @foreach ($video->comments as $comment)
                  <li class="list-group-item">
                    <div class="row">
                        <div class="col-lg-8">
                            <i class="nc-icon nc-chat-33"></i>
                            <h5 style="font-weight: 500; display:inline-block">
                                <a href="{{route('frontend.profile', ['id' => $comment->user->id, 'slug' => strToLower(trim(str_replace(' ','_' ,$comment->user->name)))])}}">
                                    {{ $comment->user->name }}
                                </a>
                            </h5>
                        </div>
                        <div class="col-lg-4 text-right">
                            <i class="nc-icon nc-calendar-60"></i><p style="font-size: 10px; display:inline-block">{{ $comment->created_at }}</p>
                        </div>
                    </div>
                    @if(auth()->user())
                    @if (($comment->user->id == auth()->user()->id) || (auth()->user()->user_status == 1))
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <button type="button" class="btn btn-info btn-round" onclick="event.preventDefault(); $(this).parent('div').parent('div').next('div').children('#hidden').slideToggle()">Edit</button>
                            <form style="display: inline" action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-round">Delete</button>
                            </form>
                        </div>
                    </div>
                    @endif
                    @endif
                    <div class="row">
                        <div class="col-lg-12">
                            <p>{{ $comment->comment }}</p>
                        </div>
                        <div id="hidden" class="col-lg-12" style="display: none">
                            <div class="form-group">
                                <form action="{{ route('comments.update', $comment->id) }}" method="post">
                                    {{ csrf_field() }}
                                    @method("PATCH")
                                    <textarea class="form-control" name="updateComment">{{ $comment->comment }}</textarea>
                                    <input type="hidden" value="{{$video->id}}" name="video_id">
                                    <button style="margin-top: 20px" type="submit" class="btn btn-primary pull-right">Update Comment</button>
                            </form>
                        </div>
                        </div>
                    </div>
                  </li>
                @endforeach
                </ul>
            </div>
    </div>
    @endif
</div>
@endsection
