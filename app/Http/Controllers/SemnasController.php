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
}
