<div class="event-card event-card--elevate">

    <div class="event-card__thumbnail">
        <img class="event-card__img" src="{{ imageview($event->image) }}" alt="">
    </div>

    <div class="event-card__meta">

        <div class="event-card__date calendar">
            <div class="calendar__date">{{ $event->created_at->format('j') }}</div>
            <div class="calendar__month-year">{{ $event->created_at->format('M y') }}</div>
        </div>

        <div class="event-card__info">
            <div class="event-card__name"><span>{{ $event->title }}</span></div>
            <div class="event-card__location"><span>{{ $event->summary }}</span></div>
        </div>

        {{-- <div class="event-card__more">
            <a class="btn btn-ghost-black btn-detail" href="{{ $event->url }}">DETAIL</a>
        </div> --}}

    </div>

</div>
