@extends('landing.layouts.main')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4">Seminar Anda</h1>
    </div>
</div>
<!-- Page Header End -->

<!-- Service Start -->

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">What We Do</div>
            <h1 class="display-6 mb-5">Learn More What We Do And Get Involved</h1>
        </div>
        <div class="row g-4 justify-content-center">

            @foreach ($pendaftaran as $data )

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="img/icon-1.png" alt="">
                    <h4 class="mb-3">{{ $data->semnas->name }}</h4>
                    <p class="mb-4">{{ $data->semnas->deskripsi }}</p>
                    {{-- <a class="btn btn-outline-primary px-3" href="">
                        Learn More
                        <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a> --}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Service End -->
@endsection
