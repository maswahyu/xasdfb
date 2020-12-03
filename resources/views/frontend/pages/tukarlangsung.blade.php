@extends('frontend.layouts.skeleton')

@section('content')
@php
$contentClass = 'promo__top'
@endphp
  <div class="promo__header"></div>
  <div class="container">
    <div class="promo__banner">
      <a href="{{env('URL_MYPOINT')}}" target="_blank">
        <img src="{{ asset('static/images/banner-tukarlangsung.jpg')}}" alt="Banner Tukar langsung">
      </a>
    </div>
    <div class="promo__content">
      <h5 class="title text-center text-black">
        Periode
      </h5>
      <p class="title__sub text-site text-center">7 s.d 31 Desember 2020</p>
      <br>
      <br>
      <h5 class="title text-center text-black">
        Syarat & Ketentuan
      </h5>
      <br>
      <ul class="list-syarat">
        <li>Program ini hanya bisa diikuti oleh Warga Negara Indonesia yang berusia minimal 18 tahun yang tinggal di Indonesia dan memiliki KTP yang berlaku.</li>
        <li>Program berlaku mulai tanggal 7 Desember 2020 s.d 25 Desember 2020.</li>
        <li>Program ini hanya berlaku kepada member yang telah melakukan Complete Profile dan terverfikasi di profil <a href="lazone.id" class="text-site">LAZone.id</a></li>
        <li>Untuk mengikuti program ini, member harus melakukan redeem kupon undian di halaman ini.</li>
        <li>Member diperbolehkan untuk me-redeem kupon undian lebih dari satu. 1 akun hanya bisa memenangkan 1 dari 2 hadiah yang tersedia.</li>
        <li>Jika member tidak menang, poin untuk me-redeem kupon undian akan hangus.</li>
        <li>Nama & Nomor KTP Pemenang yang tercantum di profil <a href="lazone.id" class="text-site">LAZone.id</a> harus sesuai dengan Nama & Nomor di KTP asli.</li>
        <li>Untuk mendapatkan hadiah, member harus memverifikasi nomor handphone atau email terdaftar mereka.</li>
        <li>Untuk mengikuti program ini, member harus melakukan redeem kupon undian di halaman ini.</li>
      </ul>
    </div>
  </div>
@endsection
