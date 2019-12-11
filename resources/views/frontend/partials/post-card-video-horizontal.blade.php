<div class="post-card post-card--video-horizontal">

    <div class="post-card__thumbnail post-card__thumbnail--video-horizontal">

        <a href="{{ $video->url }}" alt="{{ $video->title }}">
            <img class="post-card__img post-card__img--video-horizontal" src="{{ imageview('') }}" data-src="https://img.youtube.com/vi/{{ $video->youtube_id }}/hqdefault.jpg" alt="">
        </a>

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

            <div class="post-meta__category">
                <a href="{{ url('gallery/video') }}" alt="{{ $video->type }}">
                    <span>{{ $video->type }}</span>
                </a>
            </div>

            <div class="post-meta__stat"><span>{{ $video->published_date }}</span></div>

        </div>

        <a href="{{ $video->url }}" alt="{{ $video->title }}">
            <div class="post-card__title post-card__title--horizontal">
                <span>{{ $video->title }}</span>
            </div>
        </a>

        <div class="post-card__additional stat-with-icon">
            <span class="stat-with-icon__icon">
                <img src="{{ asset('static/images/clock.png') }}" alt="">
            </span>
        <span class="stat-with-icon__text">{{ $video->duration }}</span>
        </div>

    </div>

</div>
