<a href="{{ $post->url }}" class="post-card post-card--simple" alt="{{ $post->title }}">

    <div class="post-card__thumbnail">
        <img class="post-card__img" src="{{ $post->thumbnail }}" alt="{{ $post->title }}">
    </div>

    <div class="post-card__meta post-meta">

    <div class="post-meta__category"><span>{{ $post->category_name }}</span></div>

    <div class="post-meta__stat"><span>{{ $post->published_date }}</span></div>

        <div class="post-meta__stat"><span>{{ $post->view_count }} views</span></div>

    </div>

<div class="post-card__title"><span>{{ $post->title_limit }}</span></div>

</a>