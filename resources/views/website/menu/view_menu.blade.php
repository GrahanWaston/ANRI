@extends('website.header_footer')
{{-- @dd($pages) --}}
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid header-faq py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">{{ $pages->judul }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">{{ $pages->nama_menu }}</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
