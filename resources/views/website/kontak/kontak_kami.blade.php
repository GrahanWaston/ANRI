@extends('website.header_footer')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Kontak</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Kontak Kami</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl content py-5">
        <div class="container">
            <div class="card wow fadeIn" data-wow-delay="0.1s">
                <div class="row">
                    <div class="col-lg-6 align-self-stretch">
                        <div class="map map-full rounded-top rounded-lg-start">
                            {!! $website->maps !!}
                        </div>
                        <!-- /.map -->
                    </div>
                    <!--/column -->
                    <div class="col-lg-6 mx-auto p-5 ">
                        <h3 class="text-primary mb-4">Hubungi Kami</h3>
                        <div class="d-flex flex-row">
                            <i class="fa fa-map-marker-alt me-3"></i>
                            <p class="mb-2">
                                {{ $website->alamat }}
                            </p>
                        </div>
                        <div class="d-flex flex-row">
                            <i class="fa fa-phone-alt me-3"></i>
                            <p class="mb-2">{{ $website->no_telfon }}</p>
                        </div>
                        <div class="d-flex flex-row">
                            <i class="fab fa-whatsapp me-3"></i>
                            <p class="mb-2">{{ $website->no_whatsapp }}</p>
                        </div>
                        <div class="d-flex flex-row">
                            <i class="fa fa-envelope me-3"></i>
                            <p class="mb-2">{{ $website->email_pertama }}</p>
                        </div>
                        <div class="d-flex flex-row">
                            <i class="fa fa-envelope me-3"></i>
                            <p class="mb-2">{{ $website->email_kedua }}</p>
                        </div>
                        <!--/div -->
                    </div>
                    <!--/column -->
                </div>
                <!--/.row -->
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Google Map Start -->
    <div class="container-xxl pt-5 px-0 wow fadeIn" data-wow-delay="0.1s">
    </div>
    <!-- Google Map End -->
@endsection
