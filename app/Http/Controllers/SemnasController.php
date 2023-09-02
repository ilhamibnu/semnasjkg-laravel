<?php

namespace App\Http\Controllers;

use App\Models\DetailPresensi;
use App\Models\Pendaftaran;
use App\Models\Presensi;
use App\Models\Semnas;
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
}
