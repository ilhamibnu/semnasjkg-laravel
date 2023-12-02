@extends('landing.layout.main')
@section('title', 'Seminar - ')
@section('content')


<section id="hero pricing" class="hero pricing">

    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <p>Lomba</p>
        </header>

        <div class="text-center justify-content-center row gy-4" data-aos="fade-left">

            @if($cek_detail_lomba->count() == 0)

            <div class="alert alert-danger alert-dismissible fade show">
                <p>Anda Tidak Mengikuti Lomba Apapun.</p>
            </div>

            @else


            @if($pendaftaranuser->status_pembayaran == 'UNPAID' || $pendaftaranuser->status_pembayaran == 'EXPIRED' || $pendaftaranuser->status_pembayaran == 'FAILED')

            <div class="alert alert-danger alert-dismissible fade show">
                <p>Selesaikan Pembayaran Anda</p>
            </div>

            @else

            @foreach ($pendaftaran as $data)
            <?php
                                        $datadetail = DB::table('tb_detail_lomba')
                                        ->join('tb_lomba', 'tb_detail_lomba.id_lomba', '=', 'tb_lomba.id')
                                        ->where('tb_detail_lomba.id_user', '=', Auth::user()->id)
                                        ->where('tb_lomba.id_semnas', '=', $data->semnas->id)
                                        ->select('tb_lomba.name', 'tb_detail_lomba.link_pengumpulan','tb_lomba.status_pengumpulan', 'tb_detail_lomba.link_pengumpulan_ktm','tb_lomba.status_pengumpulan_ktm', 'tb_lomba.id', 'tb_lomba.link_sertifikat', 'tb_lomba.status', 'tb_detail_lomba.status_unduh')->get();

                                        foreach($datadetail as $dataaa) {
                                        ?>

            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="box">
                    <h3 style="color: #07d5c0;">{{ $dataaa->name }}</h3>
                    <img src="{{ asset('landing/logo/logo-lomba.png') }}" class="img-fluid" alt="">

                    @if($dataaa->status_pengumpulan_ktm == 'tidak_aktif')

                    <a class="btn btn-buy mb-2" href="" data-bs-target="#detailktmlombabelum{{ $dataaa->id }}" data-bs-toggle="modal">
                        Kumpulkan KTM
                    </a>

                    @else
                    <a class="btn btn-buy mb-2" href="" data-bs-target="#detailktmlomba{{ $dataaa->id }}" data-bs-toggle="modal">
                        Kumpulkan KTM
                    </a>

                    @endif


                    @if($dataaa->status_pengumpulan == 'tidak_aktif')

                    <a class="btn btn-buy mb-2" href="" data-bs-target="#detaillombabelum{{ $dataaa->id }}" data-bs-toggle="modal">
                        Kumpulkan Lomba
                    </a>

                    @else
                    <a class="btn btn-buy mb-2" href="" data-bs-target="#detaillomba{{ $dataaa->id }}" data-bs-toggle="modal">
                        Kumpulkan Lomba
                    </a>

                    @endif

                    @if($dataaa->status == 'tidak_aktif')

                    <a class="btn btn-buy mb-2" href="" data-bs-target="#detailsertifikatbelum{{ $dataaa->id }}" data-bs-toggle="modal">
                        Unduh Sertifikat
                    </a>

                    @else

                    @if($dataaa->status_unduh == 'belum')
                    <a class="btn btn-buy mb-2" href="" data-bs-target="#detailsertifikat{{ $dataaa->id }}" data-bs-toggle="modal">
                        Unduh Sertifikat
                    </a>
                    @else

                    @endif

                    @endif



                </div>
            </div>

            <div class="modal fade" id="detailktmlombabelum{{ $dataaa->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Detail Pengumpulan KTM</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="alert alert-danger alert-dismissible fade show">
                                Pengumpulan KTM Belum Dibuka.

                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="detaillombabelum{{ $dataaa->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Detail Pengumpulan Lomba</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="alert alert-danger alert-dismissible fade show">
                                Pengumpulan Lomba Belum Dibuka.

                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="detailsertifikatbelum{{ $dataaa->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Detail Sertifikat</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="alert alert-danger alert-dismissible fade show">
                                Unduh Sertifikat Belum Tersedia.

                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="detailktmlomba{{ $dataaa->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Detail Pengumpulan KTM</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/pengumpulan-ktm-lomba" method="post">
                                @method('POST')
                                @csrf
                                <input hidden type="text" name="id_user" value="{{ Auth::user()->id }}">
                                <input hidden type="text" name="id_lomba" value="{{ $dataaa->id }}">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Link Pengumpulan</label>
                                    <input type="text" name="link_pengumpulan_ktm" value="{{ $dataaa->link_pengumpulan_ktm }}" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Link" required>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-success" type="submit">Kumpulkan</button>
                                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="detaillomba{{ $dataaa->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Detail Pengumpulan Lomba</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/pengumpulan-lomba" method="post">
                                @method('POST')
                                @csrf
                                <input hidden type="text" name="id_user" value="{{ Auth::user()->id }}">
                                <input hidden type="text" name="id_lomba" value="{{ $dataaa->id }}">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Link Pengumpulan</label>
                                    <input type="text" name="link_pengumpulan" value="{{ $dataaa->link_pengumpulan }}" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Link" required>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-success" type="submit">Kumpulkan</button>
                                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="detailsertifikat{{ $dataaa->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Detail Sertifikat</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/unduh-sertifikat-lomba" method="post">
                                @method('POST')
                                @csrf
                                <input hidden type="text" name="id_user" value="{{ Auth::user()->id }}">
                                <input hidden type="text" name="id_lomba" value="{{ $dataaa->id }}">
                                <input hidden type="text" name="url" value="{{ $dataaa->link_sertifikat }}">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                                    <input readonly type="text" name="name" value="{{ auth::user()->name }}" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                    <input readonly type="email" name="email" value="{{ auth::user()->email }}" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Email" required>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-success" type="submit">Unduh</button>
                                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <?php
                            }
                            ?>


            @endforeach
            @endif




            @endif

        </div>

</section>
@endsection

@section('script')

@if (Session::get('hapusseminar'))
<script>
    Swal.fire("Good!", "Seminar Berhasil Dihapus", "success");

</script>
@endif

@if (Session::get('presensierror'))
<script>
    Swal.fire("Opps", "Data Presensi Tidak Ada", "error");

</script>
@endif

@if (Session::get('pengumpulanlombaerror'))
<script>
    Swal.fire("Opps", "Pengumpulan Error", "error");

</script>
@endif

@if (Session::get('pengumpulanlombaberhasil'))
<script>
    Swal.fire("Done", "Pengumpulan Lomba Berhasil", "success");

</script>
@endif

@if (Session::get('unduhsertifikat'))
<script>
    Swal.fire("Done", "Sertifikat Berhasil Diunduh", "success");

</script>
@endif

@if (Session::get('berhasil'))
<script>
    Swal.fire("Done", "Pendaftaran Berhasil, Segera Lakukan Pembayaran", "success");

</script>
@endif

@if (Session::get('unduhsertifikatsudah'))
<script>
    Swal.fire("Opps", "Sertifikat Sudah Didownload", "error");

</script>
@endif

@if (Session::get('pengumpulanktmlombaerror'))
<script>
    Swal.fire("Opps", "Pengumpulan Error", "error");

</script>
@endif

@if (Session::get('pengumpulanktmlombaberhasil'))
<script>
    Swal.fire("Done", "Pengumpulan KTM Berhasil", "success");

</script>
@endif

@endsection
