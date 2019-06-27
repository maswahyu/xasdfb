<a href="{{ $event->url }}" class="event-card event-card--horizontal">

        <div class="event-card__thumbnail event-card__thumbnail--horizontal">
        <img class="event-card__img event-card__img--horizontal" src="{{ $event->thumbnail }}" alt="">
        </div>

        <div class="event-card__meta event-card__meta--horizontal">

            <div class="event-card__info">
                <div class="event-card__name event-card__name--horizontal">
                    <span>{{ $event->name }}</span>
                </div>
            <div class="event-card__date event-card__date--horizontal"><span>{{ $event->date }}</span></div>
            <div class="event-card__location"><span>{{ $event->location }}</span></div>
            </div>

        </div>

    </a>
