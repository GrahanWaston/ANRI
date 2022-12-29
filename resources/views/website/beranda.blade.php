@extends('website.header_footer')

@section('content')
    {{-- Hero Section --}}
    <div class="container-fluid  p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide " data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($slideshow as $slideshows)
                    @if ($slideshows->status == 'published')
                        <div class="carousel-item @if ($loop->first) active @endif">
                            <img class="d-block w-100" src="{{ asset('storage/' . $slideshows->image_dekstop) }}"
                                alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h3 class="display-3 text-white mb-0 animated zoomIn">{{ $slideshows->judul }}</h3>
                                    <h5 class="w-75 mx-auto text-white fw-normal mb-4 animated zoomIn">
                                        {{ $slideshows->deskripsi }}</h5>
                                    <a href="{{ $slideshows->tautan }}" class="btn btn-outline-light">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    {{-- Layanan --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a href="{{ $service[0]->url }}" target="_blank" class="text-decoration-none" rel="noopener noreferrer">
                        <div class="fact-item bg-light rounded text-center h-100 p-5">
                            <i class="fa fa-calendar fa-4x text-primary mb-4"></i>
                            <h3 class="fw-bold mb-3 text-center">{{ $service[0]->nama }}</h3>
                            <p class="text-center text-secondary mb-0">
                                {{ $service[0]->deskripsi }}
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a href="{{ $service[1]->url }}" target="_blank" class="text-decoration-none" rel="noopener noreferrer">
                        <div class="fact-item bg-light rounded text-center h-100 p-5">
                            <i class="fa fa-users-cog fa-4x text-primary mb-4"></i>
                            <h3 class="fw-bold mb-3 text-center">{{ $service[1]->nama }}</h3>
                            <p class="text-center text-secondary mb-0">
                                {{ $service[1]->deskripsi }}
                            </p>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <a href="{{ $service[2]->url }}" target="_blank" class="text-decoration-none"
                        rel="noopener noreferrer">
                        <div class="fact-item bg-light rounded text-center h-100 p-5">
                            <i class="fas fa-chalkboard-teacher fa-4x text-primary mb-4"></i>
                            <h3 class="fw-bold mb-3 text-center">{{ $service[2]->nama }}</h3>
                            <p class="text-center text-secondary mb-0">
                                {{ $service[2]->deskripsi }}
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Agenda --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="h-100">
                        <h2 class="section-title bg-white text-start text-primary pe-3">Agenda Diklat</h2>
                        <h6 class="mb-4">Agenda diklat terdekat yang akan dilaksanakan</h6>
                        <div class="row g-4">
                            @foreach ($program as $programs)
                                <div class="col-md-12">
                                    <div class="d-flex flex-row">
                                        <div>
                                            <span class="icon btn btn-circle btn-primary pe-none me-5"><span
                                                    class="number fs-18">01</span></span>
                                        </div>
                                        <div>
                                            <h5 class="mb-1 fw-bold">{{ $programs->nama_diklat }}</h5>
                                            <p class="mb-0">{{ $programs->created_at->format('Y-m-d') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-12 mx-auto d-flex">
                                <a href="/kalender-diklat" class="btn btn-lg btn-primary rounded mx-auto">Lihat Kalender
                                    Diklat</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="img-border">
                        <img class="img-fluid" src="img/gambar-14.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Kring Anri --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="img-border">
                        <img class="img-fluid" style="height: auto!important;"
                            src="{{ asset('/storage/' . $section->image) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        {!! $section->diskripsi !!}
                        <div class="col-md-12 mx-auto d-flex">
                            <a href="{{ $section->tautan }}" target="blank"
                                class="btn btn-lg btn-primary rounded">Kunjungi Kelas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    {{-- Publikasi --}}
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s"
                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <h6 class="section-title bg-white text-center text-primary px-3">Publikasi</h6>
                <h1 class="mb-5">Publikasi Pusdiklat Kearsipan ANRI</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s"
                    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="service-item h-100 d-flex flex-column justify-content-between">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/gambar-1.jpeg" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="#"
                                    class="flex-shrink-0 text-white btn btn-sm btn-primary px-3 rounded-pill">Baca
                                    Selengkapnya</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h5 class="mb-4">Kepala ANRI Tutup Rangkaian Acara Konferensi Bandung-Belgrade-Havana
                            </h5>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-tag text-primary me-2"></i>Berita</small>
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-calendar text-primary me-2"></i>20 Oktober 2022</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s"
                    style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <div class="service-item h-100 d-flex flex-column justify-content-between">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/gambar-1.jpg" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="#"
                                    class="text-white flex-shrink-0 btn btn-sm btn-primary px-3 rounded-pill">Baca
                                    Selengkapnya</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h5 class="mb-4">Pengumuman Kedua tentang Hasil Pendataan Pegawai Non ASN di Lingkungan Arsip
                                Nasional Republik Indonesia Tahun 2022</h5>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-tag text-primary me-2"></i>Pengumuman</small>
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-calendar text-primary me-2"></i>20 Oktober 2022</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s"
                    style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                    <div class="service-item h-100 d-flex flex-column justify-content-between">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/gambar-2.jpeg" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="#"
                                    class="flex-shrink-0 btn text-white btn-sm btn-primary px-3 rounded-pill">Baca
                                    Selengkapnya</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h5 class="mb-4">ANRI Selenggarakan Bimtek Pengelolaan Arsip Aset Nasional</h5>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-tag text-primary me-2"></i>Berita</small>
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-calendar text-primary me-2"></i>20 Oktober 2022</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mx-auto my-5 d-flex">
                <a href="informasi-publik.php" class="btn btn-lg btn-primary rounded mx-auto">Lihat Semua Publikasi</a>
            </div>
        </div>
    </div>

    {{-- Youtube --}}

    <section class="py-5 text-white bg-primary section-bg wow fadeInUp section-bg" data-wow-delay="0.1s">
        <img src="./img/bg-vid.jpg" alt="" class="bg" style="opacity:.3">
        <div class="container position-relative py-5">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h3 class=" text-white h1">Video Kegiatan</h3>
                    <p>
                        Kegiatan Pusdiklat Kearsipan Arsip Nasional Republik Indonesia </p>
                    <br><br>
                    <div class="overflow-hidden" style="border-radius: 1rem; rounded">
                        {!! $website->url_youtube !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Testimoni --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s"
                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <h6 class="bg-white text-center text-primary px-3">Testimoni</h6>
                <h1 class="mb-5">Kesan & Pesan Peserta Pusdiklat Kearsipan ANRI</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @foreach ($testimoni as $testimonis)
                    @if ($testimonis->status == 'published')
                        <div class="testimonial-item bg-light rounded p-4">
                            <div class="d-flex align-items-center mb-4">
                                <!-- <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-1.jpg" alt=""> -->
                                <div class="">
                                    <h5 class="mb-1">{{ $testimonis->name }}</h5>
                                    <span>{{ $testimonis->jabatan }}</span>
                                </div>
                            </div>
                            <p class="mb-0">{!! $testimonis->testimoni !!}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
