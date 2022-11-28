
<div class="post">
    <a class="post-img" href="{{route('post.slug', $post->slug)}}"><img src="{{!File::exists($post -> image) ? asset('storage/' . $post -> image) : asset('imgs/logo.svg') }}" alt=""></a>
    <div class="post-body">
        <div class="post-category">
            <a href="{{route('category.show', $post->category->name)}}">{{$post -> category -> name}}</a>
        </div>
        <h3 class="post-title"><a href="{{route('post.slug', $post->slug)}}">{{$post -> title}}</a></h3>
        <ul class="post-meta d-flex justify-content-between align-items-center">
            <li>{{$post ->created_at -> diffForHumans()}}</li>
            <div class="uk-inline">
                <button class="uk-button uk-button-secondary uk-button-small" type="button">شارك</button>
                <div uk-dropdown="mode: click" class="share">
                    <div>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{request()->path()}}"><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-twitter"></i></a>
                        <a href=""><i class="bi bi-telegram"></i></a>
                        <a href=""><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </ul>
    </div>
</div>
