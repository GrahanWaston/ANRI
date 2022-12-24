@extends('website.header_footer')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">
                Prasarana dan Sarana</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">
                        Prasarana dan Sarana</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4 justify-content-center">
                @foreach ($sarpras as $prasas)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s"
                        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <div class="service-item bg-light overflow-hidden h-100">
                            <a href="{{ asset('storage/' . $prasas->image) }}" class="card-image" data-fancybox="galeri"
                                data-caption="{{ $prasas->deskripsi }}">
                                <img class="img-fluid object-fit-cover" src="{{ asset('storage/' . $prasas->image) }}"
                                    alt="">
                                <div class="service-text position-relative text-center h-100 p-4">
                                    <h5 class="mb-3">{{ $prasas->deskripsi }}</h5>
                                    <!-- <p>Tempor erat elitr rebum at clita dolor diam ipsum sit diam amet diam et eos</p> -->
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
@endsection
