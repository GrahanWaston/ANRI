@extends('website.header_footer')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid header-faq py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Program Diklat</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Diklat</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Program Diklat</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <section class="wrapper">
        <div class="container py-5">
            <div class="row align-items-start py-5">
                
                    <div class="col-md-10 mx-auto col-lg-4 d-flex flex-column justify-content-start">
                        <h6 class="text-primary fw-bold h5 mb-3">Cari Program Diklat</h6>
                        <form action="/hasil-pencarian-program">
                        <div class="form-floating mb-3">
                            <input name="keywords" type="text" class="form-control" id="name" placeholder="Your Name">
                            <label for="name">Masukkan Kata Kunci</label>
                        </div>
                        <select name="jenis" class="form-select mb-3" aria-label="Default select example">
                            <option disabled selected>Pilih Jenis Diklat</option>
                            @foreach ($programs as $programm)
                                <option value="{{ $programm->jenis_id }}">{{ $programm->jenis->nama_jenis }}</option>
                            @endforeach
                        </select>
                        <select name="jenjang" class="form-select mb-3" aria-label="Default select example">
                            <option disabled selected>Pilih Jenjang</option>
                            @foreach ($programs as $programm)
                            <option value="{{ $programm->jenjang_id }}">{{ $programm->jenjang->jenjang }}</option>
                        @endforeach
                        </select>
                        <button class="btn btn-primary mb-3" type="submit">Cari</button>
                    </form>
                    </div>
                
                <div class="col-lg-8 text-center text-lg-start">
                    <h6 class="text-primary fw-bold h5 mb-3">Program Diklat Kearsipan ANRI</h6>
                    <div class="row">
                        @foreach ($programs as $program)
                            @if ($program->status == 'published')
                                <div class="col-lg-6 col-md-6 mb-3 wow fadeInUp" data-wow-delay="0.1s"
                                    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                                    <a href="/detail-program-diklat/{{ $program->kode_diklat }}"
                                        class="text-decoration-none">
                                        <div class="service-item h-100 d-flex flex-column justify-content-between">
                                            <div class="text-center p-4 pb-0">
                                                <h6 class="mb-2 fw-normal badge bg-secondary">
                                                    {{ $program->kode_diklat }}
                                                </h6>
                                                <h6 class="mb-2 fw-normal badge bg-primary">
                                                    {{ $program->jenis->nama_jenis }}
                                                </h6>
                                                <p class="fs-7 fw-bold text-dark my-3">
                                                    {{ $program->nama_diklat }}
                                                </p>

                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="flex-fill text-center text-secondary border-end py-2">
                                                    <i class="fa fa-calendar text-primary me-2"></i>
                                                    {{ $program->start_date }} - {{ $program->end_date }}
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                        <div class="d-flex justify-content-center mt-4 wow fadeInUp" data-wow-delay="0.1s">
                            {!! $programs->render() !!}
                        </div>
                    </div>
                </div>
                <nav class="mt-4">
                    <nav id="w1" class="pagination justify-content-center"></nav>
                </nav>
            </div>
    </section>
@endsection
