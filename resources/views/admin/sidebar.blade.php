<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark bg-theme">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-brand navbar-brand-autodark bg-light d-none d-md-block mt-3 p-2 rounded-pill">
            <img src="{{ asset('assets/images/logo/logo.svg') }}" alt="" class="img-fluid">
        </div>

        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="navbar-brand navbar-brand-autodark bg-light mt-3 p-2 rounded-pill  d-md-none">
                <img src="{{ asset('assets/images/logo/logo.svg') }}" alt="" class="w-75 mx-auto">
            </div>
            <ul class="navbar-nav pt-lg-3">
                <li class="nav-item ms-2 me-1 bg-primary ms-2 me-1"><a href="#"
                        class="nav-link disabled text-light">Dashboard</a></li>
                <li class="nav-item ms-2 me-1">
                    <a class="nav-link" href="/dashboard">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="fa fa-home"></i>
                        </span>
                        <span class="nav-link-title">
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="nav-item ms-2 me-1 bg-primary ms-2 me-1"><a href="#"
                        class="nav-link disabled text-light">Menu Utama</a></li>
                <li class="nav-item ms-2 me-1 dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="fa fa-copy"></i>
                        </span>
                        <span class="nav-link-title">
                            Program Diklat
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item" href="/program-diklat">
                                    Program Diklat
                                </a>
                                <a class=" dropdown-item" href="/jenis-jenjang">
                                    Jenis & Jenjang
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                @if (auth()->user()->role == 'admin')
                    <li class="nav-item ms-2 me-1">
                        <a class="nav-link" href="/profil-instansi">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="fa fa-building"></i>
                            </span>
                            <span class="nav-link-title">
                                Profil Instansi
                            </span>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->role == 'admin')
                    <li class="nav-item ms-2 me-1 dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="fa fa-users"></i>
                            </span>
                            <span class="nav-link-title">
                                Profil Pejabat - SDM
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <a class="dropdown-item" href="/profil-pejabat/SDM">
                                        Profil Pejabat - SDM

                                    </a>
                                    <a class=" dropdown-item" href="/profil-pejabat/jabatan">
                                        Jabatan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                @endif
                @if (auth()->user()->role == 'admin')
                    <li class="nav-item ms-2 me-1">
                        <a class="nav-link" href="/sarana-prasarana">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="fa fa-building"></i>
                            </span>
                            <span class="nav-link-title">
                                Prasarana & Sarana
                            </span>
                        </a>
                    </li>
                @endif
                <li class="nav-item ms-2 me-1">
                    <a class="nav-link" href="/layanan">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="fas fa-pager"></i>
                        </span>
                        <span class="nav-link-title">
                            Layanan
                        </span>
                    </a>
                </li>
                <li class="nav-item ms-2 me-1">
                    <a class="nav-link" href="/pages">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="far fa-clone"></i>
                        </span>
                        <span class="nav-link-title">
                            Pages
                        </span>
                    </a>
                </li>
                <li class="nav-item ms-2 me-1 dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="fa fa-file-signature"></i>
                        </span>
                        <span class="nav-link-title">
                            Publikasi
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item" href="/publikasi">
                                    Publikasi
                                </a>
                                <a class=" dropdown-item" href="/publikasi-file">
                                    File Download
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item ms-2 me-1">
                    <a class="nav-link" href="/slideshow">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="fa fa-image"></i>
                        </span>
                        <span class="nav-link-title">
                            Slideshow
                        </span>
                    </a>
                </li>
                <li class="nav-item ms-2 me-1">
                    <a class="nav-link" href="/testimoni">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="fa fa-list"></i>
                        </span>
                        <span class="nav-link-title">
                            Testimoni
                        </span>
                    </a>
                </li>
                <li class="nav-item ms-2 me-1">
                    <a class="nav-link" href="/faq">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="fa fa-question"></i>
                        </span>
                        <span class="nav-link-title">
                            FAQ
                        </span>
                    </a>
                </li>
                <li class="nav-item ms-2 me-1 bg-primary ms-2 me-1"><a href="#"
                        class="nav-link disabled text-light">Pengaturan</a></li>
                @if (auth()->user()->role == 'admin')
                    <li class="nav-item ms-2 me-1">
                        <a class="nav-link" href="/konfigurasi-situs/1/edit">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="fa fa-cog"></i>
                            </span>
                            <span class="nav-link-title">
                                Konfigurasi Situs
                            </span>
                        </a>
                    </li>
                @endif
                <li class="nav-item ms-2 me-1">
                    <a class="nav-link" href="/konfigurasi-section/create">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="fa fa-paste"></i>
                        </span>
                        <span class="nav-link-title">
                            Section 4
                        </span>
                    </a>
                </li>
                @if (auth()->user()->role == 'admin')
                    <li class="nav-item ms-2 me-1 bg-primary ms-2 me-1"><a href="#"
                            class="nav-link disabled text-light">Data Master</a></li>
                    <li class="nav-item ms-2 me-1">
                        <a class="nav-link" href="/manajemen-user">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="fa fa-users"></i>
                            </span>
                            <span class="nav-link-title">
                                Manajemen User
                            </span>
                        </a>
                    </li>
                    <li class="nav-item ms-2 me-1">
                        <a class="nav-link" href="/manajemen-menu">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="fa fa-th-large"></i>
                            </span>
                            <span class="nav-link-title">
                                Manajemen Menu
                            </span>
                        </a>
                    </li>
                @endif
                <li class="nav-item ms-2 me-1 bg-primary ms-2 me-1"><a href="#"
                        class="nav-link disabled text-light">Profil</a></li>
                <li class="nav-item ms-2 me-1">
                    <a class="nav-link" href="/ubah-password">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="fa fa-lock"></i>
                        </span>
                        <span class="nav-link-title">
                            Ubah Password
                        </span>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</aside>
