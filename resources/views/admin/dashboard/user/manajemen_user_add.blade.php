@extends('admin.main')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title">
                        Tambah User
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-8 mb-4 mb-md-0">
                    <form action="{{ route('manajemen-user.store') }}" method="POST">
                        @csrf
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="form-label">Username</div>
                                    <input type="text" id="username" name="username"
                                        class="form-control @error('username') is-invalid @enderror"
                                        value="{{ old('username') }}">
                                    @error('username')
                                        <div class="invalid-feedback">
                                            Username dapat di isikan terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Nama</div>
                                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            Nama dapat di isikan terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Role</div>
                                    <select id="role" name="role"
                                        class="form-control @error('role') is-invalid @enderror">
                                        <option selected disabled>Pilih Role User</option>
                                        <option value="admin">Admin</option>
                                        <option value="operator">Operator</option>
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">
                                            Role dapat di isikan terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Status</div>
                                    <select name="status" id="" class="form-control">
                                        <option selected disabled>Pilih Status User</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            Role dapat di isikan terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Password</div>
                                    <input type="text" id="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            Password harus di isi dan minimal 8 karakter
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
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
@endsection
