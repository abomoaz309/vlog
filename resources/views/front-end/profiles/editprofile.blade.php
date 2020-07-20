@extends('layouts.app')

@section('title')
    | edit {{$user->name}} profile
@endsection

@section('content')
<div class="container">
    <form style="min-height: 450px" action="{{ route('frontend.updateprofile', ['id' => $user->id, 'slug' => strToLower(trim(str_replace(' ','_' ,$user->name)))]) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="row" style="margin-top: 90px;">
            <div class="col-md-4">
                <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Username</label>
                    <input type="text" name="username" class="form-control" value="{{ isset($user) ? $user->name : '' }}" autocomplete="off">
                    @error('username' )
                    <strong style="color: red; font-size: 12px; font-weight:bold">* {{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="col-md-5">
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
        </div>
        <button type='submit' class='btn btn-primary'>Edit profile</button>
    </form>
</div>
@endsection
