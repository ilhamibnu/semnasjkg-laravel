<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kampus;
use App\Models\JenisPeserta;

class DataKampusController extends Controller
{
    public function index()

    {
        $datajenispeserta = JenisPeserta::all();
        $datakampus = Kampus::with('jenis_peserta')->get();

        return view('admin.pages.kampus', [
            'datakampus' => $datakampus,
            'datajenispeserta' => $datajenispeserta,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'id_jenis_peserta' => 'required',
        ], [
            'name.required' => 'Nama Kampus Harus Diisi',
            'id_jenis_peserta.required' => 'Jenis Peserta Harus Diisi',
        ]);

        $datakampus = new Kampus();
        $datakampus->name = $request->name;
        $datakampus->id_jenis_peserta = $request->id_jenis_peserta;
        $datakampus->save();

        return redirect()->back()->with('create', 'Data Kampus Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'id_jenis_peserta' => 'required',
        ], [
            'name.required' => 'Nama Kampus Harus Diisi',
            'id_jenis_peserta.required' => 'Jenis Peserta Harus Diisi',

        ]);

        $datakampus = Kampus::find($id);
        $datakampus->name = $request->name;
        $datakampus->id_jenis_peserta = $request->id_jenis_peserta;
        $datakampus->save();

        return redirect()->back()->with('update', 'Data Kampus Berhasil Diubah');
    }

    public function destroy($id)
    {
        $datakampus = Kampus::find($id);
        $datakampus->delete();

        return redirect()->back()->with('delete', 'Data Kampus Berhasil Dihapus');
    }
}
