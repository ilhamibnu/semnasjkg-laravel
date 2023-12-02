<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailLomba;
use App\Models\Kampus;
use App\Models\Semnas;
use App\Models\Presensi;
use App\Models\Pendaftaran;
use App\Models\DetailPresensi;
use App\Models\Lomba;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class DataPendaftaranController extends Controller
{
    public function indexjkgsby()
    {
        // tampilkan id user peserta surabaya yang id nya masih tidak ada di tb pendaftaran
        $datauser = DB::table('tb_user')
            ->select('tb_user.id', 'tb_user.name')
            ->where('tb_user.id_jenis_peserta', '=', '1')
            ->whereNotIn('tb_user.id', function ($query) {
                $query->select('tb_pendaftaran.id_user')
                    ->from('tb_pendaftaran');
            })
            ->get();

        // tampilkan data semnas untuk peserta surabaya
        $datasemnas = Semnas::where('id_jenis_peserta', '=', '1')->get();

        $datapendaftaran = DB::table('tb_user')
            ->join('tb_pendaftaran', 'tb_user.id', '=', 'tb_pendaftaran.id_user')
            ->join('tb_semnas', 'tb_pendaftaran.id_semnas', '=', 'tb_semnas.id')
            ->join('tb_kampus', 'tb_user.id_kampus', '=', 'tb_kampus.id')
            ->select('tb_pendaftaran.id', 'tb_user.name', 'tb_user.id as iduser', 'tb_pendaftaran.status_pembayaran', 'tb_pendaftaran.status_sertifikat', 'tb_semnas.name as semnas', 'tb_semnas.id as idsemnas', 'tb_kampus.name as kampus')
            ->where('tb_user.id_jenis_peserta', '=', '1')
            ->get();

        return view('admin.pages.datapendaftaranjkgsby', [
            'datapendaftaran' => $datapendaftaran,
            'datauser' => $datauser,
            'datasemnas' => $datasemnas
        ]);
    }


    public function indexjkgnonsby()
    {
        $datapendaftaran = DB::table('tb_user')
            ->join('tb_pendaftaran', 'tb_user.id', '=', 'tb_pendaftaran.id_user')
            ->join('tb_semnas', 'tb_pendaftaran.id_semnas', '=', 'tb_semnas.id')
            ->join('tb_kampus', 'tb_user.id_kampus', '=', 'tb_kampus.id')
            ->select('tb_user.name', 'tb_pendaftaran.status_pembayaran', 'tb_pendaftaran.status_sertifikat', 'tb_semnas.name as semnas', 'tb_kampus.name as kampus')
            ->where('tb_user.id_jenis_peserta', '=', '2')
            ->get();

        return view('admin.pages.datapendaftaranjkgnonsby', [
            'datapendaftaran' => $datapendaftaran
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'id_semnas' => 'required',
            'status_pembayaran' => 'required',
        ], [
            'id_user.required' => 'Nama Peserta tidak boleh kosong',
            'id_semnas.required' => 'Nama Semnas tidak boleh kosong',
            'status_pembayaran.required' => 'Status Pembayaran tidak boleh kosong',
        ]);

        $cekid = Pendaftaran::where('id_user', '=', $request->id_user)->first();
        if ($cekid) {
            return redirect()->back()->with('gagal', 'Data Pendaftaran Gagal Ditambahkan, Peserta Sudah Terdaftar');
        } else {
            $pendaaftaran = new Pendaftaran;
            $pendaaftaran->id_user = $request->id_user;
            $pendaaftaran->id_semnas = $request->id_semnas;
            $pendaaftaran->status_pembayaran = $request->status_pembayaran;
            $pendaaftaran->link_pembayaran = '';
            $pendaaftaran->status_sertifikat = 'belum';
            $pendaaftaran->kadaluarsa = '';
            $pendaaftaran->save();

            // masukukkan data presensi ke detail presensi

            $cekpresensi = Presensi::where('id_semnas', $request->id_semnas)->get();
            foreach ($cekpresensi as $cp) {
                $detailpresensi = new DetailPresensi;
                $detailpresensi->id_user = $request->id_user;
                $detailpresensi->id_presensi = $cp->id;
                $detailpresensi->status = 'belum';
                $detailpresensi->save();
            }

            // cek id semnas apakah memiliki data lomba atau tidak

            $ceklomba = Lomba::where('id_semnas', $request->id_semnas)->get();

            foreach ($ceklomba as $cl) {
                $detaillomba = new DetailLomba;
                $detaillomba->id_user = $request->id_user;
                $detaillomba->id_lomba = $cl->id;
                $detaillomba->link_pengumpulan = '';
                $detaillomba->link_pengumpulan_ktm = '';
                $detaillomba->status_unduh = 'belum';
                $detaillomba->save();
            }

            return redirect()->back()->with('create', 'Data Pendaftaran Berhasil Ditambahkan');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_user' => 'required',
            'id_semnas' => 'required',
            'status_pembayaran' => 'required',
        ], [
            'id_user.required' => 'Nama Peserta tidak boleh kosong',
            'id_semnas.required' => 'Nama Semnas tidak boleh kosong',
            'status_pembayaran.required' => 'Status Pembayaran tidak boleh kosong',
        ]);

        $cekdata = Pendaftaran::where('id', $id)->first();

        $cekdatadetailpresensi = DetailPresensi::where('id_user', $cekdata->id_user)->get();
        foreach ($cekdatadetailpresensi as $cdp) {
            $cdp->delete();
        }

        $cekdatadetaillomba = DetailLomba::where('id_user', $cekdata->id_user)->get();
        if ($cekdatadetaillomba) {
            foreach ($cekdatadetaillomba as $cdl) {
                $cdl->delete();
            }
        }

        $cekdata->id_user = $request->id_user;
        $cekdata->id_semnas = $request->id_semnas;
        $cekdata->status_pembayaran = $request->status_pembayaran;
        $cekdata->link_pembayaran = '';
        $cekdata->status_sertifikat = 'belum';
        $cekdata->kadaluarsa = '';
        $cekdata->save();

        // masukukkan data presensi ke detail presensi

        $cekpresensi = Presensi::where('id_semnas', $request->id_semnas)->get();
        foreach ($cekpresensi as $cp) {
            $detailpresensi = new DetailPresensi;
            $detailpresensi->id_user = $request->id_user;
            $detailpresensi->id_presensi = $cp->id;
            $detailpresensi->status = 'belum';
            $detailpresensi->save();
        }

        // cek id semnas apakah memiliki data lomba atau tidak

        $ceklomba = Lomba::where('id_semnas', $request->id_semnas)->get();

        foreach ($ceklomba as $cl) {
            $detaillomba = new DetailLomba;
            $detaillomba->id_user = $request->id_user;
            $detaillomba->id_lomba = $cl->id;
            $detaillomba->link_pengumpulan = '';
            $detaillomba->link_pengumpulan_ktm = '';
            $detaillomba->status_unduh = 'belum';
            $detaillomba->save();
        }

        return redirect()->back()->with('update', 'Data Pendaftaran Berhasil Diubah');
    }

    public function destroy($id)
    {
        $cekdata = Pendaftaran::where('id', $id)->first();

        $cekdatadetailpresensi = DetailPresensi::where('id_user', $cekdata->id_user)->get();
        foreach ($cekdatadetailpresensi as $cdp) {
            $cdp->delete();
        }

        $cekdatadetaillomba = DetailLomba::where('id_user', $cekdata->id_user)->get();
        if ($cekdatadetaillomba) {
            foreach ($cekdatadetaillomba as $cdl) {
                $cdl->delete();
            }
        }

        $cekdata->delete();

        return redirect()->back()->with('delete', 'Data Pendaftaran Berhasil Dihapus');
    }
}
