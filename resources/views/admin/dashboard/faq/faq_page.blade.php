@extends('admin.main')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title">
                        FAQ
                    </h2>
                </div>
                <div class="col-auto d-print-none">
                    <div class="btn-list">
                        <a href="/faq/create" class="btn btn-primary d-inline-block">
                            <i class="fa fa-plus me-2"></i> FAQ
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
                        <div class="col">
                            <select name="" id="" class="form-control">
                                <option>Bulk Action</option>
                                <option>Set As Draft</option>
                                <option>Set As Publish</option>
                                <option>Delete Selected</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary">Apply</button>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="row gx-2 align-items-center">
                        <div class="col-auto">10 Items</div>
                        <div class="col-auto">
                            {{ $faq->links() }}
                        </div>
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
                    <table class="table card-table table-post" id="myTable">
                        <thead>
                            <tr>
                                <th width="10"><input type="checkbox" class="checkall"></th>
                                <th width="100" class="text-center">Aksi</th>
                                <th>Judul FAQ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faq as $faqs)
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="/faq/{{ $faqs->id }}/edit"
                                                class="btn btn-light m-1 h3 text-primary rounded"><i
                                                    class="fas fa-file-signature"></i></a>
                                            @if (auth()->user()->role == 'admin')
                                                @if ($faqs->status == 'draft' || $faqs->status == '')
                                                    <form action="/approve-faq/{{ $faqs->id }}" method="POST"
                                                        class="d-inline">
                                                        @method('PUT')
                                                        @csrf
                                                        <button type="submit" class="btn btn-light m-1 h3 text-success"
                                                            title="Publish">
                                                            <i class="fas fa-file-signature"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="/unapprove-faq/{{ $faqs->id }}" method="POST"
                                                        class="d-inline">
                                                        @method('PUT')
                                                        @csrf
                                                        <button type="submit" class="btn btn-light m-1 h3 text-danger"
                                                            title="Draft">
                                                            <i class="far fa-file-excel"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endif
                                            <form action="{{ route('faq.destroy', $faqs->id) }}" method="POST"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-light m-1 h3 text-danger">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $faqs->judul }}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            $('#navbar-menu > .navbar-nav > .nav-item > .nav-link > .nav-link-title:contains("FAQ")').parents(
                '.nav-item').addClass('active');
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
