@extends('admin.main')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title">
                        Konfigurasi Situs
                    </h2>
                </div>
                <div class="col-auto d-print-none">

                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <form action="/konfigurasi-situs/{{ $website->id }}" id="form" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="col-md-8 mb-4 mb-md-0">
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
                        <div class="card mb-3">
                            <div class="card-header">
                                <h2 class="page-title">
                                    Konfigurasi Website
                                </h2>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="form-label">Nama Website</div>
                                    <input type="text" class="form-control @error('nama_website') is-invalid @enderror"
                                        id="nama_website" name="nama_website" value="{{ $website->nama_website }}">
                                    @error('nama_website')
                                        <div class="invalid-feedback">
                                            Nama Website harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Alamat</div>
                                    <textarea name="alamat" id="alamat" cols="30" rows="5"
                                        class="form-control @error('alamat') is-invalid @enderror">{{ $website->alamat }}</textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            Alamat harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">No Telepon</div>
                                    <input type="text" class="form-control @error('no_telfon') is-invalid @enderror"
                                        id="no_telfon" name="no_telfon" value="{{ $website->no_telfon }}">
                                    @error('no_telfon')
                                        <div class="invalid-feedback">
                                            Nomor Telepon harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">No Whatsapp</div>
                                    <input type="text" class="form-control @error('no_whatsapp') is-invalid @enderror"
                                        id="no_whatsapp" name="no_whatsapp" value="{{ $website->no_whatsapp }}">
                                    @error('no_whatsapp')
                                        <div class="invalid-feedback">
                                            Nomor Whatsapp harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">E-mail 1</div>
                                    <input type="e-mail" class="form-control @error('email_pertama') is-invalid @enderror"
                                        id="email_pertama" name="email_pertama" value="{{ $website->email_pertama }}">
                                    @error('email_pertama')
                                        <div class="invalid-feedback">
                                            Email pertama harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">E-mail 2</div>
                                    <input type="e-mail" class="form-control @error('email_kedua') is-invalid @enderror"
                                        id="email_kedua" name="email_kedua" value="{{ $website->email_kedua }}">
                                    @error('email_kedua')
                                        <div class="invalid-feedback">
                                            Email kedua harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Embed Maps</div>
                                    <textarea name="maps" class="@error('maps') is-invalid @enderror" id="maps" cols="50" rows="5"
                                        class="form-control">{!! $website->maps !!}</textarea>
                                    @error('maps')
                                        <div class="invalid-feedback">
                                            Maps harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 mb-4 mb-md-0">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h2 class="page-title">
                                    Sosial Media
                                </h2>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="form-label">Facebook</div>
                                    <input type="text" class="form-control @error('facebook') is-invalid @enderror"
                                        id="facebook" name="facebook" value="{{ $website->facebook }}">
                                    @error('facebook')
                                        <div class="invalid-feedback">
                                            Facebook harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Twitter</div>
                                    <input type="text" class="form-control @error('twitter') is-invalid @enderror"
                                        id="twitter" name="twitter" value="{{ $website->twitter }}">
                                    @error('twitter')
                                        <div class="invalid-feedback">
                                            Twitter harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Instagram</div>
                                    <input type="text" class="form-control @error('instagram') is-invalid @enderror"
                                        id="instagram" name="instagram" value="{{ $website->instagram }}">
                                    @error('instagram')
                                        <div class="invalid-feedback">
                                            Instagram harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Youtube</div>
                                    <input type="text" class="form-control @error('youtube') is-invalid @enderror"
                                        id="youtube" name="youtube" value="{{ $website->youtube }}">
                                    @error('youtube')
                                        <div class="invalid-feedback">
                                            Youtube harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 mb-4 mb-md-0">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h2 class="page-title">
                                    Quick Link
                                </h2>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="form-label">Quick Link 1</div>
                                    <input type="text" class="form-control m-2" placeholder="Masukkan Nama"
                                        value="{{ $link[0]->nama }}">
                                    {{-- @error('youtube')
                                        <div class="invalid-feedback">
                                            Youtube harus di isi terlebih dahulu!
                                        </div>
                                    @enderror --}}
                                    <input type="text" class="form-control m-2" placeholder="Masukkan Alamat URL"
                                        value="{{ $link[0]->url }}">
                                    {{-- @error('youtube')
                                        <div class="invalid-feedback">
                                            Youtube harus di isi terlebih dahulu!
                                        </div>
                                    @enderror --}}
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Quick Link 2</div>
                                    <input type="text" class="form-control m-2" placeholder="Masukkan Nama"
                                        value="{{ $link[1]->nama }}">
                                    <input type="text" class="form-control m-2" placeholder="Masukkan Alamat URL"
                                        value="{{ $link[1]->url }}">
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Quick Link 3</div>
                                    <input type="text" class="form-control m-2" placeholder="Masukkan Nama"
                                        value="{{ $link[2]->nama }}">
                                    <input type="text" class="form-control m-2" placeholder="Masukkan Alamat URL"
                                        value="{{ $link[2]->url }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 mb-4 mb-md-0">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h2 class="page-title">
                                    Video Unggulan
                                </h2>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="form-label">Url Video Youtube</div>
                                    <input type="text" class="form-control @error('url_youtube') is-invalid @enderror" id="url_youtube" name="url_youtube"
                                        value="{{ $website->url_youtube }}">
                                    @error('url_youtube')
                                        <div class="invalid-feedback">
                                            URL Youtube harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end bg-light">
                                <button class="btn btn-publish btn-primary">Publish</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>
<script type="text/javascript">
	$(function() {
		$('.btn-publish').on('click', function() {
			Swal.fire({
				title: 'Simpan Konfigurasi Situs?',
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
						'Konfigurasi Berhasil Disimpan',
						'success',
					).then((result) => {
						window.location = "?page=dashboard";
					})
				}
			})
		});
	});
</script>

<script type="text/javascript">
	$(function() {
		$('#navbar-menu > .navbar-nav > .nav-item > .nav-link > .nav-link-title:contains("Konfigurasi Situs")').parents('.nav-item').addClass('active').find('.dropdown-menu').addClass('show').find('.dropdown-item:contains("Informasi Kontak")').addClass('active');
	});
</script> --}}
@endsection
