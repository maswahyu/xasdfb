@extends('frontend.layouts.skeleton')

{{-- Available Yield: meta, inside-header, after-site-footer, before-body-end --}}

@section('content')

<div class="section-title">
    <span class="section-title__label">Must Reads</span>
</div>

<div class="section-title section-title--plain section-title--page">
    <span class="section-title__label section-title__label--category">Category Title</span>
</div>

<div class="section-title section-title--plain section-title--has-more">
    <span class="section-title__label">Must Reads</span>
    <a href="#" class="section-title__more"><span>SEE MORE</span><span class="arrow-left"></span></a>
</div>

<div class="section-title section-title--plain">
    <span class="section-title__label">Must Reads</span>
</div>

<ul class="list">
    <li class="list__item active"><a href="#" class="list__link">Movie</a></li>
    <li class="list__item"><a href="#" class="list__link">Music</a></li>
    <li class="list__item"><a href="#" class="list__link">Sport</a></li>
    <li class="list__item"><a href="#" class="list__link">News</a></li>
</ul>

<ul class="breadcrumb">
    <li class="breadcrumb__item"><a class="breadcrumb__link" href="#">Entertainment</a></li>
    <li class="breadcrumb__item"><a class="breadcrumb__link" href="#">Movie</a></li>
</ul>

<a href="#" class="post-card">

    <div class="post-card__thumbnail">
        <img class="post-card__img" src="holder.js/280x168?theme=sky&auto=yes" alt="">
    </div>

    <div class="post-card__meta post-meta">

        <div class="post-meta__category"><span>Music</span></div>

        <div class="post-meta__stat"><span>6 hours ago</span></div>

        <div class="post-meta__stat"><span>456 views</span></div>

    </div>

    <div class="post-card__title"><span>Siap Nonton Kodaline? Dengerin 5 Hitsnya Dulu</span></div>

</a>

<a href="#" class="post-card post-card--half post-card--elevation">

    <div class="post-card__thumbnail post-card__thumbnail--half">
        <img class="post-card__img post-card__img--half" src="holder.js/580x290?theme=sky&auto=yes" alt="">
    </div>

    <div class="post-card__meta post-meta">

        <div class="post-meta__category"><span>Music</span></div>

        <div class="post-meta__stat"><span>6 hours ago</span></div>

        <div class="post-meta__stat"><span>456 views</span></div>

    </div>

    <div class="post-card__title post-card__title--large"><span>Siap Nonton Kodaline? Dengerin 5 Hitsnya Dulu</span>
    </div>

</a>

<a href="#" class="post-card post-card--third post-card--elevation">

    <div class="post-card__thumbnail post-card__thumbnail--third">
        <img class="post-card__img post-card__img--third" src="holder.js/380x229?theme=sky&auto=yes" alt="">
    </div>

    <div class="post-card__meta post-meta">

        <div class="post-meta__category"><span>Music</span></div>

        <div class="post-meta__stat"><span>6 hours ago</span></div>

        <div class="post-meta__stat"><span>456 views</span></div>

    </div>

    <div class="post-card__title post-card__title--medium"><span>Siap Nonton Kodaline? Dengerin 5 Hitsnya Dulu</span>
    </div>

</a>

<a href="#" class="post-card post-card--third post-card--elevation">

    <div class="post-card__thumbnail post-card__thumbnail--third">
        <img class="post-card__img post-card__img--third" src="holder.js/380x229?theme=sky&auto=yes" alt="">
    </div>

    <div class="post-card__meta post-meta">

        <div class="post-meta__category"><span>Music</span></div>

        <div class="post-meta__stat"><span>15 Februari 2019</span></div>


    </div>

    <div class="post-card__title post-card__title--medium"><span>Siap Nonton Kodaline? Dengerin 5 Hitsnya Dulu</span>
    </div>

    <div class="post-card__additional post-card__additional--x-padding stat-with-icon">
        <span class="stat-with-icon__icon">
            <img src="{{ asset('static/images/slides.png') }}" alt="">
        </span>
        <span class="stat-with-icon__text">15 Photos</span>
    </div>

</a>

<a href="#" class="post-card post-card--fourth">

    <div class="post-card__thumbnail post-card__thumbnail--fourth">
        <img class="post-card__img post-card__img--fourth" src="holder.js/380x229?theme=sky&auto=yes" alt="">
    </div>

    <div class="post-card__meta post-meta">

        <div class="post-meta__category"><span>Music</span></div>

        <div class="post-meta__stat"><span>6 hours ago</span></div>

    </div>

    <div class="post-card__title">
        <span>Siap Nonton Kodaline? Dengerin 5 Hitsnya Dulu</span>
    </div>

    <div class="post-card__additional stat-with-icon">
        <span class="stat-with-icon__icon">
            <img src="{{ asset('static/images/clock.png') }}" alt="">
        </span>
        <span class="stat-with-icon__text">02.25</span>
    </div>

</a>


<a href="#" class="post-card post-card--simple">

    <div class="post-card__thumbnail">
        <img class="post-card__img" src="holder.js/280x168?theme=sky&auto=yes" alt="">
    </div>

    <div class="post-card__meta post-meta">

        <div class="post-meta__category"><span>Music</span></div>

        <div class="post-meta__stat"><span>6 hours ago</span></div>

        <div class="post-meta__stat"><span>456 views</span></div>

    </div>

    <div class="post-card__title"><span>Siap Nonton Kodaline? Dengerin 5 Hitsnya Dulu</span></div>

</a>

<a href="#" class="post-card post-card--elevation">

    <div class="post-card__thumbnail">
        <img class="post-card__img" src="holder.js/280x168?theme=sky&auto=yes" alt="">
    </div>

    <div class="post-card__meta post-meta">

        <div class="post-meta__category"><span>Music</span></div>

        <div class="post-meta__stat"><span>6 hours ago</span></div>

        <div class="post-meta__stat"><span>456 views</span></div>

    </div>

    <div class="post-card__title"><span>Siap Nonton Kodaline? Dengerin 5 Hitsnya Dulu</span></div>

</a>

<a href="#" class="post-card post-card--photo">

    <div class="post-card__thumbnail post-card__thumbnail--photo">

        <img class="post-card__img post-card__img--photo" src="holder.js/300x180?theme=sky&auto=yes"
            alt="">

        <div class="post-card__overlay"></div>

        <div class="post-card__slide-count">
            <img class="post-card__slide-count-icon" src="{{ asset('static/images/slide-white.png') }}" alt="">
            <span class="post-card__slide-count-amount">15 Photos</span>
        </div>

    </div>

    <div class="post-card__meta post-meta">

        <div class="post-meta__category"><span>Video</span></div>

        <div class="post-meta__stat"><span>6 hours ago</span></div>

    </div>

    <div class="post-card__title"><span>Siap Nonton Kodaline? Dengerin 5 Hitsnya Dulu</span></div>

</a>

<a href="#" class="post-card post-card--video">

    <div class="post-card__thumbnail post-card__thumbnail--video">

        <img class="post-card__img post-card__img--video" src="https://img.youtube.com/vi/Mxmu6YVVbDI/hqdefault.jpg"
            alt="">

        <div class="post-card__overlay"></div>

        <div class="post-card__vid-play">
            <svg class="svg-vid-play">
                <use xlink:href="{{ asset('static/images/sprites.svg') }}#vid-play"></use>
            </svg>
        </div>

        <div class="post-card__frame">
            <svg class="svg-video-frame">
                <use xlink:href="{{ asset('static/images/sprites.svg') }}#video-frame"></use>
            </svg>
        </div>

        <div class="post-card__time"><span>1.15</span></div>

    </div>

    <div class="post-card__meta post-meta">

        <div class="post-meta__category"><span>Video</span></div>

        <div class="post-meta__stat"><span>6 hours ago</span></div>

    </div>

    <div class="post-card__title"><span>Siap Nonton Kodaline? Dengerin 5 Hitsnya Dulu</span></div>

</a>

<a href="#" class="post-card post-card--video-horizontal">

    <div class="post-card__thumbnail post-card__thumbnail--video-horizontal">

        <img class="post-card__img post-card__img--video-horizontal"
            src="https://img.youtube.com/vi/Mxmu6YVVbDI/hqdefault.jpg" alt="">

        <div class="post-card__overlay"></div>

        <div class="post-card__vid-play">
            <svg class="svg-vid-play">
                <use xlink:href="{{ asset('static/images/sprites.svg') }}#vid-play"></use>
            </svg>
        </div>

        <div class="post-card__frame">
            <svg class="svg-video-frame svg-video-frame--small">
                <use xlink:href="{{ asset('static/images/sprites.svg') }}#video-frame"></use>
            </svg>
        </div>

    </div>

    <div class="post-card__info">

        <div class="post-card__meta post-meta">

            <div class="post-meta__category"><span>Video</span></div>

            <div class="post-meta__stat"><span>16 Feb 2019</span></div>

        </div>

        <div class="post-card__title post-card__title--horizontal">
            <span>Siap Nonton Kodaline? Dengerin 5 Hitsnya Dulu</span>
        </div>

        <div class="post-card__additional stat-with-icon">
            <span class="stat-with-icon__icon">
                <img src="{{ asset('static/images/clock.png') }}" alt="">
            </span>
            <span class="stat-with-icon__text">02.25</span>
        </div>

    </div>

</a>

<a href="#" class="post-card post-card--video-highlight">

    <div class="post-card__thumbnail post-card__thumbnail--video-highlight">

        <img class="post-card__img post-card__img--video-highlight"
            src="https://img.youtube.com/vi/Mxmu6YVVbDI/hqdefault.jpg" alt="">

        <div class="post-card__overlay"></div>

        <div class="post-card__vid-play">
            <svg class="svg-vid-play svg-vid-play--large">
                <use xlink:href="{{ asset('static/images/sprites.svg') }}#vid-play"></use>
            </svg>
        </div>

        <div class="post-card__frame">
            <svg class="svg-video-frame svg-video-frame--large">
                <use xlink:href="{{ asset('static/images/sprites.svg') }}#video-frame-large"></use>
            </svg>
        </div>

        <div class="post-card__time post-card__time--large"><span>1.15</span></div>

    </div>

</a>

<a href="#" class="post-card post-card--wide">

    <div class="post-card__thumbnail">
        <img class="post-card__img" src="holder.js/280x168?theme=sky&auto=yes" alt="">
    </div>

    <div class="post-card__info">

        <div class="post-card__meta post-meta">

            <div class="post-meta__category"><span>Music</span></div>

            <div class="post-meta__stat"><span>6 hours ago</span></div>

            <div class="post-meta__stat"><span>456 views</span></div>

        </div>

        <div class="post-card__title"><span>Siap Nonton Kodaline? Dengerin 5 Hitsnya Dulu</span></div>

    </div>

</a>

<a href="#" class="post-card post-card--highlight">

    <div class="post-card__thumbnail post-card__thumbnail--large">
        <img class="post-card__img post-card__img--large" src="holder.js/619x348?theme=sky&auto=yes" alt="">
    </div>

    <div class="post-card__meta post-meta post-meta--centered">

        <div class="post-meta__category"><span>Music</span></div>

        <div class="post-meta__stat"><span>6 hours ago</span></div>

        <div class="post-meta__stat"><span>456 views</span></div>

    </div>

    <div class="post-card__title post-card__title--xlarge"><span>Siap Nonton Kodaline? Dengerin 5 Hitsnya Dulu</span>
    </div>

    <div class="post-card__excerpt">
        <p>Dua semesta perfilman atau ‘universe’ superhero yang paling beken saat ini, kalo gak Marvel Cinematic
            Universe (MCU) atau saingan beratnya DC Extended Universe (DCEU).</p>
    </div>

</a>

<a href="#" class="post-card">

    <div class="post-card__meta post-meta">

        <div class="post-meta__category"><span>Music</span></div>

        <div class="post-meta__stat"><span>6 hours ago</span></div>

        <div class="post-meta__stat"><span>456 views</span></div>

    </div>

    <div class="post-card__title"><span>Siap Nonton Kodaline? Dengerin 5 Hitsnya Dulu</span></div>

</a>

<div class="event-card event-card--elevate">

    <div class="event-card__thumbnail">
        <img class="event-card__img" src="holder.js/580x290?theme=sky&auto=yes" alt="">
    </div>

    <div class="event-card__meta">

        <div class="event-card__date calendar">
            <div class="calendar__date">8</div>
            <div class="calendar__month-year">Apr 19</div>
        </div>

        <div class="event-card__info">
            <div class="event-card__name"><span>LA Indie Movie Jakarta</span></div>
            <div class="event-card__location"><span>Joglo at Kemang, Jakarta</span></div>
        </div>

        <div class="event-card__more">
            <a class="btn btn-ghost-black btn-detail" href="#">DETAIL</a>
        </div>

    </div>

</div>


<a href="#" class="event-card event-card--horizontal">

    <div class="event-card__thumbnail event-card__thumbnail--horizontal">
        <img class="event-card__img event-card__img--horizontal" src="holder.js/580x290?theme=sky&auto=yes" alt="">
    </div>

    <div class="event-card__meta event-card__meta--horizontal">

        <div class="event-card__info">
            <div class="event-card__name event-card__name--horizontal"><span>LA Indie Movie Jakarta</span></div>
            <div class="event-card__date event-card__date--horizontal"><span>10 December 2019</span></div>
            <div class="event-card__location"><span>Joglo at Kemang, Jakarta</span></div>
        </div>

    </div>

</a>

<div class="shoutbox">

    <div class="shoutbox__title"><span>Beritahu Kami Minat Kamu</span></div>

    <div class="shoutbox__text">
        <p>Pilih artikel-artikel terkini sesuai minat mu di lazone</p>
    </div>

    <div class="shoutbox__cta">
        <button class="btn btn-crimson"><strong class="text-white">PILIH MINATMU</strong></button>
    </div>

</div>

<div class="shoutbox shoutbox--wide shoutbox--has-bg">

    <img class="shoutbox__background" src={{ asset('static/images/lazone-prize-cta.jpg') }} />

    <div class="shoutbox__content-wrapper">

        <div class="shoutbox__title shoutbox__title--extra-bold"><span>Menangkan Hadiah Menarik Tiap Bulan!</span></div>

        <div class="shoutbox__text shoutbox__text--extra-space">
            <p>Ingin dapat hadiah eksklusif tiap bulannya? yuk daftar jadi member LAZONE.ID sekarang dan kumpukan terus
                poin mu!</p>
        </div>

        <div class="shoutbox__cta shoutbox__cta--left">
            <a href="#" class="btn btn-ghost-white btn-shoutbox"><span class="semibold">PELAJARI TENTANG
                    POIN</strong></a>
            <a href="#" class="btn btn-white btn-shoutbox"><span class="semibold">DAFTAR SEKARANG</strong></a>
        </div>


    </div>

</div>



@endsection
