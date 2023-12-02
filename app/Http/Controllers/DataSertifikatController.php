<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sertifikat;
use App\Models\Semnas;

class DataSertifikatController extends Controller
{
    public function index()
    {
        $datasemnas = Semnas::all();
        $datasertifikat = Sertifikat::with('semnas')->get();

        return view('admin.pages.sertifikat', [
            'datasertifikat' => $datasertifikat,
            'datasemnas' => $datasemnas
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_semnas' => 'required',
            'name' => 'required',
            'link' => 'required',
            'status' => 'required'
        ], [
            'id_semnas.required' => 'Seminar belum dipilih',
            'name.required' => 'Nama belum diisi',
            'link.required' => 'Link belum diisi',
            'status.required' => 'Status belum dipilih'
        ]);

        $sertifikat = new Sertifikat;
        $sertifikat->id_semnas = $request->id_semnas;
        $sertifikat->name = $request->name;
        $sertifikat->link = $request->link;
        $sertifikat->status = $request->status;
        $sertifikat->save();

        return redirect()->back()->with('create', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_semnas' => 'required',
            'name' => 'required',
            'link' => 'required',
            'status' => 'required'
        ], [
            'id_semnas.required' => 'Seminar belum dipilih',
            'name.required' => 'Nama belum diisi',
            'link.required' => 'Link belum diisi',
            'status.required' => 'Status belum dipilih'
        ]);

        $sertifikat = Sertifikat::find($id);
        $sertifikat->id_semnas = $request->id_semnas;
        $sertifikat->name = $request->name;
        $sertifikat->link = $request->link;
        $sertifikat->status = $request->status;
        $sertifikat->save();

        return redirect()->back()->with('update', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $sertifikat = Sertifikat::find($id);
        $sertifikat->delete();

        return redirect()->back()->with('delete', 'Data berhasil dihapus');
    }
}
