@extends('landing.layout.main')
@section('title', 'Ubah Password - ')
@section('content')

<section id="pricing" class="pricing">

    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <p>Change Password</p>
        </header>

        <div class="row box">
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
            <form action="/changepassword" method="POST">
                @method('post')
                @csrf

                <input hidden type="text" name="code" value="{{ $user->code }}">

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Password" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Re-Password</label>
                    <input type="password" name="repassword" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Re-Password" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-buy">Change</button>
                </div>
            </form>
        </div>

    </div>

</section>
@endsection

@section('script')

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
@endsection
