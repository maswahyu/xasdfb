@extends('frontend.layouts.skeleton')

@section('meta_title', 'Privacy Policy')
@section('head_title', 'Privacy Policy')
@section('head_url', url('privacy-policy'))

@section('content')

{{-- Ads Placement --}}
<div class="container">

    <div class="row">

        <div class="span-12">

            <div class="placement placement--top-margin-0">
                <a href="{{ $ads['url'] }}?utm_source=AdsArticle" alt="{{ $ads['url'] }}">
                    <img class="placement__img" src="{{ $ads['image'] }}" alt="{{ $ads['url'] }}">
                </a>
            </div>

        </div>

    </div>

    <div class="row">

        <div class="span-12 span-lg-10 off-lg-1 span-xl-8 off-xl-2">

            <div class="post-header text-center">

                <h1 class="post-header__title"> PRIVACY POLICY </h1>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="span-12 span-lg-10 span-xl-12 post-content">

            <div id="post-content">

                <h5>KEBIJAKAN PRIVASI</h5>

                <p>Terima kasih atas kunjungan Anda ke situs LAzone.id  Kami selalu berusaha untuk melakukan yang terbaik, antara lain berupaya menumbuhkan dan menjaga kepercayaan Anda selaku pengguna situs kami dengan melindungi informasi pribadi milik Anda yang bersifat pribadi dan rahasia. Dengan mengunjungi dan mendaftarkan diri Anda sebagai member pada situs LAzone.id, maka Anda setuju untuk terikat kepada syarat-syarat dan ketentuan berikut. Kami mungkin mengubah syarat-syarat dan kondisi ini sewaktu-waktu, dan oleh karenanya Anda diharapkan untuk melakukan pengecekan secara berkala ke situs LAzone.id. Dengan mengakses situs LAzone.id, berarti Anda menerima apapun syarat-syarat dan ketentuan yang baru maupun yang telah dimodifikasi.</p>

                <h5>MEMBERIKAN DATA/INFORMASI YANG DIPERLUKAN</h5>

                <p>Kami bisa saja menanyakan data pribadi Anda. Kami akan memerlukan data-data pribadi dari Anda antara lain sebagai berikut: Nama Lengkap; Tanggal Lahir; Jenis Kelamin; Provinsi; Alamat Email; Nomor Telepon dan Nomor KTP.</p>

                <p>Semua informasi yang diberikan oleh Anda tersebut akan kami simpan sebaik-baiknya dengan memperhatikan faktor keamanan dan akses ke data tersebut hanya diperbolehkan pada staf kami yang memiliki otorisasi saat mereka membutuhkan untuk alasan operasional.</p>

                <h5>TUJUAN PENGUMPULAN DATA</h5>

                <p>Informasi dan data-data pribadi yang diperoleh oleh kami hanya akan digunakan antara lain untuk:</p>
                    <ol>
                        <li>
                            Memproses aplikasi dan/atau segala bentuk pendaftaran dan/atau komunikasi yang diajukan oleh Anda;
                        </li>
                        <li>
                            Melakukan komunikasi dengan dan/atau memberikan tanggapan kepada Anda yang ingin mendapatkan keterangan dan/atau informasi lebih lanjut mengenai situs LAzone.id;
                        </li>
                        <li>
                            Verifikasi data-data/identitas dalam hal Anda mengikuti suatu kuis/activation, menggunakan Program Application Programming Interface-API (kontes, lomba, maupun undian berhadiah yang diselenggarakan oleh situs LAzone.id;
                        </li>

                        <li>
                            Mengumpulkan data transaksi antara Anda dengan Kami dan ataupun Mitra usaha Kami, termasuk informasi mengenai penggunaan anda terhadap produk-produk dan layanan yang kami sediakan.
                        </li>

                        <li>
                            Pelaksanaan riset-riset guna pengembangan situs LAzone.id, peningkatan pelayanan Kami dan/atau memenuhi permintaan Anda terhadap produk dan layanan yang disediakan oleh situs LAzone.id.
                        </li>
                    </ol>

                <h5>PEMBERIAN DAN PENGUNGKAPAN INFORMASI KEPADA PIHAK LAIN</h5>
                <p>
                    Bahwa kecuali untuk kepentingan pengumpulan data sebagaimana telah diungkapkan di atas, situs LAzone.id tidak akan menjual, mengalihkan, mendistribusikan dan/atau membuka informasi dan data-data pribadi Anda kepada orang lain dan/atau Pihak Ketiga yang tidak berkepentingan.
                </p>

                <p>
                    Namun demikian, Kami dapat memberikan informasi sebagaimana dimaksud kepada pihak-pihak yang masih berkaitan dengan Kami dengan syarat bahwa pihak-pihak tersebut wajib mematuhi Kebijakan Privasi ini. Pihak-pihak tersebut yaitu antara lain adalah:
                </p>

                    <ol>
                        <li>
                            Mitra usaha yang diberikan tugas oleh Kami untuk membantu dalam proses aplikasi, investigasi dan verifikasi atas data-data pribadi Anda;
                        </li>
                        <li>
                            Pihak lain yang atas nama Kami diwajibkan untuk melaksanakan suatu pekerjaan yang dalam pelaksanaannya perlu mengetahui informasi yang dilindungi tersebut.
                        </li>
                    </ol>
                <p>
                    Dalam hal diperlukan dan/atau diperintahkan oleh Pengadilan dan/atau pejabat suatu instansi pemerintah Indonesia berdasarkan wewenang sah yang diberikan oleh ketentuan perundang-undangan, maka dalam rangka memenuhi perintah tersebut Kami dapat membuka akses atas informasi yang diperlukan sebagaimana dimaksud. Sehubungan dengan hal tersebut, maka Anda setuju untuk membebaskan Kami dari segala klaim, tuntutan, dan atau gugatan yang berkaitan dengan pemberian akses atas informasi tersebut.
                </p>

                <h5>PENGGUNAAN FASILITAS "SHARE" UNTUK FACEBOOK & TWITTER</h5>
                <p>
                    Situs LAzone.id dilengkapi dengan fasilitas “share” konten menuju akun pribadi Facebook dan Twitter Anda. Patut diketahui bahwa nama akun dan kata sandi untuk akun Facebook dan Twitter Anda tidak tersimpan dalam database situs LAzone.id. Nama akun dan kata sandi Anda tersebut tetap tersimpan dalam sosial media yang terafiliasi dan bukan menjadi tanggung jawab situs LAzone.id.
                </p>

                <h5>MODIFIKASI PERSYARATAN DAN PERATURAN DASAR</h5>
                <p>
                    Penggunaan situs dan informasi yang disebarkan bersamaan dengan situs LAzone.id ini, ditawarkan kepada Anda atas dasar kesediaan Anda untuk menerima Kebijakan Privasi kami, dan maklumat lainnya yang termuat dalam situs LAzone.id ini. Dengan menggunakan situs atau semua konten yang berada di dalam situs LAzone.id ini, berarti Anda mengetahui dan menyetujui Kebijakan Privasi kami, dan maklumat lainnya yang termuat dalam situs LAzone.id ini. Jika Anda tidak sepakat untuk terikat dan mematuhi ketentuan tersebut, Anda tidak diperbolehkan untuk mengakses atau menggunakan informasi, layanan, atau situs LAzone.id kami.
                </p>
                <p>
                    Kami berhak, atas kewenangannya sendiri, untuk mengubah, menambah, atau menghilangkan syarat dan ketentuan apapun dari Kebijakan Privasi ini tanpa sepengetahuan dan persetujuan Anda. Tiap perubahan terhadap Kebijakan Privasi ini secara efektif dan langsung mengikuti pemberitahuan perubahan dalam situs LAzone.id ini. Anda menyetujui untuk meninjau Kebijakan Privasi ini dari waktu ke waktu dan menyetujui bahwa setiap penggunaan situs LAzone.id berikutnya sebagai akibat dari adanya perubahan terhadap Kebijakan Privasi ini menunjukkan penerimaan Anda terhadap semua perubahan tersebut.
                </p>

                <h5>COOKIES</h5>

                <p>Cookie adalah sejenis file yang berisi informasi yang dikirimkan oleh suatu situs ke hard-drive komputer setiap pengakses situs tersebut untuk keperluan pencatatan oleh komputer pengakses seperti:</p>

                <ol>
                    <li>
                        Alamat Internet Protocol (IP Address) dari pengakses;
                    </li>
                    <li>
                        Tipe browser dan operating system yang dipergunakan oleh pengakses;
                    </li>
                    <li>
                        Hari, tanggal, dan jam saat pengakses melakukan akses terhadap suatu situs;
                    </li>
                    <li>
                        Data yang berfungsi untuk memonitor kegiatan pengakses pada suatu situs;
                    </li>
                    <li>
                        Alamat situs yang diakses oleh pengakses.
                    </li>
                </ol>

                <p>Situs LAzone.id menggunakan cookies untuk berbagai tujuan antara lain yaitu untuk membantu Anda dalam hal Anda memutuskan untuk mengunjungi kembali situs LAzone.id di kemudian hari, menghitung jumlah orang yang melakukan akses ke situs LAzone.id, serta mengingat kembali pengakses sebagaimana dimaksud dalam hal pengakses melakukan transaksi, mengikuti kuis, permainan, konter, lomba, dan/atau undian berhadiah yang diselenggarakan oleh situs LAzone.id.</p>

                <h5>DAFTAR DIREKTORI DAN LAYANAN</h5>

                <p>
                    Situs LAzone.id ini berisi direktori yang memungkinkan Anda mendapatkan sendiri dan / atau akses informasi tentang member yang lain dan / atau layanan yang mereka pergunakan.
                </p>

                <p>
                    Situs LAzone.id mungkin menyediakan links dan detail kontak yang terdapat dalam situs LAzone.id, dimana links dan detail kontak tersebut dimaksudkan untuk referensi dan kenyamanan saja.
                </p>

                <h5>PENGELOLAAN SITUS LAzone.id</h5>

                <p>
                    Bahwa situs LAzone.id ini dimiliki oleh PT Perada Swara Productions dan pengelolaannya dilakukan oleh PT Saga Digital Studio yang bertanggung jawab sepenuhnya atas: (i) Pengelolaan dan manajemen hosting dan domain Situs LAzone.id; dan (ii) Penyediaan, pengelolaan serta pemeliharaan content (isi) Situs LAzone.id termasuk tetapi tidak terbatas pada penyelenggaraan kuis, permainan, polling, lomba, dan/atau sayembara/undian berhadiah yang diselenggarakan oleh Situs LAzone.id ini. Bahwa seluruh hadiah yang diberikan dalam rangka penyelenggaraan kuis, permainan, polling, lomba, dan/atau sayembara/undian berhadiah tersebut, disediakan dan diberikan oleh PT Perada Swara Productions kepada Anda/pengunjung situs yang beruntung ataupun telah memenuhi syarat-syarat yang telah ditetapkan.
                </p>

                <h5>HUKUM</h5>

                <p>
                    Syarat-syarat dan ketentuan dalam Kebijakan Privasi ini tunduk kepada hukum di wilayah Negara Kesatuan Republik Indonesia.
                </p>

            </div>
        </div>

    </div>

</div>

@endsection
