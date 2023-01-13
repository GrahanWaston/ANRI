@extends('admin.main')
{{-- {{dd($publication)}} --}}
@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title">
                        Publikasi
                    </h2>
                </div>
                <div class="col-auto d-print-none">
                    <div class="btn-list">
                        <a href="/publikasi/create" class="btn btn-primary d-inline-block">
                            <i class="fa fa-plus me-2"></i> Publikasi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row justify-content-between align-items-center mb-3">
                <div class="col mb-3 mb-md-0 ">
                    <a href="#">Semua (3)</a>
                    <div class="vr mx-1"></div>
                    <a href="#">Published (2)</a>
                    <div class="vr mx-1"></div>
                    <a href="#">Draft (1)</a>
                    <div class="vr mx-1"></div>
                </div>
                <div class="col-auto">
                    <div class="row gx-1">

                        <div class="col-auto">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search..." id="search">
                                <div class="input-group-append">
                                    <button class="btn btn-white btn-icon" disabled>Cari</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between align-items-center mb-3">
                <div class="col-auto mb-3 mb-md-0">
                    <div class="row gx-1">
                        <div class="col-auto">
                            <button id="destroy" class="btn btn-danger d-none">
                                <i class="bi bi-trash me-2"></i>Hapus
                            </button>
                            <button id="approve" class="btn btn-success d-none">
                                <i class="bi bi-trash me-2"></i>Approve
                            </button>
                            <button id="unapprove" class="btn btn-warning d-none">
                                <i class="bi bi-trash me-2"></i>Unapprove
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="row gx-2 align-items-center">
                        <div class="col-auto">10 Items</div>
                        {{-- <div class="col-auto">
                            {{ $publication->links() }}
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="card">
                <div>
                </div>
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
                    <table class="table card-table table-post" id="datatable">
                        <thead>
                            <tr>
                                <th width="10"><input type="checkbox" class="all" name="all"></th>
                                <th width="100">Aksi</th>
                                <th width="200">Kategori</th>
                                <th>Judul</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            $('#navbar-menu > .navbar-nav > .nav-item > .nav-link > .nav-link-title:contains("Publikasi")').parents(
                '.nav-item').addClass('active').find('.dropdown-menu').addClass('show').find(
                '.dropdown-item:contains("Publikasi")').addClass('active');
        });
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>
    
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $(function () {
            $("#datatable").DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,
                language: {
                    search: "",
                    searchPlaceholder: "Masukkan kata pencarian...",
                },
                fnDrawCallback: function () {
                    $("input[type='search']").attr("id", "searchBox");
                    $("#searchBox").css("width", "300px");
                    $("#searchBox").css("height", "34px");
                    $("#searchBox").css("margin-bottom", "8px");
                },
                ajax: `/publikasi`,
                columns: [
                    {
                        data: "checkbox",
                        name: "checkbox",
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: "action",
                        name: "action",
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: "category.category",
                        name: "category.category",
                    },
                    {
                        data: "title",
                        name: "title",
                    },
                ],
            });
        });

        $(document).on("click", 'input[name="all"]', function() {
            if (this.checked) {
                $('input[name="id"]').each(function() {
                    this.checked = true;
                });
            } else {
                $('input[name="id"]').each(function() {
                    this.checked = false;
                });
            }

            toggleApproveButton();
            toggleUnapproveButton();
            toggleDestroyButton();
        });

        $(document).on("change", 'input[name="id"]', function() {
            if ($('input[name="id"]').length == $('input[name="id"]:checked').length) {
                $('input[name="all"]').prop("checked", true);
            } else {
                $('input[name="all"]').prop("checked", false);
            }

            toggleApproveButton();
            toggleUnapproveButton();
            toggleDestroyButton();
        });

        function toggleDestroyButton() {
            if ($('input[name="id"]:checked').length > 0) {
                $("button#destroy")
                    .text(
                        "Delete (" + $('input[name="id"]:checked').length + ")"
                    )
                    .removeClass("d-none");
            } else {
                $("button#destroy").addClass("d-none");
            }
        }

        function toggleApproveButton() {
            if ($('input[name="id"]:checked').length > 0) {
                $("button#approve")
                    .text(
                        "Approve (" + $('input[name="id"]:checked').length + ")"
                    )
                    .removeClass("d-none");
            } else {
                $("button#approve").addClass("d-none");
            }
        }

        function toggleUnapproveButton() {
            if ($('input[name="id"]:checked').length > 0) {
                $("button#unapprove")
                    .text(
                        "Draft (" + $('input[name="id"]:checked').length + ")"
                    )
                    .removeClass("d-none");
            } else {
                $("button#unapprove").addClass("d-none");
            }
        }

        $(document).on('click', 'button#destroy', function() {
            var files = [];
            $('input[name="id"]:checked').each(function() {
                files.push($(this).data('id'));
            });

            if (files.length > 0) {
                console.log(files);
                Swal.fire({
                    title: 'Konfirmasi',
                    html: 'Apakah anda yakin akan menghapus <b>(' + files.length + ')</b> data',
                    showCancelButton: true,
                    showCloseButton: true,
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#556ee6',
                    cancelButtonColor: '#d33',
                    width: 400,
                    allowOutsideClick: false
                }).then(function(result) {
                    if (result.value) {
                        let url = '{{ route('publikasi.delete') }}';
                        $.ajax({
                            url: url,
                            type: "delete",
                            data: {
                                data: files
                            },
                            success: function(data) {
                                $("#datatable").DataTable().ajax.reload(null, true);
                                Swal.fire(
                                    'Informasi!',
                                    'Berhasil menghapus data',
                                    'success'
                                )
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                console.log("Gagal!", "Harap coba lagi");
                            }
                        });
                        $("button#destroy").addClass("d-none");
                        $("button#approve").addClass("d-none");
                        $("button#unapprove").addClass("d-none");
                    }
                })
            }
        });

        $(document).on('click', 'button#approve', function() {
            var files = [];
            $('input[name="id"]:checked').each(function() {
                files.push($(this).data('id'));
            });

            if (files.length > 0) {
                console.log(files);
                Swal.fire({
                    title: 'Konfirmasi',
                    html: 'Apakah anda yakin akan publish <b>(' + files.length + ')</b> data',
                    showCancelButton: true,
                    showCloseButton: true,
                    confirmButtonText: 'publish',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#556ee6',
                    cancelButtonColor: '#d33',
                    width: 400,
                    allowOutsideClick: false
                }).then(function(result) {
                    if (result.value) {
                        let url = '{{ route('approve-publikasi-mass') }}';
                        $.ajax({
                            url: url,
                            type: "put",
                            data: {
                                data: files
                            },
                            success: function(data) {
                                $("#datatable").DataTable().ajax.reload(null, true);
                                Swal.fire(
                                    'Informasi!',
                                    'Berhasil publish data',
                                    'success'
                                )
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                console.log("Gagal!", "Harap coba lagi");
                            }
                        });
                        $("button#destroy").addClass("d-none");
                        $("button#approve").addClass("d-none");
                        $("button#unapprove").addClass("d-none");
                    }
                })
            }
        });

        $(document).on('click', 'button#unapprove', function() {
            var files = [];
            $('input[name="id"]:checked').each(function() {
                files.push($(this).data('id'));
            });

            if (files.length > 0) {
                console.log(files);
                Swal.fire({
                    title: 'Konfirmasi',
                    html: 'Apakah anda yakin akan menghapus <b>(' + files.length + ')</b> data',
                    showCancelButton: true,
                    showCloseButton: true,
                    confirmButtonText: 'draft',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#556ee6',
                    cancelButtonColor: '#d33',
                    width: 400,
                    allowOutsideClick: false
                }).then(function(result) {
                    if (result.value) {
                        let url = '{{ route('unapprove-publikasi-mass') }}';
                        $.ajax({
                            url: url,
                            type: "put",
                            data: {
                                data: files
                            },
                            success: function(data) {
                                $("#datatable").DataTable().ajax.reload(null, true);
                                Swal.fire(
                                    'Informasi!',
                                    'Berhasil draft data',
                                    'success'
                                )
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                console.log("Gagal!", "Harap coba lagi");
                            }
                        });
                        $("button#unapprove").addClass("d-none");
                        $("button#approve").addClass("d-none");
                        $("button#destroy").addClass("d-none");
                    }
                })
            }
        });

        $(document).on("click", '.approval', function() {
            id = $(this).attr('id');

            Swal.fire({
                title: "Konfirmasi",
                html: "Apakah anda yakin akan mempublish data ini?",
                showCancelButton: true,
                showCloseButton: true,
                confirmButtonText: "Publish",
                cancelButtonText: "Batal",
                confirmButtonColor: "#556ee6",
                cancelButtonColor: "#d33",
                width: 400,
                allowOutsideClick: false,
            }).then(function(result) {
                if (result.value) {
                    let url = '{{ route('approve-publikasi', ':id') }}';
                    url = url.replace(':id', id);
                    console.log(url);
                    $.ajax({
                        url: url,
                        type: "put",
                        success: function(data) {
                            console.log(data);
                            $("#datatable").DataTable().ajax.reload(null, true);
                            Swal.fire(
                                'Informasi!',
                                'Berhasil merubah data',
                                'success'
                            )
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            console.log("Gagal!", "Harap coba lagi");
                        }
                    });
                }
            });
        });

        $(document).on("click", '.unapproval', function() {
            id = $(this).attr('id');

            Swal.fire({
                title: "Konfirmasi",
                html: "Apakah anda yakin akan memasukan data ini ke draft?",
                showCancelButton: true,
                showCloseButton: true,
                confirmButtonText: "Draft",
                cancelButtonText: "Batal",
                confirmButtonColor: "#556ee6",
                cancelButtonColor: "#d33",
                width: 400,
                allowOutsideClick: false,
            }).then(function(result) {
                if (result.value) {
                    let url = '{{ route('unapprove-publikasi', ':id') }}';
                    url = url.replace(':id', id);
                    console.log(url);
                    $.ajax({
                        url: url,
                        type: "put",
                        success: function(data) {
                            console.log(data);
                            $("#datatable").DataTable().ajax.reload(null, true);
                            Swal.fire(
                                'Informasi!',
                                'Berhasil merubah data',
                                'success'
                            )
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            console.log("Gagal!", "Harap coba lagi");
                        }
                    });
                }
            });
        });

        $(document).on("click", '.delete', function() {
            id = $(this).attr('id');

            Swal.fire({
                title: "Konfirmasi",
                html: "Apakah anda yakin akan menghapus data ini?",
                showCancelButton: true,
                showCloseButton: true,
                confirmButtonText: "Hapus",
                cancelButtonText: "Batal",
                confirmButtonColor: "#556ee6",
                cancelButtonColor: "#d33",
                width: 400,
                allowOutsideClick: false,
            }).then(function(result) {
                if (result.value) {
                    let url = '{{ route('publikasi.destroy', ':id') }}';
                    url = url.replace(':id', id);
                    console.log(url);
                    $.ajax({
                        url: url,
                        type: "delete",
                        success: function(data) {
                            console.log(data);
                            $("#datatable").DataTable().ajax.reload(null, true);
                            Swal.fire(
                                'Informasi!',
                                'Berhasil menghapus data',
                                'success'
                            )
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            console.log("Gagal!", "Harap coba lagi");
                        }
                    });
                }
            });
        });
    </script>
@endsection
