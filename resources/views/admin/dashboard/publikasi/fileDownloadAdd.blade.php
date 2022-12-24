@extends('admin.main')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title">
                        Edit Berita
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
                <form action="/publikasi-file" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-8 mb-4 mb-md-0 tab-content">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">Judul</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                                    @error('title')
                                        <div class="invalid-feedback">
                                            Judul harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                        <option disabled selected>Pilih Kategori</option>
                                        <option value="3">Artikel</option>
                                        <!-- <option value="">Berita</option> -->
                                        <option value="4">Pengumuman</option>
                                        <!-- <option value="">Infografis</option> -->
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">
                                            Kategori harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="year" class="form-label">Tahun</label>
                                    <input type="text" id="year" name="year" class="form-control @error('year') is-invalid @enderror">
                                    @error('year')
                                        <div class="invalid-feedback">
                                            Tahun harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="form-label">File Publikasi</div>
                                    <input type="file" class="form-control @error('file') is-invalid @enderror" accept=".pdf," id="file" name="file">
                                    @error('file')
                                        <div class="invalid-feedback">
                                            File harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                    <div class="form-text">
                                        File type : .pdf,
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
    </div>

    <style type="text/css">
        [data-template] {
            display: none;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>


    <script type="text/javascript">
        $(function() {
            $('#navbar-menu > .navbar-nav > .nav-item > .nav-link > .nav-link-title:contains("Berita")').parents(
                '.nav-item').addClass('active');
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('.btn-publish').on('click', function() {
                Swal.fire({
                    title: 'Simpan Publikasi?',
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
                            'Publikasi Berhasil Disimpan',
                            'success',
                        ).then((result) => {
                            window.location = "?page=publikasi";
                        })
                    }
                })
            });
        });
    </script>
    <script src="assets/libs/litepicker/dist/litepicker.js"></script>
    <!-- QUILL EDITOR -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
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
