<a href="{{ $post->url }}" class="post-card post-card--half post-card--elevation">

    <div class="post-card__thumbnail post-card__thumbnail--half">
        <img class="post-card__img post-card__img--half" src="{{ $post->thumbnail }}" alt="">
    </div>

    <div class="post-card__meta post-meta">

        <div class="post-meta__category"><span>{{ $post->category }}</span></div>

        <div class="post-meta__stat"><span>{{ $post->published_date }}</span></div>

    </div>

    <div class="post-card__title post-card__title--large">
        <span>{{ $post->name }}</span>
    </div>

    <div class="post-card__additional post-card__additional--x-padding stat-with-icon">
        <span class="stat-with-icon__icon">
            <img src="{{ asset('static/images/slides.png') }}" alt="">
        </span>
        <span class="stat-with-icon__text">{{ $post->photos->count() }}</span>
    </div>

</a>
