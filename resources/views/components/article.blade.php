

<div class="card border rounded-0  mb-3 shadow-sm" style="height: 300px;">
    <a href="{{route('post.slug', $post->slug)}}"><img class="card-img-top" src="{{!File::exists($post -> image) ? asset('storage/' . $post -> image) : asset('imgs/logo.svg') }}" alt="" style="height: 200px ; object-fit: cover"></a>
    <div class="card-body">
        <h6 class="card-title text-truncate" style="word-spacing: 3px"><a href="{{route('post.slug', $post->slug)}}" >{{$post -> title}}</a></h6>
        <p class="card-text"><small class="text-muted">{{$post ->created_at -> diffForHumans()}}</small></p>
    </div>

</div>
