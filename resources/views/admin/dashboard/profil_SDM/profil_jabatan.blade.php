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
                        <div class="col">
                            <select name="" id="" class="form-control">
                                <option>Bulk Action</option>
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
                            {{ $jabatan->links() }}
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
                                <th width="100">Aksi</th>
                                <th>Nama Jabatan</th>
                                <!-- <th>Jabatan</th> -->
                                <!-- <th>Nama Diklat</th> -->
                                <!-- <th>Rentang</th> -->
                                <!-- <th width="10">Highlight</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jabatan as $jabatans)
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="/profil-pejabat/jabatan/{{ $jabatans->id }}/edit"
                                                class="btn btn-light m-1 h3 text-primary" title="Edit"><i
                                                    class="fas fa-file-signature"></i></a>
                                            @if ($jabatans->status == 'published')
                                                <a href="#" class="btn btn-light m-1 h3 text-success"
                                                    title="Publish"><i class="fas fa-clipboard-check"></i></a>
                                            @else
                                                <a href="#" class="btn btn-light m-1 h3 text-danger" title="Draft"><i
                                                        class="far fa-file-excel"></i></a>
                                            @endif
                                            <form action="{{ route('jabatan.destroy', $jabatans->id) }}" method="POST"
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
                                        {{ $jabatans->jabatan }}
                                    </td>
                                </tr>
                            @endforeach
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
                            {{ $testimoni->links() }}
                        </div>
				</div>
			</div>
		</div> --}}
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
