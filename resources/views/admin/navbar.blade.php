<header class="navbar navbar-expand-md navbar-light d-none d-lg-flex d-print-none sticky-top">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav flex-row col">
            <div class="nav-item d-none d-md-flex">
                <div class="btn-list">
                    <a href="../" class="btn btn-outline-white" target="_blank" rel="noreferrer">
                        <i class="fa fa-globe me-2"></i> Kunjungi Situs
                    </a>

                </div>
            </div>
            @auth
                <div class="nav-item dropdown ms-md-auto">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                        aria-label="Open user menu">
                        <span class="avatar avatar-sm bg-theme text-white">AD</span>
                        <div class="d-none d-xl-block ps-2">
                            <div>{{ Auth()->user()->name }}</div>
                            <div class="mt-1 small text-muted">{{ Auth()->user()->role }}</div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="/ubah-password" class="dropdown-item"><i class="fa fa-lock me-2"></i>Ganti Password</a>
                        <div class="dropdown-divider"></div>
						<div class="text-center">
							<form action="/logout" method="post">
								@csrf
								<button class="btn btn-ino col text-center justify-content-center"><i class="fa fa-sign-out-alt me-2"></i>Logout</button>
								{{-- <a href="" class="button"><i class="fa fa-sign-out-alt me-2"></i>Logout</a> --}}
							</form>
						</div>
						
                    </div>
                </div>
            @endauth

        </div>
    </div>
</header>

