@csrf
<div class="row">
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Category Name</label>
            <input type="text" name="name" class="form-control" value="{{ isset($category) ? $category->name : '' }}" autocomplete="off">
            @error('name' )
            <div style="color: red; font-size: 12px; font-weight:bold">* {{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta Keyword</label>
            <input type="text" name="meta_keyword" class="form-control" value="{{ isset($category) ? $category->meta_keywords : '' }}">
            @error('meta_keyword' )
            <div style="color: red; font-size: 12px; font-weight:bold">* {{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta Description</label>
            <textarea name="meta_des" cols="30" rows="10" class="form-control" value="{{ isset($category) ? $category->meta_des : '' }}">{{ isset($category) ? $category->meta_des : '' }}</textarea>
            @error('meta_des' )
    <div style="color: red; font-size: 12px; font-weight:bold">* {{ $message }}</div>
    @enderror
        </div>
    </div>
</div>
