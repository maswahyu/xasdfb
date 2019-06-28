<a href="{{ $video->url }}" class="post-card post-card--video">

    <div class="post-card__thumbnail post-card__thumbnail--video">

    <img class="post-card__img post-card__img--video" src="https://img.youtube.com/vi/{{ $video->youtube_id }}/hqdefault.jpg"
            alt="">

        <div class="post-card__overlay"></div>

        <div class="post-card__vid-play">
            <svg class="svg-vid-play">
                <use xlink:href="{{ asset('static/images/sprites.svg') }}#vid-play"></use>
            </svg>
        </div>

        <div class="post-card__frame">
            <svg class="svg-video-frame">
                <use xlink:href="{{ asset('static/images/sprites.svg') }}#video-frame"></use>
            </svg>
        </div>

    <div class="post-card__time"><span>{{ $video->duration }}</span></div>

    </div>

    <div class="post-card__meta post-meta">

    <div class="post-meta__category"><span>{{ $video->type }}</span></div>

    <div class="post-meta__stat"><span>{{ $video->published_date }}</span></div>

    </div>

<div class="post-card__title"><span>{{ $video->title_limit }}</span></div>

</a>
