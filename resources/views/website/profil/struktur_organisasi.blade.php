@extends('website.header_footer')

@section('content')
  <!-- Page Header Start -->
<div class="container-fluid header-faq py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-3">Struktur Organisasi</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Profil</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Struktur Organisasi</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
<section class="wrapper content">
    <div class="container  py-5">
        <div class="d-flex justify-content-center">
            <div class="card border-0  py-3">
                <div class="card-body">
                    {!! $struktur_organisasi->deskripsi !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
