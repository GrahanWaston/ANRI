@extends('website.header_footer')
{{-- @dd($pengumuman) --}}
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid header-faq py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Pengumuman</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Publikasi</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Pengumuman</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="container py-5">
        <form action="/hasil-pencarian-pengumuman">
            <div class="row my-4 justify-content-center">
                <div class="col-3"></div>
                <div class="col-3 px-3">
                </div>
                <div class="col-3 px-3">
                    <select class="form-select" aria-label="Default select example" name="tahun">
                        <option selected disabled>Tahun</option>
                        @foreach ($pengumuman as $article)
                            <option value="{{ $article->year }}">{{ $article->year }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3 px-3">
                    <div class="d-flex form-inputs">
                        <input class="form-control" name="keywords" type="text" placeholder="Masukkan Kata Kunci...">
                        <i class="fa fa-search"></i>
                    </div>
                </div>
            </div>
        </form>
        <div class="row align-items-start py-5">
            <div class="mx-auto">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="table-responsive mb-4">
                                <table class="table table-hover">
                                    <thead style="background-color: #f7f7f7;">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama File</th>
                                            <th scope="col"> Tahun </th>
                                            <th scope="col" class="text-center">Tautan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengumuman as $pengumumans)
                                            @if ($pengumumans->status == 'published')
                                                <tr>
                                                    <td style="line-height: 1.3;">{{ $loop->iteration }}</td>
                                                    <td style="line-height: 1.3;">{{ $pengumumans->title }}</td>
                                                    <td style="line-height: 1.3;">{{ $pengumumans->year }}</td>
                                                    <td class="text-center" style="line-height: 1.3;">
                                                        <a href="{{ asset('storage/' . $pengumumans->file) }}"
                                                            class="btn btn-sm btn-primary"
                                                            target="&quot;blank&quot;">Download</a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <aside class="col-lg-4 order-sm-2">
                        <h5 class="pb-2">Pengumuman Lainnya</h5>
                        @foreach ($pengumuman->take(3) as $pengumumans)
                            @if ($pengumumans->status == 'published')
                                <a href="{{ asset('storage/' . $pengumumans->file) }}" class="text-decoration-none py-5">
                                    <div class="service-item d-flex bg-white flex-column justify-content-between">
                                        <div class="text-center p-4 pb-0">
                                            {{-- <img class="card-img-top"
                                        src="https://img.freepik.com/free-photo/male-speaker-giving-presentation-hall-university-workshop-audience-conference-hall_155003-27439.jpg?w=900&t=st=1668507149~exp=1668507749~hmac=21ae226c7556ed338f06fd2a6cc12062c9d56a0671a6d4b5510762967a67a046"
                                        alt="Card image cap"> --}}
                                            <p class="fs-7 fw-bold text-dark my-3">
                                                {{ $pengumumans->title }}
                                            </p>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center text-secondary border-end py-2">
                                                <i class="fa fa-tag text-primary me-2"></i>
                                                {{ $pengumumans->category->category }}
                                            </small>
                                            <small class="flex-fill text-center text-secondary border-end py-2">
                                                <i class="fa fa-calendar text-primary me-2"></i>
                                                {{ $pengumumans->created_at->translatedFormat('d F Y') }}
                                            </small>
                                        </div>
                                    </div>
                                </a>
                                <hr>
                            @endif
                        @endforeach
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection
