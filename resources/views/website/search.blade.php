@extends('website.header_footer')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid header-faq py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Pencarian</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pencarian</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <section class="wrapper py-5">
        <div class="container py-1">

            <div class="row align-items-start py-5">
                <div class="text-center">
                    <h3 class="text-center">Publikasi Berita dan Infografis</h3>
                    @if ($publikasi->count())
                        <div class="row">
                            @foreach ($publikasi as $publication)
                                @if ($publication->status == 'published')
                                    <div class="col-lg-4 col-md-6 mb-3 wow fadeInUp" data-wow-delay="0.1s"
                                        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                                        <a href="detail-berita.php" class="text-decoration-none">
                                            <div class="service-item h-100 d-flex flex-column justify-content-between">
                                                <div class="text-center p-4 pb-0">
                                                    <img class="card-img-top"
                                                        src="{{ asset('storage/' . $publication->image_main) }}"
                                                        alt="Card image cap">
                                                    <p class="fs-7 fw-bold text-dark my-3">
                                                        {{ $publication->title }}
                                                    </p>
                                                </div>
                                                <div class="d-flex border-top">
                                                    <small class="flex-fill text-center text-secondary border-end py-2">
                                                        <i class="fa fa-tag text-primary me-2"></i>
                                                        {{ $publication->category->category }}
                                                    </small>
                                                    <small class="flex-fill text-center text-secondary border-end py-2">
                                                        <i class="fa fa-calendar text-primary me-2"></i>
                                                        {{ $publication->created_at }}
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <p class="text-center fs-4">No Post Found.</p>
                    @endif
                    <div class="d-flex justify-content-center mt-4 wow fadeInUp" data-wow-delay="0.1s">
                        {{ $publikasi->appends([
                            'file' => $file->currentPage(),
                            'program' => $program->currentPage(),
                        ])->links() }}
                    </div>
                </div>
            </div>
            <div class="row align-items-start py-1">
                <div class="text-center">
                    <h3 class="text-center">File Pengumuman dan Artikel</h3>
                    @if ($publikasi->count())
                        <div class="row">
                            @foreach ($file as $files)
                                @if ($files->status == 'published')
                                    <div class="col-lg-4 col-md-6 mb-3 wow fadeInUp" data-wow-delay="0.1s"
                                        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                                        <a href="detail-berita.php" class="text-decoration-none">
                                            <div class="service-item h-100 d-flex flex-column justify-content-between">
                                                <div class="text-center p-4 pb-0">
                                                    <p class="fs-7 fw-bold text-dark my-3">
                                                        {{ $files->title }}
                                                    </p>
                                                </div>
                                                <div class="d-flex border-top">
                                                    <small class="flex-fill text-center text-secondary border-end py-2">
                                                        <i class="fa fa-tag text-primary me-2"></i>
                                                        {{ $files->category->category }}
                                                    </small>
                                                    <small class="flex-fill text-center text-secondary border-end py-2">
                                                        <i class="fa fa-calendar text-primary me-2"></i>
                                                        {{ $files->created_at }}
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <p class="text-center fs-4">No Post Found.</p>
                    @endif
                    <div class="d-flex justify-content-center mt-4 wow fadeInUp" data-wow-delay="0.1s">
                        {{ $file->appends([
                            'publikasi' => $publikasi->currentPage(),
                            'program' => $program->currentPage(),
                        ])->links() }}
                    </div>
                </div>
            </div>
            <div class="row align-items-start py-1">
                <div class="text-center">
                    <h3 class="text-center">Program Diklat</h3>
                    @if ($program->count())
                        <div class="row">
                            @foreach ($program as $programs)
                                @if ($programs->status == 'published')
                                    <div class="col-lg-4 col-md-6 mb-3 wow fadeInUp" data-wow-delay="0.1s"
                                        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                                        <a href="detail-berita.php" class="text-decoration-none">
                                            <div class="service-item h-100 d-flex flex-column justify-content-between">
                                                <div class="text-center p-4 pb-0">
                                                    <p class="fs-7 fw-bold text-dark my-3">
                                                        {{ $programs->nama_diklat }}
                                                    </p>
                                                </div>
                                                <div class="d-flex border-top">
                                                    <small class="flex-fill text-center text-secondary border-end py-2">
                                                        <i class="fa fa-calendar text-primary me-2"></i>
                                                        {{ $programs->created_at }}
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <p class="text-center fs-4">No Post Found.</p>
                    @endif
                    <div class="d-flex justify-content-center mt-4 wow fadeInUp" data-wow-delay="0.1s">
                        {{ $program->appends([
                            'publikasi' => $publikasi->currentPage(),
                            'file' => $file->currentPage(),
                        ])->links() }}
                    </div>
                </div>
            </div>

        </div>
        {{-- <div class="container py-1">
            <div class="row align-items-start py-5">
                <div class="text-center">
                    <h3 class="text-center">Publikasi Berita dan Infografis</h3>
                    <div class="row">
                        @foreach ($publikasi as $publication)
                            @if ($publication->status == 'published')
                                <div class="col-lg-4 col-md-6 mb-3 wow fadeInUp" data-wow-delay="0.1s"
                                    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                                    <a href="detail-berita.php" class="text-decoration-none">
                                        <div class="service-item h-100 d-flex flex-column justify-content-between">
                                            <div class="text-center p-4 pb-0">
                                                <img class="card-img-top"
                                                    src="{{ asset('storage/' . $publication->image_main) }}"
                                                    alt="Card image cap">
                                                <p class="fs-7 fw-bold text-dark my-3">
                                                    {{ $publication->title }}
                                                </p>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="flex-fill text-center text-secondary border-end py-2">
                                                    <i class="fa fa-tag text-primary me-2"></i>
                                                    {{ $publication->category->category }}
                                                </small>
                                                <small class="flex-fill text-center text-secondary border-end py-2">
                                                    <i class="fa fa-calendar text-primary me-2"></i>
                                                    {{ $publication->created_at }}
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center mt-4 wow fadeInUp" data-wow-delay="0.1s">
                        @if ($publikasi->count() > 0)
                            {{ $publication->links }}
                        @else
                            <p>Tidak ada yang sesuai dengan kata kunci</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row align-items-start py-1">
                <div class="text-center">
                    <h3 class="text-center">File Pengumuman dan Artikel</h3>
                    <div class="row">
                        @foreach ($file as $files)
                            @if ($files->status == 'published')
                                <div class="col-lg-4 col-md-6 mb-3 wow fadeInUp" data-wow-delay="0.1s"
                                    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                                    <a href="detail-berita.php" class="text-decoration-none">
                                        <div class="service-item h-100 d-flex flex-column justify-content-between">
                                            <div class="text-center p-4 pb-0">
                                                <p class="fs-7 fw-bold text-dark my-3">
                                                    {{ $files->title }}
                                                </p>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="flex-fill text-center text-secondary border-end py-2">
                                                    <i class="fa fa-tag text-primary me-2"></i>
                                                    {{ $files->category->category }}
                                                </small>
                                                <small class="flex-fill text-center text-secondary border-end py-2">
                                                    <i class="fa fa-calendar text-primary me-2"></i>
                                                    {{ $files->created_at }}
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center mt-4 wow fadeInUp" data-wow-delay="0.1s">
                        @if ($file->count() > 0)
                            {{ $file->links }}
                        @else
                            <p>Tidak ada yang sesuai dengan kata kunci</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row align-items-start py-1">
                <div class="text-center">
                    <h3 class="text-center">Program Diklat</h3>
                    <div class="row">
                        @foreach ($program as $programs)
                            @if ($programs->status == 'published')
                                <div class="col-lg-4 col-md-6 mb-3 wow fadeInUp" data-wow-delay="0.1s"
                                    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                                    <a href="detail-berita.php" class="text-decoration-none">
                                        <div class="service-item h-100 d-flex flex-column justify-content-between">
                                            <div class="text-center p-4 pb-0">
                                                <p class="fs-7 fw-bold text-dark my-3">
                                                    {{ $programs->nama_diklat }}
                                                </p>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="flex-fill text-center text-secondary border-end py-2">
                                                    <i class="fa fa-calendar text-primary me-2"></i>
                                                    {{ $programs->created_at }}
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center mt-4 wow fadeInUp" data-wow-delay="0.1s">
                        @if ($program->count() > 0)
                            {{ $program->links }}
                        @else
                            <p>Tidak ada yang sesuai dengan kata kunci</p>
                        @endif
                    </div>
                </div>
            </div>
        </div> --}}
    </section>
@endsection
