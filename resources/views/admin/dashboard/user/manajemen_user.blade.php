@extends('admin.main')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title">
                        Manajemen User
                    </h2>
                </div>
                <div class="col-auto d-print-none">
                    <div class="btn-list">
                        <a href="/manajemen-user/create" class="btn btn-primary d-inline-block">
                            <i class="fa fa-plus me-2"></i> Tambah User
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
                    <a href="#">Semua ({{ $total_user }})</a>
                    <div class="vr mx-1"></div>
                    <a href="#">Aktif (2)</a>
                    <div class="vr mx-1"></div>
                    <a href="#">Tidak Aktif (1)</a>
                </div>
                <div class="col-auto">
                    <div class="row gx-1">
                        <div class="col-auto">
                            <div class="input-group">
                                <input type="text" class="form-control" id="search" placeholder="Search...">
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
                                <option>Set as Aktif</option>
                                <option>Set as Tidak Aktif</option>
                                <option>Move to Trash</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-white">Apply</button>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="row gx-2 align-items-center">
                        {{-- <div class="col-auto">{{ $total_user }} User</div> --}}
                        {{-- <div class="col-auto">
                            {{ $user->links() }}
                        </div> --}}
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
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $users)
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>
                                        <a href="/manajemen-user-form" class="font-weight-bold">
                                            {{ $users->username }}
                                        </a>
                                        <div class="action text-muted">
                                            <a href="/manajemen-user/{{ $users->id }}/edit">Edit</a>
                                        </div>
                                    </td>
                                    <td>{{ $users->name }}</td>
                                    <td>{{ $users->role }}</td>
                                    <td>
                                        @if ($users->status == 0)
                                            <div class="badge bg-danger">Tidak Aktif</div>
                                        @else
                                            <div class="badge bg-success">Aktif</div>
                                        @endif
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
            $('#navbar-menu > .navbar-nav > .nav-item > .nav-link > .nav-link-title:contains("Manajemen User")')
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
@endsection
