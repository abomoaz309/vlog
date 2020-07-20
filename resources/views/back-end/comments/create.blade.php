<div class="form-group bmd-form-group">
    <label class="bmd-label-floating">Add a comment</label>
    <textarea name="comment" class="form-control"></textarea>
    <input type="hidden" value="{{$video->id}}" name="video_id">
    @error('comment' )
    <div style="color: red; font-size: 12px">* {{ $message }}</div>
    @enderror
</div>