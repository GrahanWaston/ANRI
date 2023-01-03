@extends('admin.main')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title">
                        Tambah Publikasi
                    </h2>
                </div>
                <div class="col-auto d-print-none">
                    <!-- <div class="btn-list">
                                 <a href="?page=berita-form" class="btn btn-primary d-inline-block">
                                  <i class="fa fa-plus me-2"></i> Buat Berita Baru
                                 </a>
                                </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <form action="/publikasi" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-8 mb-4 mb-md-0">
                        <div class="mb-3">
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                placeholder="Add Title" id="title" name="title">
                            @error('title')
                                <div class="invalid-feedback">
                                    Judul harus di isi terlebih dahulu!
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <select name="category_id" id="category_id"
                                class="form-control @error('category_id') is-invalid @enderror">
                                <option disabled selected>Pilih Kategori</option>
                                <!-- <option value="">Artikel</option> -->
                                <option value="1">Berita</option>
                                <!-- <option value="">Pengumuman</option> -->
                                <option value="2">Infografis</option>
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">
                                    Kategori harus di isi terlebih dahulu!
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input name="status" type="hidden" value="draft">
                        </div>
                        <div class="permalink mb-3">
                            <span class="text-dark">Permalink : </span>
                            <a href="#">https://pusdiklat.anri.go.id/pages</a>
                        </div>
                        <div class="card border-0 shadow-none mb-3">
                            <div class="form-group">
                                <textarea class="tinymce-editor @error('body') is-invalid @enderror" id="editortiny" name="body"></textarea>
                                @error('body')
                                    <div class="invalid-feedback">
                                        Body harus di isi terlebih dahulu!
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header font-weight-bold">SEO</div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="form-label">Seo Title</div>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Seo Keyword</div>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Seo Description</div>
                                    <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        {{-- <div class="card mb-3">
                            <div class="card-header font-weight-bold">Publish</div>
                            <div class="card-body">

                                <div class="mb-2">
                                    <select name="status" id="status"
                                        class="form-control @error('status') is-invalid @enderror">
                                        <option selected disabled>Pilih status post</option>
                                        <option value="published">Published</option>
                                        <option value="draft">Draft</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            Kategori post harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                            </div>

                        </div> --}}
                        <div class="card mb-3">
                            <div class="card-header font-weight-bold">Foto Utama</div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="form-label">Upload Image</div>
                                    <input type="file" class="form-control @error('image_main') is-invalid @enderror"
                                        id="image_main" name="image_main">
                                    @error('image_main')
                                        <div class="invalid-feedback">
                                            Foto utama harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                    <div class="form-text">
                                        File type : PNG, JPG, JPEG, rekomendasi ukuran 400x300
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header font-weight-bold">Foto Album</div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="form-label">Upload Image</div>
                                    <input type="file" class="form-control @error('image_album') is-invalid @enderror"
                                        id="image_album" name="image_album" multiple>
                                    @error('image_album')
                                        <div class="invalid-feedback">
                                            Foto utama harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                    <div class="form-text">
                                        File type : PNG, JPG, JPEG, rekomendasi ukuran 400x300
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end bg-light">
                                <button class="btn btn-primary btn-publish">Publish</button>
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
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>


    <script type="text/javascript">
        $(function() {
            $('#navbar-menu > .navbar-nav > .nav-item > .nav-link > .nav-link-title:contains("Berita")').parents(
                '.nav-item').addClass('active');
        });
    </script>
    {{-- <script type="text/javascript">
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
    </script> --}}
    <script src="assets/libs/litepicker/dist/litepicker.js"></script>
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
