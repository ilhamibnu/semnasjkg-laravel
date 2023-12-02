<?php

namespace App\Http\Controllers;

use App\Models\DetailLomba;
use App\Models\DetailPresensi;
use App\Models\Lomba;
use App\Models\Pendaftaran;
use App\Models\Presensi;
use App\Models\Semnas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SemnasController extends Controller
{
    public function index()
    {
        $data_pendaftaran = Pendaftaran::with('semnas')->where('id_user', Auth::user()->id)->get();

        return view('landing.pages.semnas', [
            'pendaftaran' => $data_pendaftaran
        ]);
    }

    public function destroy($id)
    {
        $cek_pendaftaran = Pendaftaran::find($id);

        $id_user = $cek_pendaftaran->id_user;
        $id_semnas = $cek_pendaftaran->id_semnas;

        $cek_presensi = Presensi::where('id_semnas', $id_semnas)->get();

        foreach ($cek_presensi as $data_presensi) {
            DetailPresensi::where('id_user', $id_user)->where('id_presensi', $data_presensi->id)->delete();
        }

        $cek_detail_lomba = DetailLomba::where('id_user', $id_user)->get();

        foreach ($cek_detail_lomba as $data_detail_lomba) {
            $data_detail_lomba->delete();
        }

        $cek_pendaftaran->delete();

        return redirect('/seminar')->with('hapusseminar', 'Berhasil Hapus');
    }

    public function presensi(Request $request)
    {
        $request->validate([
            'id_detail_presensi' => 'required',
        ], [
            'id_detail_presensi.required' => 'Presensi tidak boleh kosong',
        ]);

        $id_user = Auth::user()->id;
        $id_detail_presensi = $request->id_detail_presensi;

        $cek_detail_presensi = DetailPresensi::where('id_user', $id_user)->where('id', $id_detail_presensi)->first();

        if ($cek_detail_presensi == null) {
            return redirect('/seminar')->with('presensierror', 'Data Presensi Tidak Ada');
        } elseif ($cek_detail_presensi->status == 'sudah') {

            return redirect('/seminar')->with('presensisudah', 'Sudah Presensi');
        } else {
            $cek_detail_presensi->status = 'sudah';
            $cek_detail_presensi->save();

            return redirect('/seminar')->with('presensiberhasil', 'Presensi Berhasil');
        }
    }

    public function unduhsertifikat(Request $request)
    {
        $url = $request->url;
        $name = $request->name;
        $email = $request->email;
        $id_semnas = $request->id_semnas;

        $cek_pendaftaran = Pendaftaran::where('id_user', Auth::user()->id)->where('id_semnas', $id_semnas)->first();

        if ($cek_pendaftaran->status_sertifikat == 'sudah') {
            return redirect('/seminar')->with('unduhsertifikatsudah', 'Sertifikat Sudah Diunduh');
        } else {

            $cek_pendaftaran->status_sertifikat = 'sudah';
            $cek_pendaftaran->save();

            // membuat form action dengan method post ke url yang diinginkan dengan value yang diinginkan juga
            echo '<form action="' . $url . '" method="post" id="form-download">';
            // membuat inputan dengan type hidden untuk mengirimkan data yang dibutuhkan
            echo '<input hidden type="text" name="name" value="' . $name . '">';
            echo '<input hidden type="text" name="email" value="' . $email . '">';
            // membuat tombol submit untuk mengirimkan data
            echo '<button type="submit" id="btn-download"></button>';

            echo '</form>';

            // membuat script javascript untuk submit secara otomatis
            echo '<script>';
            echo 'document.getElementById("btn-download").click();';
            echo 'document.getElementById("form-download").submit();';
            echo '</script>';

            // mengembalikan nilai kosong agar tidak ada output yang ditampilkan
            return '';

            // return redirect('/seminar')->with('unduhsertifikat', 'Unduh Sertifikat Berhasil');
        }
    }

    public function bayar($id)
    {
        $pendaftaran = Pendaftaran::find($id);
        $pendaftaran->status_pembayaran = 'PAID';
        $pendaftaran->save();

        return redirect('/seminar')->with('bayar', 'Pembayaran Berhasil');
    }

    public function indexlomba()
    {
        $pendaftaranuser = Pendaftaran::where('id_user', Auth::user()->id)->first();

        $pendaftaran = Pendaftaran::where('id_user', Auth::user()->id)->get();

        // cek data lomba yang diikuti user
        $cek_detail_lomba = DetailLomba::where('id_user', Auth::user()->id)->get();


        return view('landing.pages.lomba', [
            'pendaftaranuser' => $pendaftaranuser,
            'pendaftaran' => $pendaftaran,
            'cek_detail_lomba' => $cek_detail_lomba,
        ]);
    }


    public function pengumpulanlomba(Request $request)
    {

        $id_user = $request->id_user;
        $id_lomba = $request->id_lomba;


        $cek_detail_lomba = DetailLomba::where('id_user', $id_user)->where('id_lomba', $id_lomba)->first();

        if ($cek_detail_lomba == null) {
            return redirect('/lomba')->with('pengumpulanlombaerror', 'Data Lomba Tidak Ada');
        } else {
            $cek_detail_lomba->link_pengumpulan = $request->link_pengumpulan;
            $cek_detail_lomba->save();

            return redirect('/lomba')->with('pengumpulanlombaberhasil', 'Pengumpulan Lomba Berhasil');
        }
    }

    public function pengumpulanktmlomba(Request $request)
    {

        $id_user = $request->id_user;
        $id_lomba = $request->id_lomba;

        $cek_detail_lomba = DetailLomba::where('id_user', $id_user)->where('id_lomba', $id_lomba)->first();

        if ($cek_detail_lomba == null) {
            return redirect('/lomba')->with('pengumpulanktmlombaerror', 'Data Lomba Tidak Ada');
        } else {
            $cek_detail_lomba->link_pengumpulan_ktm = $request->link_pengumpulan_ktm;
            $cek_detail_lomba->save();

            return redirect('/lomba')->with('pengumpulanktmlombaberhasil', 'Pengumpulan Lomba Berhasil');
        }
    }



    public function unduhsertifikatlomba(Request $request)
    {
        $url = $request->url;
        $id_user = $request->id_user;
        $id_lomba = $request->id_lomba;

        $cek_detail_lomba = DetailLomba::where('id_user', $id_user)->where('id_lomba', $id_lomba)->first();

        if ($cek_detail_lomba->status_unduh == 'sudah') {
            return redirect('/lomba')->with('unduhsertifikatlombasudah', 'Sertifikat Sudah Diunduh');
        } else {

            $cek_detail_lomba->status_unduh = 'sudah';
            $cek_detail_lomba->save();

            $cek_user = User::find($id_user);

            // membuat form action dengan method post ke url yang diinginkan dengan value yang diinginkan juga
            echo '<form action="' . $url . '" method="post" id="form-download">';
            // membuat inputan dengan type hidden untuk mengirimkan data yang dibutuhkan
            echo '<input hidden type="text" name="name" value="' . $cek_user->name . '">';
            echo '<input hidden type="text" name="email" value="' . $cek_user->email . '">';
            // membuat tombol submit untuk mengirimkan data
            echo '<button type="submit" id="btn-download"></button>';

            echo '</form>';

            // membuat script javascript untuk submit secara otomatis
            echo '<script>';
            echo 'document.getElementById("btn-download").click();';
            echo 'document.getElementById("form-download").submit();';
            echo '</script>';

            // mengembalikan nilai kosong agar tidak ada output yang ditampilkan
            return '';

            // return redirect('/seminar')->with('unduhsertifikat', 'Unduh Sertifikat Berhasil');
        }
    }
}
