@extends('landing.layouts.main')
@section('title', 'Profil - ');

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4">Update Profil</h1>
    </div>
</div>
<!-- Page Header End -->

<!-- Service Start -->

<div class="container-xxl py-5">
    <div class="container">
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
        <form action="/updateprofil" method="POST">
            @method('post')
            @csrf

            <input hidden type="text" name="id_user" value="{{ Auth::user()->id }}">

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Name" required>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Email" required>
            </div>

            <div class="mb-3">

                <label for="exampleFormControlInput1" class="form-label">Kampus</label>
                <select class="form-select" name="id_kampus" aria-label="Default select example" required>
                    <option value="{{ $user->kampus->id }}">{{ $user->kampus->name }}</option>
                    @foreach ($kampus as $data)
                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Password">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Re-Password</label>
                <input type="password" name="repassword" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Re-Password">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Change</button>
            </div>
        </form>
    </div>
</div>
<!-- Service End -->
@endsection

@section('script')

@if (Session::get('berhasilupdateprofil'))
<script>
    Swal.fire("Good!", "Profil Berhasil Diubah", "success");

</script>
@endif

@if (Session::get('gagalgantipassword'))
<script>
    Swal.fire("Opps", "Password Gagal Diubah", "error");

</script>
@endif
@endsection
