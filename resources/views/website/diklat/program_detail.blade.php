@extends('website.header_footer')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid header-faq py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Program Diklat Detail</h1>
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
    <section class="wrapper content">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="h5 my-2 text-center">Diklat Fungsional Pengangkatan Arsiparis Tingkat Ahli Angkatan I
                                Untuk Tahun 2022</h2>
                        </div>
                        <div class="card-body">
                            <h6 class="mb-2 fw-normal badge bg-secondary">
                                DFK.01.01.2022
                            </h6>
                            <h6 class="mb-2 fw-normal badge bg-primary">
                                PNBP Fungsional
                            </h6>
                            <div class="classic-view my-3">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" cellspacing="0"
                                        width="100%">
                                        <tbody>
                                            <tr>
                                                <td>Tanggal</td>
                                                <td>{{ $programs->start_date }} s.d {{ $programs->end_date }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tempat</td>
                                                <td>{{ $programs->tempat_diklat }}<br></td>
                                            </tr>
                                            <tr>
                                                <td>Biaya</td>
                                                <td>{{ $programs->biaya }}</td>
                                            </tr>
                                            <tr>
                                                <td>Durasi</td>
                                                <td>{{ $programs->durasi }}</td>
                                            </tr>
                                            <!-- <tr>
                                                        <td style="vertical-align:middle ;">File Pendukung</td>
                                                        <td class="d-flex justify-content-between align-items-center">
                                                            <p class="mb-0">Diklat Fungsional Pengangkatan Arsiparis.pdf</p>
                                                            <a href="#" class="btn btn-primary">Download</a>
                                                        </td>
                                                    </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <h3 class="mb-3">Deskripsi</h3>
                            {!! $programs->deskripsi !!}
                        </div>
                    </div>
                </div>
                <aside class="col-lg-4 order-sm-2">
                    <h5 class="pb-2">Program Diklat Lainnya</h5>
                    @foreach ($programs_diklat as $program)
                        <a href="/detail-program-diklat/{{ $program->kode_diklat }}" class="text-decoration-none py-5">
                            <div class="service-item d-flex flex-column justify-content-between">
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
                        <hr>
                    @endforeach
                </aside>
            </div>
        </div>
    </section>
@endsection
