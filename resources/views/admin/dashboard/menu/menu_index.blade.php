@extends('admin.main')
{{-- @dd($static_submenu) --}}
@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-auto">
                    <div class="page-pretitle">
                        Manajemen Menu
                    </div>
                    <h2 class="page-title">
                        Main Menu
                    </h2>
                </div>
                <div class="col-auto d-print-none">
                    <div class="btn-list">
                        <a href="/manajemen-menu/create" class="btn btn-primary d-inline-block">
                            <i class="fa fa-plus me-2"></i> Tambah Menu Navbar
                        </a>
                        <a href="/manajemen-sub-menu/create" class="btn btn-danger d-inline-block">
                            <i class="fa fa-plus me-2"></i> Tambah Sub Menu
                        </a>
                        <a href="/pages/create" class="btn btn-warning d-inline-block">
                            <i class="fa fa-plus me-2"></i> Tambah Menu Content
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
                        <div class="col">

                            <select name="" id="" class="form-control mb-2">
                                <option>Bulk Action</option>
                                <option>Move to Trash</option>
                            </select>
                            <div class="page-pretitle">
                                Table Data
                            </div>
                            <h2 class="page-title">
                                Sub Menu
                            </h2>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-white">Apply</button>
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
                                <th>Menu</th>
                                <th>Parent</th>
                                {{-- <th>URL</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($static_submenu->skip(18) as $submenu)
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>
                                        <a href="#" class="font-weight-bold">
                                            {{ $submenu->name }}
                                        </a>
                                        <div class="action text-muted">
                                            <a href="/manajemen-menu/{{ $submenu->id }}/edit">Edit</a>
                                            <div class="vr mx-1"></div>
                                            <form action="{{ route('delete-submenu', $submenu->id) }}"
                                                method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-light m-1 h3 text-danger">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>{{ $submenu->menus->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row justify-content-between align-items-center mb-3">
                <div class="col-auto mb-3 mb-md-0">
                    <div class="row gx-1">
                        <div class="col">

                            <select name="" id="" class="form-control mb-2">
                                <option>Bulk Action</option>
                                <option>Move to Trash</option>
                            </select>
                            <div class="page-pretitle">
                                Table Data
                            </div>
                            <h2 class="page-title">
                                Menu Hyperlink
                            </h2>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-white">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="table-responsive">
                    @if (session('successs'))
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div class="text-center text-dark">
                                {{ session('successs') }}
                            </div>
                        </div>
                    @endif
                    <table class="table card-table table-post" id="myTable">
                        <thead>
                            <tr>
                                <th width="10"><input type="checkbox" class="checkall"></th>
                                <th>Menu</th>
                                <th>Url</th>
                                {{-- <th>URL</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>
                                    <a href="#" class="font-weight-bold">
                                        {{ $static_adds[3]->name }}
                                    </a>
                                    <div class="action text-muted">
                                        <a href="/update-menu/{{ $static_adds[3]->id }}/edit">Edit</a>
                                        <div class="vr mx-1"></div>
                                        <a href="#" class="text-danger btn-delete">Trash</a>
                                    </div>
                                </td>
                                <td>{{ $static_adds[3]->url }}</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>
                                    <a href="#" class="font-weight-bold">
                                        {{ $static_submenu[8]->name }}
                                    </a>
                                    <div class="action text-muted">
                                        <a href="/update-submenu/{{ $static_submenu[8]->id }}/edit">Edit</a>
                                        <div class="vr mx-1"></div>
                                        <a href="#" class="text-danger btn-delete">Trash</a>
                                    </div>
                                </td>
                                <td>{{ $static_submenu[8]->url }}</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>
                                    <a href="#" class="font-weight-bold">
                                        {{ $static_submenu[9]->name }}
                                    </a>
                                    <div class="action text-muted">
                                        <a href="/update-submenu/{{ $static_submenu[9]->id }}/edit">Edit</a>
                                        <div class="vr mx-1"></div>
                                        <a href="#" class="text-danger btn-delete">Trash</a>
                                    </div>
                                </td>
                                <td>{{ $static_submenu[9]->url }}</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>
                                    <a href="#" class="font-weight-bold">
                                        {{ $static_submenu[10]->name }}
                                    </a>
                                    <div class="action text-muted">
                                        <a href="/update-submenu/{{ $static_submenu[10]->id }}/edit">Edit</a>
                                        <div class="vr mx-1"></div>
                                        <a href="#" class="text-danger btn-delete">Trash</a>
                                    </div>
                                </td>
                                <td>{{ $static_submenu[10]->url }}</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>
                                    <a href="#" class="font-weight-bold">
                                        {{ $static_submenu[11]->name }}
                                    </a>
                                    <div class="action text-muted">
                                        <a href="/update-submenu/{{ $static_submenu[11]->id }}/edit">Edit</a>
                                        <div class="vr mx-1"></div>
                                        <a href="#" class="text-danger btn-delete">Trash</a>
                                    </div>
                                </td>
                                <td>{{ $static_submenu[11]->url }}</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>
                                    <a href="#" class="font-weight-bold">
                                        {{ $static_submenu[16]->name }}
                                    </a>
                                    <div class="action text-muted">
                                        <a href="/update-submenu/{{ $static_submenu[16]->id }}/edit">Edit</a>
                                        <div class="vr mx-1"></div>
                                        <a href="#" class="text-danger btn-delete">Trash</a>
                                    </div>
                                </td>
                                <td>{{ $static_submenu[16]->url }}</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>
                                    <a href="#" class="font-weight-bold">
                                        {{ $static_submenu[17]->name }}
                                    </a>
                                    <div class="action text-muted">
                                        <a href="/update-submenu/{{ $static_submenu[17]->id }}/edit">Edit</a>
                                        <div class="vr mx-1"></div>
                                        <a href="#" class="text-danger btn-delete">Trash</a>
                                    </div>
                                </td>
                                <td>{{ $static_submenu[17]->url }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row justify-content-between align-items-center mb-3">
                <div class="col-auto mb-3 mb-md-0">
                    <div class="row gx-1">
                        <div class="col">

                            <select name="" id="" class="form-control mb-2">
                                <option>Bulk Action</option>
                                <option>Move to Trash</option>
                            </select>
                            <div class="page-pretitle">
                                Table Data
                            </div>
                            <h2 class="page-title">
                                Menu Navbar
                            </h2>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-white">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="table-responsive">
                    @if (session('successss'))
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div class="text-center text-dark">
                                {{ session('successss') }}
                            </div>
                        </div>
                    @endif
                    <table class="table card-table table-post" id="myTable">
                        <thead>
                            <tr>
                                <th width="10"><input type="checkbox" class="checkall"></th>
                                <th>Menu</th>
                                {{-- <th>Url</th> --}}
                                {{-- <th>URL</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($static_adds->skip(9) as $menu)
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>
                                        <a href="#" class="font-weight-bold">
                                            {{ $menu->name }}
                                        </a>
                                        <div class="action text-muted">
                                            <a href="#">Edit</a>
                                            <div class="vr mx-1"></div>
                                            <form action="{{ route('manajemen-menu.destroy', $menu->id) }}"
                                                method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-light m-1 h3 text-danger">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    {{-- <td>{{ $static_adds[3]->url }}</td> --}}
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
            $('#navbar-menu > .navbar-nav > .nav-item > .nav-link > .nav-link-title:contains("Manajemen Menu")')
                .parents('.nav-item').addClass('active');
        });
    </script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">
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
