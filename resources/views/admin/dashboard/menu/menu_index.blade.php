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
                {{-- <div class="col-auto">
                    <div class="row gx-2 align-items-center">
                        <div class="col-auto">10 Items</div>
                        <div class="col-auto">
                            <button class="btn btn-icon btn-white" disabled>
                                <!-- Download SVG icon from http://tabler-icons.io/i/chevrons-left -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <polyline points="11 7 6 12 11 17" />
                                    <polyline points="17 7 12 12 17 17" />
                                </svg>
                            </button>
                            <button class="btn btn-icon btn-white" disabled>
                                <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <polyline points="15 6 9 12 15 18" />
                                </svg>
                            </button>
                            <button class="btn btn-white">1</button>
                            <span>of 3</span>
                            <button class="btn btn-icon btn-white">
                                <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <polyline points="9 6 15 12 9 18" />
                                </svg>
                            </button>
                            <button class="btn btn-icon btn-white">
                                <!-- Download SVG icon from http://tabler-icons.io/i/chevrons-right -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <polyline points="7 7 12 12 7 17" />
                                    <polyline points="13 7 18 12 13 17" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div> --}}
            </div>
            {{-- <div class="container-xl mb-3">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="page-pretitle">
                                Table Data
                            </div>
                            <h2 class="page-title">
                                Sub Menu
                            </h2>
                        </div>
                    </div>
                </div>
            </div> --}}
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
                                            <a href="#" class="text-danger btn-delete">Trash</a>
                                        </div>
                                    </td>
                                    <td>{{ $submenu->menus->name }}</td>
                                    {{-- <td>https://bpddiy.co.id</td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div class="card">
                <div class="table-responsive">
                    <table class="table card-table table-post" id="myTable">
                        <thead>
                            <tr>
                                <th width="10"><input type="checkbox" class="checkall"></th>
                                <th>Menu</th>
                                <th>Parent</th>
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
                                            <a href="#">Edit</a>
                                            <div class="vr mx-1"></div>
                                            <a href="#" class="text-danger btn-delete">Trash</a>
                                        </div>
                                    </td>
                                    <td>{{ $submenu->menus->name }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> --}}
        </div>
    </div>

    {{-- <div class="page-body">
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
                                Main Menu
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
                    <table class="table card-table table-post" id="myTable">
                        <thead>
                            <tr>
                                <th width="10"><input type="checkbox" class="checkall"></th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($static_adds as $menu)
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>
                                        <a href="#" class="font-weight-bold">
                                            {{ $menu->name }}
                                        </a>
                                        <div class="action text-muted">
                                            <a href="#">Edit</a>
                                            <div class="vr mx-1"></div>
                                            <a href="#" class="text-danger btn-delete">Trash</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
           
        </div>
    </div> --}}

    <script type="text/javascript">
        $(function() {
            $('#navbar-menu > .navbar-nav > .nav-item > .nav-link > .nav-link-title:contains("Manajemen Menu")')
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
