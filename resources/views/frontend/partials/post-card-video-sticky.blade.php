<a href="{{ url('video/detail/'.$video->slug) }}" class="post-card post-card--video-highlight" alt="{{ $video->title }}">

        <div class="post-card__thumbnail post-card__thumbnail--video-highlight">

            <img class="post-card__img post-card__img--video-highlight"
        src="https://img.youtube.com/vi/{{ $video->youtube_id }}/hqdefault.jpg" alt="">

            <div class="post-card__overlay"></div>

            <div class="post-card__vid-play">
                <svg class="svg-vid-play svg-vid-play--large">
                    <use xlink:href="{{ asset('static/images/sprites.svg') }}#vid-play"></use>
                </svg>
            </div>

            <div class="post-card__frame">
                <svg class="svg-video-frame svg-video-frame--large">
                    <use xlink:href="{{ asset('static/images/sprites.svg') }}#video-frame-large"></use>
                </svg>
            </div>

        <div class="post-card__time post-card__time--large"><span>{{ $video->duration }}</span></div>

        </div>

    </a>
