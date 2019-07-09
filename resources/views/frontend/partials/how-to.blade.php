<div class="container">

    <div class="row point-tab">

        <div class="span-12 span-lg-10 off-lg-1">

            <div class="section-title section-title--plain section-title--page">
                <span class="section-title__label section-title__label--category semibold">How To Get Points?</span>
            </div>

            <ul class="list flex-justify-center jsPointTab">
                <li class="list__item">
                    <a href="#tab-complete-profile" class="list__link list__link--tab">Complete Profile</a>
                </li>
                <li class="list__item">
                    <a href="#tab-referal-code" class="list__link list__link--tab">Referal code</a>
                </li>
                <li class="list__item">
                    <a href="#tab-quiz" class="list__link list__link--tab">Quiz</a>
                </li>
                <li class="list__item">
                    <a href="#tab-secret-world" class="list__link list__link--tab">Secret World</a>
                </li>
                <li class="list__item">
                    <a href="#tab-daily-login" class="list__link list__link--tab">Daily Login</a>
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
                        <a class="btn btn-crimson btn-point" href="https://{{ env('CAS_HOSTNAME') }}/profile">GO TO COMPLETE PROFILE</a>
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
                            <p>Pergi ke halaman "My Profile" dan isi semua data yang dibutuhkan, termasuk upload Foto Diri, dll</p>
                        </div>
                    </div>

                    <div class="how-to__item">
                        <div class="how-to__number">03.</div>
                        <div class="how-to__text">
                            <p>Verifikasi nomor handphone atau alamat emailmu</p>
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
                                    <span>Max 3.100/MONTH</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="how-to__right">
                        <a class="btn btn-crimson btn-point" href="{{ env('URL_MYPOINT') }}">GO TO DAILY LOGIN</a>
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

            <div id="tab-referal-code" class="how-to">

                <div class="how-to__header">

                    <div class="how-to__left">

                        <div class="how-to__icon">
                            <img src="{{ asset('static/images/mock/referalcode.svg') }}" alt="">
                        </div>

                        <div class="how-to__info">
                            <div class="how-to__name">Referal Code</div>
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
                        <a class="btn btn-crimson btn-point" href="{{ env('URL_MYPOINT') }}">GO TO REFERAL CODE</a>
                    </div>

                </div>

                <div class="how-to__content">

                    <div class="how-to__item">
                        <div class="how-to__number">01.</div>
                        <div class="how-to__text">
                            <p>Setiap member akan mendapatkan referal code yang bisa digunakan untuk mendapatkan poin dengan memastikan bahwa anggota baru memasukan referal codemu</p>
                        </div>
                    </div>

                    <div class="how-to__item">
                        <div class="how-to__number">02.</div>
                        <div class="how-to__text">
                            <p>Dapatkan 500 poin untuk setiap anggota baru yang memasukan referal codemu (maksimum 10 orang per bulan)</p>
                        </div>
                    </div>

                    <div class="how-to__item">
                        <div class="how-to__number">03.</div>
                        <div class="how-to__text">
                            <p>Anggota baru yang berhasil memasukan referal codemu akan mendapatkan 2.000 poin</p>
                        </div>
                    </div>

                </div>

            </div>

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
                                    <span>Max 8.000 points</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="how-to__right">
                        <a class="btn btn-crimson btn-point" href="{{ env('URL_MYPOINT') }}">GO TO QUIZ</a>
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
                            <p>Setiap jawaban yang benar, member akan mendapatkan 100 poin</p>
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
                                    <span>Max 8000 points</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="how-to__right">
                        <a class="btn btn-crimson btn-point" href="javascript:void(0)">GO TO SECRET WORD</a>
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
                            <p>Dapatkan 1.000 poin untuk setiap <strong>Secret Word</strong> yang berhasil kamu temukan.</p>
                        </div>
                    </div>

                    <div class="how-to__item">
                        <div class="how-to__number">05.</div>
                        <div class="how-to__text">
                            <p>Ikutin terus <strong>Secret Word</strong> setiap <strong>Selasa & Sabtu</strong> untuk mendapatkan total <strong>8.000 poin</strong>.</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
