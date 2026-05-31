<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Models\Siswa;
use App\Models\Petugas;
use App\Models\KepalaSekolah;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LOGIN
    |--------------------------------------------------------------------------
    */

    public function login(Request $request)
    {
        $request->validate([
            'login'    => 'required',
            'password' => 'required',
        ]);

        /*
        |--------------------------------------------------------------------------
        | LOGIN SISWA
        |--------------------------------------------------------------------------
        */

        $siswa = Siswa::where(
            'nis',
            $request->login
        )->first();

        if (
            $siswa &&
            Hash::check(
                $request->password,
                $siswa->password
            )
        ) {

            session([

                'login_siswa' => true,

                'nis' =>
                    $siswa->nis,

                'nama_siswa' =>
                    $siswa->nama_siswa,

                'role' => 'siswa'

            ]);

            return redirect(
                '/dashboard/siswa'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | LOGIN PETUGAS
        |--------------------------------------------------------------------------
        */

        $petugas = Petugas::where(
            'id_petugas',
            $request->login
        )->first();

        if (
            $petugas &&
            Hash::check(
                $request->password,
                $petugas->password
            )
        ) {

            session([

                'login_petugas' => true,

                'id_petugas' =>
                    $petugas->id_petugas,

                'nama_petugas' =>
                    $petugas->nama_petugas,

                'role' => 'petugas'

            ]);

            return redirect(
                '/dashboard/petugas'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | LOGIN KEPALA SEKOLAH
        |--------------------------------------------------------------------------
        */

        $kepala = KepalaSekolah::where(
            'id_kepala_sekolah',
            $request->login
        )->first();

        if (
            $kepala &&
            Hash::check(
                $request->password,
                $kepala->password
            )
        ) {

            session([

                'login_kepala_sekolah' => true,

                'id_kepala_sekolah' =>
                    $kepala->id_kepala_sekolah,

                'nama_kepala_sekolah' =>
                    $kepala->nama_kepala_sekolah,

                'role' => 'kepala_sekolah'

            ]);

            return redirect(
                '/dashboard/kepala-sekolah'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | LOGIN GAGAL
        |--------------------------------------------------------------------------
        */

        return back()->with(
            'error',
            'ID atau password salah'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout()
    {
        Session::flush();

        return redirect('/');
    }
}