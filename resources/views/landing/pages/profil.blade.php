@extends('landing.layout.main')
@section('title', 'Profil - ')

@section('content')

<section id="hero pricing" class="hero pricing">

    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <p>Profil</p>
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
                    <select class="form-select" name="id_kampus" id="id_kampus" onclick="myFunction()" aria-label="Default select example" required>
                        <option value="{{ $user->kampus->id }}">{{ $user->kampus->name }}</option>
                        @foreach ($kampus as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                    </select>
                </div>

                @if ($user->id_kampus == 45)
                <div class="mb-3" id="nama_instansi" style="display: block;">
                    <label for="nama_instansi" class="form-label">Nama Instansi</label>
                    <input type="text" name="nama_instansi" value="{{ $user->nama_instansi }}" class="form-control" id="input_nama_instansi" placeholder="Enter Your Instansi">
                </div>
                @else
                <div class="mb-3" id="nama_instansi" style="display: none;">
                    <label for="nama_instansi" class="form-label">Nama Instansi</label>
                    <input type="text" name="nama_instansi" value="{{ $user->nama_instansi }}" class="form-control" id="input_nama_instansi" placeholder="Enter Your Instansi">
                </div>
                @endif

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Password">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Re-Password</label>
                    <input type="password" name="repassword" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Re-Password">
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

            // kosongkan inputan nama instansi
            document.getElementById("input_nama_instansi").value = "";
        }
    }

</script>

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
