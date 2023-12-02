<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPresensi;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DataDetailPresensiController extends Controller
{
    public function indexjkgsby()
    {

        // $datadetailpresensi = DB::table('tb_pendaftaran')
        //     ->join('tb_semnas', 'tb_pendaftaran.id_semnas', '=', 'tb_semnas.id')
        //     ->join('tb_presensi', 'tb_semnas.id', '=', 'tb_presensi.id_semnas')
        //     ->join('tb_detail_presensi', 'tb_presensi.id', '=', 'tb_detail_presensi.id_presensi')
        //     ->join('tb_user', 'tb_detail_presensi.id_user', '=', 'tb_user.id')
        //     ->select('tb_presensi.name as presensi', 'tb_detail_presensi.status', 'tb_user.name', 'tb_pendaftaran.status_pembayaran')
        //     ->where('tb_pendaftaran.status_pembayaran', '=', 'PAID')
        //     ->where('tb_user.id_jenis_peserta', '=', 1)
        //     ->distinct()
        //     ->get();

        $datadetailpresensi = DB::table('tb_user')
            ->join('tb_pendaftaran', 'tb_user.id', '=', 'tb_pendaftaran.id_user')
            ->join('tb_detail_presensi', 'tb_user.id', '=', 'tb_detail_presensi.id_user')
            ->join('tb_presensi', 'tb_detail_presensi.id_presensi', '=', 'tb_presensi.id')
            ->select('tb_user.name', 'tb_presensi.name as presensi', 'tb_detail_presensi.status')
            ->where('tb_pendaftaran.status_pembayaran', '=', 'PAID')
            ->where('tb_user.id_jenis_peserta', '=', 1)
            ->get();




        return view('admin.pages.detailpresensijkgsby', [
            'datapresensi' => $datadetailpresensi
        ]);
    }

    public function indexjkgnonsby()
    {

        // $datadetailpresensi = DB::table('tb_pendaftaran')
        //     ->join('tb_semnas', 'tb_pendaftaran.id_semnas', '=', 'tb_semnas.id')
        //     ->join('tb_presensi', 'tb_semnas.id', '=', 'tb_presensi.id_semnas')
        //     ->join('tb_detail_presensi', 'tb_presensi.id', '=', 'tb_detail_presensi.id_presensi')
        //     ->join('tb_user', 'tb_detail_presensi.id_user', '=', 'tb_user.id')
        //     ->select('tb_presensi.name as presensi', 'tb_detail_presensi.status', 'tb_user.name')
        //     ->where('tb_user.id_jenis_peserta', '=', '2')
        //     ->where('tb_pendaftaran.status_pembayaran', '=', 'PAID')
        //     ->distinct()
        //     ->get();

        $datadetailpresensi = DB::table('tb_user')
            ->join('tb_pendaftaran', 'tb_user.id', '=', 'tb_pendaftaran.id_user')
            ->join('tb_detail_presensi', 'tb_user.id', '=', 'tb_detail_presensi.id_user')
            ->join('tb_presensi', 'tb_detail_presensi.id_presensi', '=', 'tb_presensi.id')
            ->select('tb_user.name', 'tb_presensi.name as presensi', 'tb_detail_presensi.status')
            ->where('tb_pendaftaran.status_pembayaran', '=', 'PAID')
            ->where('tb_user.id_jenis_peserta', '=', 2)
            ->get();



        return view('admin.pages.detailpresensijkgnonsby', [
            'datapresensi' => $datadetailpresensi
        ]);
    }
}
