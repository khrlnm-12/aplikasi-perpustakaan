<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

use App\Models\Siswa;
use App\Models\Petugas;
use App\Models\KepalaSekolah;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FORM UBAH PASSWORD
    |--------------------------------------------------------------------------
    */

    public function form()
    {
        return view('auth.ubah-password');
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE PASSWORD
    |--------------------------------------------------------------------------
    */

    public function update(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI INPUT
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'password_lama' => 'required',

            'password_baru' => 'required|min:6',

            'konfirmasi_password' =>
                'required|same:password_baru',

        ]);

        /*
        |--------------------------------------------------------------------------
        | AMBIL ROLE LOGIN
        |--------------------------------------------------------------------------
        */

        $role = session('role');

        /*
        |--------------------------------------------------------------------------
        | AMBIL USER BERDASARKAN ROLE
        |--------------------------------------------------------------------------
        */

        if ($role == 'siswa') {

            $user = Siswa::where(

                'nis',
                session('nis')

            )->first();

        }
        elseif ($role == 'petugas') {

            $user = Petugas::where(

                'id_petugas',
                session('id_petugas')

            )->first();

        }
        elseif ($role == 'kepala_sekolah') {

            $user = KepalaSekolah::where(

                'id_kepala_sekolah',
                session('id_kepala_sekolah')

            )->first();

        }
        else {

            $user = null;

        }

        /*
        |--------------------------------------------------------------------------
        | CEK USER
        |--------------------------------------------------------------------------
        */

        if (!$user) {

            return back()->with(

                'error',
                'User tidak ditemukan.'

            );
        }

        /*
        |--------------------------------------------------------------------------
        | CEK PASSWORD LAMA
        |--------------------------------------------------------------------------
        */

        if (

            !Hash::check(
                $request->password_lama,
                $user->password
            )

        ) {

            return back()->with(

                'error',
                'Password lama tidak sesuai.'

            );
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE PASSWORD BARU
        |--------------------------------------------------------------------------
        */

        $user->password = Hash::make(
            $request->password_baru
        );

        $user->save();

        /*
        |--------------------------------------------------------------------------
        | KIRIM EMAIL NOTIFIKASI
        |--------------------------------------------------------------------------
        */

        try {

            if (!empty($user->email)) {

                Mail::raw(

                    "Halo,\n\nPassword akun Anda berhasil diubah.\n\nJika ini bukan Anda segera hubungi admin.\n\nTerima kasih.",

                    function ($message) use ($user) {

                        $message->to($user->email)
                                ->subject(
                                    'Password Berhasil Diubah'
                                );

                    }

                );
            }

        } catch (\Exception $e) {

            /*
            |--------------------------------------------------------------------------
            | JIKA EMAIL GAGAL
            |--------------------------------------------------------------------------
            */

        }

        /*
        |--------------------------------------------------------------------------
        | SUCCESS
        |--------------------------------------------------------------------------
        */

        return back()->with(

            'success',
            'Password berhasil diubah.'

        );
    }

    /*
    |--------------------------------------------------------------------------
    | FORM FORGOT PASSWORD
    |--------------------------------------------------------------------------
    */

    public function forgotForm()
    {
        return view('auth.forgot-password');
    }

    /*
    |--------------------------------------------------------------------------
    | KIRIM RESET PASSWORD
    |--------------------------------------------------------------------------
    */

    public function sendReset(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI EMAIL
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'email' => 'required|email'

        ]);

        $email = $request->email;

        /*
        |--------------------------------------------------------------------------
        | CEK EMAIL DI SISWA
        |--------------------------------------------------------------------------
        */

        $user = Siswa::where(
            'email',
            $email
        )->first();

        /*
        |--------------------------------------------------------------------------
        | CEK EMAIL DI PETUGAS
        |--------------------------------------------------------------------------
        */

        if (!$user) {

            $user = Petugas::where(
                'email',
                $email
            )->first();
        }

        /*
        |--------------------------------------------------------------------------
        | CEK EMAIL DI KEPALA SEKOLAH
        |--------------------------------------------------------------------------
        */

        if (!$user) {

            $user = KepalaSekolah::where(
                'email',
                $email
            )->first();
        }

        /*
        |--------------------------------------------------------------------------
        | EMAIL TIDAK DITEMUKAN
        |--------------------------------------------------------------------------
        */

        if (!$user) {

            return back()->with(

                'error',
                'Email tidak ditemukan.'

            );
        }

        /*
        |--------------------------------------------------------------------------
        | LINK RESET PASSWORD
        |--------------------------------------------------------------------------
        */

        $resetLink = url(
            '/reset-password?email=' . $email
        );

        /*
        |--------------------------------------------------------------------------
        | KIRIM EMAIL RESET
        |--------------------------------------------------------------------------
        */

        try {

            Mail::raw(

                "Halo,\n\nKlik link berikut untuk reset password akun Anda:\n\n$resetLink\n\nTerima kasih.",

                function ($message) use ($email) {

                    $message->to($email)
                            ->subject(
                                'Reset Password Perpustakaan'
                            );

                }

            );

            return back()->with(

                'success',
                'Link reset password berhasil dikirim ke email.'

            );

        } catch (\Exception $e) {

            return back()->with(

                'error',
                'Email gagal dikirim. Periksa konfigurasi SMTP.'

            );
        }
    }

    /*
    |--------------------------------------------------------------------------
    | FORM RESET PASSWORD
    |--------------------------------------------------------------------------
    */

    public function resetForm(Request $request)
    {
        $email = $request->email;

        return view(
            'auth.reset-password',
            compact('email')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RESET PASSWORD BARU
    |--------------------------------------------------------------------------
    */

    public function resetPassword(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'email' => 'required|email',

            'password_baru' =>
                'required|min:6',

            'konfirmasi_password' =>
                'required|same:password_baru',

        ]);

        /*
        |--------------------------------------------------------------------------
        | CEK SISWA
        |--------------------------------------------------------------------------
        */

        $user = Siswa::where(
            'email',
            $request->email
        )->first();

        /*
        |--------------------------------------------------------------------------
        | CEK PETUGAS
        |--------------------------------------------------------------------------
        */

        if (!$user) {

            $user = Petugas::where(
                'email',
                $request->email
            )->first();
        }

        /*
        |--------------------------------------------------------------------------
        | CEK KEPALA SEKOLAH
        |--------------------------------------------------------------------------
        */

        if (!$user) {

            $user = KepalaSekolah::where(
                'email',
                $request->email
            )->first();
        }

        /*
        |--------------------------------------------------------------------------
        | USER TIDAK DITEMUKAN
        |--------------------------------------------------------------------------
        */

        if (!$user) {

            return back()->with(

                'error',
                'Email tidak ditemukan.'

            );
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE PASSWORD
        |--------------------------------------------------------------------------
        */

        $user->password = Hash::make(
            $request->password_baru
        );

        $user->save();

        /*
        |--------------------------------------------------------------------------
        | REDIRECT LOGIN
        |--------------------------------------------------------------------------
        */

        return redirect('/')->with(

            'success',
            'Password berhasil direset. Silakan login.'

        );
    }
}