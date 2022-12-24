@extends('website.header_footer')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid header-faq py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Kalender Diklat</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Diklat</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Kalender Diklat</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <section class="ftco-section content py-5">
        <div class="container py-5">
            <div class="row my-4 justify-content-center">
                <div class="col-3"></div>
                <div class="col-3 px-3">
                    <select class="form form-select" aria-label="Default select example">
                        <option selected>Silahkan Pilih Jenis</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-3 px-3">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Silahkan Pilih Jenjang</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-3 px-3">
                    <div class="d-flex form-inputs">
                        <input class="form-control" type="text" placeholder="Masukkan Kata Kunci...">
                        <i class="fa fa-search"></i>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="content w-100">
                        <div class="card">
                            <div class="card-body">
                                <div class="panel-body">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.js"></script>

        <script>
            $(document).ready(function() {
                var booking = @json($events);
                console.log(booking);
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,basicWeek'
                    },
                    events: booking,
                });
            });
        </script>
    </section>
@endsection
