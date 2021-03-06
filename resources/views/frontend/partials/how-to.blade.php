<div class="container">

    <div class="row point-tab">

        <div class="span-12 span-lg-10 off-lg-1">

            <div class="row flex-justify-center">
                <div class="span-auto">
                    <div class="section-title section-title--plain section-title--page">
                        <span class="section-title__label section-title__label--category">How To Get Points?</span>
                    </div>
                </div>
            </div>

            <ul class="point-nav flex-justify-center jsPointTab pointNavSlider">
                <li class="point-nav__item">
                    <a href="#tab-complete-profile" class="text-black point-nav__link point-nav__link--tab">Complete Profile</a>
                </li>
                {{-- <li class="point-nav__item">
                    <a href="#tab-referal-code" class="text-black  point-nav__link point-nav__link--tab">Referral code</a>
                </li> --}}
                <li class="point-nav__item">
                    <a href="#tab-quiz" class="text-black  point-nav__link point-nav__link--tab">Quiz</a>
                </li>
                <li class="point-nav__item">
                    <a href="#tab-secret-world" class="text-black  point-nav__link point-nav__link--tab">Secret Word</a>
                </li>

                <li class="point-nav__item">
                    <a href="#tab-play-game" class="text-black  point-nav__link point-nav__link--tab">Play Game</a>
                </li>

                <li class="point-nav__item">
                    <a href="#tab-share-article" class="text-black  point-nav__link point-nav__link--tab">Share Article</a>
                </li>

                <li class="point-nav__item">
                    <a href="#tab-daily-login" class="text-black  point-nav__link point-nav__link--tab">Daily Login</a>
                </li>
            </ul>

            <div id="tab-complete-profile" class="how-to">

                <div class="how-to__header">

                    <div class="how-to__left">

                        <div class="how-to__icon">
                            <img src="{{ asset('static/images/mock/completeprofile.svg') }}" alt="">
                        </div>

                        <div class="how-to__info">
                            <div class="how-to__name">Complete Profile</div>
                            <div class="how-to__requirement">
                                <div class="how-to__cup">
                                    <img src="{{ asset('static/images/cup.png') }}" alt="">

                                </div>
                                <div class="how-to__point">
                                    <span>5.000 points</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="how-to__right">
                        <a class="btn btn-crimson btn-point" href="https://{{ config('cas.cas_hostname') }}/profile">GO TO COMPLETE PROFILE</a>
                    </div>

                </div>

                <div class="how-to__content">

                    <div class="how-to__item">
                        <div class="how-to__number">01.</div>
                        <div class="how-to__text">
                            <p>Isi data diri dengan lengkap untuk mendapatkan poin</p>
                        </div>
                    </div>

                    <div class="how-to__item">
                        <div class="how-to__number">02.</div>
                        <div class="how-to__text">
                            <p>Verifikasi nomor handphone atau alamat emailmu.</p>
                        </div>
                    </div>

                    <div class="how-to__item">
                        <div class="how-to__number">03.</div>
                        <div class="how-to__text">
                            <p>Pergi ke halaman "My Profile" dan isi semua data yang dibutuhkan, termasuk upload Foto KTP, dll.</p>
                        </div>
                    </div>

                </div>

            </div>

            <div id="tab-daily-login" class="how-to">

                <div class="how-to__header">

                    <div class="how-to__left">

                        <div class="how-to__icon">
                            <img src="{{ asset('static/images/mock/dailylog-in.svg') }}" alt="">
                        </div>

                        <div class="how-to__info">
                            <div class="how-to__name">Daily Login</div>
                            <div class="how-to__requirement">
                                <div class="how-to__cup">
                                    <img src="{{ asset('static/images/cup.png') }}" alt="">

                                </div>
                                <div class="how-to__point">
                                    <span>Max 3.100 Points / month</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="how-to__right">
                        <a class="btn btn-crimson btn-point" href="{{ config('cas.url_mypoint') }}">GO TO DAILY LOGIN</a>
                    </div>

                </div>

                <div class="how-to__content">

                    <div class="how-to__item">
                        <div class="how-to__number">01.</div>
                        <div class="how-to__text">
                            <p>Dapatkan 50 poin untuk login di 7 hari pertama setiap harinya.</p>
                        </div>
                    </div>

                    <div class="how-to__item">
                        <div class="how-to__number">02.</div>
                        <div class="how-to__text">
                            <p>Setelah kamu berhasil login selama 7 hari berturut-turut, jumlah poin yang akan didapat naik menjadi 75 poin.</p>
                        </div>
                    </div>

                    <div class="how-to__item">
                        <div class="how-to__number">03.</div>
                        <div class="how-to__text">
                            <p>Setelah member berhasil login selama 21 hari berturut-turut, jumlah poin yang akan didapatkan akan naik menjadi 100 poin</p>
                        </div>
                    </div>

                    <div class="how-to__item">
                        <div class="how-to__number">04.</div>
                        <div class="how-to__text">
                            <p>Jika gagal untuk login secara berturut-turut, maka perhitungan hari akan dimulai dari awal (hari ke-1)</p>
                        </div>
                    </div>

                </div>

            </div>

            {{-- <div id="tab-referal-code" class="how-to">

                <div class="how-to__header">

                    <div class="how-to__left">

                        <div class="how-to__icon">
                            <img src="{{ asset('static/images/mock/referalcode.svg') }}" alt="">
                        </div>

                        <div class="how-to__info">
                            <div class="how-to__name">Referral Code</div>
                            <div class="how-to__requirement">
                                <div class="how-to__cup">
                                    <img src="{{ asset('static/images/cup.png') }}" alt="">

                                </div>
                                <div class="how-to__point">
                                    <span>Max 5.000 points</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="how-to__right">
                        <a class="btn btn-crimson btn-point" href="{{ config('cas.url_mypoint') }}">GO TO REFERRAL CODE</a>
                    </div>

                </div>

                <div class="how-to__content">

                    <div class="how-to__item">
                        <div class="how-to__number">01.</div>
                        <div class="how-to__text">
                            <p>Setiap member akan mendapatkan referral code yang bisa digunakan untuk mendapatkan poin dengan memastikan bahwa anggota baru memasukan referral codemu</p>
                        </div>
                    </div>

                    <div class="how-to__item">
                        <div class="how-to__number">02.</div>
                        <div class="how-to__text">
                            <p>Dapatkan 500 poin untuk setiap anggota baru yang memasukan referral codemu (maksimum 10 orang per bulan)</p>
                        </div>
                    </div>

                    <div class="how-to__item">
                        <div class="how-to__number">03.</div>
                        <div class="how-to__text">
                            <p>Anggota baru yang berhasil memasukan referral codemu akan mendapatkan 2.000 poin</p>
                        </div>
                    </div>

                </div>

            </div> --}}

            <div id="tab-quiz" class="how-to">

                <div class="how-to__header">

                    <div class="how-to__left">

                        <div class="how-to__icon">
                            <img src="{{ asset('static/images/mock/quiz.svg') }}" alt="">
                        </div>

                        <div class="how-to__info">
                            <div class="how-to__name">Quiz</div>
                            <div class="how-to__requirement">
                                <div class="how-to__cup">
                                    <img src="{{ asset('static/images/cup.png') }}" alt="">
                                </div>
                                <div class="how-to__point">
                                    <span>Max 10.000 points / month</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="how-to__right">
                        <a class="btn btn-crimson btn-point" href="{{ config('cas.url_mypoint') }}">GO TO QUIZ</a>
                    </div>

                </div>

                <div class="how-to__content">

                    <div class="how-to__item">
                        <div class="how-to__number">01.</div>
                        <div class="how-to__text">
                            <p>Setiap hari <strong>Senin & Kamis, LAZone</strong> akan menyediakan 10 pertanyaan kuis yang akan ditampilkan dihalaman <strong>My Points</strong></p>
                        </div>
                    </div>

                    <div class="how-to__item">
                        <div class="how-to__number">02.</div>
                        <div class="how-to__text">
                            <p>Setiap jawaban yang benar, member akan mendapatkan 125 poin</p>
                        </div>
                    </div>

                    <div class="how-to__item">
                        <div class="how-to__number">03.</div>
                        <div class="how-to__text">
                            <p>Semakin banyak jawaban yang benar, semakin tinggi poin yang akan didapat</p>
                        </div>
                    </div>

                </div>

            </div>

            <div id="tab-secret-world" class="how-to">

                <div class="how-to__header">

                    <div class="how-to__left">

                        <div class="how-to__icon">
                            <img src="{{ asset('static/images/mock/secret-word-icon.png') }}" alt="">
                        </div>

                        <div class="how-to__info">
                            <div class="how-to__name">Secret Word</div>
                            <div class="how-to__requirement">
                                <div class="how-to__cup">
                                    <img src="{{ asset('static/images/cup.png') }}" alt="">

                                </div>
                                <div class="how-to__point">
                                    <span>Max 10.000 points / month</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="how-to__right">
                        <a class="btn btn-crimson btn-point" href="{{ config('cas.url_mypoint') }}">GO TO SECRET WORD</a>
                    </div>

                </div>

                <div class="how-to__content">

                    <div class="how-to__item">
                        <div class="how-to__number">01.</div>
                        <div class="how-to__text">
                            <p>Setiap <strong>Selasa & Sabtu</strong>, akun Facebook dan Instagram  <strong>LAzone.id</strong> akan memposting satu gambar
                                khusus untuk <strong>Secret Word</strong>.</p>
                        </div>
                    </div>

                    <div class="how-to__item">
                        <div class="how-to__number">02.</div>
                        <div class="how-to__text">
                            <p>Kunjungi akun Facebook atau Instagram <strong>LAzone.id</strong> untuk menemukan <strong>Secret Word</strong> pada gambar
                                tersebut.</p>
                        </div>
                    </div>

                    <div class="how-to__item">
                        <div class="how-to__number">03.</div>
                        <div class="how-to__text">
                            <p>Input <strong>Secret Word</strong> di halaman <strong> My Points LAZone.id</strong> maksimal tiga hari setelah gambar di
                                posting.</p>
                        </div>
                    </div>

                    <div class="how-to__item">
                        <div class="how-to__number">04.</div>
                        <div class="how-to__text">
                            <p>Dapatkan 1.250 poin untuk setiap <strong>Secret Word</strong> yang berhasil kamu temukan.</p>
                        </div>
                    </div>

                    <div class="how-to__item">
                        <div class="how-to__number">05.</div>
                        <div class="how-to__text">
                            <p>Ikutin terus <strong>Secret Word</strong> setiap <strong>Selasa & Sabtu</strong> untuk mendapatkan total <strong>10.000 poin</strong>.</p>
                        </div>
                    </div>

                </div>

            </div>

            <div id="tab-play-game" class="how-to">

                <div class="how-to__header">

                    <div class="how-to__left">

                        <div class="how-to__icon">
                            <img src="{{ asset('static/images/play-game-icon.png') }}" alt="">
                        </div>

                        <div class="how-to__info">
                            <div class="how-to__name">Play Game</div>
                            <div class="how-to__requirement">
                                <div class="how-to__cup">
                                    <img src="{{ asset('static/images/cup.png') }}" alt="">

                                </div>
                                <div class="how-to__point">
                                    <span>Max 30.000 points / month</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="how-to__right">
                        <a class="btn btn-crimson btn-point" href="{{route('game-index')}}" target="_blank">MAINKAN GAME</a>
                    </div>

                </div>

                <div class="how-to__content">

                    <div class="how-to__item">
                        <div class="how-to__number">01.</div>
                        <div class="how-to__text">
                            <p>Buka game dengan klik ???MAINKAN GAME??? di MyPoints atau ???CLICK HERE TO PLAY??? di Lazone.id.</p>
                        </div>
                    </div>

                    <div class="how-to__item">
                        <div class="how-to__number">02.</div>
                        <div class="how-to__text">
                            <p>Hindari rintangan dengan menggerakkan karakter dengan tombol atas dan bawah.</p>
                        </div>
                    </div>

                    <div class="how-to__item">
                        <div class="how-to__number">03.</div>
                        <div class="how-to__text">
                            <p>Setiap 3 detik permainan kamu akan mendapatkan 20 poin di dalam game, dan terus bertambah maksimal selama 150 detik.</p>
                        </div>
                    </div>

                    <div class="how-to__item">
                        <div class="how-to__number">04.</div>
                        <div class="how-to__text">
                            <p>Permainan berhenti jika kamu menabrak rintangan sebanyak 3 kali.</p>
                        </div>
                    </div>

                    <div class="how-to__item">
                        <div class="how-to__number">05.</div>
                        <div class="how-to__text">
                            <p>Mainkan gamenya setiap hari, dan dapatkan hingga 1.000 poin per hari.</p>
                        </div>
                    </div>
                </div>

            </div>

            <div id="tab-share-article" class="how-to">

                <div class="how-to__header">

                    <div class="how-to__left">

                        <div class="how-to__icon">
                            <img src="{{ asset('static/images/share-article-icon.png') }}" alt="">
                        </div>

                        <div class="how-to__info">
                            <div class="how-to__name">Share Article</div>
                            <div class="how-to__requirement">
                                <div class="how-to__cup">
                                    <img src="{{ asset('static/images/cup.png') }}" alt="">

                                </div>
                                <div class="how-to__point">
                                    <span>Max 9.000 points / month</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="how-to__right">
                        <a class="btn btn-crimson btn-point" href="https://mypoint.lazone.saga.id/" target="_blank">BACA ARTIKEL</a>
                    </div>

                </div>

                <div class="how-to__content">

                    <div class="how-to__item">
                        <div class="how-to__number">01.</div>
                        <div class="how-to__text">
                            <p>Daftar atau login ke akun LAZone.ID dan buka artikel yang mau kamu baca.</p>
                        </div>
                    </div>

                    <div class="how-to__item">
                        <div class="how-to__number">02.</div>
                        <div class="how-to__text">
                            <p>Setelah di halaman artikel, klik tombol share artikel ke Facebook atau Twitter (Maksimum 3 artikel yang bisa di share dalam satu hari).</p>
                        </div>
                    </div>

                    <div class="how-to__item">
                        <div class="how-to__number">03.</div>
                        <div class="how-to__text">
                            <p>Setiap melakukan share artikel, kamu akan mendapatkan 100 poin di akun MyPoints kamu.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>
