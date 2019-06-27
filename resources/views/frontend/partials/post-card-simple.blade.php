<a href="{{ $post->url }}" class="post-card post-card--simple">

    <div class="post-card__thumbnail">
        <img class="post-card__img" src="{{ $post->thumbnail }}" alt="">
    </div>

    <div class="post-card__meta post-meta">

    <div class="post-meta__category"><span>{{ $post->category }}</span></div>

    <div class="post-meta__stat"><span>{{ $post->published_date }}</span></div>

        <div class="post-meta__stat"><span>{{ $post->view_count }} views</span></div>

    </div>

<div class="post-card__title"><span>{{ $post->title }}</span></div>

</a>
