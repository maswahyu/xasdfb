@extends('frontend.layouts.skeleton')
@section('content')
@php
    $contentClass = 'promo__top';
@endphp
  <div class="promo">
    <div class="promo__backstage"></div>
    <div class="promo__banner">
      <div class="container">
         <a href="https://mypoints.lazone.id/" target="_blank">
          @if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]))
            <img class="background" src="{{ asset("static/images/TuLanG-mobile-580-x-755.jpg") }}" alt="Banner Tukar langsung">
          @else
            <img class="background" src="{{ asset("static/images/TuLanG-BANNER-1180x540.jpg") }}" alt="Banner Tukar langsung">
          @endif
        </a>
      </div>
    </div>
    <div class="container">
      <div class="promo__content">
        <h5 class="title text-center text-black">
          Periode
        </h5>
        <p class="title__sub text-site text-center">7 s.d 31 Mei 2020</p>
        <br>
        <div class="text-center">
          <a
            href="{{ env('URL_MYPOINT') }}"
            target="_blank"
            class="tukar-sekarang btn-crimson"
          >
            TUKAR SEKARANG
          </a>
        </div>
        <br>
        <br>
        <h5 class="title text-center text-black">
          Syarat & Ketentuan
        </h5>
        <br>
        <ul class="list-syarat">
          <li>Program ini hanya bisa diikuti oleh Warga Negara Indonesia yang berusia minimal 18 tahun yang tinggal di Indonesia dan memiliki KTP yang berlaku.</li>
          <li>Program berlaku mulai tanggal 7 Mei 2020 s.d 31 Mei 2020.</li>
          <li>Program ini hanya berlaku kepada member yang telah melakukan Complete Profile dan terverfikasi di profil <a href="https://www.lazone.id/" class="text-site">LAZone.id</a></li>
          <li>Untuk mengikuti program ini, member harus melakukan redeem kupon undian di halaman ini.</li>
          <li>Member diperbolehkan untuk me-redeem kupon undian lebih dari satu.</li>
          <li>Jika member tidak menang, poin untuk me-redeem kupon undian akan hangus.</li>
          <li>Nama & Nomor KTP Pemenang yang tercantum di profil <a href="https://www.lazone.id/" class="text-site">LAZone.id</a> harus sesuai dengan Nama & Nomor di KTP asli.</li>
          <li>Untuk mendapatkan hadiah, member harus memverifikasi nomor handphone atau email terdaftar mereka.</li>
          <li>Untuk mengikuti program ini, member harus melakukan redeem kupon undian di halaman ini.</li>
        </ul>
      </div>
    </div>
    {{-- <div class="promo__footer">
      <div class="cp-container">
        <div class="cp-text">
          COPYRIGHT © LAZONE.ID ALL RESERVED
        </div>
        <div class="warning">
          WEBSITE INI HANYA DIPERUNTUKKAN BAGI ANDA YANG SUDAH BERUSIA 18 TAHUN
        </div>
      </div>
      <a href="{{ url('contact-us') }}" class="contact-us">
        <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M16.15 0H2.85C2.09413 0 1.36922 0.296316 0.834746 0.823762C0.300267 1.35121 0 2.06658 0 2.8125V12.1875C0 12.9334 0.300267 13.6488 0.834746 14.1762C1.36922 14.7037 2.09413 15 2.85 15H16.15C16.9059 15 17.6308 14.7037 18.1653 14.1762C18.6997 13.6488 19 12.9334 19 12.1875V2.8125C19 2.06658 18.6997 1.35121 18.1653 0.823762C17.6308 0.296316 16.9059 0 16.15 0ZM15.5135 1.875L9.5 6.32812L3.4865 1.875H15.5135ZM16.15 13.125H2.85C2.59804 13.125 2.35641 13.0262 2.17825 12.8504C2.00009 12.6746 1.9 12.4361 1.9 12.1875V3.04688L8.93 8.25C9.09444 8.37171 9.29445 8.4375 9.5 8.4375C9.70555 8.4375 9.90556 8.37171 10.07 8.25L17.1 3.04688V12.1875C17.1 12.4361 16.9999 12.6746 16.8218 12.8504C16.6436 13.0262 16.402 13.125 16.15 13.125Z" fill="white"/>
        </svg>
        Contact Us
      </a>
    </div> --}}
  </div>
@endsection
