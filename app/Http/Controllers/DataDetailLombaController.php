<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataDetailLombaController extends Controller
{
    public function indexsby()
    {


        $datadetaillomba = DB::table('tb_user')
            ->join('tb_pendaftaran', 'tb_user.id', '=', 'tb_pendaftaran.id_user')
            ->join('tb_detail_lomba', 'tb_user.id', '=', 'tb_detail_lomba.id_user')
            ->join('tb_lomba', 'tb_detail_lomba.id_lomba', '=', 'tb_lomba.id')
            ->select('tb_user.name', 'tb_lomba.name as lomba', 'tb_detail_lomba.link_pengumpulan', 'tb_detail_lomba.link_pengumpulan_ktm')
            ->where('tb_pendaftaran.status_pembayaran', '=', 'PAID')
            ->where('tb_user.id_jenis_peserta', '=', 1)
            ->get();

        return view('admin.pages.detaillombajkgsby', [
            'datadetaillomba' => $datadetaillomba
        ]);
    }

    public function indexnonsby()
    {


        $datadetaillomba = DB::table('tb_user')
            ->join('tb_pendaftaran', 'tb_user.id', '=', 'tb_pendaftaran.id_user')
            ->join('tb_detail_lomba', 'tb_user.id', '=', 'tb_detail_lomba.id_user')
            ->join('tb_lomba', 'tb_detail_lomba.id_lomba', '=', 'tb_lomba.id')
            ->select('tb_user.name', 'tb_lomba.name as lomba', 'tb_detail_lomba.link_pengumpulan', 'tb_detail_lomba.link_pengumpulan_ktm')
            ->where('tb_pendaftaran.status_pembayaran', '=', 'PAID')
            ->where('tb_user.id_jenis_peserta', '=', 2)
            ->get();


        return view('admin.pages.detaillombajkgnonsby', [
            'datadetaillomba' => $datadetaillomba
        ]);
    }
}
