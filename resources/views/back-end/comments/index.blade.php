@if (count($comments))
    <div class="card">
        <div class="card-header card-header-primary">
            <div class="row">
                <div class="col-md-8">
                    <h4 class="card-title ">{{ count($comments) }} Comment/s</h4>
                    <p class="card-category">Here you can add / edit / delete comments</p>
                </div>
            </div>
        </div>
        <table class="table" id="comments">
            <tbody>
                @foreach ($comments as $comment)
              <tr>
                <td>
                    <small>{{ $comment->user->name }}</small>
                        <p>{{ $comment->comment }}</p>
                        <small>{{ $comment->created_at }}</small>
                </td>
                <td class="td-actions text-right">
                    <button type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" onclick="event.preventDefault(); $(this).closest('tr').next('tr').slideToggle()" data-original-title="Edit comment">
                        <a href=""><i class="material-icons">edit</i></a>
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
              <tr style="display: none">
                  <td>
                    <div class="form-group bmd-form-group">
                        <div class="form-group">
                        <form action="{{ route('comment.update', $comment->id) }}" method="post">
                              {{ csrf_field() }}
                              @method("PATCH")
                        <input type="text" class="form-control" name="updateComment" value="{{ $comment->comment }}">
                        </div>
                        <input type="hidden" value="{{$video->id}}" name="video_id">
                        <button type="submit" class="btn btn-primary pull-right">Update Comment</button>
                        </form>
                    </div>
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    @endif