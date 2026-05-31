<?php
namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // =========================
    // DATA KATEGORI AKTIF
    // =========================

    public function index()
    {
        $kategori = Kategori::where(
            'status',
            'aktif'
        )->get();

        return view(
            'kategori.index',
            compact('kategori')
        );
    }

    // =========================
    // DATA KATEGORI NONAKTIF
    // =========================

    public function nonaktif()
    {
        $kategori = Kategori::where(
            'status',
            'nonaktif'
        )->get();

        return view(
            'kategori.nonaktif',
            compact('kategori')
        );
    }

    // =========================
    // AKTIFKAN KEMBALI KATEGORI
    // =========================

    public function aktifkan($id)
    {
        $kategori = Kategori::findOrFail($id);

        $kategori->status = 'aktif';

        $kategori->save();

        return redirect('/kategori/nonaktif')

            ->with(

                'success',

                'Kategori berhasil diaktifkan kembali'

            );
    }

    // =========================
    // FORM TAMBAH KATEGORI
    // =========================

    public function create()
    {
        return view('kategori.create');
    }

    // =========================
    // SIMPAN KATEGORI
    // =========================

    public function store(Request $request)
    {
        Kategori::create([

            'nama_kategori' => $request->nama_kategori,

            // STATUS DEFAULT
            'status' => 'aktif'

        ]);

        return redirect('/kategori')

            ->with(

                'success',

                'Kategori berhasil ditambahkan'

            );
    }

    // =========================
    // FORM EDIT KATEGORI
    // =========================

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);

        return view(
            'kategori.edit',
            compact('kategori')
        );
    }

    // =========================
    // UPDATE KATEGORI
    // =========================

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        $kategori->update([

            'nama_kategori' => $request->nama_kategori

        ]);

        return redirect('/kategori')

            ->with(

                'success',

                'Kategori berhasil diupdate'

            );
    }

    // =========================
    // NONAKTIFKAN KATEGORI
    // =========================

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);

        $kategori->status = 'nonaktif';

        $kategori->save();

        return redirect('/kategori')

            ->with(

                'success',

                'Kategori berhasil dinonaktifkan'

            );
    }
}