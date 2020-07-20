@csrf
<div class="row">
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Page Name</label>
            <input type="text" name="name" class="form-control" value="{{ isset($page) ? $page->name : '' }}" autocomplete="off">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta Keyword</label>
            <input type="text" name="meta_keyword" class="form-control" value="{{ isset($page) ? $page->meta_keywords : '' }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Page Description</label>
            <textarea name="des" cols="30" rows="10" class="form-control" value="{{ isset($page) ? $page->des : '' }}">{{ isset($page) ? $page  ->des : '' }}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta Description</label>
            <textarea name="meta_des" cols="30" rows="10" class="form-control" value="{{ isset($page) ? $page->meta_des : '' }}">{{ isset($page) ? $page  ->meta_des : '' }}</textarea>
        </div>
    </div>
</div>
