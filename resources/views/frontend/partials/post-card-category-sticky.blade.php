<div class="post-card post-card--half post-card--elevation">

    <div class="post-card__thumbnail post-card__thumbnail--half">
        <a href="{{ $post->url }}" alt="{{ $post->title }}">
            <img class="post-card__img post-card__img--half" src="{{ imageview('') }}" data-src="{{ $post->thumbnail }}" alt="{{ $post->title }}">
        </a>
    </div>

    <div class="post-card__meta post-meta">

        <div class="post-meta__category">
            <a href="{{ $post->category->url }}" alt="{{ $post->category_name }}">
                <span>{{ $post->category_name }}</span>
            </a>
        </div>

    </div>
    <div class="post-card__meta post-meta">

        <div class="post-meta__stat"><span>{{ $post->published_date }}</span></div>

        <div class="post-meta__stat"><span>{{ $post->view_count }} views</span></div>

    </div>

    <a href="{{ $post->url }}" alt="{{ $post->title }}">
        <div class="post-card__title post-card__title--large">
            <span>{{ $post->title }}</span>
        </div>
    </a>

</div>
