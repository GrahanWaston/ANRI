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
                <form action="/create-jenjang" method="POST">
                    @csrf
                    <div class="col-md-8 mb-4 mb-md-0">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Jenis Diklat</label>
                            <select name="jenis_id"
                                class="form-select-secondary form-control @error('jenis_id') is-invalid @enderror"
                                aria-label="Default select example" id="jenis_id">
                                <option disabled selected>Pilih Jenis Diklat</option>
                                @foreach ($jenis as $type)
                                    <option value="{{ $type->id }}">{{ $type->nama_jenis }}</option>
                                @endforeach
                            </select>
                            @error('jenis_id')
                                <div class="invalid-feedback">
                                    Jenis diklat harus di isi terlebih dahulu!
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input name="status" type="hidden" value="draft">
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="jenjang" class="form-label">Jenjang Diklat (Id)</label>
                            <input type="text" id="jenjang" name="jenjang"
                                class="form-control @error('jenjang') is-invalid @enderror" placeholder="Masukkan Jenjang">
                            @error('jenjang')
                                <div class="invalid-feedback">
                                    Jenjang harus di isi terlebih dahulu!
                                </div>
                            @enderror
                        </div>
                        <!-- <div class="mb-3">
                 <label for="" class="form-label">Level of Training (En)</label>
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
