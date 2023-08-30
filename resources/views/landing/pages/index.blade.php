@extends('landing.layouts.main')

@section('content')
<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="https://www.semnasjkgsby.com/user/images/direktorat.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7 pt-5">
                                <h1 class="display-4 text-white mb-3 animated slideInDown">Seminar Nasional Jurusan Kesehatan Gigi</h1>
                                <p class="fs-5 text-white-50 mb-5 animated slideInDown">Politeknik Kesehatan Kemenkes Surabaya</p>
                                {{-- <a class="btn btn-primary py-2 px-3 animated slideInDown" href="">
                                    Learn More
                                    <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="https://www.semnasjkgsby.com/user/images/direktorat.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7 pt-5">
                                <h1 class="display-4 text-white mb-3 animated slideInDown">Seminar Nasional Jurusan Kesehatan Gigi</h1>
                                <p class="fs-5 text-white-50 mb-5 animated slideInDown">Politeknik Kesehatan Kemenkes Surabaya</p>
                                {{-- <a class="btn btn-primary py-2 px-3 animated slideInDown" href="">
                                    Learn More
                                    <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">What We Do</div>
            <h1 class="display-6 mb-5">Learn More What We Do And Get Involved</h1>
        </div>
        <div class="row g-4 justify-content-center">

            @foreach ($semnas as $data )

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="{{ asset('landing/img/icon-1.png') }}" alt="">
                    <h4 class="mb-3">{{ $data->name }}</h4>
                    <p class="mb-4">{{ $data->deskripsi }}</p>
                    <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Rp. {{ number_format($data->harga) }}</div><br>

                    @if(Auth::user() == null)

                    <a class="btn btn-outline-primary px-3" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
                        Join Now
                        <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>

                    @else

                    <a class="btn btn-outline-primary px-3" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $data->id }}">
                        Join Now
                        <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>

                    @endif

                </div>
            </div>

            <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Pendaftaran</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/pendaftaran" method="POST">
                                @csrf
                                @method('post')

                                {{-- <label for="exampleFormControlInput1" class="form-label">Email address</label> --}}
                                <input hidden type="text" name="id_semnas" class="form-control" value="{{ $data->id }}" id="exampleFormControlInput1" placeholder="">
                                @if(Auth::user() == null)
                                @else
                                <input hidden type="text" name="id_user" class="form-control" value="{{ Auth::user()->id }}" id="exampleFormControlInput1" placeholder="">
                                @endif
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Metode Pembayaran</label>
                                    <select name="id_payment" class="form-select" aria-label="Default select example">
                                        <option selected>Pilih Metode Pembayaran</option>
                                        @foreach ($paymentChannel as $dataa )
                                        <option value="{{ $dataa->code }}">{{ $dataa->name }}<br> + Rp.{{ number_format($dataa->fee_customer->flat) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Join</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>


            @endforeach

        </div>
    </div>
</div>
<!-- Service End -->


<!-- Donate Start -->
{{-- <div class="container-fluid donate my-5 py-5" data-parallax="scroll" data-image-src="img/carousel-2.jpg">
    <div class="container py-5">

    </div>
</div> --}}
<!-- Donate End -->



<!-- Testimonial Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Our Teams</div>
            <h1 class="display-6 mb-5">Trusted By Thousands Of People And Nonprofits</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item text-center">
                <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="{{ asset('landing/img/testimonial-1.jpg') }}" style="width: 100px; height: 100px;">
                <div class="testimonial-text rounded text-center p-4">
                    <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p>
                    <h5 class="mb-1">Doner Name</h5>
                    <span class="fst-italic">Profession</span>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="{{ asset('landing/img/testimonial-2.jpg') }}" style="width: 100px; height: 100px;">
                <div class="testimonial-text rounded text-center p-4">
                    <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p>
                    <h5 class="mb-1">Doner Name</h5>
                    <span class="fst-italic">Profession</span>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="{{ asset('landing/img/testimonial-3.jpg') }}" style="width: 100px; height: 100px;">
                <div class="testimonial-text rounded text-center p-4">
                    <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p>
                    <h5 class="mb-1">Doner Name</h5>
                    <span class="fst-italic">Profession</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->

{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Open modal for @getbootstrap</button> --}}



<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>


                    <?php

                    $nomer = 1;

                    ?>

                    @foreach ($errors->all() as $error)
                    <li>{{ $nomer++ }}. {{ $error }}</li>
                    @endforeach
                </div>
                @endif
                <form action="/login" method="POST">
                    @method('post')
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Password" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Login</button>
                    </div>
                    <div class="text-center">
                        <a data-bs-dismiss="modal" data-bs-target="#exampleModalToggle3" data-bs-toggle="modal" href="">Forgot Password</a>
                    </div>
                </form>
            </div>

            <div class="modal-footer">

                <p>Don't Have a Account?</p>
                <button class="btn btn-primary" data-bs-dismiss="modal" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Register</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Register</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>


                    <?php

                    $nomer = 1;

                    ?>

                    @foreach ($errors->all() as $error)
                    <li>{{ $nomer++ }}. {{ $error }}</li>
                    @endforeach
                </div>
                @endif
                <form action="/register" method="POST">
                    @method('post')
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Password" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Re-Password</label>
                        <input type="password" name="repassword" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Re-Password" required>
                    </div>

                    <div class="mb-3">

                        <label for="exampleFormControlInput1" class="form-label">Kampus</label>
                        <select class="form-select" name="id_kampus" aria-label="Default select example" required>
                            <option selected>Pilih Kampus</option>
                            @foreach ($kampus as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Register</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <p>Already Have a Account?</p>
                <button class="btn btn-primary" data-bs-dismiss="modal" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Login</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Forgot Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>


                    <?php

                    $nomer = 1;

                    ?>

                    @foreach ($errors->all() as $error)
                    <li>{{ $nomer++ }}. {{ $error }}</li>
                    @endforeach
                </div>
                @endif
                <form action="">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Email" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <p>Already Have a Account?</p>
                <button class="btn btn-primary" data-bs-dismiss="modal" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Login</button>
            </div>
        </div>
    </div>
</div>
{{-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Open first modal</button> --}}
@endsection

@section('script')

@if (Session::get('loginerror'))
<script>
    Swal.fire("Opps Error", "Login Gagal", "error");

</script>
@endif

@if (Session::get('bukanadmin'))
<script>
    Swal.fire("Opps Error", "Bukan Admin", "error");

</script>
@endif

@if (Session::get('failed'))
<script>
    Swal.fire("Opps Error", "Login Gagal", "error");

</script>
@endif

@if (Session::get('registerberhasil'))
<script>
    Swal.fire("Good", "Register Berhasil", "success");

</script>
@endif

@if (Session::get('loginberhasil'))
<script>
    Swal.fire("Good", "Login Berhasil", "success");

</script>
@endif

@if (Session::get('logoutberhasil'))
<script>
    Swal.fire("Good!", "Logout Berhasil", "success");

</script>
@endif

@if (Session::get('registergagal'))
<script>
    Swal.fire("Opps!", "Register Gagal", "error");

</script>
@endif

@if (Session::get('sudahdaftar'))
<script>
    Swal.fire("Opps!", "Anda Sudah Terdaftar", "error");

</script>
@endif


@endsection
