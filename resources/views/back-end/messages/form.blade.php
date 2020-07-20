@csrf
<div class="row">
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Name</label>
            <input type="text" name="name" class="form-control" value="{{ isset($message) ? $message->name : '' }}" autocomplete="off">
            @error('name' )
    <strong style="color: red; font-size: 12px; font-weight:bold">* {{ $message }}</strong>
@enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Email</label>
            <input type="email" name="email" class="form-control" value="{{ isset($message) ? $message->email : '' }}">
            @error('email' )
    <strong style="color: red; font-size: 12px; font-weight:bold">* {{ $message }}</strong>
@enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Message</label>
            <textarea name="message" cols="30" rows="10" class="form-control" value="{{ isset($message) ? $message->message : '' }}">{{ isset($message) ? $message->message : '' }}</textarea>
            @error('message' )
    <strong style="color: red; font-size: 12px; font-weight:bold">* {{ $message }}</strong>
@enderror
        </div>
    </div>
</div>


