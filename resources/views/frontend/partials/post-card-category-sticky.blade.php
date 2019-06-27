<a href="{{ $post->url }}" class="post-card post-card--half post-card--elevation">

    <div class="post-card__thumbnail post-card__thumbnail--half">
        <img class="post-card__img post-card__img--half" src="{{ $post->thumbnail }}" alt="">
    </div>

    <div class="post-card__meta post-meta">

        <div class="post-meta__category"><span>{{ $post->category }}</span></div>

        <div class="post-meta__stat"><span>{{ $post->published_date }}</span></div>

        <div class="post-meta__stat"><span>{{ $post->view_count }} views</span></div>

    </div>

    <div class="post-card__title post-card__title--large">
        <span>{{ $post->title }}</span>
    </div>

</a>
