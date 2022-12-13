
<style>

    .ticker {
        display: flex;
        flex-wrap: wrap;
        width: 80%;
        height: 60px;
        margin: 0 auto;
    }
    .news {
        width: 76%;
        background: #cc4444;
        padding: 0 2%;
    }
    .title {
        width: 20%;
        text-align: center;
        background: #c81c1c;
        position: relative;
    }
    .title:after {
        position: absolute;
        content: "";
        right: -16%;
        border-left: 20px solid #c81c1c;
        border-top: 33px solid transparent;
        border-right: 20px solid transparent;
        border-bottom: 33px solid transparent;
        top: 0;
    }
    .title h5 {
        font-size: 18px;
        margin: 8% 0;
    }
    .news marquee {
        font-size: 18px;
    }
</style>

<div class="ticker">
    <div class="title"><h5>Breaking News</h5></div>
    <div class="news">
        <marquee>
            @foreach($news_titles as $title)
                <p>{{$title->name}}</p>
            @endforeach
        </marquee>
    </div>
</div>
