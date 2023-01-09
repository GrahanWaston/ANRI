@extends('website.header_footer')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid header-faq py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Sumber Daya Manusia</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Profil</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Sumber Daya Manusia</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <section class="wrapper content">
        <div class="container-xl py-5">
            <div class="accordion" id="accordionExample">
                @foreach ($jabatan as $index => $jabatans)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse{{ $index }}" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                {{ $jabatans->jabatan }}
                            </button>
                        </h2>
                        <div id="flush-collapse{{ $index }}" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="row g-4 my-3">
                                @foreach ($pejabat as $pejabats)
                                    @if ($pejabats->jabatan_id == $jabatans->id)
                                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s"
                                            style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                                            <div class="accordion-body">
                                                <div
                                                    class="h-100 team-item border-top border-bottom border-5 border-primary rounded shadow overflow-hidden">
                                                    <div class="text-center p-4">
                                                        <img class="img-fluid object-fit-cover"
                                                            src="{{ asset('storage/' . $pejabats->image) }}" alt="">
                                                        <h6 class="mb-1">{{ $pejabats->nama }}</h6>
                                                        <small class="text-secondary">{{ $pejabats->keterangan }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
