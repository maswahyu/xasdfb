<div class="post-card post-card--third post-card--elevation">

    <div class="post-card__thumbnail post-card__thumbnail--third">
        <a href="{{ $post->url }}" alt="{{ $post->name }}">
            <img class="post-card__img post-card__img--third" src="{{ imageview('') }}" data-src="{{ $post->thumbnail }}" alt="{{ $post->name }}">
        </a>
    </div>

    <div class="post-card__meta post-meta">

        <div class="post-meta__category">
            <a href="/gallery/photo" alt="Photo">
                <span>{{ $post->category }}</span>
            </a>
        </div>

        <div class="post-meta__stat"><span>{{ $post->published_date }}</span></div>

    </div>

    <a href="{{ $post->url }}" alt="{{ $post->name }}">
        <div class="post-card__title post-card__title--medium">
            <span>{{ $post->name }}</span>
        </div>
    </a>

    <div class="post-card__additional post-card__additional--x-padding stat-with-icon">
        <span class="stat-with-icon__icon">
            <img src="{{ asset('static/images/slides.png') }}" alt="">
        </span>
        <span class="stat-with-icon__text">{{ $post->photos->count() }}</span>
    </div>

</div>
