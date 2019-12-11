<div class="post-card post-card--highlight">

    <div class="post-card__thumbnail post-card__thumbnail--large">
        <a href="{{ $post->url }}{!! isset($utm) ? $utm : '' !!}" alt="{{ $post->title }}">
            <img class="post-card__img post-card__img--large" src="{{ imageview('') }}" data-src="{{ $post->thumbnail }}" alt="{{ $post->title }}">
        </a>
    </div>

    <div class="post-card__meta post-meta post-meta--centered">

        <div class="post-meta__category">
            <a href="{{ $post->category->url }}" alt="{{ $post->category_name }}">
                <span>{{ $post->category_name }}</span>
            </a>
        </div>

        <div class="post-meta__stat"><span>{{ $post->published_date }}</span></div>

        {{-- <div class="post-meta__stat"><span>{{ $post->view_count }} views</span></div> --}}

    </div>

    <a href="{{ $post->url }}{!! isset($utm) ? $utm : '' !!}" alt="{{ $post->title }}">
        <div class="post-card__title post-card__title--xlarge">
            <span>{{ $post->title }}</span>
        </div>
        <div class="post-card__excerpt">
            <p>{!! $post->summary !!}</p>
        </div>
    </a>

</div>
