<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Semnas;

class DataGroupController extends Controller
{
    public function index()
    {
        $datasemnas = Semnas::all();

        $datagroup = Group::with('semnas')->get();
        return view('admin.pages.group', [
            'datagroup' => $datagroup,
            'datasemnas' => $datasemnas,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
            'status' => 'required',
            'id_semnas' => 'required',

        ], [
            'name.required' => 'Nama Group Harus Diisi',
            'link.required' => 'Link Group Harus Diisi',
            'status.required' => 'Status Group Harus Diisi',
            'id_semnas.required' => 'Semnas Group Harus Diisi',
        ]);

        $group = new Group;
        $group->name = $request->name;
        $group->link = $request->link;
        $group->status = $request->status;
        $group->id_semnas = $request->id_semnas;
        $group->save();

        return redirect()->back()->with('create', 'Data Group Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
            'status' => 'required',
            'id_semnas' => 'required',

        ], [
            'name.required' => 'Nama Group Harus Diisi',
            'link.required' => 'Link Group Harus Diisi',
            'status.required' => 'Status Group Harus Diisi',
            'id_semnas.required' => 'Semnas Group Harus Diisi',
        ]);

        $group = Group::find($id);
        $group->name = $request->name;
        $group->link = $request->link;
        $group->status = $request->status;
        $group->id_semnas = $request->id_semnas;
        $group->save();

        return redirect()->back()->with('update', 'Data Group Berhasil Diubah');
    }

    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();

        return redirect()->back()->with('delete', 'Data Group Berhasil Dihapus');
    }
}
