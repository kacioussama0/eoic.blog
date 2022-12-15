

<div class="card  border-0 mb-3 shadow-sm overflow-hidden" style="min-height: 300px;">

    <a href="{{route('post.slug', $post->slug())}}"><img class="card-img-top w-100" src="{{!File::exists($post -> image) ? asset('storage/' . $post -> image) : asset('imgs/logo.svg') }}" alt="" style="height: 200px ; object-fit: cover"></a>
    <div class="card-body">
        <h6 class="card-title text-truncate" style="word-spacing: 3px"><a href="{{route('post.slug', $post->slug())}}" >{{$post -> title()}}</a></h6>
        <p class="text-truncate">{!! Str::limit(strip_tags($post -> content()) ,100)!!}</p>
    </div>

    <div class="card-footer bg-transparent d-flex justify-content-between align-items-center flex-row-reverse border-top-0" style="font-size: 25px;height: 55px">
        <div>
            <span style="font-size: 18px" >
                  <button class="bg-transparent border-0 ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#post{{$post->id}}" aria-expanded="false" aria-controls="{{$post->id}}">
                    <i class="fa-regular fa-share ms-1 pe-auto"></i>
                </button>

            </span>
        </div>

        <div class="collapse py-0" id="post{{$post->id}}">
            <a href="https://www.facebook.com/sharer.php?u={{route('post.slug', $post->slug())}}" target="_blank" class="me-2" style="color: #4267B2"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://www.facebook.com/dialog/send?app_id=5303202981&display=popup&link={{route('post.slug', $post->slug())}}&redirect_uri={{route('post.slug', $post->slug())}}" class="me-2" style="color: #00B2FF"><i class="fa-brands fa-facebook-messenger" ></i></a>
            <a href="#" class="me-2"><i class="fa-brands fa-whatsapp" style="color: #25D366"></i></a>
            <a href="https://twitter.com/intent/tweet?text={{$post->title()}}&url={{route('post.slug', $post->slug())}}" target="_blank" class="me-2" style="color: #1DA1F2"><i class="fa-brands fa-twitter"></i></a>
        </div>

        <p class="card-text fs-6"><small class="text-muted">{{$post ->created_at -> diffForHumans()}}</small></p>


    </div>


</div>
