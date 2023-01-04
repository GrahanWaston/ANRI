@extends('admin.main')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title">
                        Tambah Sub Menu
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <form action="/manajemen-sub-menu" method="POST">
                    @csrf
                    <div class="col-md-8 mb-4 mb-md-0 tab-content">
                        <div class="tab-pane active" id="id">
                            <div class="mb-3">
                                <input type="text" class="form-control @error('url') is-invalid @enderror"
                                    id="url" name="url" placeholder="Masukkan url /">
                                @error('url')
                                    <div class="invalid-feedback">
                                        Url harus di isi terlebih dahulu!
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Masukkan nama">
                                @error('name')
                                    <div class="invalid-feedback">
                                        Nama harus di isi terlebih dahulu!
                                    </div>
                                @enderror
                            </div>
                            <div class="permalink mb-3">
                                {{-- <span class="text-dark">Permalink : </span>
                                <a href="#">https://www.bpddiy.co.id/pages</a> --}}
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
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-header font-weight-bold">Publish</div>
                            <div class="card-body">
                                <div class="mb-2">
                                    <select name="status" id="status"
                                        class="form-control @error('status') is-invalid @enderror">
                                        <option disabled selected>Pilih status publish</option>
                                        <option value="published">Published</option>
                                        <option value="draft">Draft</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            Status harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end bg-light">
                                <button class="btn btn-primary">Publish</button>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header font-weight-bold">Page Attributes</div>
                            <div class="card-body">
                                {{-- <div class="mb-3">
                                    <label for="" class="form-label">Parent</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">(No Parent)</option>
                                    </select>
                                </div> --}}
                                {{-- <div class="mb-3">

                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="Masukan Nama Menu">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            Judul harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div> --}}
                                <div class="mb-3">
                                    <div class="card-header font-weight-bold">Menu Parent</div>
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <select name="menu_id"
                                                class="form-control @error('menu_id') is-invalid @enderror">
                                                <option disabled selected>Pilih menu parent</option>
                                                    <option value="{{ $static_adds[1]->id }}">{{ $static_adds[1]->name }}</option>
                                                    <option value="{{ $static_adds[2]->id }}">{{ $static_adds[2]->name }}</option>
                                                    <option value="{{ $static_adds[4]->id }}">{{ $static_adds[4]->name }}</option>
                                                    <option value="{{ $static_adds[5]->id }}">{{ $static_adds[5]->name }}</option>
                                            </select>
                                            @error('menu_id')
                                                <div class="invalid-feedback">
                                                    Menu harus di isi terlebih dahulu!
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
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


    <script type="text/javascript">
        $(function() {
            $('#navbar-menu > .navbar-nav > .nav-item > .nav-link > .nav-link-title:contains("Manajemen Menu")').parents(
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
