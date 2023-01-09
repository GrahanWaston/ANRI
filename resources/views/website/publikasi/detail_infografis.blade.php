@extends('website.header_footer')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid header-faq py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Infografis</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Publikasi</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Infografis</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <section class="wrapper content">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="h4 my-2">{{ $publikasi->title }}</h2>
                        </div>
                        <div class="card-body">
                            <div class="classic-view my-3">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" cellspacing="0"
                                        width="100%">
                                        <tbody>
                                            <tr>
                                                <td><img src="{{ asset('storage/' . $publikasi->image_main) }}"
                                                        class="w-100" alt=""></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            {!! $publikasi->body !!}
                        </div>
                    </div>
                </div>
                <aside class="col-lg-4 order-sm-2">
                    <h5 class="pb-2">Infografis Lainnya</h5>
                    @foreach ($info->take(3) as $berita)
                    <a href="/informasi-detail/{{ $berita->slug }}" class="text-decoration-none py-5">
                        <div class="service-item d-flex bg-white flex-column justify-content-between">
                            <div class="text-center p-4 pb-0">
                                <img class="card-img-top"
                                    src="{{ asset('storage/' . $berita->image_main) }}"
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
                    <hr> 
                    @endforeach
                </aside>
            </div>
        </div>
    </section>
@endsection
