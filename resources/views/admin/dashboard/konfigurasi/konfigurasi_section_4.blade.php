@extends('admin.main')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title">
                        Edit Section 4
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <form action="/konfigurasi-section" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-8 mb-4 mb-md-0 tab-content">
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
                            <div class="card-body">
                                <div class="card border-0 shadow-none mb-3">
                                    <div class="card border-0 shadow-none mb-3">
                                        <label for="" class="form-label">Deskripsi</label>
                                        <div class="form-group">
                                            <textarea class="tinymce-editor @error('diskripsi') is-invalid @enderror" id="editortiny" name="diskripsi"></textarea>
                                            @error('diskripsi')
                                                <div class="invalid-feedback">
                                                    Deskripsi harus di isi dan minimal 8 karakter!
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Tautan</label>
                                    <input type="text" id="tautan" name="tautan"
                                        class="form-control @error('tautan') is-invalid @enderror">
                                    @error('tautan')
                                        <div class="invalid-feedback">
                                            Tautan harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Gambar</div>
                                    <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                        id="gambar" name="gambar" accept=".jpeg, .jpg, .png,">
                                    @error('gambar')
                                        <div class="invalid-feedback">
                                            Gambar harus di pilih terlebih dahulu!
                                        </div>
                                    @enderror
                                    <div class="form-text">
                                        Resolusi 1080px x 1080px File type : .jpeg, .jpg, .png,
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

        <link rel="stylesheet" type="text/css"
            href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>
        {{-- <script type="text/javascript">
            $(function() {
                $('.btn-publish').on('click', function() {
                    Swal.fire({
                        title: 'Edit Section?',
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
                                'Slideshow Berhasil ditambah',
                                'success',
                            ).then((result) => {
                                window.location = "?page=dashboard";
                            })
                        }
                    })
                });
            });
        </script> --}}


        <script type="text/javascript">
            $(function() {
                $('#navbar-menu > .navbar-nav > .nav-item > .nav-link > .nav-link-title:contains("Section 4")').parents(
                    '.nav-item').addClass('active');
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
    @endsection
