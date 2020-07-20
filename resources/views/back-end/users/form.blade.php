@csrf
<div class="row">
    <div class="col-md-3">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Username</label>
            <input type="text" name="username" class="form-control" value="{{ isset($user) ? $user->name : '' }}" autocomplete="off">
            @error('username' )
            <strong style="color: red; font-size: 12px; font-weight:bold">* {{ $message }}</strong>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Email address</label>
            <input type="email" name="email" class="form-control" value="{{ isset($user) ? $user->email : '' }}">
            @error('email' )
            <strong style="color: red; font-size: 12px; font-weight:bold">* {{ $message }}</strong>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Password</label>
            <input type="password" name="password" class="form-control">
            @error('password' )
            <strong style="color: red; font-size: 12px; font-weight:bold">* {{ $message }}</strong>
            @enderror
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">User Status</label>
            <select class="form-control" name="user_status">
                <option value="" disabled selected style="display: none">Select your option</option>
                <option value="1" {{ isset($user) && $user->user_status == 1 ? 'selected' : '' }}>admin</option>
                <option value="0" {{ isset($user) && $user->user_status == 0 ? 'selected' : '' }}>user</option>
            </select>
            @error('user_status' )
            <strong style="color: red; font-size: 12px; font-weight:bold">* {{ $message }}</strong>
            @enderror
        </div>
    </div>
</div>
