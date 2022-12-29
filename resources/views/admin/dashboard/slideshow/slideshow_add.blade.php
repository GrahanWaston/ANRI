@extends('admin.main')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title">
                        Tambah Slideshow
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <form action="/slideshow" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-8 mb-4 mb-md-0 tab-content">

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">Judul</label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul">
                                    @error('judul')
                                        <div class="invalid-feedback">
                                            Judul harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input name="status" type="hidden" value="draft">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Deskripsi</label>
                                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi">
                                    @error('deskripsi')
                                        <div class="invalid-feedback">
                                            Deskripsi harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label @error('tautan') is-invalid @enderror">Tautan</label>
                                    <input type="text" class="form-control" id="tautan" name="tautan">
                                    @error('tautan')
                                        <div class="invalid-feedback">
                                            Tautan harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Gambar Desktop</div>
                                    <input type="file" class="form-control @error('image_dekstop') is-invalid @enderror" accept=".jpeg, .jpg, .png,"
                                        id="image_dekstop" name="image_dekstop">
                                    @error('image_dekstop')
                                        <div class="invalid-feedback">
                                            Gambar dekstop harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                    <div class="form-text">
                                        Resolusi 1920px x 1080px File type : .jpeg, .jpg, .png,
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Gambar Mobile</div>
                                    <input type="file" class="form-control @error('image_mobile') is-invalid @enderror" accept=".jpeg, .jpg, .png," id="image_mobile"
                                        name="image_mobile">
                                    @error('image_mobile')
                                        <div class="invalid-feedback">
                                            Gambar Mobile harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                    <div class="form-text">
                                        Resolusi 768px x 1366px File type : .jpeg, .jpg, .png,
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end bg-light">
                                <button class="btn btn-publish btn-primary">Publish</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <style type="text/css">
            [data-template] {
                display: none;
            }
        </style>

        <link rel="stylesheet" type="text/css"
            href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>
        <script type="text/javascript">
            $(function() {
                $('.btn-publish').on('click', function() {
                    Swal.fire({
                        title: 'Tambah Slideshow?',
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
                                'Slideshow Berhasil ditambah',
                                'success',
                            ).then((result) => {
                                window.location = "?page=slideshow";
                            })
                        }
                    })
                });
            });
        </script>


        <script type="text/javascript">
            $(function() {
                $('#navbar-menu > .navbar-nav > .nav-item > .nav-link > .nav-link-title:contains("Slideshow")').parents(
                    '.nav-item').addClass('active');
            });
        </script>

        <script src="assets/libs/litepicker/dist/litepicker.js"></script>
    @endsection
