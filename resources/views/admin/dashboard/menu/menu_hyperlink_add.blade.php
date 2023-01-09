@extends('admin.main')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title">
                        Tambah Menu Hyperlink
                    </h2>
                </div>
                <div class="col-auto d-print-none">
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <form action="{{ route('manajemen-menu-hyperlink.store') }}" method="POST">
                    @csrf
                    <div class="col-md-8 mb-4 mb-md-0">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Menu</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Menu">
                            @error('name')
                                <div class="invalid-feedback">
                                    Nama menu harus di isi terlebih dahulu!
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="url" class="form-label">Url</label>
                            <input type="text" id="name" name="url" value="{{ old('url') }}"
                                class="form-control @error('url') is-invalid @enderror" placeholder="Masukkan Nama Menu">
                            @error('url')
                                <div class="invalid-feedback">
                                    Url harus di isi terlebih dahulu!
                                </div>
                            @enderror
                        </div>
                        <button class="btn btn-publish btn-primary mt-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            $('#navbar-menu > .navbar-nav > .nav-item > .nav-link > .nav-link-title:contains("Manajemen Menu")')
                .parents('.nav-item').addClass('active').find('.dropdown-menu').addClass('show').find(
                    '.dropdown-item:contains("Manajemen Menu")').addClass('active');
        });
    </script>

    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $('.btn-publish').on('click', function() {
                Swal.fire({
                    title: 'Edit Jenis Diklat?',
                    text: "Apakah anda yakin?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Success!',
                            'Jenis Diklat Berhasil diubah',
                            'success',
                        ).then((result) => {
                            window.location = "?page=jenis-jenjang";
                        })
                    }
                })
            });
        });
    </script> --}}
@endsection
