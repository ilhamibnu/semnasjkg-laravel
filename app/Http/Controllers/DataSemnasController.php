<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semnas;
use App\Models\JenisPeserta;
use PhpParser\Node\Expr\FuncCall;

class DataSemnasController extends Controller
{
    public function index()
    {
        $datajenispeserta = JenisPeserta::all();
        $datasemnas = Semnas::with('jenis_peserta')->get();

        return view('admin.pages.semnas', [
            'datasemnas' => $datasemnas,
            'datajenispeserta' => $datajenispeserta
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'id_jenis_peserta' => 'required'
        ], [
            'name.required' => 'Nama Seminar tidak boleh kosong',
            'deskripsi.required' => 'Deskripsi Seminar tidak boleh kosong',
            'harga.required' => 'Harga Seminar tidak boleh kosong',
            'id_jenis_peserta.required' => 'Jenis Peserta tidak boleh kosong'
        ]);

        $semnas = new Semnas;
        $semnas->name = $request->name;
        $semnas->deskripsi = $request->deskripsi;
        $semnas->harga = $request->harga;
        $semnas->id_jenis_peserta = $request->id_jenis_peserta;
        $semnas->save();

        return redirect()->back()->with('create', 'Data Seminar berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'id_jenis_peserta' => 'required'
        ], [
            'name.required' => 'Nama Seminar tidak boleh kosong',
            'deskripsi.required' => 'Deskripsi Seminar tidak boleh kosong',
            'harga.required' => 'Harga Seminar tidak boleh kosong',
            'id_jenis_peserta.required' => 'Jenis Peserta tidak boleh kosong'
        ]);

        $semnas = Semnas::find($id);
        $semnas->name = $request->name;
        $semnas->deskripsi = $request->deskripsi;
        $semnas->harga = $request->harga;
        $semnas->id_jenis_peserta = $request->id_jenis_peserta;
        $semnas->save();

        return redirect()->back()->with('update', 'Data Seminar berhasil diubah');
    }

    public function destroy($id)
    {
        $semnas = Semnas::find($id);
        $semnas->delete();

        return redirect()->back()->with('delete', 'Data Seminar berhasil dihapus');
    }
}
