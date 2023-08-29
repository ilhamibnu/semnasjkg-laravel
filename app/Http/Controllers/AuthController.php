<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);

        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user) {
            $userLogin = $user->id_role;

            if ($userLogin == 1) {
                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();

                    return redirect()->intended('/')->with('loginberhasil', 'login berhasil');
                } else {
                    return redirect()->intended('/')->with('loginerror', 'login error');
                }
            } elseif ($userLogin == 2) {

                return redirect()->intended('/')->with('bukanadmin', 'login error');
            } elseif ($userLogin == 3) {

                return redirect()->intended('/')->with('failed', 'login error');
            }
        } else {
            return redirect()->intended('/')->with('failed', 'login error');
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:tb_user,email',
            'password' => 'required',
            'repassword' => 'required|same:password',
            'id_kampus' => 'required',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password tidak boleh kosong',
            'repassword.required' => 'Re-Password tidak boleh kosong',
            'repassword.same' => 'Re-Password tidak sama dengan password',
            'id_kampus.required' => 'Kampus tidak boleh kosong',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'id_kampus' => $request->id_kampus,
            'id_role' => 1,
        ]);

        if ($user) {
            return redirect()->intended('/')->with('registerberhasil', 'register berhasil');
        } else {
            return redirect()->intended('/')->with('registergagal', 'register error');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerate();

        return redirect()->intended('/')->with('logoutberhasil', 'logout berhasil');
    }
}
