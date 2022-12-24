@extends('website.header_footer')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid header-faq py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
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


    <div class="container py-5">
        <div class="d-flex justify-content-end">
            <div class="col-4">
                <div class="d-flex form-inputs">
                    <input class="form-control" type="text" placeholder="Masukkan Kata Kunci...">
                    <i class="fa fa-search"></i>
                </div>
            </div>
        </div>
        <div class="row align-items-start py-5">
            <div class="text-center">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-3 wow fadeInUp" data-wow-delay="0.1s"
                        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        @foreach ($infografis as $infografi)
                            <a href="detail-infografis.php" class="text-decoration-none">
                                <div class="service-item h-100 d-flex flex-column justify-content-between">
                                    <div class="text-center p-4 pb-0">
                                        <img class="card-img-top"
                                            src="{{ asset('storage/' . $infografi->image_main) }}"
                                            alt="Card image cap">
                                        <p class="fs-7 fw-bold text-dark my-3">
                                            {{ $infografi->title }}
                                        </p>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center text-secondary border-end py-2">
                                            <i class="fa fa-tag text-primary me-2"></i>
                                            {{ $infografi->category->category }}
                                        </small>
                                        <small class="flex-fill text-center text-secondary border-end py-2">
                                            <i class="fa fa-calendar text-primary me-2"></i>
                                            {{ $infografi->created_at }}
                                        </small>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    {{-- <div class="col-lg-4 col-md-6 mb-3 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <a href="detail-infografis.php" class="text-decoration-none">
                        <div class="service-item h-100 d-flex flex-column justify-content-between">
                            <div class="text-center p-4 pb-0">
                                <img class="card-img-top" src="https://img.freepik.com/free-photo/male-speaker-giving-presentation-hall-university-workshop-audience-conference-hall_155003-27439.jpg?w=900&t=st=1668507149~exp=1668507749~hmac=21ae226c7556ed338f06fd2a6cc12062c9d56a0671a6d4b5510762967a67a046" alt="Card image cap">
                                <p class="fs-7 fw-bold text-dark my-3">
                                    Syarat Diklat Fungsional Pengangkatan Arsiparis Tingkat Ahli Angkatan I 2021 (PNBP)
                                </p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center text-secondary border-end py-2">
                                    <i class="fa fa-tag text-primary me-2"></i>
                                    Infografis
                                </small>
                                <small class="flex-fill text-center text-secondary border-end py-2">
                                    <i class="fa fa-calendar text-primary me-2"></i>
                                    10/02/2022
                                </small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 mb-3 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <a href="detail-infografis.php" class="text-decoration-none">
                        <div class="service-item h-100 d-flex flex-column justify-content-between">
                            <div class="text-center p-4 pb-0">
                                <img class="card-img-top" src="https://img.freepik.com/free-photo/male-speaker-giving-presentation-hall-university-workshop-audience-conference-hall_155003-27439.jpg?w=900&t=st=1668507149~exp=1668507749~hmac=21ae226c7556ed338f06fd2a6cc12062c9d56a0671a6d4b5510762967a67a046" alt="Card image cap">
                                <p class="fs-7 fw-bold text-dark my-3">
                                    Syarat Diklat Fungsional Pengangkatan Arsiparis Tingkat Ahli Angkatan I 2021 (PNBP)
                                </p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center text-secondary border-end py-2">
                                    <i class="fa fa-tag text-primary me-2"></i>
                                    Infografis
                                </small>
                                <small class="flex-fill text-center text-secondary border-end py-2">
                                    <i class="fa fa-calendar text-primary me-2"></i>
                                    10/02/2022
                                </small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 mb-3 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <a href="detail-infografis.php" class="text-decoration-none">
                        <div class="service-item h-100 d-flex flex-column justify-content-between">
                            <div class="text-center p-4 pb-0">
                                <img class="card-img-top" src="https://img.freepik.com/free-photo/male-speaker-giving-presentation-hall-university-workshop-audience-conference-hall_155003-27439.jpg?w=900&t=st=1668507149~exp=1668507749~hmac=21ae226c7556ed338f06fd2a6cc12062c9d56a0671a6d4b5510762967a67a046" alt="Card image cap">
                                <p class="fs-7 fw-bold text-dark my-3">
                                    Syarat Diklat Fungsional Pengangkatan Arsiparis Tingkat Ahli Angkatan I 2021 (PNBP)
                                </p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center text-secondary border-end py-2">
                                    <i class="fa fa-tag text-primary me-2"></i>
                                    Infografis
                                </small>
                                <small class="flex-fill text-center text-secondary border-end py-2">
                                    <i class="fa fa-calendar text-primary me-2"></i>
                                    10/02/2022
                                </small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 mb-3 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <a href="detail-infografis.php" class="text-decoration-none">
                        <div class="service-item h-100 d-flex flex-column justify-content-between">
                            <div class="text-center p-4 pb-0">
                                <img class="card-img-top" src="https://img.freepik.com/free-photo/male-speaker-giving-presentation-hall-university-workshop-audience-conference-hall_155003-27439.jpg?w=900&t=st=1668507149~exp=1668507749~hmac=21ae226c7556ed338f06fd2a6cc12062c9d56a0671a6d4b5510762967a67a046" alt="Card image cap">
                                <p class="fs-7 fw-bold text-dark my-3">
                                    Syarat Diklat Fungsional Pengangkatan Arsiparis Tingkat Ahli Angkatan I 2021 (PNBP)
                                </p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center text-secondary border-end py-2">
                                    <i class="fa fa-tag text-primary me-2"></i>
                                    Infografis
                                </small>
                                <small class="flex-fill text-center text-secondary border-end py-2">
                                    <i class="fa fa-calendar text-primary me-2"></i>
                                    10/02/2022
                                </small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 mb-3 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <a href="detail-infografis.php" class="text-decoration-none">
                        <div class="service-item h-100 d-flex flex-column justify-content-between">
                            <div class="text-center p-4 pb-0">
                                <img class="card-img-top" src="https://img.freepik.com/free-photo/male-speaker-giving-presentation-hall-university-workshop-audience-conference-hall_155003-27439.jpg?w=900&t=st=1668507149~exp=1668507749~hmac=21ae226c7556ed338f06fd2a6cc12062c9d56a0671a6d4b5510762967a67a046" alt="Card image cap">
                                <p class="fs-7 fw-bold text-dark my-3">
                                    Syarat Diklat Fungsional Pengangkatan Arsiparis Tingkat Ahli Angkatan I 2021 (PNBP)
                                </p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center text-secondary border-end py-2">
                                    <i class="fa fa-tag text-primary me-2"></i>
                                    Infografis
                                </small>
                                <small class="flex-fill text-center text-secondary border-end py-2">
                                    <i class="fa fa-calendar text-primary me-2"></i>
                                    10/02/2022
                                </small>
                            </div>
                        </div>
                    </a>
                </div> --}}

                </div>
                <div class="d-flex justify-content-center mt-4 wow fadeInUp" data-wow-delay="0.1s">
                    <nav aria-label=" Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>
        <nav class="mt-4">
            <nav id="w1" class="pagination justify-content-center"></nav>
        </nav>
    </div>
@endsection
