@extends('admin.main')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title">
                        Tambah Testimoni
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-8 mb-4 mb-md-0 tab-content">
                    <form action="/testimoni" method="POST">
                        @csrf
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="card-data">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="id">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Nama</label>
                                                <input type="text" id="name" name="name"
                                                    class="form-control @error('name') is-invalid @enderror">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        Nama harus di isi terlebih dahulu!
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Jabatan</label>
                                                <input type="text" id="jabatan" name="jabatan"
                                                    class="form-control @error('jabatan') is-invalid @enderror">
                                                @error('jabatan')
                                                    <div class="invalid-feedback">
                                                        Jabatan harus di isi terlebih dahulu!
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="card border-0 shadow-none mb-3">
                                                <label for="" class="form-label">Testimoni</label>
                                                <div class="form-group">
                                                    <textarea class="tinymce-editor @error('testimoni') is-invalid @enderror" id="editortiny" name="testimoni"></textarea>
                                                    @error('testimoni')
                                                        <div class="invalid-feedback">
                                                            Testimoni harus di isi terlebih dahulu!
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <input name="status" type="hidden" value="draft">
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="en">
                                            <div class="mb-3">
                                                <input type="text" class="form-control" placeholder="Add Title">
                                            </div>
                                            <div class="card border-0 shadow-none mb-3">
                                                <div id="editor-en" style="height:300px;"></div>
                                            </div>
                                            <div class="card border-0 shadow-none mb-3" data-template="accordion">
                                                <div class="card-header font-weight-bold">Accordion</div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Title</label>
                                                        <input type="text" class="form-control" id="accordion-title">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Description</label>
                                                        <textarea name="" id="accordion-description" cols="30" rows="5" class="form-control"></textarea>
                                                    </div>
                                                    <button class="btn btn-add-accordion btn-primary" type="button">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19" />
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12" />
                                                        </svg>
                                                        Add Accordion
                                                    </button>
                                                </div>
                                                <div class="table-responsive mb-0">
                                                    <table class="table" id="table-accordion-list">
                                                        <thead>
                                                            <tr>
                                                                <th>Title</th>
                                                                <th>Description</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr data-id="1">
                                                                <td class="title">Some Title</td>
                                                                <td class="desc">Lorem ipsum dolor sit amet consectetur,
                                                                    adipisicing elit. Nisi, repellendus.</td>
                                                                <td class="text-nowrap" valign="top">
                                                                    <a href="#" class="btn-edit-accordion">Edit</a>
                                                                    <div class="vr mx-1"></div>
                                                                    <a href="#"
                                                                        class="text-danger btn-delete-accordion">Delete</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end bg-light">
                                <button class="btn btn-primary">Publish</button>
                            </div>
                        </div>
                    </form>
                </div>
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
            $('.btn-publish').on('click', function() {
                Swal.fire({
                    title: 'Tambah Testimoni?',
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
                            'Testimoni Berhasil ditambah',
                            'success',
                        ).then((result) => {
                            window.location = "?page=testimoni";
                        })
                    }
                })
            });
        });
    </script>


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
