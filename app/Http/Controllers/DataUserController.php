<?php

namespace App\Http\Controllers;

use App\Imports\UserImport;
use App\Models\User;
use App\Models\Kampus;
use App\Models\JenisPeserta;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;



class DataUserController extends Controller
{
    public function indexjkgsby()
    {
        $datajenispeserta = JenisPeserta::all();
        $datakampus = Kampus::all();

        $datauser = User::with('jenis_peserta', 'kampus')->where('id_jenis_peserta', 1)->get();

        return view('admin.pages.userjkgsby', [
            'datauser' => $datauser,
            'datajenispeserta' => $datajenispeserta,
            'datakampus' => $datakampus
        ]);
    }

    public function indexjkgnonsby()
    {
        $datajenispeserta = JenisPeserta::all();
        $datakampus = Kampus::all();

        $datauser = User::with('jenis_peserta', 'kampus')->where('id_jenis_peserta', 2)->get();

        return view('admin.pages.userjkgnonsby', [
            'datauser' => $datauser,
            'datajenispeserta' => $datajenispeserta,
            'datakampus' => $datakampus
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'nim' => 'required|unique:tb_user,nim'

        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'nim.required' => 'NIM tidak boleh kosong',
            'nim.unique' => 'NIM sudah terdaftar',
        ]);

        $nimemail = $request->nim . '@semnasjkgsby.com';

        $user = new User;
        $user->name = $request->name;
        $user->nim = $request->nim;
        $user->email = $nimemail;
        $user->password = bcrypt($request->nim);
        $user->id_kampus = 1;
        $user->id_jenis_peserta = 1;
        $user->id_role = 1;
        $user->save();

        return redirect()->back()->with('create', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'nim' => 'required|unique:tb_user,nim,' . $id

        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'nim.required' => 'NIM tidak boleh kosong',
            'nim.unique' => 'NIM sudah terdaftar',
        ]);

        $nimemail = $request->nim . '@semnasjkgsby.com';

        $user = User::find($id);
        $user->name = $request->name;
        $user->nim = $request->nim;
        $user->email = $nimemail;
        $user->password = bcrypt($request->nim);
        $user->id_kampus = 1;
        $user->id_jenis_peserta = 1;
        $user->id_role = 1;
        $user->save();

        return redirect()->back()->with('update', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('delete', 'Data berhasil dihapus');
    }

    public function importexcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ], [
            'file.required' => 'File tidak boleh kosong',
            'file.mimes' => 'File harus berupa excel'
        ]);

        $file = $request->file('file');
        $namafile = rand() . $file->getClientOriginalName();
        $file->move('excel/user', $namafile);

        Excel::import(new UserImport, public_path('/excel/user/' . $namafile));

        return redirect()->back()->with('create', 'Data berhasil diimport');
    }
}
