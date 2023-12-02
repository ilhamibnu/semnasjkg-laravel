<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\Semnas;

class DataPresensiController extends Controller
{
    public function index()
    {
        $datapresensi = Presensi::with('semnas')->get();
        $datasemnas = Semnas::all();

        return view('admin.pages.presensi', [
            'datapresensi' => $datapresensi,
            'datasemnas' => $datasemnas,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_semnas' => 'required',
            'name' => 'required',
            'datemulai' => 'required',
            'timemulai' => 'required',
            'dateselesai' => 'required',
            'timeselesai' => 'required',

        ], [
            'id_semnas.required' => 'Seminar belum dipilih',
            'name.required' => 'Nama Presensi belum diisi',
            'datemulai.required' => 'Tanggal Mulai belum diisi',
            'timemulai.required' => 'Waktu Mulai belum diisi',
        ]);

        $waktu_mulai = $request->datemulai . ' ' . $request->timemulai;
        $waktu_selesai = $request->dateselesai . ' ' . $request->timeselesai;

        $datapresensi = new Presensi();
        $datapresensi->id_semnas = $request->id_semnas;
        $datapresensi->name = $request->name;
        // ubah waktu mulai dan selesai ke format datetime
        $datapresensi->waktu_mulai = date('Y-m-d H:i:s', strtotime($waktu_mulai));
        $datapresensi->waktu_selesai = date('Y-m-d H:i:s', strtotime($waktu_selesai));
        $datapresensi->save();

        return redirect()->back()->with('create', 'Data Presensi Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_semnas' => 'required',
            'name' => 'required',
            'datemulai' => 'required',
            'timemulai' => 'required',
            'dateselesai' => 'required',
            'timeselesai' => 'required',

        ], [
            'id_semnas.required' => 'Seminar belum dipilih',
            'name.required' => 'Nama Presensi belum diisi',
            'datemulai.required' => 'Tanggal Mulai belum diisi',
            'timemulai.required' => 'Waktu Mulai belum diisi',
        ]);

        $waktu_mulai = $request->datemulai . ' ' . $request->timemulai;
        $waktu_selesai = $request->dateselesai . ' ' . $request->timeselesai;

        $datapresensi = Presensi::find($id);
        $datapresensi->id_semnas = $request->id_semnas;
        $datapresensi->name = $request->name;
        // ubah waktu mulai dan selesai ke format datetime
        $datapresensi->waktu_mulai = date('Y-m-d H:i:s', strtotime($waktu_mulai));
        $datapresensi->waktu_selesai = date('Y-m-d H:i:s', strtotime($waktu_selesai));
        $datapresensi->save();

        return redirect()->back()->with('update', 'Data Presensi Berhasil Diubah');
    }

    public function destroy($id)
    {
        $datapresensi = Presensi::find($id);
        $datapresensi->delete();

        return redirect()->back()->with('delete', 'Data Presensi Berhasil Dihapus');
    }
}
