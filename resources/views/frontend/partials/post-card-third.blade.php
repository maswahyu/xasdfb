<div class="post-card post-card--third post-card--elevation">

    <div class="post-card__thumbnail post-card__thumbnail--third">
        <a href="{{ $post->url }}" alt="{{ $post->title }}">
            <img class="post-card__img post-card__img--third" src="{{ imageview('') }}" data-src="{{ $post->thumbnail }}" alt="{{ $post->title }}">
        </a>
    </div>

    <div class="post-card__info">

        <a href="{{ $post->url }}" alt="{{ $post->title }}">
            <h3 class="post-card__title post-card__title--medium">{{ $post->title }}</h3>
        </a>

        <div class="post-card__meta post-meta">

            <div class="post-meta__category">
                <a href="{{ $post->category->url }}" alt="{{ $post->category_name }}">
                    <span>{{ $post->category_name }}</span>
                </a>
            </div>

            <div class="post-meta__stat"><span>{{ Carbon\Carbon::parse($post->published_date)->diffForHumans() }}</span></div>

        </div>
        {{-- <div class="post-card__meta post-meta">

            <div class="post-meta__stat"><span>{{ $post->view_count }} views</span></div>

        </div> --}}
    </div>

</div>
