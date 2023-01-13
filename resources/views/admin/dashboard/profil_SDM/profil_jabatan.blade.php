@extends('admin.main')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title">
                        Jabatan
                    </h2>
                </div>
                <div class="col-auto d-print-none">
                    <div class="btn-list">
                        <a href="/profil-pejabat/jabatan/create" class="btn btn-primary d-inline-block">
                            <i class="fa fa-plus me-2"></i> Jabatan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row justify-content-between align-items-center mb-3">
                <div class="col-auto mb-3 mb-md-0">
                    <div class="row gx-1">
                        <div class="col-auto">
                            <button id="destroy" class="btn btn-danger d-none">
                                <i class="bi bi-trash me-2"></i>Hapus
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="row gx-2 align-items-center">
                        <div class="col-auto">10 Items</div>
                    </div>
                </div>
            </div>
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
                    <table class="table card-table table-post" id="datatable">
                        <thead>
                            <tr>
                                <th width="10"><input type="checkbox" class="all" name="all"></th>
                                <th width="100">Aksi</th>
                                <th>Nama Jabatan</th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <script type="text/javascript">
        $(function() {
            $('#navbar-menu > .navbar-nav > .nav-item > .nav-link > .nav-link-title:contains("Profil Pejabat - SDM")')
                .parents('.nav-item').addClass('active').find('.dropdown-menu').addClass('show').find(
                    '.dropdown-item:contains("Jabatan")').addClass('active');
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
                ajax: `/profil-pejabat/jabatan`,
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
                        data: "jabatan",
                        name: "jabatan",
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
                        let url = '{{ route('jabatan.delete') }}';
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
                    }
                })
            }
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
                    let url = '{{ route('jabatan.destroy', ':id') }}';
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
