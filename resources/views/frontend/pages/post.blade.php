@extends('frontend.layouts.skeleton')

@section('inside-head')
<meta property="og:url" content="{{ Request::url() }}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="judul" />
<meta property="og:description" content="deskripsi" />
<meta property="og:image" content="thumbnail" />
@endsection

@section('content')

{{-- Ads Placement --}}
<div class="container">

    <div class="row">

        <div class="span-12">

            <div class="placement placement--top-margin-0">
                <img class="placement__img" src="{{ asset('static/images/mock/ads.jpg') }}" alt="">
            </div>

        </div>

    </div>

    <div class="row flex-justify-center post-breadcrumb">

        <ul class="breadcrumb">
            <li class="breadcrumb__item"><a class="breadcrumb__link" href="#">Entertainment</a></li>
            <li class="breadcrumb__item"><a class="breadcrumb__link" href="#">Movie</a></li>
        </ul>

    </div>

    <div class="row">

        <div class="span-12 span-lg-10 off-lg-1">

            <div class="post-header text-center">

                <div class="post-header__title">
                    <span>Rilis April Ini! Berikut Sejumlah Spoiler Avenger : ENDGAME Yang Beredar</span>
                </div>

                <div class="post-header__meta">

                    <div class="post-meta post-meta--centered">

                        <div class="post-meta__category"><span>Music</span></div>

                        <div class="post-meta__stat"><span>15 Feb 2019</span></div>

                        <div class="post-meta__stat"><span>456 views</span></div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div id="sidebar" class="span-12 span-lg-1 span-xl-2 sidebar">
            <ul class="list list--vertical flex-align-center">
                <li class="list__label">Share :</li>
                <li class="list__item list__item--social">
                    <a class="list__link list__link--social jsFbShare"
                        href="{{ 'https://www.facebook.com/sharer/sharer.php?' . 'u=' . urlencode(url()->current()) }}">
                        <img src="{{ asset('static/images/fb-so.png') }}" alt="">
                    </a>
                </li>
                <li class="list__item list__item--social">
                    <a class="list__link list__link--social jsTwShare"
                        href="{{ 'https://twitter.com/intent/tweet/' . '?text='. urlencode('text buat di share disini') .'&url=' . urlencode(url()->current()) }}">
                        <img src="{{ asset('static/images/tw-so.png') }}" alt="">
                    </a>
                </li>
                <li class="list__item list__item--social">
                    <a data-clipboard-text="{{ url()->current() }}" class="list__link list__link--social jsCopyLink"
                        href="#">
                        <img src="{{ asset('static/images/link-so.png') }}" alt="">
                    </a>
                </li>
            </ul>

        </div>

        {{-- CONTENT DUMMY --}}
        <div class="span-12 span-lg-11 span-xl-10 post-content">

            <img src="{{ asset('static/images/mock/post-1.jpg') }}" alt="">

            <p><strong>LAZONE.ID</strong> - Setelah penayangan film seri Marvel Cinematics Universe (MCU) menayangkan
                Avenger : Infinity War yang bikin banyak orang makin penasaran sama kelanjutan The Avenger. Soalnya
                ending dari Infinity War dibikin menggantung dan bikin semua orang nungguin kelanjutannya.</p>

            <p>Nah, untuk menjawab itu MCU bakal menghadirkan film sekuel lanjutan bertajuk The Avenger : Endgame. Nah,
                karena saking banyaknya orang nungguin film satu ini, banyak pula rumor baik teori maupun spoiler soal
                gimana film Endgame ini akan berjalan.
            </p>

            <p> Kayaknya lo juga penasaran kan? Soal apa aja sih teori atau spoiler yang berkembang soal Endgame ini.
                Nah
                untuk mengobati rasa penasaran lo, biar gak mati penasaran, nih gw kasih bahasan soal spoiler The
                Avenger :
                Endgame yang berkembang.
            </p>

            <blockquote>
                <p>You know the golden rule, don’t you boy? Those who have the gold make the rules.</p>
                <footer>— Crazy hunch-backed old guy from the movie Aladdin</footer>
            </blockquote>

            <p class="align-center"><strong>1. Terpisahnya Jati Diri Hulk dari Bruce Banner</strong></p>

            <img src="{{ asset('static/images/mock/post-2.jpg') }}" alt="">

            <p>Nah salah satu tujuan Thanos ngumpulin Infinity Stones adalah untuk menghilangkan sebagian makhluk guna
                nyiptain keseimbangan. Kata teori ini akibat dari kekuatan Thanos tersebut, antara Hulk dan Bruce Banner
                yang semula berada dalam satu tubuh yang sama, akan terpisahkan.</p>

            <p class="align-center"><strong>2. Captain Marvel Ngalahin Thanos</strong></p>

            <img src="{{ asset('static/images/mock/post-3.jpg') }}" alt="">

            <p>Isu soal peran Captain Marvel di seri The Avenger : Endgame emang udah santer diomongin banyak orang.
                Kabarnya kemunculan Captain Marvel adalah untuk mengalahkan Thanos dan menjadi solusi dari hilangnya
                sebagian orang di Infinity War. Hal ini makin diperkuat sama sesi wawancaranya Samuel L. Jackson yang
                memerankan Nick Fury. Doi bilang Captain Marvel akan punya peran sentral, karena sang Captain adalah
                hero paling kuat di MCU.</p>

            <p>Donec eget odio purus. Donec tempor, ligula ultrices aliquam bibendum, nisi mauris consequat dolor, at
                pretium mi augue vel mi. Nunc rhoncus justo metus, sed luctus risus placerat at. Mauris ornare neque
                quis pretium tincidunt.</p>

            <ul>
                <li>Phasellus a est. Cras sagittis. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.
                    Pellentesque auctor neque nec urna. Fusce vulputate eleifend sapien.</li>
                <li>Maecenas vestibulum mollis diam. Morbi ac felis. Aliquam erat volutpat. Suspendisse nisl elit,
                    rhoncus eget, elementum ac, condimentum eget, diam.</li>
                <li>Etiam iaculis nunc ac metus. Morbi nec metus. Phasellus a est. Morbi vestibulum volutpat enim.</li>
                <li>In turpis. Phasellus volutpat, metus eget egestas mollis, lacus lacus blandit dui, id egestas quam
                    mauris ut lacus. Quisque libero metus, condimentum nec, tempor a, commodo mollis, magna. Suspendisse
                    non nisl sit amet velit hendrerit rutrum.</li>
            </ul>


            <iframe width="560" height="315" src="https://www.youtube.com/embed/vBWBaF6Wy_w" frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>

        </div>

    </div>

    <div class="row post-tag">
        <div class="span-12 span-lg-10 off-lg-1">
            <ul class="list">
                <li>TAGS</li>
                <li class="list__item active"><a href="#" class="list__link list__link--tag">Avengers</a></li>
                <li class="list__item active"><a href="#" class="list__link list__link--tag">Marvel</a></li>
            </ul>

        </div>
    </div>

</div>

<div class="related-post">
    <div class="container">
        <div class="row">
            <div class="span-12">
                <div class="section-title section-title--plain">
                    <span class="section-title__label">Must Reads</span>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($relatedPosts as $post)
            <div class="span-12 span-lg-4">
                @include('frontend.partials.post-card-related', ['post' => $post])
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="latest-post">

    <div class="container">

        <div class="row">

            <div class="span-12 span-lg-8 off-lg-2">

                <div class="row">
                    <div class="span-12">
                        <div class="section-title">
                            <span class="section-title__label">Latest Articles</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="span-12 jsArticleList"></div>
                </div>

                <div class="row">
                    <div class="span-12 text-center">
                        <button class="btn btn-ghost btn-load-more jsMoreArticle">LOAD MORE</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection


@section('before-body-end')
<script>
    window.feedUrl = "{{ url('feed') }}"
</script>

@verbatim
<script id="x-post-template" type="text/x-handlebars-template">

    <a href="{{ url }}" class="post-card post-card--wide">

            <div class="post-card__thumbnail">
                <img class="post-card__img" src="{{ thumbnail }}" alt="">
            </div>

            <div class="post-card__info">

                <div class="post-card__meta post-meta">

                    <div class="post-meta__category"><span>{{ category }}</span></div>

                    <div class="post-meta__stat"><span>{{ published_date }}</span></div>

                    <div class="post-meta__stat"><span>{{ view_count }} views</span></div>

                </div>

                <div class="post-card__title">
                    <span>{{ title }}</span>
                </div>

            </div>

        </a>
    </script>
@endverbatim

<script src="{{ asset('static/js/jquery.sticky-sidebar.min.js') }}"></script>
<script src="{{ asset('static/js/ResizeSensor.js') }}"></script>
<script src="{{ asset('static/js/post.js') }}"></script>
@endsection
