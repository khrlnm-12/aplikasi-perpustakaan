<?php
namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    // =========================
    // DATA SISWA AKTIF
    // =========================

    public function index()
    {
        $siswa = Siswa::where(
            'status',
            'aktif'
        )->get();

        return view(
            'siswa.index',
            compact('siswa')
        );
    }

    // =========================
    // DATA SISWA NONAKTIF
    // =========================

    public function nonaktif()
    {
        $siswa = Siswa::where(
            'status',
            'nonaktif'
        )->get();

        return view(
            'siswa.nonaktif',
            compact('siswa')
        );
    }

    // =========================
    // AKTIFKAN KEMBALI SISWA
    // =========================

public function aktifkan($nis)
{
    $siswa = Siswa::where(
        'nis',
        $nis
    )->firstOrFail();

    $siswa->status = 'aktif';

    $siswa->save();

    return redirect('/siswa/nonaktif')
        ->with(
            'success',
            'Siswa berhasil diaktifkan kembali'
        );
}

    // =========================
    // DETAIL SISWA
    // =========================

    public function show($nis)
    {
        $siswa = Siswa::where(
            'nis',
            $nis
        )->firstOrFail();

        return view(
            'siswa.detail',
            compact('siswa')
        );
    }

    // =========================
    // FORM TAMBAH SISWA
    // =========================

    public function create()
    {
        return view('siswa.create');
    }

    // =========================
    // SIMPAN SISWA
    // =========================

    public function store(Request $request)
    {
        $request->validate([

            'nis'            => 'required|unique:siswa,nis',

            'nama_siswa'     => 'required',

            'jenis_kelamin'  => 'required',

            'kelas'          => 'required',

            'no_telepon'     => 'required',

            'alamat'         => 'required',

            'email'          => 'required|email|unique:siswa,email',

        ]);

        Siswa::create([

            'nis'            => $request->nis,

            'nama_siswa'     => $request->nama_siswa,

            'jenis_kelamin'  => $request->jenis_kelamin,

            'kelas'          => $request->kelas,

            'no_telepon'     => $request->no_telepon,

            'alamat'         => $request->alamat,

            'email'          => $request->email,

            // STATUS DEFAULT
            'status'         => 'aktif',

            // PASSWORD OTOMATIS = NIS
            'password'       => Hash::make($request->nis),

            // QR CODE OTOMATIS
            'qr_code'        => $request->nis

        ]);

        return redirect('/siswa')

            ->with(

                'success',

                'Siswa berhasil ditambahkan'

            );
    }

    // =========================
    // IMPORT CSV
    // =========================

    public function import(Request $request)
    {
        $request->validate([

            'file' => 'required|mimes:csv,txt'

        ]);

        $file = fopen(

            $request->file('file'),

            'r'
        );

        // SKIP HEADER
        fgetcsv($file);

        while (($row = fgetcsv(
                    $file,
                    1000,
                    ","
                )) !== false)
        {

            // SKIP JIKA NIS KOSONG
            if (empty($row[0]))
            {
                continue;
            }

            // CEK DUPLIKAT NIS
            $cekNis = Siswa::where(
                'nis',
                $row[0]
            )->first();

            if ($cekNis)
            {
                continue;
            }

            Siswa::create([

                'nis'            => $row[0],

                'nama_siswa'     => $row[1],

                'jenis_kelamin'  => $row[2],

                'kelas'          => $row[3],

                'no_telepon'     => $row[4],

                'alamat'         => $row[5],

                'email'          => $row[6],

                // STATUS DEFAULT
                'status'         => 'aktif',

                // PASSWORD OTOMATIS
                'password'       => Hash::make($row[0]),

                // QR CODE OTOMATIS
                'qr_code'        => $row[0]

            ]);
        }

        fclose($file);

        return redirect('/siswa')

            ->with(

                'success',

                'Data siswa berhasil diimport'

            );
    }

    // =========================
    // FORM EDIT SISWA
    // =========================

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);

        return view(
            'siswa.edit',
            compact('siswa')
        );
    }

    // =========================
    // UPDATE SISWA
    // =========================

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([

            'nama_siswa'     => 'required',

            'jenis_kelamin'  => 'required',

            'kelas'          => 'required',

            'no_telepon'     => 'required',

            'alamat'         => 'required',

            'email'          => 'required|email',

        ]);

        $siswa->update([

            'nama_siswa'     => $request->nama_siswa,

            'jenis_kelamin'  => $request->jenis_kelamin,

            'kelas'          => $request->kelas,

            'no_telepon'     => $request->no_telepon,

            'alamat'         => $request->alamat,

            'email'          => $request->email,

        ]);

        return redirect('/siswa')

            ->with(

                'success',

                'Data siswa berhasil diupdate'

            );
    }

    // =========================
    // NONAKTIFKAN SISWA
    // =========================

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->status = 'nonaktif';

        $siswa->save();

        return redirect('/siswa')

            ->with(

                'success',

                'Data siswa berhasil dinonaktifkan'

            );
    }

    // =========================
    // DETAIL SISWA KEPSEK
    // =========================

    public function detailkepsek($id)
    {
        $siswa = Siswa::findOrFail($id);

        return view(

            'kepsek.detail_siswa',

            compact('siswa')

        );
    }
}