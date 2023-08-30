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

                    @if($data->status_pembayaran == 'UNPAID' OR $data->status_pembayaran == 'EXPIRED')
                    <a class="btn btn-outline-primary px-3" href="" data-bs-target="#detailpendaftaran{{ $data->id }}" data-bs-toggle="modal">
                        Bayar
                        <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                    @else

                    @endif

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



@endsection
