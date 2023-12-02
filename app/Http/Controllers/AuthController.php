<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kampus;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
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

            if ($user->id_jenis_peserta == '1') {
                $cekpendaftaran = Pendaftaran::where('id_user', $user->id)->first();

                if ($cekpendaftaran == null) {
                    return redirect()->intended('/')->with('belumbisalogin', 'login berhasil');
                } else

                if ($cekpendaftaran->status_pembayaran == 'UNPAID') {
                    return redirect()->intended('/')->with('belumlunas', 'login berhasil');
                } else {

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

                            return redirect()->intended('/')->with('bukanuser', 'login error');
                        } elseif ($userLogin == 3) {

                            return redirect()->intended('/')->with('failed', 'login error');
                        }
                    } else {
                        return redirect()->intended('/')->with('failed', 'login error');
                    }
                }
            } else {
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

        // cek id_jenis_peserta berdasarkan id_kampus

        $cekidjenispeserta = Kampus::where('id', $request->id_kampus)->first();

        if ($request->nama_instansi == null) {
            $nama_instansi = '-';
        } else {
            $nama_instansi = $request->nama_instansi;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'id_kampus' => $request->id_kampus,
            'nama_instansi' => $nama_instansi,
            'id_jenis_peserta' => $cekidjenispeserta->id_jenis_peserta,
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

    public function resetpassword(Request $request)
    {
        $request->validate([
            'email' => ['required'],
        ], [
            'email.required' => 'Email tidak boleh kosong',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            try {

                $mail = new PHPMailer(true);

                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'mail.semnasjkgsby.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'admin@semnasjkgsby.com';                     //SMTP username
                $mail->Password   = '%CQw$!a@@#%U';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('admin@semnasjkgsby.com', 'Admin Semnas JKG');
                $mail->addAddress($request->email);     //Add a recipient

                $Code = substr((str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ")), 0, 10);

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Password Reset';
                $mail->Body    = 'To reset your password, please click the link below:<br><br><a href="https://semnasjkgsby.com/resetpassword/' . $Code . '">Reset Password</a>';
                $updatecode = User::where('email', '=', $request->email)->first();
                $updatecode->code = $Code;
                $updatecode->save();

                $mail->send();
            } catch (Exception $e) {
            }
            return redirect()->intended('/')->with('codedikirim', 'Reset Password Berhasil');
        } else {
            return redirect()->intended('/')->with('emailtidakada', 'Reset Password Gagal');
        }
    }

    public function indexresetpassword($code)
    {
        $user = User::where('code', $code)->first();

        if ($user) {
            return view('landing.pages.changepassword', [
                'user' => $user,
            ]);
        } else {
            return redirect()->intended('/')->with('codetidakada', 'Reset Password Gagal');
        }
    }

    public function changepassword(Request $request)
    {
        $code = $request->code;

        $user = User::where('code', $code)->first();

        if ($user) {

            $request->validate([
                'password' => 'required',
                'repassword' => 'required|same:password',
            ], [
                'password.required' => 'Password tidak boleh kosong',
                'repassword.required' => 'Password tidak boleh kosong',
                'repassword.same' => 'Password tidak sama dengan password',
            ]);

            $user->password = bcrypt($request->password);
            $user->save();

            return redirect()->intended('/')->with('berhasilgantipassword', 'Reset Password Berhasil');
        } else {
            return redirect()->intended('/')->with('gagalgantipassword', 'Reset Password Gagal');
        }
    }

    public function indexprofil()
    {
        $user = User::with('kampus')->where('id', Auth::user()->id)->first();
        $kampus = Kampus::where('id', '!=', '1')->get();

        return view('landing.pages.profil', [
            'user' => $user,
            'kampus' => $kampus,
        ]);
    }

    public function updateprofil(Request $request)
    {
        if ($request->password == null && $request->repassword == null) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:tb_user,email,' . $request->id_user,
                'id_kampus' => 'required',
            ], [
                'name.required' => 'Nama tidak boleh kosong',
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email tidak valid',
                'email.unique' => 'Email sudah terdaftar',
                'id_kampus.required' => 'Kampus tidak boleh kosong',
            ]);

            // cek id_jenis_peserta berdasarkan id_kampus

            $kampus = Kampus::where('id', $request->id_kampus)->first();

            $user = User::where('id', $request->id_user)->first();

            if ($request->nama_instansi == null) {
                $nama_instansi = '-';
            } else {
                $nama_instansi = $request->nama_instansi;
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->nama_instansi = $nama_instansi;
            $user->id_kampus = $request->id_kampus;
            $user->id_jenis_peserta = $kampus->id_jenis_peserta;
            $user->save();

            return redirect()->intended('/profil')->with('berhasilupdateprofil', 'Update Profil Berhasil');
        } else {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:tb_user,email,' . $request->id_user,
                'id_kampus' => 'required',
                'password' => 'required',
                'repassword' => 'required|same:password',
            ], [
                'name.required' => 'Nama tidak boleh kosong',
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email tidak valid',
                'email.unique' => 'Email sudah terdaftar',
                'id_kampus.required' => 'Kampus tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
                'repassword.required' => 'Password tidak boleh kosong',
                'repassword.same' => 'Password tidak sama dengan password',
            ]);

            // cek id_jenis_peserta berdasarkan id_kampus

            $kampus = Kampus::where('id', $request->id_kampus)->first();

            $user = User::where('id', $request->id_user)->first();

            if ($request->nama_instansi == null) {
                $nama_instansi = '-';
            } else {
                $nama_instansi = $request->nama_instansi;
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->nama_instansi = $nama_instansi;
            $user->id_kampus = $request->id_kampus;
            $user->id_jenis_peserta = $kampus->id_jenis_peserta;
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect()->intended('/profil')->with('berhasilupdateprofil', 'Update Profil Berhasil');
        }
    }

    public function indexadminlogin()
    {
        return view('admin.login');
    }

    public function loginadmin(Request $request)
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
                return redirect()->intended('/adminlogin')->with('bukanadmin', 'login error');
            } elseif ($userLogin == 2) {
                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();

                    return redirect()->intended('/dashboard')->with('loginberhasil', 'login berhasil');
                } else {
                    return redirect()->intended('/adminlogin')->with('loginerror', 'login error');
                }
            } elseif ($userLogin == 3) {
                return redirect()->intended('/adminlogin')->with('failed', 'login error');
            }
        } else {
            return redirect()->intended('/adminlogin')->with('failed', 'login error');
        }
    }

    public function logoutadmin(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerate();

        return redirect()->intended('/adminlogin')->with('logoutberhasil', 'logout berhasil');
    }
}
