@extends('admin.main')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title">
                        Pages
                    </h2>
                </div>
                <div class="col-auto d-print-none">
                    <div class="btn-list">
                        <a href="/pages/create" class="btn btn-primary d-inline-block">
                            <i class="fa fa-plus me-2"></i> Buat Halaman Baru
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
                    <a href="#" class="text-danger">Trash (0)</a>
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
                        <div class="col-auto">10 Items</div>
                        {{-- <div class="col-auto">
                            {{ $page->links() }}
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
                                <th>Title</th>
                                <th width="200">Nama Menu</th>
                                <th width="200">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($page as $pages)
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>
                                        <a href="/pages/{{ $pages->id }}/edit" class="font-weight-bold">{{ $pages->judul }}</a>
                                        <div class="action text-muted">
                                            <a href="/pages/{{ $pages->id }}/edit">Edit</a>
                                            <div class="vr mx-1"></div>
                                            <a href="#">Draft</a>
                                            <div class="vr mx-1"></div>
                                            <a href="#" class="text-danger btn-delete">Trash</a>
                                            <div class="vr mx-1"></div>
                                            <a href="#">View</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div>{{ $pages->nama_menu }}</div>
                                    </td>
                                    <td>
                                        
                                        <div>{{ $pages->created_at }}</div>
                                    </td>
                                </tr>
                            @endforeach

                            {{-- <tr>
                                <td><input type="checkbox"></td>
                                <td>
                                    <a href="?page=pages-form" class="font-weight-bold">-- Sejarah Singkat</a>
                                    <div class="action text-muted">
                                        <a href="?page=pages-form">Edit</a>
                                        <div class="vr mx-1"></div>
                                        <a href="#">Draft</a>
                                        <div class="vr mx-1"></div>
                                        <a href="#" class="text-danger btn-delete">Trash</a>
                                        <div class="vr mx-1"></div>
                                        <a href="#">View</a>
                                    </div>
                                </td>
                                <td>Profil</td>
                                <td>
                                    <div>Pubished</div>
                                    <div>2021/07/02 at 1:56 pm</div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>
                                    <a href="?page=pages-form" class="font-weight-bold">-- Visi dan Misi</a>
                                    <div class="action text-muted">
                                        <a href="?page=pages-form">Edit</a>
                                        <div class="vr mx-1"></div>
                                        <a href="#">Draft</a>
                                        <div class="vr mx-1"></div>
                                        <a href="#" class="text-danger btn-delete">Trash</a>
                                        <div class="vr mx-1"></div>
                                        <a href="#">View</a>
                                    </div>
                                </td>
                                <td>Profil</td>
                                <td>
                                    <div>Pubished</div>
                                    <div>2021/07/02 at 1:56 pm</div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>
                                    <a href="?page=pages-form" class="font-weight-bold">-- Pemegang Saham</a>
                                    <div class="action text-muted">
                                        <a href="?page=pages-form">Edit</a>
                                        <div class="vr mx-1"></div>
                                        <a href="#">Draft</a>
                                        <div class="vr mx-1"></div>
                                        <a href="#" class="text-danger btn-delete">Trash</a>
                                        <div class="vr mx-1"></div>
                                        <a href="#">View</a>
                                    </div>
                                </td>
                                <td>Profil</td>
                                <td>
                                    <div>Pubished</div>
                                    <div>2021/07/02 at 1:56 pm</div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>
                                    <a href="?page=pages-form" class="font-weight-bold">-- Dewan Komisaris</a>
                                    <div class="action text-muted">
                                        <a href="?page=pages-form">Edit</a>
                                        <div class="vr mx-1"></div>
                                        <a href="#">Draft</a>
                                        <div class="vr mx-1"></div>
                                        <a href="#" class="text-danger btn-delete">Trash</a>
                                        <div class="vr mx-1"></div>
                                        <a href="#">View</a>
                                    </div>
                                </td>
                                <td>Profil</td>
                                <td>
                                    <div>Pubished</div>
                                    <div>2021/07/02 at 1:56 pm</div>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div class="row justify-content-between align-items-center mt-3">
                <div class="col-auto mb-3 mb-md-0">
                    <div class="row gx-1">
                        <div class="col">
                            <select name="" id="" class="form-control">
                                <option>Bulk Action</option>
                                <option>Set As Draft</option>
                                <option>Set As Publish</option>
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
                </div>
            </div> --}}
        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            $('#navbar-menu > .navbar-nav > .nav-item > .nav-link > .nav-link-title:contains("Pages")').parents(
                '.nav-item').addClass('active');
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
