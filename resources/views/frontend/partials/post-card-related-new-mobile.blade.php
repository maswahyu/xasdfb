<div class="post-card post-card--simple post-card--simple__max-height" style="max-width: 235px !important; margin: 0 1rem;">
    <div class="post-card__thumbnail">
        <a href="{{ $post->url }}" alt="{{ $post->title }}">
            <img class="post-card__img" src="{{ imageview('') }}" data-src="{{ $post->thumbnail }}" alt="{{ $post->title }}">
        </a>
    </div>

    <div class="post-card__info">

        <a href="{{ $post->url }}" alt="">
            <div class="post-card__title">
                <span>{{ $post->title }}</span>
            </div>
        </a>

        <div class="post-card__meta post-meta">

            <div class="post-meta__category">
                <a href="{{ $post->category ? $post->category->url : '/lifestyle/style' }}" alt="{{ $post->category_name }}">
                    <span>{{ $post->category_name }}</span>
                </a>
            </div>
    
            <div class="post-meta__stat"><span>{{ $post->view_count }} views</span></div>

        </div>

    </div>

</div>