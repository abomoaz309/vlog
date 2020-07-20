@extends('back-end.layout.app')

@section('title')
 Home Page
 @endsection

@section('content')
    @component('back-end.layout.header', ['nav_title' => 'Home Page'])@endcomponent

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">video_library</i>
              </div>
              <p class="card-category">Videos</p>
                <h3 class="card-title">{{count($videos)}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-warning">video_library</i>
                <a href="{{route('videos.index')}}" class="warning-link" style='font-weight: bold'>All videos</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">view_agenda</i>
              </div>
              <p class="card-category">Categories</p>
                <h3 class="card-title">{{count($categories)}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats text-success">
                <i class="material-icons">view_agenda</i>
                <a href="{{route('categories.index')}}" class="success-link" style='font-weight: bold'>All categories</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">build</i>
              </div>
              <p class="card-category">Skills</p>
                <h3 class="card-title">{{count($skills)}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats text-danger">
                <i class="material-icons">build</i>
                <a href="{{route('skills.index')}}" class="danger-link" style='font-weight: bold'>All skills</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">bookmark</i>
              </div>
              <p class="card-category">Tags</p>
            <h3 class="card-title">{{count($tags)}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats text-info">
                <i class="material-icons">bookmark</i>
                <a href="{{route('tags.index')}}" class="info-link" style='font-weight: bold'>All tags</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Latest Comments</h4>
              <p class="card-category">To view all comments on each video click
                <a style='text-decoration: underline' href="{{route('videos.index')}}">Here</a>
              </p>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>Name</th>
                  <th>Video</th>
                  <th>Comment</th>
                  <th>Date</th>
                  <th>Delete</th>
                </tr></thead>
                <tbody>
                  @foreach ($comments as $comment)
                  <tr>
                    <td>
                        <a href=" {{route('users.edit', $comment->user->id)}} ">{{$comment->user->name}}</a>
                    </td>
                    <td>
                        <a href=" {{route('videos.edit', $comment->video->id)}} ">{{$comment->video->name}}</a>
                    </td>
                    <td>{{$comment->comment}}</td>
                    <td>{{$comment->created_at}}</td>
                    <td>
                        <form style="display: inline" action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove comment">
                                <i class="material-icons">close</i>
                            </button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div>
                  {{$comments->links()}}
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
