@csrf
<div class="row">
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Tag name</label>
            <input type="text" name="name" class="form-control" value="{{ isset($tag) ? $tag->name : '' }}" autocomplete="off">
        </div>
    </div>
</div>
