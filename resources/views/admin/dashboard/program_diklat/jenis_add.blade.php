@extends('admin.main')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title">
                        Jenis Diklat
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
                <form action="/create-jenis" method="POST">
                    @csrf
                    <div class="col-md-8 mb-4 mb-md-0">
                        <div class="mb-3">
                            <label for="nama_jenis" class="form-label">Jenis Diklat (Id)</label>
                            <input type="text" id="nama_jenis" name="nama_jenis" class="form-control @error('nama_jenis') is-invalid @enderror"
                                placeholder="Masukkan Jenis">
                            @error('nama_jenis')
                                <div class="invalid-feedback">
                                    Nama jenis diklat harus di isi terlebih dahulu!
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input name="status" type="hidden" value="draft">
                        </div>
                        <!-- <div class="mb-3">
                 <label for="" class="form-label">Type of Training (En)</label>
                 <input type=" text" class="form-control" placeholder="Masukkan Jenis">
                </div> -->
                        <button class="btn btn-publish  btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            $('#navbar-menu > .navbar-nav > .nav-item > .nav-link > .nav-link-title:contains("Program Diklat")')
                .parents('.nav-item').addClass('active').find('.dropdown-menu').addClass('show').find(
                    '.dropdown-item:contains("Jenis & Jenjang")').addClass('active');
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
