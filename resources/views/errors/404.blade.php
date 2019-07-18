@extends('frontend.layouts.skeleton')

@section('head_title', 'Not Found')

@section('content')

<div class="container" style="padding-top: 3rem;">

    <div class="row">

        <div class="span-12">

            <div class="placement placement--top-margin-0">
                <img class="placement__img" src="{{ asset('static/images/404.png') }}" alt="404">
            </div>

        </div>

    </div>

    <div class="row">

        <div class="span-12 span-lg-10 off-lg-1 span-xl-8 off-xl-2">

            <div class="post-header text-center">

            <h1 class="post-header__title"> OOPS... </h1>
            </div>
            <p class="text-center">Halaman Tidak Ditemukan</p>

        </div>

    </div>

</div>

@endsection
