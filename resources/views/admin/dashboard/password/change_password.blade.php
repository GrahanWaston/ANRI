@extends('admin.main')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title">
                        Ubah Password
                    </h2>
                </div>
                {{-- <div class="col-auto d-print-none">

                </div> --}}
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-8 mb-4 mb-md-0">
                    <div class="card mb-3">
                        <form action="{{ route('update-password') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success d-flex align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                            aria-label="Danger:">
                                            <use xlink:href="#exclamation-triangle-fill" />
                                        </svg>
                                        <div>
                                            {{ session('success') }}
                                        </div>
                                    </div>
                                @elseif (session('error'))
                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                            aria-label="Danger:">
                                            <use xlink:href="#exclamation-triangle-fill" />
                                        </svg>
                                        <div>
                                            {{ session('error') }}
                                        </div>
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <div class="form-label">Password Lama</div>
                                    <input type="text" id="password_lama" name="password_lama"
                                        class="form-control @error('password_lama') is-invalid @enderror" required
                                        value="{{ old('password_lama') }}">
                                    @error('password_lama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Password Baru</div>
                                    <input type="text" id="password_baru" name="password_baru"
                                        class="form-control @error('password_baru') is-invalid @enderror" required>
                                    @error('password_baru')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- <div class="mb-3">
                                    <div class="form-label">Ulangin Password Baru</div>
                                    <input type="password" class="form-control">
                                </div> --}}
                                <button class="btn btn-primary">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(function() {
            $('#navbar-menu > .navbar-nav > .nav-item > .nav-link > .nav-link-title:contains("Ubah Password")')
                .parents('.nav-item').addClass('active');
        });
    </script>
@endsection
