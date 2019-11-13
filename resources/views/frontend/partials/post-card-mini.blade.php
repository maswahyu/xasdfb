<a href="{{ $post->url }}{!! isset($utm) ? $utm : '' !!}" class="post-card" alt="{{ $post->title }}">

    <div class="post-card__meta post-meta">

    <div class="post-meta__category"><span>{{ $post->category_name }}</span></div>

    <div class="post-meta__stat"><span>{{ $post->published_date }}</span></div>

        {{-- <div class="post-meta__stat"><span>{{ $post->view_count }} views</span></div> --}}

    </div>

<div class="post-card__title"><span>{{ $post->title }}</span></div>

</a>
