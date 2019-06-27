<div class="event-card event-card--elevate">

    <div class="event-card__thumbnail">
        <img class="event-card__img" src="{{ $event->thumbnail }}" alt="">
    </div>

    <div class="event-card__meta">

        <div class="event-card__date calendar">
            <div class="calendar__date">{{ $event->date }}</div>
            <div class="calendar__month-year">{{ $event->month_year }}</div>
        </div>

        <div class="event-card__info">
            <div class="event-card__name"><span>{{ $event->name }}</span></div>
            <div class="event-card__location"><span>{{ $event->location }}</span></div>
        </div>

        <div class="event-card__more">
            <a class="btn btn-ghost-black btn-detail" href="{{ $event->url }}">DETAIL</a>
        </div>

    </div>

</div>
