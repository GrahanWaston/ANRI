<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
{{-- @dd($pages) --}}

<head>
    <meta charset="utf-8">
    <title>Pusdiklat Kearsipan ANRI</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/icon.svg') }} " rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- <link href='https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css' rel='stylesheet'> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.css" />

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }} " rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border position-relative text-primary" style="width: 6rem; height: 6rem;" role="status">
        </div>
        <img src="{{ asset('img/icon.svg') }} " alt=""
            class="position-absolute top-50 start-50 translate-middle img-fluid" style="width: 4rem; height: 4rem;">
    </div>
    <!-- Spinner End -->

    <!-- Brand & Contact Start -->
    <div class="container-fluid py-1 px-4 wow fadeIn" data-wow-delay="0.1s"
        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
        <div class="row align-items-center top-bar">
            <div class="col-lg-4 d-flex flex-md-row col-md-12 text-center text-lg-start">
                <a href="" class="navbar-brand m-0 p-0">
                    <!-- <h1 class="fw-bold text-primary m-0"><i class="fa fa-laptop-code me-3"></i>DGcom</h1> -->
                    <img src="{{ asset('img/logo.svg') }} " class="img-fluid" alt="Logo">
                </a>
            </div>
            <div class="col-md-12 mt-3 d-lg-none">
                <div class="row align-items-center justify-content-end">
                    <div class="col-8">
                        <div class="d-flex form-inputs">
                            <input class="form-control form-inputs-sm" type="text" placeholder="Pencarian">
                            <i class="fa fa-search"></i>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <a href="" class="btn btn-sm btn-primary mx-1">ID</a>
                            <!-- <span class="mx-1">|</span> -->
                            <a href="" class="btn btn-sm btn-outline-primary mx-1">EN</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 d-none d-lg-block">
                <div class="row align-items-center justify-content-end">
                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-end h-100">
                            <div class="flex-shrink-0 btn-sm-square border rounded-circle">
                                <i class="far fa-clock text-primary"></i>
                            </div>
                            <div class="ps-2">
                                <p class="mb-0" style="font-size:0.6rem ;">Jam Operasional</p>
                                <h6 class="mb-0 fw-normal" style="font-size:0.8rem ;">Senin - Jum'at (08:00 - 16:00)
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-end form-inputs">
                            <input class="form-control form-inputs-sm" type="text" placeholder="Pencarian">
                            <i class="fa fa-search"></i>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex flex-row justify-content-end">
                            {{-- <a href="" class="btn btn-sm btn-primary mx-1">ID</a>
                            <!-- <span class="mx-1">|</span> -->
                            <a href="" class="btn btn-sm btn-outline-primary mx-1 ">EN</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand & Contact End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn"
        data-wow-delay="0.1s">
        <div class="navbar-brand ms-3 d-flex flex-grow-1 flex-row justify-content-between d-lg-none">
            <a href="" class="text-light">Menu</a>
            <!-- <div>
                <a href="" class="btn btn-sm btn-light">ID</a>
                <a href="" class="btn btn-sm btn-outline-light ">EN</a>
            </div> -->
        </div>

        <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav me-auto p-3 p-lg-0">
                <a href="/" class="nav-item nav-link">{{ $menu[0]->name }}</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle"
                        data-bs-toggle="dropdown">{{ $menu[1]->name }}</a>
                    <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                        <a href="/sejarah" class="dropdown-item">{{ $submenu[0]->name }}</a>
                        <a href="/visi-misi" class="dropdown-item">{{ $submenu[1]->name }}</a>
                        <a href="/tugas-fungsi" class="dropdown-item">{{ $submenu[2]->name }}</a>
                        <a href="/struktur-organisasi" class="dropdown-item">{{ $submenu[3]->name }}</a>
                        <a href="/sumber-daya-manusia" class="dropdown-item">{{ $submenu[4]->name }}</a>
                        <a href="/maklumat-layanan" class="dropdown-item">{{ $submenu[5]->name }}</a>
                        @foreach ($submenu->skip(18) as $submenus)
                            @if ($submenus->menu_id == 2)
                                <a href="/sub-menu/{{ $submenus->url }}"
                                    class="dropdown-item">{{ $submenus->name }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle"
                        data-bs-toggle="dropdown">{{ $menu[2]->name }}</a>
                    <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                        <a href="/kalender-diklat" class="dropdown-item">{{ $submenu[6]->name }}</a>
                        <a href="/program-diklat-anri" class="dropdown-item">{{ $submenu[7]->name }}</a>
                        @foreach ($submenu->skip(18) as $submenus)
                            @if ($submenus->menu_id == 3)
                                <a href="/sub-menu/{{ $submenus->url }}"
                                    class="dropdown-item">{{ $submenus->name }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
                <a href="https://kelasdaring.anri.go.id/" target="blank"
                    class="nav-item nav-link">{{ $menu[3]->name }}</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle"
                        data-bs-toggle="dropdown">{{ $menu[4]->name }}</a>
                    <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                        <a href="https://wbs.anri.go.id/" target="blank"
                            class="dropdown-item">{{ $submenu[8]->name }}</a>
                        <a href="https://wbs.anri.go.id/" target="blank"
                            class="dropdown-item">{{ $submenu[9]->name }}</a>
                        <a href="https://www.lapor.go.id/" target="blank"
                            class="dropdown-item">{{ $submenu[10]->name }}</a>
                        <a href="https://s28a7n9v56m.typeform.com/to/nZkAV64z" target="blank"
                            class="dropdown-item">{{ $submenu[11]->name }}</a>
                        @foreach ($submenu->skip(18) as $submenus)
                            @if ($submenus->menu_id == 5)
                                <a href="/sub-menu/{{ $submenus->url }}"
                                    class="dropdown-item">{{ $submenus->name }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle"
                        data-bs-toggle="dropdown">{{ $menu[5]->name }}</a>
                    <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                        <a href="/artikel" class="dropdown-item">{{ $submenu[12]->name }}</a>
                        <a href="/berita" class="dropdown-item">{{ $submenu[13]->name }}</a>
                        <a href="/infografis" class="dropdown-item">{{ $submenu[14]->name }}</a>
                        <a href="/pengumuman" class="dropdown-item">{{ $submenu[15]->name }}n</a>
                        <a href="https://jdih.anri.go.id/" target="blank"
                            class="dropdown-item">{{ $submenu[16]->name }}</a>
                        <a href="https://eppid.anri.go.id/" target="blank"
                            class="dropdown-item">{{ $submenu[17]->name }}</a>
                        @foreach ($submenu->skip(18) as $submenus)
                            @if ($submenus->menu_id == 6)
                                <a href="/sub-menu/{{ $submenus->url }}"
                                    class="dropdown-item">{{ $submenus->name }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
                <a href="/prasarana-sarana" class="nav-item nav-link">{{ $menu[6]->name }}</a>
                <a href="/faq-anri" class="nav-item nav-link">{{ $menu[7]->name }}</a>
                <a href="/kontak-kami" class="nav-item nav-link">{{ $menu[8]->name }}</a>
                @foreach ($menu->skip(9) as $menus)
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle"
                            data-bs-toggle="dropdown">{{ $menus->name }}</a>
                        @foreach ($submenu as $submenus)
                            @if ($submenus->menu_id == $menus->id)
                                <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                                    <a href="/sub-menu/{{ $submenus->url }}"
                                        class="dropdown-item">{{ $submenus->name }}</a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
                @foreach ($mainmenu as $main)
                    <a href="/ANRI/{{ $main->nama_menu }}" class="nav-item nav-link">{{ $main->judul }}</a>
                @endforeach
            </div>
            <!-- <a href="#" class="btn btn-sm btn-light rounded-pill py-2 px-4 d-none d-lg-block">Get Started</a> -->
        </div>
    </nav>
    <!-- Navbar End -->

    @yield('content')


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form">
                        <i class="fa fa-search"></i>
                        <input type="text" class="form-control form-input" placeholder="Masukkan Kata Kunci...">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-body footer pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Alamat</h5>
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
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Tautan Situs Web</h5>
                    @foreach ($link as $links)
                        <a class="btn btn-link" href="{{ $links->url }}">{{ $links->nama }}</a>
                    @endforeach
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Ikuti Kami</h5>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-1" target="blank"
                            href="{{ $website->twitter }}"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-1" target="blank"
                            href="{{ $website->facebook }}"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-1" target="blank"
                            href="{{ $website->youtube }}"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-0" target="blank"
                            href="{{ $website->instagram }}"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Total Kunjungan </h5>
                    <a class=" btn-link text-secondary d-flex justify-content-between" target="blank"
                        href="https://anri.go.id/">
                        <p><i class="fa fa-users"></i> Hari Ini</p>
                        <p class="badge badge-primary"> 6.974</p>
                    </a>
                    <a class=" btn-link text-secondary d-flex justify-content-between" target="blank"
                        href="https://anri.go.id/">
                        <p><i class="fa fa-chart-line"></i> Bulan Ini</p>
                        <p class="badge badge-primary"> 982.632</p>
                    </a>
                    <a class=" btn-link text-secondary d-flex justify-content-between" target="blank"
                        href="https://anri.go.id/">
                        <p><i class="fa fa-chart-area"></i> Total Kunjungan</p>
                        <p class="badge badge-primary"> 8.707.516</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="./"> 2022 | PUSDIKLAT ANRI</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }} "></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }} "></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }} "></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }} "></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }} "></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }} "></script>


</body>

</html>
