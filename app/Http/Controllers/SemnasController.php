<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SemnasController extends Controller
{
    public function index()
    {
        $data_pendaftaran = Pendaftaran::with('semnas')->where('id_user', Auth::user()->id)->get();
        return view('landing.pages.semnas', [
            'pendaftaran' => $data_pendaftaran
        ]);
    }
}
