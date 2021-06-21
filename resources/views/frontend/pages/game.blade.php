@extends('frontend.layouts.skeleton')

@section('meta_title', 'Game')
@section('head_title', 'Game')
@section('head_url', url()->current())

@section('content')

{{-- Ads Placement --}}
<div class="game-instruction">
    <div class="container">

        <div class="row">
            <div class="span-12">
                <div class="page-card position-relative">
                    <header class="card-header page-header text-center">
                        <h1 class="page-title card-title">
                            <img src="{{ asset('static/images/title-image-mini-game-running-agent.png') }}" alt="Mini Game: The Running Agent" class="title-image">
                        </h1>

                        <div class="video-wrapper position-relative">
                            <div id="player" data-video-id="M7lc1UVf-VE">

                            </div>
                            <button class="video-trigger disabled" style="background-image: url({{ asset('static/images/mock/video-cover.jpg') }})">
                                <img src="{{ asset('static/images/btn-play.png') }}" alt="Play" class="btn-image">
                            </button>
                        </div>
                    </header>

                    <div class="card-content">
                        <div class="cta-wrapper text-center">
                            <a href="" class="btn btn-play"><span>PLAY NOW</span></a>
                        </div>
                        <h3 class="card-subtitle">How to Play</h3>

                        <ul>
                            <li>Gerakkan karakter untuk menghindari rintangan.</li>
                            <li>Karaktermu memiliki refleksi atas dan bawah, tekan tombol atas dan tombol bawah untuk menggerakkan karakter atas dan bawah. </li>
                            <li>Kamu memiliki 3 nyawa, dan bisa bertahan maksimum selama 150 detik. </li>
                            <li>Jika menabrak rintangan lebih dari 3 kali maka permainan akan selesai secara otomatis. </li>
                            <li>Gunakan kesempatan sebaik mungkin, karena kamu hanya bisa memainkan game 1 kali dalam 1 hari.</li>
                        </ul>

                        <h3 class="card-subtitle">Scoring</h3>

                        <ul>
                            <li>Setiap 3 detik permainan kamu akan mendapatkan 20 poin, dan terus bertambah selama permainan berjalan. </li>
                            <li>Lama permainan adalah 150 detik, dan poin maksimal yang bisa kamu dapatkan adalah 1.000 points perhari</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('before-body-end')
<script type="text/javascript">
    var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    var player;
    function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '100%',
        width: '100%',
        videoId: $('#player').data('video-id'),
        events: {
            'onReady': onPlayerReady
        }
    });
    }

    // 4. The API will call this function when the video player is ready.
    function onPlayerReady(event) {
        $('.video-trigger').removeClass('disabled');

        $('.video-trigger').on('click', function(e) {
            $('.video-trigger').addClass('hidden');
            
            player.playVideo();
        })
    }



</script>
@endsection