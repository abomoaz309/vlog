@extends('layouts.app')

@section('title')
    | {{ $user->name. " profile" }}
@endsection

@section('content')
<div class="container" style="margin-top: 200px">
    <div class="owner">
      <div class="avatar">
        <img src="/frontend/img/faces/clem-onojeghuo-3.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
      </div>
      <div class="name">
        <h4 class="title">{{$user->name}}
          <br>
        </h4>
        <h6 class="description">{{$user->email}}</h6>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 ml-auto mr-auto text-center">
        <br>
        @if(Auth::user()->id === $user->id && Auth::user())
        <a href="{{route('frontend.editprofile', ['id' => $user->id, 'slug' => strToLower(trim(str_replace(' ','_' ,$user->name)))])}}" class="btn btn-outline-default btn-round"><i class="fa fa-cog"></i> edit</a>
        @endif
    </div>
    </div>
    <br>
  </div>
@endsection
