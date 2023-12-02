@extends('landing.layout.main')
@section('content')


<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">National Health Dental Student Competition & Seminar</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">Jurusan Kesehatan Gigi<br> Politeknik Kesehatan Kementerian Kesehatan Surabaya</h2>
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="text-center text-lg-start">
                        <a href="#pricing" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>Join Now</span>
                            <i class="bi bi-arrow-right"></i>
                        </a><br>
                        <a href="https://youtu.be/XZU0iHUvDNE?feature=shared" target="_blank" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>Video Panduan Pendaftaran</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{ asset('landing/logo/logo-semnas-2.png') }}" class="img-fluid" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->
<!-- ======= About Section ======= -->
<section id="about" class="about">

    <div class="container" data-aos="fade-up">
        <div class="row gx-0">

            <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="content">
                    <h3>About Us</h3>
                    <h2>Apa Itu NHDSCS ?</h2>
                    <p>
                        NHDSCS 2023 merupakan kegiatan yang berisi perlombaan speech kesehatan gigi dan mulut serta seminar nasional yang menggunakan sistem daring atau online. Kegiatan NHDSCS 2023 diselenggarakan agar menjadi salah satu jembatan bagi Terapis Gigi dan Mulut untuk mendalami ilmu mengenai pemeliharaan kesehatan gigi dan mulut terutama pada Anak Berkebutuhan Khusus Down Syndrome. Oleh karena itu, seminar nasional nantinya akan di isi dengan 2 narasumber yang berkompeten.

                    </p>
                    <!--<div class="text-center text-lg-start">-->
                    <!--    <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">-->
                    <!--        <span>Read More</span>-->
                    <!--        <i class="bi bi-arrow-right"></i>-->
                    <!--    </a>-->
                    <!--</div>-->
                </div>
            </div>

            <div class="col-lg-6 d-flex align-items-center justify-content-center" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{ asset('landing/logo/logo-bertanya.png') }}" class="img-fluid" alt="">
            </div>

        </div>
    </div>

</section><!-- End About Section -->


<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>SPEAKERS</h2>
            <p>Practitioner Speaker</p>
        </header>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <!--<div class="stars">-->
                        <!--    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>-->
                        <!--</div>-->
                        <p>
                            Merupakan seorang konsultan perubahan perilaku, profesional speaker, dan profesional Stand Up Comedian and Host. Beliau juga menjabat sebagai Kepala Bidang Protokol Universitas Airlangga dari tahun 2021 hingga sekarang.

                        </p>
                        <div class="profile mt-auto">
                            <img src="{{ asset('landing/pemateri/pulung.jpg') }}" class="testimonial-img" alt="">
                            <h3>Pulung Siswantara, S.KM., M.Kes</h3>
                            <!--<h4>Ceo &amp; Founder</h4>-->
                        </div>
                    </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <!--<div class="stars">-->
                        <!--    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>-->
                        <!--</div>-->
                        <p>
                            Merupakan seorang Dosen Senior di Fakultas Ilmu Sosial dan Ilmu Politik FISIP Unair Surabaya. Beliau pengajar pada Departemen Antropologi FISIP UNAIR, Pengajar S2 PSDM Sekolah Pasca Sarjana UNAIR, Pengajar D4 Batra Fakultas Vokasi UNAIR, dan Pengajar S3 Ilmu Sosial FISIP UNAIR.

                        </p>
                        <div class="profile mt-auto">
                            <img src="{{ asset('landing/pemateri/pingky.jpg') }}" class="testimonial-img" alt="">
                            <h3>Dr. Pinky Saptandari, Dra., M.A.</h3>
                            <!--<h4>Designer</h4>-->
                        </div>
                    </div>
                </div><!-- End testimonial item -->

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>

</section><!-- End Testimonials Section -->



<!-- ======= Values Section ======= -->
<section id="values" class="values">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>OUR VALUES</h2>
            <p>You'll Get</p>
        </header>

        <div class="row">

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="box">
                    <img src="{{ asset('landing/assets/img/values-1.png') }}" class="img-fluid" alt="">
                    <h3>Peningkatan Pengetahuan</h3>
                    <p>Peserta dapat memperoleh informasi terbaru, riset terkini, dan perkembangan dalam bidang tertentu yang dapat meningkatkan pengetahuan dan pemahaman mereka.</p>
                </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                <div class="box">
                    <img src="{{ asset('landing/assets/img/values-2.png') }}" class="img-fluid" alt="">
                    <h3>Pertukaran Ide</h3>
                    <p>Seminar nasional menciptakan peluang untuk berdiskusi dan bertukar ide dengan ahli, praktisi, dan peserta lainnya, memungkinkan pemahaman yang lebih mendalam tentang topik yang dibahas.</p>
                </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
                <div class="box">
                    <img src="{{ asset('landing/assets/img/values-3.png') }}" class="img-fluid" alt="">
                    <h3>Jaringan Profesional</h3>
                    <p>Peserta memiliki kesempatan untuk membangun dan memperluas jaringan profesional mereka dengan bertemu dengan orang-orang yang memiliki minat atau keahlian serupa.</p>
                </div>
            </div>

        </div>

    </div>

</section><!-- End Values Section -->


<!-- ======= Features Section ======= -->
<section id="features" class="features">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>OUR BENEFITS</h2>
            <p>You'll Get</p>
        </header>

        <div class="row">

            <div class="col-lg-6">
                <img src="{{ asset('landing/assets/img/features.png') }}" class="img-fluid" alt="">
            </div>

            <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
                <div class="row align-self-center gy-4">

                    <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                        <div class="feature-box d-flex align-items-center">
                            <i class="bi bi-check"></i>
                            <h3>E-Sertifikat Seminar (Ber-SKP)</h3>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                        <div class="feature-box d-flex align-items-center">
                            <i class="bi bi-check"></i>
                            <h3>E-Sertifikat Lomba</h3>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
                        <div class="feature-box d-flex align-items-center">
                            <i class="bi bi-check"></i>
                            <h3>Hadiah Pemenang Lomba Speech</h3>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
                        <div class="feature-box d-flex align-items-center">
                            <i class="bi bi-check"></i>
                            <h3>Doorprize</h3>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600">
                        <div class="feature-box d-flex align-items-center">
                            <i class="bi bi-check"></i>
                            <h3>Ilmu Yang Bermanfaat</h3>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
                        <div class="feature-box d-flex align-items-center">
                            <i class="bi bi-check"></i>
                            <h3>Menambah Wawasan</h3>
                        </div>
                    </div>

                </div>
            </div>

        </div> <!-- / row -->


    </div>

</section><!-- End Features Section -->



<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>Pricing</h2>
            <p>Check our Pricing</p>
        </header>

        <div class="text-center justify-content-center row gy-4" data-aos="fade-left">

            @if(Auth::user() == null)

            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="box">
                    <h3 style="color: #07d5c0;">Seminar</h3>
                    <img src="{{ asset('landing/logo/logo-seminar.png') }}" class="img-fluid" alt="">
                    <button href="#" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" class="btn btn-buy">Join Now</button>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="box">
                    <h3 style="color: #07d5c0;">Speech English & Seminar </h3>
                    <img src="{{ asset('landing/logo/logo-seminar.png') }}" class="img-fluid" alt="">
                    <button href="#" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" class="btn btn-buy">Join Now</button>
                </div>
            </div>


        </div>

        @else

        @foreach ($semnas as $data )

        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="box">
                <h3 style="color: #07d5c0;">{{ $data->name }}</h3>
                <div class="price">Rp. {{ number_format($data->harga) }}</div>
                <img src="{{ asset('landing/assets/img/pricing-free.png') }}" class="img-fluid" alt="">
                <button href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $data->id }}" class="btn btn-buy">Join Now</button>
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
                                    <option selected disabled>Pilih Metode Pembayaran</option>
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

        @endif

    </div>

    </div>

</section><!-- End Pricing Section -->






<!-- ======= Clients Section ======= -->
<section id="clients" class="clients">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>Sponsor</h2>
            <p>Thanks For Supporting Us</p>
        </header>

        <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide"><img src="https://ptgmi.or.id/anggota/templates/login/images/logo.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="{{ asset('landing/logo/logo-kesgi.png') }}" class="img-fluid" alt=""></div>
                <!--<div class="swiper-slide"><img src="{{ asset('landing/assets/img/clients/client-3.png') }}" class="img-fluid" alt=""></div>-->
                <!--<div class="swiper-slide"><img src="{{ asset('landing/assets/img/clients/client-4.png') }}" class="img-fluid" alt=""></div>-->
                <!--<div class="swiper-slide"><img src="{{ asset('landing/assets/img/clients/client-5.png') }}" class="img-fluid" alt=""></div>-->
                <!--<div class="swiper-slide"><img src="{{ asset('landing/assets/img/clients/client-6.png') }}" class="img-fluid" alt=""></div>-->
                <!--<div class="swiper-slide"><img src="{{ asset('landing/assets/img/clients/client-7.png') }}" class="img-fluid" alt=""></div>-->
                <!--<div class="swiper-slide"><img src="{{ asset('landing/assets/img/clients/client-8.png') }}" class="img-fluid" alt=""></div>-->
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

</section><!-- End Clients Section -->



<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>Contact</h2>
            <p>Contact Us</p>
        </header>

        <div class="row gy-4">

            <div class="col-lg-6">

                <div class="row gy-4">
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Address</h3>
                            <p>Jl. Pucang Jajar Selatan No.24, Kertajaya, Kec. Gubeng, Surabaya, Jawa Timur 60282</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-telephone"></i>
                            <h3>Call Us</h3>
                            <p>081934887270</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-envelope"></i>
                            <h3>Email Us</h3>
                            <p>nationalhealthdentalscs@gmail.com</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-instagram"></i>
                            <h3>Social Media</h3>
                            <p>@nhdscs</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                {{-- <form action="forms/contact.php" method="post" class="php-email-form">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit">Send Message</button>
                            </div>

                        </div>
                    </form> --}}
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.605812895514!2d112.7605231400412!3d-7.285610772960533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbca9cfa0c47%3A0xfb3f601fe6626e10!2sJl.%20Pucang%20Jajar%20Selatan%20No.24%2C%20Kertajaya%2C%20Kec.%20Gubeng%2C%20Surabaya%2C%20Jawa%20Timur%2060282!5e0!3m2!1sid!2sid!4v1700485115830!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>

    </div>

    {{-- Modal Login Register Forgot --}}

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


                        <?php

                        $nomer = 1;

                        ?>

                        @foreach ($errors->all() as $error)
                        <li>{{ $nomer++ }}. {{ $error }}</li>
                        @endforeach
                    </div>
                    @endif
                    <form action="/login" method="POST" class="php-email-form">
                        @method('post')
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput2" placeholder="Enter Your Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleFormControlInput2" placeholder="Enter Your Password" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Login</button>
                        </div>
                        <div class="text-center mt-3">
                            <a data-bs-dismiss="modal" data-bs-target="#exampleModalToggle3" data-bs-toggle="modal" href="">Forgot Password</a>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">

                    <p>Don't Have a Account?</p>
                    <button class="btn btn-success" data-bs-dismiss="modal" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Register</button>
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


                        <?php

                        $nomer = 1;

                        ?>

                        @foreach ($errors->all() as $error)
                        <li>{{ $nomer++ }}. {{ $error }}</li>
                        @endforeach
                    </div>
                    @endif
                    <form action="/register" method="POST" class="php-email-form">
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

                        {{-- <div class="mb-3">

                            <label for="exampleFormControlInput1" class="form-label">Kampus</label>
                            <select class="form-select" id="id_kampus" name="id_kampus" aria-label="Default select example" required>
                                <option selected disabled>Pilih Kampus</option>
                                @foreach ($kampus as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                        </select>
                </div>

                <div class="mb-3" id="nama_instansi" hidden>
                    <label for="exampleFormControlInput1" class="form-label">Nama Instanasi</label>
                    <input type="text" name="nama_instansi" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Instansi" required>
                </div> --}}

                <div class="mb-3">
                    <label for="id_kampus" class="form-label">Kampus</label>
                    <select class="form-select" id="id_kampus" onclick="myFunction()" onchange="myFunction()" name="id_kampus" aria-label="Default select example" required>
                        <option selected disabled>Pilih Kampus</option>
                        @foreach ($kampus as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3" id="nama_instansi" style="display: none;">
                    <label for="nama_instansi" class="form-label">Nama Instansi</label>
                    <input type="text" name="nama_instansi" class="form-control" id="input_nama_instansi" placeholder="Enter Your Instansi">
                </div>


                <div class="text-center">
                    <button type="submit" class="btn btn-success">Register</button>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <p>Already Have a Account?</p>
                <button class="btn btn-success" data-bs-dismiss="modal" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Login</button>
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

                        <?php

                        $nomer = 1;

                        ?>

                        @foreach ($errors->all() as $error)
                        <li>{{ $nomer++ }}. {{ $error }}</li>
                        @endforeach
                    </div>
                    @endif
                    <form action="/resetpassword" method="POST" class="php-email-form">
                        @method('POST')
                        @csrf
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
                    <button class="btn btn-success" data-bs-dismiss="modal" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Login</button>
                </div>
            </div>
        </div>
    </div>


</section><!-- End Contact Section -->





@endsection

@section('script')



<script>
    // buatin script apabila pada saat register user memilih kampus lain maka akan muncul inputan nama instansi yang harus diisi

    function myFunction() {
        var x = document.getElementById("id_kampus").value;
        if (x == 45) {
            document.getElementById("nama_instansi").style.display = "block";
            // required
            document.getElementById("input_nama_instansi").required = true;
        } else {
            document.getElementById("nama_instansi").style.display = "none";
            // tidak required
            document.getElementById("input_nama_instansi").required = false;
        }
    }

</script>

@if (Session::get('loginerror'))
<script>
    Swal.fire("Opps Error", "Login Gagal", "error");

</script>
@endif

@if (Session::get('bukanuser'))
<script>
    Swal.fire("Opps Error", "Bukan User", "error");

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

@if (Session::get('usersudahterdaftar'))
<script>
    Swal.fire("Opps!", "User Hanya Bisa Mendaftar 1 Kali", "error");

</script>
@endif

@if (Session::get('sudahdaftar'))
<script>
    Swal.fire("Opps!", "Anda Sudah Terdaftar", "error");

</script>
@endif

@if (Session::get('emailtidakada'))
<script>
    Swal.fire("Opps!", "Email Belum Terdaftar", "error");

</script>
@endif

@if (Session::get('codedikirim'))
<script>
    Swal.fire("Good!", "Reset Password Berhasil Dikirim", "success");

</script>
@endif

@if (Session::get('berhasilgantipassword'))
<script>
    Swal.fire("Good!", "Password Berhasil Diubah", "success");

</script>
@endif

@if (Session::get('gagalgantipassword'))
<script>
    Swal.fire("Opps", "Password Gagal Diubah", "error");

</script>
@endif

@if (Session::get('belumlunas'))
<script>
    Swal.fire("Opps", "Pembayaran Anda Belum Lunas", "error");

</script>
@endif

@if (Session::get('belumbisalogin'))
<script>
    Swal.fire("Opps", "Akun Belum Aktif", "error");

</script>
@endif
@endsection
