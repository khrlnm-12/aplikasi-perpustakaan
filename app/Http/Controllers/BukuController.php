<?php
namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    // =========================
    // DATA BUKU AKTIF + SEARCH
    // =========================

    public function index(Request $request)
    {
        $search = $request->search;

        $buku = Buku::with('kategori')

            // HANYA TAMPILKAN YANG AKTIF
            ->where('status', 'aktif')

            ->when($search, function ($query, $search) {

                $query->where(function($q) use ($search){

                    $q->where(
                        'judul_buku',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'pengarang',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'penerbit',
                        'like',
                        "%{$search}%"
                    );

                });

            })

            ->latest()

            ->get();

        return view(
            'buku.index',
            compact('buku')
        );
    }

    // =========================
    // DATA BUKU NONAKTIF
    // =========================

    public function nonaktif()
    {
        $buku = Buku::with('kategori')

            ->where(
                'status',
                'nonaktif'
            )

            ->latest()

            ->get();

        return view(
            'buku.nonaktif',
            compact('buku')
        );
    }

    // =========================
    // AKTIFKAN KEMBALI BUKU
    // =========================

    public function aktifkan($id)
    {
        $buku = Buku::findOrFail($id);

        $buku->status = 'aktif';

        $buku->save();

        return redirect('/buku/nonaktif')

            ->with(

                'success',

                'Buku berhasil diaktifkan kembali'

            );
    }

    // =========================
    // FORM TAMBAH BUKU
    // =========================

    public function create()
    {
        // HANYA KATEGORI AKTIF
        $kategori = Kategori::where(
            'status',
            'aktif'
        )->get();

        return view(
            'buku.create',
            compact('kategori')
        );
    }

    // =========================
    // SIMPAN BUKU
    // =========================

    public function store(Request $request)
    {
        $buku = new Buku();

        $buku->judul_buku   = $request->judul_buku;

        $buku->pengarang    = $request->pengarang;

        $buku->penerbit     = $request->penerbit;

        $buku->tahun_terbit = $request->tahun_terbit;

        $buku->deskripsi    = $request->deskripsi;

        $buku->id_kategori  = $request->id_kategori;

        // STATUS DEFAULT
        $buku->status = 'aktif';

        // QR CODE OTOMATIS
        $buku->qr_code =
            'BUKU-' . time();

        // UPLOAD COVER
        if ($request->hasFile('cover'))
        {
            $cover = $request->file('cover')

                ->store(
                    'cover',
                    'public'
                );

            $buku->cover = $cover;
        }

        $buku->save();

        return redirect('/buku')

            ->with(

                'success',

                'Buku berhasil ditambahkan'

            );
    }

    // =========================
    // IMPORT CSV
    // =========================

    public function import(Request $request)
    {
        $request->validate([

            'file' =>

                'required|mimes:csv,txt'

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

            // SKIP JIKA KOSONG
            if (empty($row[0]))
            {
                continue;
            }

            // CEK DUPLIKAT
            $cekBuku = Buku::where(

                'judul_buku',

                $row[0]

            )->first();

            if ($cekBuku)
            {
                continue;
            }

            Buku::create([

                'judul_buku' =>

                    $row[0],

                'pengarang' =>

                    $row[1],

                'penerbit' =>

                    $row[2],

                'tahun_terbit' =>

                    $row[3],

                'deskripsi' =>

                    $row[4],

                'id_kategori' =>

                    $row[6],

                // STATUS DEFAULT
                'status' =>

                    'aktif',

                // QR OTOMATIS
                'qr_code' =>

                    'BUKU-' .
                    time() .
                    rand(1,999)

            ]);
        }

        fclose($file);

        return redirect('/buku')

            ->with(

                'success',

                'Data buku berhasil diimport'

            );
    }

    // =========================
    // FORM EDIT
    // =========================

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);

        // HANYA KATEGORI AKTIF
        $kategori = Kategori::where(
            'status',
            'aktif'
        )->get();

        return view(

            'buku.edit',

            compact(

                'buku',

                'kategori'

            )
        );
    }

    // =========================
    // UPDATE BUKU
    // =========================

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $buku->judul_buku   = $request->judul_buku;

        $buku->pengarang    = $request->pengarang;

        $buku->penerbit     = $request->penerbit;

        $buku->tahun_terbit = $request->tahun_terbit;

        $buku->deskripsi    = $request->deskripsi;

        $buku->id_kategori  = $request->id_kategori;

        // UPLOAD COVER BARU
        if ($request->hasFile('cover'))
        {
            $cover = $request->file('cover')

                ->store(
                    'cover',
                    'public'
                );

            $buku->cover = $cover;
        }

        $buku->save();

        return redirect('/buku')

            ->with(

                'success',

                'Data buku berhasil diupdate'

            );
    }

    // =========================
    // NONAKTIFKAN BUKU
    // =========================

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        $buku->status = 'nonaktif';

        $buku->save();

        return redirect('/buku')

            ->with(

                'success',

                'Buku berhasil dinonaktifkan'

            );
    }

    // =========================
    // DETAIL BUKU
    // =========================

    public function show($id)
    {
        $buku = Buku::with('kategori')

            ->findOrFail($id);

        return view(

            'buku.detail',

            compact('buku')

        );
    }

    // =========================
    // DETAIL BUKU KEPSEK
    // =========================

    public function detailkepsek($id)
    {
        $buku = Buku::with('kategori')
            ->findOrFail($id);

        return view(
            'kepsek.detail_buku',
            compact('buku')
        );
    }
}