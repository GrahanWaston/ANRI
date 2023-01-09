@extends('admin.main')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title">
                        Edit Program Diklat
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <form action="/program-diklat" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-8 mb-4 mb-md-0 tab-content">
                        <div class="card mb-3">
                            <div class="card-header font-weight-bold">Program Diklat</div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="kode_diklat" class="form-label">Kode Diklat</label>
                                    <input type="text" class="form-control @error('kode_diklat') is-invalid @enderror"
                                        id="kode_diklat" name="kode_diklat" value="{{ old('kode_diklat') }}">
                                    @error('kode_diklat')
                                        <div class="invalid-feedback">
                                            Kode Diklat harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input name="status" type="hidden" value="draft">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Jenis Diklat</label>
                                    <select name="jenis_id"
                                        class="form-select-secondary form-control @error('jenis_id') is-invalid @enderror"
                                        aria-label="Default select example" id="jenis_id">
                                        <option value="" disabled="" selected>Pilih Jenis Diklat</option>
                                        @foreach ($jenis as $type)
                                            <option value="{{ $type->id }}">{{ $type->nama_jenis }}</option>
                                        @endforeach
                                    </select>
                                    @error('jenis_id')
                                        <div class="invalid-feedback">
                                            Jenis harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Jenjang Diklat</label>
                                    <select name="jenjang_id"
                                        class="form-select-secondary form-control @error('jenjang_id') is-invalid @enderror"
                                        aria-label="Default select example" id="jenjang_id">
                                        <option value="" disabled="" selected>Pilih Jenjang Diklat</option>
                                        @foreach ($jenjang as $jenjangs)
                                            <option value="{{ $jenjangs->id }}">{{ $jenjangs->jenjang }}</option>
                                        @endforeach
                                    </select>
                                    @error('jenjang_id')
                                        <div class="invalid-feedback">
                                            Jenjang harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Nama Diklat</label>
                                    <input type="text" class="form-control @error('nama_diklat') is-invalid @enderror"
                                        id="nama_diklat" name="nama_diklat" value="{{ old('nama_diklat') }}">
                                    @error('nama_diklat')
                                        <div class="invalid-feedback">
                                            Nama Diklat harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="input-icon mb-3">
                                    <label for="" class="form-label">Jadwal Mulai </label>
                                    {{-- <div id="datepicker" class="input-append">
                                    <input data-format="yyyy-MM-dd" type="text">
                                </div>  --}}
                                    <div class="input-group date" id="datepicker">
                                        <input type="text" class="form-control @error('start_date') is-invalid @enderror"
                                            id="start_date" name="start_date" value="{{ old('start_date') }}">
                                        <span class="input-group-append">
                                            <span class="input-group-text bg-light d-block">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </span>
                                        @error('start_date')
                                            <div class="invalid-feedback">
                                                Tanggal mulai harus di isi terlebih dahulu!
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-icon mb-3">
                                    <label for="" class="form-label">Jadwal Selesai</label>
                                    <div class="input-group date" id="enddatepicker">
                                        <input type="text" class="form-control @error('end_date') is-invalid @enderror"
                                            id="end_date" name="end_date" value="{{ old('end_date') }}">
                                        <span class="input-group-append">
                                            <span class="input-group-text bg-light d-block">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </span>
                                        @error('end_date')
                                            <div class="invalid-feedback">
                                                Tanggal Selesai harus di isi terlebih dahulu!
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Tempat Diklat</label>
                                    <input type="text" class="form-control @error('tempat_diklat') is-invalid @enderror"
                                        id="tempat_diklat" name="tempat_diklat" value="{{ old('tempat_diklat') }}">
                                    @error('tempat_diklat')
                                        <div class="invalid-feedback">
                                            Tempat Diklat harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Biaya</label>
                                    <input type="text" class="form-control @error('biaya') is-invalid @enderror"
                                        id="biaya" name="biaya" value="{{ old('biaya') }}">
                                    @error('biaya')
                                        <div class="invalid-feedback">
                                            Biaya harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Durasi</label>
                                    <input type="text" class="form-control @error('durasi') is-invalid @enderror"
                                        id="durasi" name="durasi" value="{{ old('durasi') }}">
                                    @error('durasi')
                                        <div class="invalid-feedback">
                                            Biaya harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">File Pendukung</div>
                                    <input type="file" class="form-control @error('file') is-invalid @enderror"
                                        accept=".pdf,.docx," id="file" name="file">
                                    @error('file')
                                        <div class="invalid-feedback">
                                            File harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                    <div class="form-text">
                                        File type : .pdf,.docx
                                    </div>
                                </div>
                                <label for="" class="form-label">Deskripsi</label>
                                <div class="card border-0 shadow-none mb-3">
                                    <div class="form-group">
                                        <textarea class="tinymce-editor @error('deskripsi') is-invalid @enderror" id="editortiny" name="deskripsi">{{ old('deskripsi') }}</textarea>
                                        @error('deskripsi')
                                        <div class="invalid-feedback">
                                            Deskripsi harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                    </div>
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

        <style type="text/css">
            [data-template] {
                display: none;
            }
        </style>

        {{-- <link rel="stylesheet" type="text/css"
            href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>
        <script type="text/javascript">
            $(function() {
                $('.btn-publish').on('click', function() {
                    Swal.fire({
                        title: 'Tambah Jadwal Diklat?',
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
                                'Jadwal Diklat Berhasil ditambah',
                                'success',
                            ).then((result) => {
                                window.location = "?page=kalender-diklat";
                            })
                        }
                    })
                });
            });
        </script> --}}


        <script type="text/javascript">
            $(function() {
                $('#navbar-menu > .navbar-nav > .nav-item > .nav-link > .nav-link-title:contains("Program Diklat")')
                    .parents('.nav-item').addClass('active');
            });
        </script>

        <script src="assets/libs/litepicker/dist/litepicker.js"></script>
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script type="text/javascript">
            const useDarkMode = window.matchMedia('(prefers-color-scheme: light)').matches;
            const isSmallScreen = window.matchMedia('(max-width: 1366)').matches;

            tinymce.init({
                selector: '#editortiny',
                theme: 'silver',
                plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars image link codesample table charmap pagebreak nonbreaking insertdatetime advlist lists wordcount help charmap quickbars emoticons',
                editimage_cors_hosts: ['picsum.photos'],
                menubar: 'file edit view insert format tools table help',
                toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | image  link codesample',
                toolbar_sticky: false,
                // toolbar_sticky_offset: isSmallScreen ? 108 : 108,
                autosave_ask_before_unload: true,
                autosave_interval: '30s',
                autosave_prefix: '{path}{query}-{id}-',
                autosave_restore_when_empty: false,
                autosave_retention: '2m',
                image_advtab: true,
                importcss_append: true,
                file_picker_callback: (callback, value, meta) => {
                    /* Provide file and text for the link dialog */
                    if (meta.filetype === 'file') {
                        callback('https://www.google.com/logos/google.jpg', {
                            text: 'My text'
                        });
                    }

                    /* Provide image and alt text for the image dialog */
                    if (meta.filetype === 'image') {
                        callback('https://www.google.com/logos/google.jpg', {
                            alt: 'My alt text'
                        });
                    }

                    /* Provide alternative source and posted for the media dialog */
                    if (meta.filetype === 'media') {
                        callback('movie.mp4', {
                            source2: 'alt.ogg',
                            poster: 'https://www.google.com/logos/google.jpg'
                        });
                    }
                },
                template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
                template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
                height: 600,
                image_caption: true,
                quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
                noneditable_class: 'mceNonEditable',
                toolbar_mode: 'sliding',
                contextmenu: 'link image table',
                // skin: useDarkMode ? 'oxide-dark' : 'oxide',
                // content_css: useDarkMode ? 'dark' : 'default',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
            });
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            $(function() {
                $("#datepicker").datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true,
                });
            });
        </script>
        <script type="text/javascript">
            $(function() {
                $("#enddatepicker").datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true,
                });
            });
        </script>
    @endsection
