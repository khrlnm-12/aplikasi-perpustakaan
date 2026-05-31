<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Sanksi;
use App\Models\Siswa;
use App\Models\Petugas;
use App\Models\Buku;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TransaksiController extends Controller
{
    // =========================
    // DATA TRANSAKSI
    // =========================

   public function index(Request $request)
{
    $query = Transaksi::with([

        'siswa',
        'petugas',
        'buku'

    ]);

    /*
    |--------------------------------------------------------------------------
    | FILTER STATUS
    |--------------------------------------------------------------------------
    */

    if ($request->status == 'dipinjam') {

        $query->where(
            'status',
            'dipinjam'
        );

    }

    elseif ($request->status == 'dikembalikan') {

        $query->where(
            'status',
            'dikembalikan'
        );

    }

    elseif ($request->status == 'terlambat') {

        $query->where(
            'status',
            'terlambat'
        );

    }

    /*
    |--------------------------------------------------------------------------
    | AMBIL DATA
    |--------------------------------------------------------------------------
    */

    $transaksi = $query
        ->orderBy('id_transaksi', 'asc')
        ->get();

    return view(

        'transaksi.index',

        compact('transaksi')

    );
}
     public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        return view('transaksi.detail', compact('transaksi'));
    }

     public function detailKepsek($id)
     {
        $transaksi = Transaksi::with([
            'siswa',
            'buku'
            ])->findOrFail($id);

        return view(
            'kepsek.detail_transaksi',
            compact('transaksi')
        );
    }

    // =========================
    // FORM TRANSAKSI
    // =========================

    public function create()
    {
        $siswa = Siswa::all();

        $petugas = Petugas::all();

        $buku = Buku::with('kategori')->get();

        return view(
            'transaksi.create',
            compact(
                'siswa',
                'petugas',
                'buku'
            )
        );
    }

    // =========================
    // SIMPAN TRANSAKSI
    // =========================

    public function store(Request $request)
    {
        $request->validate([

            'tanggal_pinjam'   => 'required',

            'tanggal_kembali'  => 'required',

            'nis'              => 'required',

            'id_petugas'       => 'required',

            'id_buku'          => 'required'

        ]);

        $buku = Buku::where(
            'id_buku',
            $request->id_buku
        )->first();

        if(!$buku)
        {
            return back()->with(

                'error',

                'Buku tidak ditemukan'

            );
        }

        Transaksi::create([

            'tanggal_pinjam' =>

                $request->tanggal_pinjam,

            'tanggal_kembali' =>

                $request->tanggal_kembali,

            'status' => 'dipinjam',

            'nis' => $request->nis,

            'id_petugas' =>

                $request->id_petugas,

            'id_buku' =>

                $request->id_buku

        ]);

        return redirect('/transaksi')

            ->with(

                'success',

                'Transaksi berhasil ditambahkan'

            );
    }

    // =========================
    // HALAMAN SCAN
    // =========================

    public function scanForm(Request $request)
    {
        $siswa = null;

        $transaksi = [];

        $rekomendasi = collect();

        $semuaBuku = collect();

        if($request->nis)
        {
            $siswa = Siswa::where(
                'nis',
                $request->nis
            )->first();

            $transaksi = Transaksi::with([

                    'buku',
                    'buku.kategori'

                ])

                ->where('nis', $request->nis)

                ->latest()

                ->get();

            $cekPinjam = Transaksi::where(
                                'nis',
                                $request->nis
                            )
                            ->count();

            if($cekPinjam > 0)
            {
                $rekomendasi =
                    $this->rekomendasi(
                        $request->nis
                    );
            }

            else
            {
                $semuaBuku = Buku::with('kategori')

                                ->latest()

                                ->take(8)

                                ->get();
            }
        }

        return view(
            'transaksi.scan',
            compact(
                'siswa',
                'transaksi',
                'rekomendasi',
                'semuaBuku'
            )
        );
    }

    // =========================
    // PROCESS SCAN SISWA
    // =========================

    public function scanSiswaProcess(Request $request)
    {
        return redirect(
            '/scan?nis=' . $request->nis
        );
    }

    // =========================
    // PROCESS SCAN BUKU
    // =========================

    public function scanBukuProcess(Request $request)
    {
        $request->validate([

            'nis' => 'required',

            'qr_code' => 'required'

        ]);

        $qr = trim($request->qr_code);

        $buku = Buku::where(
            'qr_code',
            $qr
        )->first();

        if(!$buku)
        {
            return back()->with(
                'error',
                'Buku tidak ditemukan'
            );
        }

        if(!Session::has('id_petugas'))
        {
            return back()->with(
                'error',
                'Session petugas hilang, login ulang'
            );
        }

        $siswa = Siswa::where(
            'nis',
            $request->nis
        )->first();

        if(!$siswa)
        {
            return back()->with(
                'error',
                'Siswa tidak ditemukan'
            );
        }

        Transaksi::create([

            'tanggal_pinjam' => now(),

            'tanggal_kembali' => now()->addDays(7),

            'status' => 'dipinjam',

            'nis' => $request->nis,

            'id_petugas' => Session::get('id_petugas'),

            'id_buku' => $buku->id_buku

        ]);

        return redirect('/scan?nis='.$request->nis)

        ->with(
            'success',
            'Buku berhasil dipinjam'
        );
    }

    // =========================
    // PENGEMBALIAN
    // =========================

    public function formPengembalian($id)
{
    $transaksi = Transaksi::with([

        'siswa',
        'buku',
        'petugas',
        'sanksi'

    ])->where(

        'id_transaksi',
        $id

    )->firstOrFail();

    $sanksi = Sanksi::all();

    return view(

        'transaksi.pengembalian',

        compact(

            'transaksi',
            'sanksi'

        )
    );
}

public function pengembalian(Request $request, $id)
{
    $transaksi = Transaksi::where(

        'id_transaksi',
        $id

    )->first();

    if(!$transaksi)
    {
        return redirect('/scan')

        ->with(

            'error',

            'Transaksi tidak ditemukan'

        );
    }

    /*
    |--------------------------------------------------------------
    | CEK TERLAMBAT
    |--------------------------------------------------------------
    */

    $tanggalKembali = \Carbon\Carbon::parse(

        $transaksi->tanggal_kembali

    );

    $terlambat = now()->gt($tanggalKembali);

    /*
    |--------------------------------------------------------------
    | JIKA TERLAMBAT
    |--------------------------------------------------------------
    */

    if($terlambat)
    {
        /*
        |----------------------------------------------------------
        | JIKA BELUM PILIH SANKSI
        |----------------------------------------------------------
        */

        if(!$request->id_sanksi)
        {
            return redirect(

                '/transaksi/pengembalian/' .
                $transaksi->id_transaksi

            )->with(

                'warning',

                'Pilih sanksi terlebih dahulu'

            );
        }

        /*
        |----------------------------------------------------------
        | SIMPAN TERLAMBAT + SANKSI
        |----------------------------------------------------------
        */

        $transaksi->status =
            'terlambat';

        $transaksi->id_sanksi =
            $request->id_sanksi;

        $transaksi->status_sanksi =
            'belum_selesai';

        $transaksi->tanggal_dikembalikan =
            now();

        $transaksi->save();

        return redirect(

            '/scan?nis=' . $transaksi->nis

        )->with(

            'success',

            'Pengembalian terlambat dan sanksi berhasil diberikan'

        );
    }

    /*
    |--------------------------------------------------------------
    | JIKA TIDAK TERLAMBAT
    |--------------------------------------------------------------
    */

    $transaksi->status =
        'dikembalikan';

    $transaksi->tanggal_dikembalikan =
        now();

    $transaksi->save();

    return redirect(

        '/scan?nis=' . $transaksi->nis

    )->with(

        'success',

        'Buku berhasil dikembalikan'

    );
}

    // =========================
    // REKOMENDASI AI
    // =========================

    public function rekomendasi($nis)
    {
        $allBooks = Buku::with('kategori')
                    ->get();

        $totalDocs = $allBooks->count();

        if($totalDocs == 0)
        {
            return collect();
        }

        $documents = [];

        $df = [];

        foreach($allBooks as $book)
        {
            $text =

                ($book->judul_buku ?? '') . ' ' .

                ($book->kategori->nama_kategori ?? '') . ' ' .

                ($book->deskripsi ?? '') . ' ' .

                ($book->pengarang ?? '');

            $tokens = $this->tokenize($text);

            $documents[$book->id_buku] = $tokens;

            foreach(array_unique($tokens) as $word)
            {
                $df[$word] =
                    ($df[$word] ?? 0) + 1;
            }
        }

        $idf = [];

        foreach($df as $word => $freq)
        {
            $idf[$word] = log(
                $totalDocs / (1 + $freq)
            );
        }

        $tfidf = [];

        foreach($documents as $bookId => $tokens)
        {
            $tf = array_count_values($tokens);

            $vector = [];

            foreach($tf as $word => $count)
            {
                $vector[$word] =
                    $count * ($idf[$word] ?? 0);
            }

            $tfidf[$bookId] = $vector;
        }

        $borrowedIds = Transaksi::where(
                                'nis',
                                $nis
                            )
                            ->pluck('id_buku')
                            ->toArray();

        if(empty($borrowedIds))
        {
            return Buku::with('kategori')
                    ->latest()
                    ->take(6)
                    ->get()
                    ->map(function($book){

                        $book->similarity_score = 0;

                        return $book;
                    });
        }

        $userProfile = [];

        foreach($borrowedIds as $bookId)
        {
            if(isset($tfidf[$bookId]))
            {
                foreach(
                    $tfidf[$bookId]
                    as $word => $value
                )
                {
                    $userProfile[$word] =

                        ($userProfile[$word] ?? 0)

                        + $value;
                }
            }
        }

        $kategoriDipinjam = Buku::whereIn(
                                'id_buku',
                                $borrowedIds
                            )
                            ->pluck('id_kategori')
                            ->toArray();

        $similarities = [];

        foreach($tfidf as $bookId => $vector)
        {
            if(in_array($bookId, $borrowedIds))
            {
                continue;
            }

            $book = Buku::with('kategori')
                        ->where('id_buku', $bookId)
                        ->first();

            if(!$book)
            {
                continue;
            }

            if(
                !in_array(
                    $book->id_kategori,
                    $kategoriDipinjam
                )
            )
            {
                continue;
            }

            $score = $this->cosineSimilarity(
                $userProfile,
                $vector
            );

            $totalDipinjam =
                Transaksi::where(
                    'id_buku',
                    $bookId
                )->count();

            $popularityBoost =
                min($totalDipinjam * 0.02, 0.2);

            $score += $popularityBoost;

            if($score > 0)
            {
                $similarities[$bookId] = $score;
            }
        }

        arsort($similarities);

        if(empty($similarities))
        {
            $rekomendasi = Buku::with('kategori')

                ->whereIn(
                    'id_kategori',
                    $kategoriDipinjam
                )

                ->whereNotIn(
                    'id_buku',
                    $borrowedIds
                )

                ->latest()

                ->take(6)

                ->get();

            foreach($rekomendasi as $book)
            {
                $book->similarity_score = 0;
            }

            return $rekomendasi;
        }

        $recommendedIds = array_slice(

            array_keys($similarities),

            0,

            6
        );

        $rekomendasi = Buku::with('kategori')

                            ->whereIn(
                                'id_buku',
                                $recommendedIds
                            )

                            ->get();

        foreach($rekomendasi as $book)
        {
            $score =
                $similarities[
                    $book->id_buku
                ] ?? 0;

            $score = min(
                round($score * 100),
                100
            );

            if($score < 15)
            {
                $score = 15;
            }

            $book->similarity_score = $score;
        }

        $rekomendasi = $rekomendasi
                        ->sortByDesc(
                            'similarity_score'
                        );

        return $rekomendasi;
    }

    // =========================
    // TOKENIZER
    // =========================

    private function tokenize($text)
    {
        $stopwords = [

            'dan','yang','di','ke',

            'dari','untuk','atau',

            'dengan','ini','itu',

            'adalah','sebagai',

            'dalam','pada',

            'buku',

            'novel'

        ];

        $text = strtolower($text);

        $text = preg_replace(

            '/[^a-z0-9\s]/',

            '',

            $text
        );

        $words = preg_split(
            '/\s+/',
            $text
        );

        $filtered = array_filter(

            $words,

            function($word) use ($stopwords){

                return !in_array(
                            $word,
                            $stopwords
                        )

                        && strlen($word) > 2;
            }
        );

        return array_values($filtered);
    }

    // =========================
    // COSINE SIMILARITY
    // =========================

    private function cosineSimilarity(
        $vectorA,
        $vectorB
    )
    {
        $dotProduct = 0;

        $normA = 0;

        $normB = 0;

        $allKeys = array_unique(

            array_merge(

                array_keys($vectorA),

                array_keys($vectorB)
            )
        );

        foreach($allKeys as $key)
        {
            $a = $vectorA[$key] ?? 0;

            $b = $vectorB[$key] ?? 0;

            $dotProduct += $a * $b;

            $normA += $a * $a;

            $normB += $b * $b;
        }

        if($normA == 0 || $normB == 0)
        {
            return 0;
        }

        return $dotProduct /

            (sqrt($normA) * sqrt($normB));
    }

}