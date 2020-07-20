@csrf
<div class="row">
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Skill name</label>
            <input type="text" name="name" class="form-control" value="{{ isset($skill) ? $skill->name : '' }}" autocomplete="off">
        </div>
    </div>
</div>
