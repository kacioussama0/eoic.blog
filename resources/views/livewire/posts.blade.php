<div class="mt-5">
    <div class="row">
        @foreach($posts as $post)

            @if($post->title() != null )

                <div class="post post-row shadow-sm px-3">

                    <a class="post-img rounded" href="{{url('/posts/' . $post -> slug())}}"><img src="{{asset('storage/' . $post -> image)}}" alt=""></a>
                    <div class="post-body">

                        <h3 class="post-title"><a href="{{url('posts/' . $post  -> slug())}}">{{$post -> title()}}</a></h3>
                        <ul class="post-meta">
                            <li><a href="{{url('category/' . $post -> category -> name())}}">{{$post -> category -> name()}}</a></li>
                            <li>{{$post ->created_at -> diffForHumans()}}</li>
                        </ul>
                        <div>

                        </div>

                    </div>
                </div>
            @endif

        @endforeach


    </div>
    @if($visible)
        <button class="btn btn-lg btn-primary mx-auto my-3 rounded-0 d-block" wire:click="showMore">
            {{__('home.more')}}
        </button>
    @endif
    <p class="placeholder-glow" wire:loading>
        <span class="placeholder"></span>
        <span class="placeholder"></span>
        <span class="placeholder "></span>
        <span class="placeholder"></span>
        <span class="placeholder"></span>
    </p>

</div>
