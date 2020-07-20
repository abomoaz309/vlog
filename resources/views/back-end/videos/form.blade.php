@csrf
<div class="row">
    <div class="col-md-4">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Name</label>
            <input type="text" name="name" class="form-control" value="{{ isset($video) ? $video->name : '' }}" autocomplete="off">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta keywords</label>
            <input type="text" name="meta_keywords" class="form-control" value="{{ isset($video) ? $video->meta_keywords : '' }}" autocomplete="off">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta description</label>
            <input type="text" name="meta_des" class="form-control" value="{{ isset($video) ? $video->meta_des : '' }}" autocomplete="off">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Description</label>
            <textarea name="des" cols="30" rows="5" class="form-control">{{ isset($video) ? $video->des : '' }}</textarea>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 30px">
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Youtube link</label>
            <input type="url" name="youtube_link" class="form-control" value="{{ isset($video) ? $video->youtube_link : '' }}" autocomplete="off">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video status</label>
            <select class="form-control" name="published">
                <option value="" disabled selected style="display: none">Select your option</option>
                <option value="1" {{ isset($video) && $video->published == 1 ? 'selected' : '' }}>Published</option>
                <option value="0" {{ isset($video) && $video->published == 0 ? 'selected' : '' }}>Hidden</option>
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video category</label>
            <select class="selectpicker form-control" name="category" title="Video category">
                <option  value="" disabled selected style="display: none">Select your option</option>
                @foreach($categories as $category)
                    <option  value="{{ $category->id }}" {{ isset($video) && $video->category_id ===  $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                    @endforeach()
            </select>
        </div>
    </div>
</div >
<div class="row" style="margin-top: 30px">
    <div class="col-md-4">
        <div class="form-file-upload form-file-multiple">
            <input type="file" name="image">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video skill</label>
            <select class="form-control selectpicker" data-style="btn btn-info btn-simple" multiple  name="skill[]" title="Video skill" style="height: 100px">
                <option  value="" disabled selected  style="display: none">Select your option</option>
                @foreach($skills as $skill)
                    <option  value="{{ $skill->id }}" {{isset($video->skills) && in_array($skill->id, $selectedSkills) ? 'selected' : ''}} >{{ $skill->name }}</option>
                @endforeach()
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Tag</label>
            <select class="form-control selectpicker" data-style="btn btn-info btn-simple" multiple  name="tag[]" title="Video Tag" style="height: 100px">
                <option  value="" disabled selected  style="display: none">Select your option</option>
                @foreach($tags as $tag)
                    <option  value="{{ $tag->id }}" {{isset($video->tags) && in_array($tag->id, $selectedTags) ? 'selected' : ''}} >{{ $tag->name }}</option>
                @endforeach()
            </select>
        </div>
    </div>
</div>
