@extends('website.header_footer')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid header-faq py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Gedung Hall A</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Sarana & Prasarana</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <section class="wrapper py-5">
        <div class="container py-5">
            <div class="card">
                <div class="card-header">
                    <h2 class="h4 my-2">Gedung Hall A</h2>
                </div>
                <div class="card-body">
                    <!-- <h6 class="mb-2 fw-normal badge bg-secondary">
                        DFK.01.01.2022
                    </h6>
                    <h6 class="mb-2 fw-normal badge bg-primary">
                        PNBP Fungsional
                    </h6>
                    <div class="classic-view my-3">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>08/02/2021 s.d 26/03/2021</td>
                                    </tr>
                                    <tr>
                                        <td>Tempat</td>
                                        <td>Distance Learning ( Diklat Jarak Jauh )<br></td>
                                    </tr>
                                    <tr>
                                        <td>Biaya</td>
                                        <td>Rp. 6790000</td>
                                    </tr>
                                    <tr>
                                        <td>Durasi</td>
                                        <td>280 Jam Pelajaran</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle ;">File Pendukung</td>
                                        <td class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">Diklat Fungsional Pengangkatan Arsiparis.pdf</p>
                                            <a href="#" class="btn btn-primary">Download</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr> -->
                    <h3 class="mb-3">Deskripsi</h3>
                    <p class="text-justify mb-5">Diklat ini bertujuan untuk memberikan bekal bagi Sumber Daya Manusia (SDM)
                        di bidang kearsipan. Di dalam kelas, peserta diklat akan mempelajari tentang teori kearsipan, serta
                        pemahaman tentang penyelenggaraan kearsipan, termasuk pengelolaan arsip baik arsip dinamis maupun
                        arsip statis, mulai dari tahap penciptaan, penggunaan, pemeliharaan, dan penyusutan, sampai pada
                        tahap pengelolaan statis. Selain itu, peserta diklat mendapatkan pengetahuan metode penelitian dan
                        teknik penulisan ilmiah yang dapat membantu dalam pembuatan penulisan karya tulis ilmiah dan
                        pembuatan manual kearsipan, serta pemahaman tentang jabatan fungsional Arsiparis dan angka kredit.
                        Kemudian, di instansi masing-masing, peserta diklat melakukan program aktualisasi yang dibuktikan
                        dengan kegiatan magang untuk menerapkan pembelajaran di kelas. Pada sesi akhir diklat, peserta
                        diwajibkan membuat laporan hasil magang dan dikirimkan paling lambat 7 (tujuh) hari kalender setelah
                        kegiatan magang berakhir. Setelah mengikuti diklat ini, peserta diharapkan mampu mengaplikasikan
                        pengetahuan, keterampilan, dan sikap sebagai Pejabat Fungsional Arsiparis Tingkat Ahli.</p>

                    <hr>
                    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
                        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0" class="active"
                                    aria-current="true" aria-label="Slide 1">
                                    <img class="img-fluid" src="img/diklat-1.jpg" alt="Image">
                                </button>
                                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="1"
                                    aria-label="Slide 2">
                                    <img class="img-fluid" src="img/diklat-2.jpg" alt="Image">
                                </button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="img-fluid" src="img/diklat-1.jpg" alt="Image">
                                    <!-- <div class="carousel-caption">
                                        <div class="p-3" style="max-width: 900px;">
                                            <h2 class="display-2 text-white mb-0 animated zoomIn">PUSDIKLAT KEARSIPAN</h2>
                                            <h4 class="text-white text-uppercase mb-4 animated zoomIn">Melaksanakan pendidikan dan pelatihan agar tercipta sumber daya manusia yang berkualitas</h4>
                                            <button class="btn btn-outline-light">Selengkapnya</button>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="carousel-item">
                                    <img class="img-fluid" src="img/diklat-2.jpg" alt="Image">
                                    <!-- <div class="carousel-caption">
                                        <div class="p-3" style="max-width: 900px;">
                                            <h2 class="display-2 text-white mb-0 animated zoomIn">PROGRAM DIKLAT</h2>
                                            <h4 class="text-white text-uppercase mb-4 animated zoomIn">Program diklat yang disediakan oleh Arsip Nasional RI</h4>
                                            <button class="btn btn-outline-light">Selengkapnya</button>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- <div class="carousel-item">
                        <img class="img-fluid" src="v1/img/carousel-3.jpg" alt="Image">
                        <div class="carousel-caption">
                            <div class="p-3" style="max-width: 900px;">
                                <h4 class="text-white text-uppercase mb-4 animated zoomIn">We Are Leader In</h4>
                                <h1 class="display-1 text-white mb-0 animated zoomIn">Creative & Innovative Digital Solution</h1>
                            </div>
                        </div>
                    </div> -->
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
