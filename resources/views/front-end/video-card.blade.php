<div class="card" style="width: 20rem;">
<a href="{{ route('frontend.video', $video->id) }}">
  <img class="card-img-top" src="{{ asset('storage/uploads/'.$video->image) }}" alt="{{ $video->des }}" style="height: 15rem">
</a>
    <div class="card-body">
      <a href="{{ route('frontend.video', $video->id) }}">
        <p class="card-text">{{ $video->name }}</p>
      </a>
    <small>{{ $video->created_at }}</small>
    </div>
  </div>
