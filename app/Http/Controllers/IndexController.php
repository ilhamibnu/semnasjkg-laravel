<?php

namespace App\Http\Controllers;

use App\Models\Kampus;
use App\Models\Semnas;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $semnas = Semnas::all();
        $kampus = Kampus::all();

        $apiKey       = 'DEV-doRbyZ4kDKF1zjSI7vyhc102PqRkZENKUChHG0xe';
        $privateKey   = 'A4v3H-1qYdq-jmCUh-PnH7H-92ckd';
        $merchantCode = 'T23311';

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


        return view('landing.pages.index', [
            'semnas' => $semnas,
            'kampus' => $kampus,
            'paymentChannel' => $paymentChannel,
        ]);
    }
}
