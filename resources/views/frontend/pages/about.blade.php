@extends('frontend.layouts.skeleton')

@section('meta_title', 'Abous Us')
@section('head_title', 'Abous Us')
@section('head_url', url('about-us'))

@section('content')

{{-- Ads Placement --}}
<div class="container">

    <div class="row">

        <div class="span-12">

            <div class="placement placement--top-margin-0">
                <img class="placement__img" src="{{ asset('static/images/mock/ads.jpg') }}" alt="ads">
            </div>

        </div>

    </div>

    <div class="row">

        <div class="span-12 span-lg-10 off-lg-1 span-xl-8 off-xl-2">

            <div class="post-header text-center">

                <h1 class="post-header__title"> ABOUT US </h1>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="span-12 span-lg-10 span-xl-12 post-content">

            <div id="post-content">

            LAzone.id adalah media lifestyle yang tak hanya menawarkan informasi terkini dari dunia entertainment, fashion, techno, dan lifestyle, namun juga interaktif dengan pembaca. Dengan konsep "See Things Differently", LAzone.id menyajikan informasi unik, menarik, dan up-to-date untuk memperluas wawasan seputar lifestyle. Nikmati sajian konten seputar movie, music, inspiring people, inspiring places, fashion trend, sneaker trend, gadget, gizmo, hingga tips dan trick seputar dunia audio visual setiap harinya di LAzone.id. Tak hanya artikel dan video, ada juga program loyalty member My Points berupa online activity bagi member LAzone.id dengan banyak hadiah keren setiap bulannya. Website ini diperuntukan bagi para audiens berusia 18+.

            </div>
        </div>

    </div>

</div>

@endsection
