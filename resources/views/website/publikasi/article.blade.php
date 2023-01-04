@extends('website.header_footer')
{{-- @dd($articles) --}}
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid header-faq py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Artikel</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Publikasi</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Artikel</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container py-5">
        <div class="row my-4 justify-content-center">
            <div class="col-3"></div>
            <div class="col-3 px-3">
            </div>
            <div class="col-3 px-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Tahun</option>
                    <option value="1">2022</option>
                    <option value="2">2021</option>
                    <option value="3">2020</option>
                </select>
            </div>
            <div class="col-3 px-3">
                <div class="d-flex form-inputs">
                    <input class="form-control" type="text" placeholder="Masukkan Kata Kunci...">
                    <i class="fa fa-search"></i>
                </div>
            </div>
        </div>
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
                                        @foreach ($articles as $article)
                                            @if ($article->status == 'published')
                                                <tr>
                                                    <td style="line-height: 1.3;">{{ $loop->iteration }}</td>
                                                    <td style="line-height: 1.3;">{{ $article->title }}</td>
                                                    <td style="line-height: 1.3;">{{ $article->year }}</td>
                                                    <td class="text-center" style="line-height: 1.3;">
                                                        <a href="{{ asset('storage/' . $article->file) }}"
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
                        {{-- {!! $articles->render() !!} --}}
                    </div>
                    <aside class="col-lg-4 order-sm-2">
                        <h5 class="pb-2">Artikel Lainnya</h5>
                        @foreach ($articles as $articles)
                            <a href="program-diklat-detail.php" class="text-decoration-none py-5">
                                <div class="service-item d-flex bg-white flex-column justify-content-between">
                                    <div class="text-center p-4 pb-0">
                                        <p class="fs-7 fw-bold text-dark my-3">
                                            {{ $article->title }}
                                        </p>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center text-secondary border-end py-2">
                                            <i class="fa fa-tag text-primary me-2"></i>
                                            {{ $article->category->category }}
                                        </small>
                                        <small class="flex-fill text-center text-secondary border-end py-2">
                                            <i class="fa fa-calendar text-primary me-2"></i>
                                            {{ $article->created_at }}
                                        </small>
                                    </div>
                                </div>
                            </a>
                            <hr>
                        @endforeach
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection
