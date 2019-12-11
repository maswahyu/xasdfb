<div class="post-card">

    <div class="post-card__thumbnail">
        <a href="{{ $post->url }}{!! isset($utm) ? $utm : '' !!}" alt="{{ $post->title }}">
            <img class="post-card__img" src="{{ imageview('') }}" data-src="{{ $post->thumbnail }}" alt="{{ $post->title }}">
        </a>
    </div>

    <div class="post-card__meta post-meta">

    <div class="post-meta__category">
        <a href="{{ $post->category->url }}" alt="{{ $post->category_name }}">
            <span>{{ $post->category_name }}</span>
        </a>
    </div>

    <div class="post-meta__stat"><span>{{ $post->published_date }}</span></div>

        {{-- <div class="post-meta__stat"><span>{{ $post->view_count }} views</span></div> --}}

    </div>

    <a href="{{ $post->url }}{!! isset($utm) ? $utm : '' !!}" alt="{{ $post->title }}">
        <div class="post-card__title">
            <span>{{ $post->title }}</span>
        </div>
    </a>

</div>
