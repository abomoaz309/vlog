@extends('layouts.app')

@section('title')

@endsection

@section('content')
<div class="page-header section-dark" style="background-image: url('/frontend/img/antoine-barres.jpg')">
    <div class="filter"></div>
    <div class="content-center">
      <div class="container">
        <div class="title-brand">
          <h1 class="presentation-title">V-LOG</h1>
          <div class="fog-low">
            <img src="/frontend/img/fog-low.png" alt="">
          </div>
          <div class="fog-low right">
            <img src="/frontend/img/fog-low.png" alt="">
          </div>
        </div>
        <h2 class="presentation-subtitle text-center">Feel free to upload your videos</h2>
      </div>
    </div>
    <div class="moving-clouds" style="background-image: url('/frontend/img/clouds.png'); "></div>
  </div>
  <div id='messages' class="section landing-section">
    <div style="margin-top: -70px; margin-bottom: 30px" class="section-light container">
      <div class="text-center">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="title">Latest Videos</h2>
          <h5 class="description">These videos help you to become more professional in your life.</h5>
          <br>
        <a href="{{ route('home') }}" class="btn btn-danger btn-round">More videos</a>
        </div>
      </div>
      <br>
      <br>
      <div class="row">
        @foreach($videos as $video)
        <div class="col-md-4">
          <div class="card" style="width: 20rem;">
              <img class="card-img-top" src="{{ asset('storage/uploads/'.$video->image) }}" alt="{{ $video->des }}" style="height: 15rem">
                <div class="card-body">
                    <p class="card-text">{{ $video->name }}</p>
                <small style='display:block'>{{ $video->des }}</small>
                <a href="{{ route('frontend.video', $video->id) }}" class="btn btn-link btn-danger">See more</a>
                </div>
              </div>
        </div>
        @endforeach
      </div>
      {{ $videos->links() }}
      </div>
    </div>


    <div class="section section-dark text-center">
      <div class="container">
        <h2 class="title">Our Statistics</h2>
        <div class="row">
          <div class="col-md-4">
            <div class="card card-plain">
              <div class="card-body">
                <a href="#paper-kit">
                  <div class="author">
                    <h2 class="h1 card-title">{{ count($videoss) }}</h2>
                    <h4 class="card-category">Videos</h4>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-plain">
              <div class="card-body">
                <a href="#paper-kit">
                  <div class="author">
                    <h2 class="h1 card-title">{{ count($comments) }}</h2>
                    <h4 class="card-category">Comments</h4>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-plain">
              <div class="card-body">
                <a href="#paper-kit">
                  <div class="author">
                    <h2 class="h1 card-title">{{ count($categories) }}</h2>
                    <h4 class="card-category">Categories</h4>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


      <div class="container-fluid section-light" style='padding-bottom: 30px'>
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="text-center">Keep in touch?</h2>
        <form class="contact-form" method='post' action='{{ route('contact.store') }}'>
          @csrf
          @method('POST')
            <div class="row">
              <div class="col-md-6">
                <label>Name</label>
                <div class="form-group">
                  <input type="text" name='name' class="form-control @error('name') is-invalid @enderror " placeholder="Name">
                    @error('name')
                    <strong style="color: red; font-size: 12px; font-weight:bold">* {{ $message }}</strong>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <label>Email</label>
                <div class="form-group">
                  <input type="email" name='email' class="form-control @error('email') is-invalid @enderror " placeholder="Email">
                  @error('email')
                    <strong style="color: red; font-size: 12px; font-weight:bold">* {{ $message }}</strong>
                  @enderror
                </div>
              </div>
            </div>
            <label>Message</label>
            <textarea class="form-control @error('message') is-invalid @enderror " rows="4" name='message' placeholder="Tell us your thoughts and feelings..."></textarea>
            @error('message')
              <strong style="color: red; font-size: 12px; font-weight:bold">* {{ $message }}</strong>
            @enderror
            <div class="row">
              <div class="col-md-4 ml-auto mr-auto">
                <button type='submit' class="btn btn-danger btn-lg btn-fill">Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
