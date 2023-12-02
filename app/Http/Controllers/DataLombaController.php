<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;
use App\Models\Semnas;

class DataLombaController extends Controller
{
    public function index()
    {
        $datalomba = Lomba::with('semnas')->get();
        $datasemnas = Semnas::all();

        return view('admin.pages.lomba', [
            'datalomba' => $datalomba,
            'datasemnas' => $datasemnas,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'link_sertifikat' => 'required',
            'status_pengumpulan' => 'required',
            'status_pengumpulan_ktm' => 'required',
            'id_semnas' => 'required',
            'status' => 'required',
        ], [
            'name.required' => 'Nama Lomba Harus Diisi',
            'link_sertifikat.required' => 'Link Sertifikat Harus Diisi',
            'status_pengumpulan.required' => 'Status Pengumpulan Harus Diisi',
            'status_pengumpulan_ktm.required' => 'Link Pengumpulan KTM Harus Diisi',
            'id_semnas.required' => 'Seminar Harus Diisi',
            'status.required' => 'Status Harus Diisi',
        ]);

        $datalomba = new Lomba();
        $datalomba->name = $request->name;
        $datalomba->link_sertifikat = $request->link_sertifikat;
        $datalomba->status_pengumpulan = $request->status_pengumpulan;
        $datalomba->status_pengumpulan_ktm = $request->status_pengumpulan_ktm;
        $datalomba->id_semnas = $request->id_semnas;
        $datalomba->status = $request->status;

        $datalomba->save();

        return redirect()->back()->with('create', 'Data Lomba Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'link_sertifikat' => 'required',
            'status_pengumpulan' => 'required',
            'status_pengumpulan_ktm' => 'required',
            'id_semnas' => 'required',
            'status' => 'required',
        ], [
            'name.required' => 'Nama Lomba Harus Diisi',
            'link_sertifikat.required' => 'Link Sertifikat Harus Diisi',
            'status_pengumpulan.required' => 'Status Pengumpulan Harus Diisi',
            'status_pengumpulan_ktm.required' => 'Link Pengumpulan KTM Harus Diisi',
            'id_semnas.required' => 'Seminar Harus Diisi',
            'status.required' => 'Status Harus Diisi',
        ]);

        $datalomba = Lomba::find($id);
        $datalomba->name = $request->name;
        $datalomba->link_sertifikat = $request->link_sertifikat;
        $datalomba->status_pengumpulan = $request->status_pengumpulan;
        $datalomba->status_pengumpulan_ktm = $request->status_pengumpulan_ktm;
        $datalomba->id_semnas = $request->id_semnas;
        $datalomba->status = $request->status;
        $datalomba->save();

        return redirect()->back()->with('update', 'Data Lomba Berhasil Diubah');
    }

    public function destroy($id)
    {
        $datalomba = Lomba::find($id);
        $datalomba->delete();

        return redirect()->back()->with('delete', 'Data Lomba Berhasil Dihapus');
    }
}
