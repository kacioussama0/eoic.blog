

<div class="card  border-0 mb-3 shadow-sm overflow-hidden" style="min-height: 300px;">

    <a href="{{route('post.slug', $post->slug())}}" class="post-img overflow-hidden" style="height: 200px"><img class="card-img-top w-100 " src="{{File::exists('storage/' . $post -> image) ? asset('storage/' . $post -> image) : asset('assets/imgs/logo.svg') }}" alt="" style=" ; object-fit: cover"></a>
    <div class="card-body">
        <h6 class="card-title text-truncate" style="word-spacing: 3px"><a href="{{route('post.slug', $post->slug())}}" >{{$post -> title()}}</a></h6>
        <p class="text-truncate text-muted" style="font-size: 14px">{!! Str::limit(strip_tags($post -> content()) ,100)!!}</p>
        <a href="{{url('category/'. $post -> category -> name)}}" class="badge bg-primary link-light">{{$post -> category -> name()}}</a>
    </div>

    <div class="card-footer bg-transparent d-flex justify-content-between align-items-center flex-row-reverse border-top-0" style="height: 60px">
        <div class="d-flex flex-row-reverse ms-1">
            <span style="" >
                  <button class="bg-transparent border-0" type="button" data-bs-toggle="collapse" data-bs-target="#post{{$post->id}}" aria-expanded="false" aria-controls="{{$post->id}}">
                    <i class="fa-regular fa-share ms-1 pe-auto fa-lg"></i>
                </button>

            </span>


            <div class="collapse py-0" id="post{{$post->id}}">
                <a href="https://www.facebook.com/sharer.php?u={{route('post.slug', $post->slug())}}" target="_blank" class="me-2" style="color: #4267B2"><i class="fa-brands fa-facebook fa-lg"></i></a>
                <a href="https://www.facebook.com/dialog/send?app_id=5303202981&display=popup&link={{route('post.slug', $post->slug())}}&redirect_uri={{route('post.slug', $post->slug())}}" class="me-2" style="color: #00B2FF"><i class="fa-brands fa-lg fa-facebook-messenger" ></i></a>
                <a href="#" class="me-2"><i class="fa-brands fa-whatsapp fa-lg" style="color: #25D366"></i></a>
                <a href="https://twitter.com/intent/tweet?text={{$post->title()}}&url={{route('post.slug', $post->slug())}}" target="_blank" class="me-2" style="color: #1DA1F2"><i class="fa-brands fa-twitter fa-lg"></i></a>
            </div>

        </div>


        <p class="card-text fs-6"><small class="text-muted">{{$post ->created_at -> diffForHumans()}}</small></p>


    </div>


</div>
