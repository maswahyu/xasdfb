@extends('frontend.layouts.skeleton')

@section('meta_title', 'Game')
@section('head_title', 'Game')
@section('head_url', url()->current())

@section('content')

{{-- Ads Placement --}}
<div class="game-profile">

    <div class="container">

        <div class="row">
            <div class="span-12">
                <div class="page-card position-relative">
                    <header class="page-header text-center">
                        <h1 class="page-title">
                            CONGRATULATIONS, TOBI JAMES!
                        </h1>
                    </header>


                    <section class="section section__points text-center">
                        <div class="section-copy">
                            <p>
                                Kamu berhasil mendapatkan skor sebesar
                            </p>
                        </div>

                        {{-- <p class="points">1.000</p> --}}
                    </section>

                    <section class="section section__info text-center">
                        @auth
                            <div class="section-copy">
                                <p>Skormu telah dikonversikan menjadi <span>1.000 points</span> di MyPoints.</p>
                            </div>

                            <div class="shoutbox__cta">
                                <a href="" class="btn btn-crimson btn-shoutbox"><span class="text-white semibold">LIHAT POINTS</span></a>
                                <a href="{{ url('/')}}" class="btn btn-shoutbox"><span class="semibold text-crimson">Kembali ke homepage</span></a>
                            </div>
                        @else
                            <div class="section-copy">
                                <p>
                                    Login untuk mendapatkan <span>1.000 points</span> di MyPoints. <br />Points dapat ditukarkan dengan <strong>hadiah menarik</strong>!
                                </p>
                            </div>

                            <div class="shoutbox__cta">
                                <a href="{{ url('member/login') }}" class="btn btn-crimson btn-shoutbox"><span class="text-white semibold">LOGIN KE MYPOINTS</span></a>
                                <a href="" class="btn btn-ghost-crimson btn-shoutbox"><span class="semibold">MORE INFO</span></a>
                                <a href="{{ url('/')}}" class="btn btn-shoutbox"><span class="semibold text-crimson">Kembali ke homepage</span></a>
                            </div>
                        @endauth
                    </section>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
