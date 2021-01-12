<a href="{{ $photo->url }}" class="post-card post-card--photo">

    <div class="post-card__thumbnail post-card__thumbnail--photo">

        <img class="post-card__img post-card__img--photo" src="{{ imageview('') }}" data-src="{{ $photo->thumbnail }}" alt="{{ $photo->name }}">

        <div class="post-card__overlay"></div>

        <div class="post-card__slide-count">
            <img class="post-card__slide-count-icon" src="{{ asset('static/images/slide-white.png') }}" alt="">
            <span class="post-card__slide-count-amount">{{ optional($photo->photos)->count() }} Photos</span>
        </div>

    </div>

    <div class="post-card__meta post-meta">

        <div class="post-meta__category"><span>{{ $photo->category }}</span></div>

    </div>

    <div class="post-card__meta post-meta">

        <div class="post-meta__stat"><span>{{ $photo->published_date }}</span></div>

    </div>

    <div class="post-card__title"><span>{{ $photo->name }}</span></div>

</a>
