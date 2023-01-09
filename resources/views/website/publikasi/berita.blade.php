@extends('website.header_footer')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid header-faq py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Berita</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Publikasi</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Berita</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container py-5">
        <div class="d-flex justify-content-end">
            <div class="col-4">
                <form action="/hasil-pencarian-berita-artikel">
                    <div class="d-flex form-inputs">
                        <input name="keywords" class="form-control" type="text" placeholder="Masukkan Kata Kunci...">
                        <i class="fa fa-search"></i>
                    </div>
                </form>
            </div>
        </div>
        <div class="row align-items-start py-5">
            <div class="text-center">
                <div class="row">
                    @foreach ($news as $berita)
                        @if ($berita->status == 'published')
                            <div class="col-lg-4 col-md-6 mb-3 wow fadeInUp" data-wow-delay="0.1s"
                                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                                <a href="/berita-detail/{{ $berita->slug }}" class="text-decoration-none">
                                    <div class="service-item h-100 d-flex flex-column justify-content-between">
                                        <div class="text-center p-4 pb-0">
                                            <img class="card-img-top" src="{{ asset('storage/' . $berita->image_main) }}"
                                                alt="Card image cap">
                                            <p class="fs-7 fw-bold text-dark my-3">
                                                {{ $berita->title }}
                                            </p>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center text-secondary border-end py-2">
                                                <i class="fa fa-tag text-primary me-2"></i>
                                                {{ $berita->category->category }}
                                            </small>
                                            <small class="flex-fill text-center text-secondary border-end py-2">
                                                <i class="fa fa-calendar text-primary me-2"></i>
                                                {{ $berita->created_at->translatedFormat('d F Y') }}
                                            </small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach

                </div>
                <div class="d-flex justify-content-center mt-4 wow fadeInUp" data-wow-delay="0.1s">
                    {!! $news->render() !!}


                </div>
            </div>

        </div>
        <nav class="mt-4">
            <nav id="w1" class="pagination justify-content-center"></nav>
        </nav>
    </div>
@endsection
