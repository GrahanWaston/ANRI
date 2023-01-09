@extends('admin.main')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title">
                        Edit Layanan
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-8 mb-4 mb-md-0 tab-content">
                    <form action="/layanan/{{ $data_service->id }}" id="form" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="card mb-3">
                            <!-- <div class="card-header font-weight-bold"></div> -->
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="name" name="nama" value="{{ old('nama') ?? $data_service->nama }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            Nama harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Alamat Situs Layanan</label>
                                    <input type="text" class="form-control @error('url') is-invalid @enderror"
                                        id="url" name="url" value="{{ old('url') ?? $data_service->url }}">
                                    @error('url')
                                        <div class="invalid-feedback">
                                            Alamat situs harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <div class="card border-0 shadow-none mb-3">
                                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" cols="30" rows="10">{{ old('deskripsi') ?? $data_service->deskripsi }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">
                                            Deksripsi harus di isi terlebih dahulu!
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end bg-light">
                                <button class="btn btn-publish btn-primary">Publish</button>
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

        {{-- <link rel="stylesheet" type="text/css"
            href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>
        <script type="text/javascript">
            $(function() {
                $('.btn-publish').on('click', function() {
                    Swal.fire({
                        title: 'Tambah Layanan?',
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
                                'Layanan Berhasil ditambah',
                                'success',
                            ).then((result) => {
                                window.location = "?page=layanan";
                            })
                        }
                    })
                });
            });
        </script> --}}


        <script type="text/javascript">
            $(function() {
                $('#navbar-menu > .navbar-nav > .nav-item > .nav-link > .nav-link-title:contains("Layanan")').parents(
                    '.nav-item').addClass('active');
            });
        </script>

        <script src="assets/libs/litepicker/dist/litepicker.js"></script>
        <!-- QUILL EDITOR -->
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script>
            var toolbarOptions = [
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }],
                [{
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],
                [{
                    'color': []
                }, {
                    'background': []
                }],
                [{
                    'align': []
                }],
                ['image'],
                ['clean']
            ];

            var quill = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    toolbar: toolbarOptions
                }
            });
            var quill = new Quill('#editor2', {
                theme: 'snow',
                modules: {
                    toolbar: toolbarOptions
                }
            });

            new Litepicker({
                element: document.getElementById('input-eg-show-nights'),
                singleMode: false,
                tooltipText: {
                    one: 'night',
                    other: 'nights'
                },
                tooltipNumber: (totalDays) => {
                    return totalDays - 1;
                }
            })

            $(function() {
                $('#form-template').on('change', function() {
                    var template = $(this).val();
                    $('[data-template]').hide();
                    $('[data-template*=' + template + ']').show();
                }).change();

                $(document).on('click', '.btn-add-accordion', function() {
                    var title = $('#accordion-title').val();
                    var desc = $('#accordion-description').val();
                    var number = $('#table-accordion-list tbody tr').length;

                    var template = '<tr data-id="' + (number + 1) + '">' +
                        '<td class="title">' + title + '</td>' +
                        '<td class="desc">' + desc + '</td>' +
                        '<td class="text-nowrap" valign="top">' +
                        '<a href="#" class="btn-edit-accordion">Edit</a>' +
                        '<div class="vr mx-1"></div>' +
                        '<a href="#" class="text-danger btn-delete-accordion">Delete</a>' +
                        '</td>' +
                        '</tr>';


                    $('#table-accordion-list tbody').append(template);
                });

                $(document).on('click', '.btn-edit-accordion', function() {
                    var title = $(this).parents('tr').find('td')
                    var desc = $('#accordion-description').val();
                    var number = $('#table-accordion-list tbody tr').length;

                    var template = '<tr data-id="' + (number + 1) + '">' +
                        '<td class="title">' + title + '</td>' +
                        '<td class="desc">' + desc + '</td>' +
                        '<td class="text-nowrap" valign="top">' +
                        '<a href="#" class="btn-edit-accordion">Edit</a>' +
                        '<div class="vr mx-1"></div>' +
                        '<a href="#" class="text-danger btn-delete-accordion">Delete</a>' +
                        '</td>' +
                        '</tr>';


                    $('#table-accordion-list tbody').append(template);
                });
            })
        </script>
        <script></script>
    @endsection
