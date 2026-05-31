<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Siswa;
use App\Models\Petugas;
use App\Models\Transaksi;

use Barryvdh\DomPDF\Facade\Pdf;

class DashboardController extends Controller
{
    /*
    |------------------------------------------------------------------
    | DASHBOARD SISWA
    |------------------------------------------------------------------
    */

    public function dashboardSiswa()
{
    $riwayat =
        Transaksi::with([

                'buku',
                'buku.kategori'

            ])
            ->where(
                'nis',
                session('nis')
            )
            ->latest()
            ->get();

    $transaksiController =
        new TransaksiController();

    $rekomendasi =
        $transaksiController->rekomendasi(
            session('nis')
        );

    $semuaBuku =
        Buku::with('kategori')
            ->latest()
            ->get();

    return view(

        'dashboard.siswa',

        compact(

            'riwayat',
            'rekomendasi',
            'semuaBuku'

        )
    );
}

    /*
    |------------------------------------------------------------------
    | DASHBOARD PETUGAS
    |------------------------------------------------------------------
    */

    public function dashboardPetugas()
    {
        /*
        |--------------------------------------------------------------
        | AUTO UPDATE STATUS TERLAMBAT
        |--------------------------------------------------------------
        */

        $cekTransaksi = Transaksi::all();

        foreach($cekTransaksi as $item)
        {
            /*
            |----------------------------------------------------------
            | JIKA BELUM DIKEMBALIKAN DAN LEWAT JATUH TEMPO
            |----------------------------------------------------------
            */

            if(
                $item->tanggal_dikembalikan == null &&
                now()->gt($item->tanggal_kembali)
            )
            {
                $item->status =
                    'terlambat';

                if(!$item->status_sanksi)
                {
                    $item->status_sanksi =
                        'belum_selesai';
                }

                $item->save();
            }

            /*
            |----------------------------------------------------------
            | JIKA SUDAH DIKEMBALIKAN DAN BUKAN TERLAMBAT
            |----------------------------------------------------------
            */

            elseif(
                $item->tanggal_dikembalikan != null &&
                $item->status != 'terlambat'
            )
            {
                $item->status =
                    'dikembalikan';

                $item->save();
            }

            /*
            |----------------------------------------------------------
            | MASIH DIPINJAM
            |----------------------------------------------------------
            */

            elseif(
                $item->tanggal_dikembalikan == null &&
                now()->lte($item->tanggal_kembali)
            )
            {
                $item->status =
                    'dipinjam';

                $item->save();
            }
        }

        /*
        |--------------------------------------------------------------
        | TOTAL DATA
        |--------------------------------------------------------------
        */

        $total_buku =
            Buku::count();

        $total_siswa =
            Siswa::count();

        $total_petugas =
            Petugas::count();

        $total_transaksi =
            Transaksi::count();

        $dipinjam =
            Transaksi::where(
                'status',
                'dipinjam'
            )->count();

        $dikembalikan =
            Transaksi::where(
                'status',
                'dikembalikan'
            )->count();

        $terlambat =
            Transaksi::where(
                'status',
                'terlambat'
            )->count();

        /*
        |--------------------------------------------------------------
        | DATA KETERLAMBATAN
        |--------------------------------------------------------------
        */

        $keterlambatan =
            Transaksi::with([

                    'siswa',
                    'buku',
                    'sanksi'

                ])
                ->where(
                    'status',
                    'terlambat'
                )
                ->latest()
                ->take(5)
                ->get();

        /*
        |--------------------------------------------------------------
        | TOP BUKU POPULER
        |--------------------------------------------------------------
        */

        $top_buku =
            Transaksi::selectRaw(
                    'id_buku, COUNT(*) as total'
                )
                ->with('buku')
                ->groupBy('id_buku')
                ->orderByDesc('total')
                ->take(5)
                ->get();

        /*
        |--------------------------------------------------------------
        | SISWA POPULER
        |--------------------------------------------------------------
        */

        $siswa_populer =
            Transaksi::with('siswa')
                ->selectRaw(
                    'nis, COUNT(*) as total'
                )
                ->groupBy('nis')
                ->orderByDesc('total')
                ->take(10)
                ->get();

        /*
        |--------------------------------------------------------------
        | GRAFIK TRANSAKSI
        |--------------------------------------------------------------
        */

        $grafik =
            Transaksi::selectRaw(
                    'DATE(created_at) as tanggal,
                    COUNT(*) as total'
                )
                ->groupByRaw('DATE(created_at)')
                ->orderBy('tanggal', 'asc')
                ->limit(7)
                ->get();

        /*
        |--------------------------------------------------------------
        | PEMINJAMAN TERBARU
        |--------------------------------------------------------------
        */

        $transaksi_terbaru =
            Transaksi::with([

                    'siswa',
                    'buku'

                ])
                ->latest()
                ->take(10)
                ->get();

        return view(

            'dashboard.petugas',

            compact(

                'total_buku',
                'total_siswa',
                'total_petugas',
                'total_transaksi',
                'dipinjam',
                'dikembalikan',
                'terlambat',
                'keterlambatan',
                'top_buku',
                'siswa_populer',
                'grafik',
                'transaksi_terbaru'

            )
        );
    }

    /*
    |------------------------------------------------------------------
    | DASHBOARD KEPALA SEKOLAH
    |------------------------------------------------------------------
    */

    public function dashboardKepalaSekolah()
    {
        $total_buku =
            Buku::count();

        $total_siswa =
            Siswa::count();

        $total_transaksi =
            Transaksi::count();

        $transaksi =
            Transaksi::with([

                    'siswa',
                    'buku'

                ])
                ->latest()
                ->take(10)
                ->get();

        return view(

            'dashboard.kepala_sekolah',

            compact(

                'total_buku',
                'total_siswa',
                'total_transaksi',
                'transaksi'

            )
        );
    }

    /*
    |------------------------------------------------------------------
    | DATA BUKU KEPSEK
    |------------------------------------------------------------------
    */

    public function dataBukuKepsek()
    {
        $buku =
            Buku::with('kategori')
                ->latest()
                ->paginate(10);

        return view(

            'kepsek.buku',

            compact('buku')

        );
    }

    /*
    |------------------------------------------------------------------
    | DOWNLOAD PDF BUKU
    |------------------------------------------------------------------
    */

    public function downloadBukuPdf()
    {
        $buku =
            Buku::with('kategori')
                ->latest()
                ->get();

        $pdf =
            Pdf::loadView(

                'pdf.buku',

                compact('buku')

            );

        return $pdf->download(
            'laporan_buku.pdf'
        );
    }

    /*
    |------------------------------------------------------------------
    | DATA SISWA KEPSEK
    |------------------------------------------------------------------
    */

    public function dataSiswaKepsek()
    {
        $siswa =
            Siswa::latest()
                ->paginate(10);

        return view(

            'kepsek.siswa',

            compact('siswa')

        );
    }

    /*
    |------------------------------------------------------------------
    | DOWNLOAD PDF SISWA
    |------------------------------------------------------------------
    */

    public function downloadSiswaPdf()
    {
        $siswa =
            Siswa::latest()
                ->get();

        $pdf =
            Pdf::loadView(

                'pdf.siswa',

                compact('siswa')

            );

        return $pdf->download(
            'laporan_siswa.pdf'
        );
    }

    /*
    |------------------------------------------------------------------
    | DATA TRANSAKSI KEPSEK
    |------------------------------------------------------------------
    */

    public function transaksiKepsek()
    {
        $transaksi =
            Transaksi::with([

                    'siswa',
                    'buku'

                ])
                ->latest()
                ->paginate(10);

        return view(

            'kepsek.transaksi',

            compact('transaksi')

        );
    }

    /*
    |------------------------------------------------------------------
    | DOWNLOAD PDF LAPORAN
    |------------------------------------------------------------------
    */

    public function downloadLaporanPdf()
    {
        $laporan =
            Transaksi::with([

                    'siswa',
                    'buku'

                ])
                ->latest()
                ->get();

        $pdf =
            Pdf::loadView(

                'pdf.laporan',

                compact('laporan')

            );

        return $pdf->download(
            'laporan_perpustakaan.pdf'
        );
    }

    /*
    |------------------------------------------------------------------
    | SANKSI SELESAI
    |------------------------------------------------------------------
    */

    public function sanksiSelesai($id)
    {
        $transaksi =
            Transaksi::findOrFail($id);

        $transaksi->status_sanksi =
            'selesai';

        $transaksi->save();

        return back()->with(

            'success',

            'Sanksi berhasil diselesaikan'

        );
    }
}