<?php

namespace App\Http\Controllers;

use App\Models\JenisPeserta;
use Illuminate\Http\Request;


class DataJenisPesertaController extends Controller
{
    public function index()
    {
        $datajenispeserta = JenisPeserta::all();
        return view('admin.pages.jenispeserta', [
            'datajenispeserta' => $datajenispeserta
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        JenisPeserta::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('create', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        JenisPeserta::where('id', $id)->update([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('update', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        JenisPeserta::where('id', $id)->delete();
        return redirect()->back()->with('delete', 'Data berhasil dihapus');
    }
}
