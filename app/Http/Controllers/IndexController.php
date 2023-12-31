<?php

namespace App\Http\Controllers;

use App\Models\DetailLomba;
use App\Models\Kampus;
use App\Models\Semnas;
use App\Models\Presensi;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Models\DetailPresensi;
use App\Models\Lomba;
use App\Models\User;


class IndexController extends Controller
{
    public function index()
    {
        // urutkan data semnas berdasarkan id terbesar
        $semnas = Semnas::orderBy('id', 'desc')->get();
        $kampus = Kampus::where('id', '!=', 1)->get();

        $apiKey       = 'DEV-doRbyZ4kDKF1zjSI7vyhc102PqRkZENKUChHG0xe';
        $privateKey   = 'A4v3H-1qYdq-jmCUh-PnH7H-92ckd';
        $merchantCode = 'T23311';

        // $apiKey       = '9jo7FE9fdXVL3GT9H4kceRZiBzIDqzWVAn3RbHtn';
        // $privateKey   = 'O6DIJ-NvQmW-3M8p1-PdC4C-P16dB';
        // $merchantCode = 'T27194';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/merchant/payment-channel',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR    => false,
            CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response);

        // mengambil data payment channel

        $paymentChannel = $response->data;

        // cek user sudah login atau belum

        if (auth()->user()) {

            $semnasbyidjenispeserta = Semnas::where('id_jenis_peserta', auth()->user()->id_jenis_peserta)->orderBy('id', 'desc')->get();

            return view('landing.pages.index', [
                'semnas' => $semnasbyidjenispeserta,
                'kampus' => $kampus,
                'paymentChannel' => $paymentChannel,
            ]);
        } else {
            return view('landing.pages.index', [
                'semnas' => $semnas,
                'kampus' => $kampus,
                'paymentChannel' => $paymentChannel,
            ]);
        }
    }

    public function pendafaran(Request $request)
    {
        // cek apakah user sudah terdaftar dalam seminar

        $cek = Pendaftaran::where('id_user', auth()->user()->id)->where('id_semnas', $request->id_semnas)->first();

        $cek_user = Pendaftaran::where('id_user', auth()->user()->id)->first();

        if ($cek_user) {
            return redirect()->back()->with('usersudahterdaftar', 'Anda sudah terdaftar dalam seminar lain');
        }

        if ($cek) {
            return redirect()->back()->with('sudahdaftar', 'Anda sudah terdaftar dalam seminar ini');
        } else {
            $request->validate([
                'id_payment' => 'required',
            ]);

            $pendaftaran = new Pendaftaran;
            $id = time() . random_int(100, 999);
            $pendaftaran->id = $id;
            $pendaftaran->id_user = auth()->user()->id;
            $pendaftaran->id_semnas = $request->id_semnas;
            $pendaftaran->link_pembayaran = '';
            $pendaftaran->kadaluarsa = '';
            $pendaftaran->status_pembayaran = '';
            $pendaftaran->status_sertifikat = 'belum';
            $pendaftaran->save();

            $apiKey       = 'DEV-doRbyZ4kDKF1zjSI7vyhc102PqRkZENKUChHG0xe';
            $privateKey   = 'A4v3H-1qYdq-jmCUh-PnH7H-92ckd';
            $merchantCode = 'T23311';

            // $apiKey       = '9jo7FE9fdXVL3GT9H4kceRZiBzIDqzWVAn3RbHtn';
            // $privateKey   = 'O6DIJ-NvQmW-3M8p1-PdC4C-P16dB';
            // $merchantCode = 'T27194';

            $ceksemnas = Semnas::find($request->id_semnas);
            $cekuser = User::find(auth()->user()->id);

            // masukukkan data presensi ke detail presensi

            $cekpresensi = Presensi::where('id_semnas', $request->id_semnas)->get();

            foreach ($cekpresensi as $presensi) {
                $detailpresensi = new DetailPresensi;
                $detailpresensi->id_presensi = $presensi->id;
                $detailpresensi->id_user = $cekuser->id;
                $detailpresensi->status = 'belum';
                $detailpresensi->save();
            }

            // cek id semnas apakah memiliki data lomba atau tidak

            $ceklomba = Lomba::where('id_semnas', $request->id_semnas)->get();

            if ($ceklomba) {
                foreach ($ceklomba as $lomba) {
                    $detaillomba = new DetailLomba;
                    $detaillomba->id_lomba = $lomba->id;
                    $detaillomba->id_user = $cekuser->id;
                    $detaillomba->link_pengumpulan = '';
                    $detaillomba->link_pengumpulan_ktm = '';
                    $detaillomba->status_unduh = 'belum';
                    $detaillomba->save();
                }
            }

            $amount       = $ceksemnas->harga;

            $data = [
                'method'         => $request->id_payment,
                'merchant_ref'   => $id,
                'amount'         => $amount,
                'customer_name'  => $cekuser->name,
                'customer_email' => $cekuser->email,
                'order_items'    => [
                    [
                        'name'        => $ceksemnas->name,
                        'price'       => $amount,
                        'quantity'    => 1,
                    ],
                ],
                // expired_time 30 menit
                'expired_time'   => (time() + (30 * 60)),
                'signature'    => hash_hmac('sha256', $merchantCode . $id . $amount, $privateKey)
            ];

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_FRESH_CONNECT  => true,
                CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/transaction/create',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER         => false,
                CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
                CURLOPT_FAILONERROR    => false,
                CURLOPT_POST           => true,
                CURLOPT_POSTFIELDS     => http_build_query($data),
                CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
            ]);

            $response = curl_exec($curl);
            // $error = curl_error($curl);

            // curl_close($curl);

            $response = json_decode($response);

            if ($response->success) {
                $pendaftaran = Pendaftaran::find($id);
                $pendaftaran->link_pembayaran = $response->data->checkout_url;
                $pendaftaran->status_pembayaran = $response->data->status;
                // ubah response->data->expired_time ke format datetime
                $pendaftaran->kadaluarsa =  date('Y-m-d H:i:s', $response->data->expired_time);
                $pendaftaran->save();

                return redirect('/seminar')->with('berhasil', 'Pendaftaran berhasil');
                // return redirect($response->data->checkout_url);
            } else {
                return redirect('/')->with('gagal', 'Pendaftaran gagal');
            }
        }
    }

    public function callback(Request $request)
    {
        $privateKey   = 'A4v3H-1qYdq-jmCUh-PnH7H-92ckd';

        // $apiKey       = '9jo7FE9fdXVL3GT9H4kceRZiBzIDqzWVAn3RbHtn';
        // $privateKey   = 'O6DIJ-NvQmW-3M8p1-PdC4C-P16dB';
        // $merchantCode = 'T27194';


        $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        $json = $request->getContent();
        $signature = hash_hmac('sha256', $json, $privateKey);

        if ($signature !== (string) $callbackSignature) {
            return Response()->json([
                'success' => false,
                'message' => 'Invalid signature',
            ]);
        }

        if ('payment_status' !== (string) $request->server('HTTP_X_CALLBACK_EVENT')) {
            return Response()->json([
                'success' => false,
                'message' => 'Invalid event provided',
            ]);
        }

        $data = json_decode($json);

        if (JSON_ERROR_NONE !== json_last_error()) {
            return Response()->json([
                'success' => false,
                'message' => 'Error parsing JSON message',
            ]);
        }

        $invoiceId = $data->merchant_ref;
        $status = $data->status;

        $order = Pendaftaran::find($invoiceId);
        $order->status_pembayaran = $status;
        $order->save();

        return Response()->json([
            'success' => true,
        ]);
    }
}
