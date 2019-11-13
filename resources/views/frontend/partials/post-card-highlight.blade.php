<a href="{{ $post->url }}{!! isset($utm) ? $utm : '' !!}" class="post-card post-card--highlight" alt="{{ $post->title }}">

    <div class="post-card__thumbnail post-card__thumbnail--large">
        <img class="post-card__img post-card__img--large" src="{{ imageview('') }}" data-src="{{ $post->thumbnail }}" alt="{{ $post->title }}">
    </div>

    <div class="post-card__meta post-meta post-meta--centered">

        <div class="post-meta__category"><span>{{ $post->category_name }}</span></div>

        <div class="post-meta__stat"><span>{{ $post->published_date }}</span></div>

        {{-- <div class="post-meta__stat"><span>{{ $post->view_count }} views</span></div> --}}

    </div>

    <div class="post-card__title post-card__title--xlarge">
        <span>{{ $post->title }}</span>
    </div>

    <div class="post-card__excerpt">
        <p>{!! $post->summary !!}</p>
    </div>

</a>
