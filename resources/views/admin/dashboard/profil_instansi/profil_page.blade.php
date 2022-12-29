@extends('admin.main')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title">
                        Profil Instansi
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="table-responsive">
                    @if (session('success'))
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div class="text-center">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif
                    <table class="table card-table table-post">
                        <thead>
                            <tr>
                                <th width="10">Aksi</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div>
                                        <a href="/profil-instansi/1/edit" class="m-1 h3"><i
                                                class="fas fa-file-signature"></i></a>
                                    </div>
                                </td>
                                <td>
                                    Sejarah Pusdiklat
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <a href="/profil-instansi/2/edit" class="m-1 h3"><i
                                                class="fas fa-file-signature"></i></a>
                                    </div>
                                </td>
                                <td>
                                    Visi & Misi
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <a href="/profil-instansi/3/edit" class="m-1 h3"><i
                                                class="fas fa-file-signature"></i></a>
                                    </div>
                                </td>
                                <td>
                                    Tugas & Fungsi
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <a href="/profil-instansi/4/edit" class="m-1 h3"><i
                                                class="fas fa-file-signature"></i></a>
                                    </div>
                                </td>
                                <td>
                                    Struktur Organisasi
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <a href="/profil-instansi/6/edit" class="m-1 h3"><i
                                                class="fas fa-file-signature"></i></a>
                                    </div>
                                </td>
                                <td>
                                    Maklumat Layanan
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            $('#navbar-menu > .navbar-nav > .nav-item > .nav-link > .nav-link-title:contains("Profil Instansi")')
                .parents('.nav-item').addClass('active');
        });
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $('.btn-delete').on('click', function() {
                Swal.fire({
                    title: 'Hapus Data?',
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
                            'Data Berhasil dihapus',
                            'success'
                        )
                    }
                })
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('.btn-draft').on('click', function() {
                Swal.fire({
                    title: 'Arsipkan Data?',
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
                            'Data Berhasil diarsipkan',
                            'success'
                        )
                    }
                })
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('.btn-copy').on('click', function() {
                Swal.fire(
                    'Success!',
                    'Link Berhasil disalin',
                    'success'
                )
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('.btn-publish').on('click', function() {
                Swal.fire({
                    title: 'Terbitkan Data?',
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
                            'Data Berhasil diterbitkan',
                            'success'
                        )
                    }
                })
            });
        });
    </script>
@endsection
