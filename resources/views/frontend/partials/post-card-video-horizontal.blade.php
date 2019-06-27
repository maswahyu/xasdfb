<a href="{{ $video->url }}" class="post-card post-card--video-horizontal">

    <div class="post-card__thumbnail post-card__thumbnail--video-horizontal">

        <img class="post-card__img post-card__img--video-horizontal"
            src="https://img.youtube.com/vi/{{ $video->yt_id }}/hqdefault.jpg" alt="">

        <div class="post-card__overlay"></div>

        <div class="post-card__vid-play">
            <svg class="svg-vid-play">
                <use xlink:href="{{ asset('static/images/sprites.svg') }}#vid-play"></use>
            </svg>
        </div>

        <div class="post-card__frame">
            <svg class="svg-video-frame svg-video-frame--small">
                <use xlink:href="{{ asset('static/images/sprites.svg') }}#video-frame"></use>
            </svg>
        </div>

    </div>

    <div class="post-card__info">

        <div class="post-card__meta post-meta">

            <div class="post-meta__category"><span>{{ $video->category }}</span></div>

            <div class="post-meta__stat"><span>{{ $video->published_date }}</span></div>

        </div>

        <div class="post-card__title post-card__title--horizontal">
            <span>{{ $video->title }}</span>
        </div>

        <div class="post-card__additional stat-with-icon">
            <span class="stat-with-icon__icon">
                <img src="{{ asset('static/images/clock.png') }}" alt="">
            </span>
        <span class="stat-with-icon__text">{{ $video->duration }}</span>
        </div>

    </div>

</a>
