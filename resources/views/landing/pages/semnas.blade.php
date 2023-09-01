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

            @foreach ($pendaftaran as $data)

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="{{ asset('landing/img/icon-1.png') }}" alt="">
                    <h4 class="mb-3">{{ $data->semnas->name }}</h4>
                    <p class="mb-4">{{ $data->semnas->deskripsi }}</p>

                    @if($data->status_pembayaran == 'PAID')

                    <a class="btn btn-outline-primary px-3 mb-2" href="" data-bs-target="#detailgroup{{ $data->id }}" data-bs-toggle="modal">
                        Join Group
                        {{-- <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div> --}}
                    </a>

                    <a class="btn btn-outline-primary px-3 mb-2" href="" data-bs-target="#detailpresensi{{ $data->id }}" data-bs-toggle="modal">
                        Presensi
                        {{-- <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div> --}}
                    </a>

                    @if($data->status_sertifikat == 'belum')
                    <a class="btn btn-outline-primary px-3" href="" data-bs-target="#detailsertifikat{{ $data->id }}" data-bs-toggle="modal">
                        Unduh Sertifikat
                        {{-- <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div> --}}
                    </a>
                    @else

                    @endif


                    @else


                    <a class="btn btn-outline-primary px-3" href="" data-bs-target="#detailpendaftaran{{ $data->id }}" data-bs-toggle="modal">
                        Bayar
                        {{-- <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div> --}}
                    </a>


                    @endif

                </div>
            </div>

            <div class="modal fade" id="detailgroup{{ $data->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Detail Group Whatsapp</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table datatables table-hover responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $datagroup = DB::table('tb_group')
                                        ->join('tb_semnas', 'tb_group.id_semnas', '=', 'tb_semnas.id')
                                        ->where('tb_group.id_semnas', '=', $data->semnas->id)
                                        ->select('tb_group.name', 'tb_group.link', 'tb_group.status')->get();

                                        foreach ($datagroup as $dataaa) {
                                        ?>
                                        <tr>
                                            <td>{{ $dataaa->name }}</td>
                                            <td>
                                                @if($dataaa->status == 'tersedia')

                                                <div class="badge bg-success">{{ $dataaa->status }}</div>

                                                @else

                                                <div class="badge bg-danger">{{ $dataaa->status }}</div>

                                                @endif

                                            </td>
                                            <th>
                                                @if($dataaa->status == 'tersedia')

                                                <a href="{{ $dataaa->link }}" target="_blank" class="btn btn-outline-primary px-3 mb-2">Join Group</a>

                                                @else


                                                @endif
                                            </th>


                                        </tr>
                                        <?php
                                                }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">

                                <button class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="detailpresensi{{ $data->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Detail Presensi</h1>
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
                            <form action="/presensi" method="post">
                                @method('POST')
                                @csrf
                                <div class="mb-3">
                                    <input hidden type="text" name="id_user" value="{{ Auth::user()->id }}">
                                    {{-- <label for="exampleFormControlInput1" class="form-label">Presensi</label> --}}
                                    <select class="form-select" name="id_detail_presensi" aria-label="Default select example" required>
                                        <option selected>Pilih Presensi</option>

                                        <?php
                                        $datapresensi = DB::table('tb_detail_presensi')
                                        ->join('tb_presensi', 'tb_detail_presensi.id_presensi', '=', 'tb_presensi.id')
                                        ->where('tb_presensi.id_semnas', '=', $data->semnas->id)
                                        ->where('tb_detail_presensi.id_user', '=', Auth::user()->id)
                                        ->whereRaw('now() between tb_presensi.waktu_mulai and tb_presensi.waktu_selesai')
                                        ->select('tb_presensi.name', 'tb_detail_presensi.id')->get();

                                        foreach ($datapresensi as $dataaa) {
                                    ?>

                                        <option value="{{ $dataaa->id }}">{{ $dataaa->name }}</option>

                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="table-responsive">
                                    <table class="table datatables table-hover responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Presensi</th>
                                                <th>Waktu</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $datapresensi = DB::table('tb_detail_presensi')
                                        ->join('tb_presensi', 'tb_detail_presensi.id_presensi', '=', 'tb_presensi.id')
                                        ->where('tb_presensi.id_semnas', '=', $data->semnas->id)
                                        ->where('tb_detail_presensi.id_user', '=', Auth::user()->id)
                                        ->select('tb_presensi.name', 'tb_presensi.waktu_mulai', 'tb_presensi.waktu_selesai', 'tb_detail_presensi.status')->get();

                                        foreach ($datapresensi as $dataa) {
                                        ?>
                                            <tr>
                                                <td>{{ $dataa->name }}</td>
                                                <th>{{ $dataa->waktu_mulai }} - {{ $dataa->waktu_selesai }}</th>
                                                <td>
                                                    @if($dataa->status == 'sudah')

                                                    <div class="badge bg-success">{{ $dataa->status }}</div>

                                                    @else

                                                    <div class="badge bg-danger">{{ $dataa->status }}</div>

                                                    @endif

                                                </td>

                                            </tr>
                                            <?php
                                                }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-success" type="submit">Absen</button>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


            <div class="modal fade" id="detailsertifikat{{ $data->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Detail Sertifikat</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-success alert-dismissible fade show">
                                <p>Mungkin menunggu sekitar 1 jam untuk system akan mengirim sertifikat ke alamat email anda. Pastikan nama dan alamat anda sudah benar dan sesuai, nama yang tercantum akan tertera pada sertifikat, sertifikat dikirim ke alamat email yang telah terdaftar.</p>
                            </div>
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
                            <?php
                            $datasertifikat = DB::table('tb_sertifikat')
                            ->join('tb_semnas', 'tb_sertifikat.id_semnas', '=', 'tb_semnas.id')
                            ->where('tb_sertifikat.id_semnas', '=', $data->semnas->id)
                            ->select('tb_sertifikat.name', 'tb_sertifikat.link', 'tb_sertifikat.status')->first();

                              ?>

                            @if($datasertifikat->status == 'aktif')

                            <form action="/{{ $datasertifikat->link }}" method="post">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                                    <input disabled type="text" name="name" value="{{ auth::user()->name }}" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                    <input disabled type="email" name="email" value="{{ auth::user()->email }}" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Email" required>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-success" type="submit">Unduh</button>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>

                            @else

                            <div class="alert alert-danger alert-dismissible fade show">
                                Sertifikat masih belum bisa diunduh.

                            </div>

                            @endif




                            <?php

                        ?>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="detailpendaftaran{{ $data->id }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Detail Pendaftaran</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="alert alert-success alert-dismissible fade show">
                                <li>Name : {{ $data->semnas->name }}</li>
                                <li>Price : Rp. {{ number_format($data->Semnas->harga) }}</li>
                                <li>Status Pembayaran : {{ $data->status_pembayaran }}</li>
                                <li>Kadaluarsa Pembayaran : {{ $data->kadaluarsa }}</li>
                                <div class="text-center mt-3 mb-3">
                                    <a href="{{ $data->link_pembayaran }}" target="_blank" class="btn btn-success">Bayar</a>
                                </div>
                                <div class="text-center">
                                    <p>Apabila pembayaran anda kadaluarsa, silahkan hapus seminar anda, kemudian daftar ulang kembali pada seminar yang akan anda ikuti.</p>
                                </div>

                                <div class="text-center mt-3">
                                    <button class="btn btn-danger" data-bs-dismiss="modal" data-bs-target="#deletemodal{{ $data->id }}" data-bs-toggle="modal">Hapus</button>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="deletemodal{{ $data->id }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Delete</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-target="#detailpendaftaran{{ $data->id }}" data-bs-toggle="modal"></button>
                        </div>
                        <div class="modal-body">

                            <p>Anda yakin akan menghapus seminar anda ?</p>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-bs-dismiss="modal" data-bs-target="#detailpendaftaran{{ $data->id }}" data-bs-toggle="modal">Close</button>
                            <form action="/hapus-seminar/{{ $data->id }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Hapus</button>
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

@if (Session::get('presensisudah'))
<script>
    Swal.fire("Opps", "Anda Sudah Presensi", "error");

</script>
@endif

@if (Session::get('presensiberhasil'))
<script>
    Swal.fire("Done", "Anda Sudah Presensi", "success");

</script>
@endif
@endsection
