@php
use Illuminate\Support\Str;
@endphp

@extends('layouts.petugas')

@section('title', 'Scan QR Transaksi')

@section('content')

<script src="https://unpkg.com/html5-qrcode"></script>

<style>

.scan-container{
    max-width:1300px;
    margin:auto;
}

.page-title{
    margin-bottom:35px;
}

.page-title h1{
    font-size:40px;
    font-weight:700;
    background:linear-gradient(to right, #c084fc, #60a5fa);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.page-title p{
    margin-top:10px;
    color:#cbd5e1;
    font-size:15px;
}

.scan-card{
    backdrop-filter:blur(18px);
    background:rgba(255,255,255,0.08);
    border:1px solid rgba(255,255,255,0.1);
    border-radius:30px;
    overflow:hidden;
    margin-bottom:30px;
    box-shadow:0 10px 40px rgba(0,0,0,0.35);
}

.card-header-custom{
    padding:20px 30px;
    font-size:20px;
    font-weight:600;
    color:white;
    background:linear-gradient(135deg, #3b82f6, #8b5cf6);
}

.card-body-custom{
    padding:30px;
    color:white;
}

#reader{
    width:350px;
    margin:auto;
}

.info-box{
    margin-top:25px;
    padding:25px;
    border-radius:22px;
    background:rgba(255,255,255,0.05);
    border:1px solid rgba(255,255,255,0.08);
}

.info-item{
    margin-bottom:14px;
    font-size:16px;
    color:#e2e8f0;
}

.info-item b{
    color:white;
}

.alert-success{
    margin-top:20px;
    padding:16px;
    border-radius:16px;
    background:rgba(34,197,94,0.15);
    border:1px solid rgba(34,197,94,0.3);
    color:#86efac;
    font-weight:600;
}

.alert-danger{
    margin-top:20px;
    padding:16px;
    border-radius:16px;
    background:rgba(239,68,68,0.15);
    border:1px solid rgba(239,68,68,0.3);
    color:#fca5a5;
    font-weight:600;
}

.badge-success{
    background:rgba(34,197,94,.2);
    color:#4ade80;
    padding:5px 12px;
    border-radius:999px;
    font-size:12px;
}

.badge-danger{
    background:rgba(239,68,68,.2);
    color:#f87171;
    padding:5px 12px;
    border-radius:999px;
    font-size:12px;
}

.table-custom{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}

.table-custom th,
.table-custom td{
    border:1px solid rgba(255,255,255,0.1);
    padding:14px;
    color:white;
    text-align:left;
}

.table-custom th{
    background:rgba(255,255,255,0.08);
}

.btn-kembali{
    padding:8px 14px;
    background:#6366f1;
    color:white;
    border-radius:8px;
    text-decoration:none;
    font-size:14px;
    transition:0.3s;
    display:inline-block;
}

.btn-kembali:hover{
    background:#4f46e5;
}

/* ========================= */
/* GRID BUKU */
/* ========================= */

.book-grid{
    display:grid;
    grid-template-columns:
        repeat(auto-fit, minmax(260px,1fr));
    gap:22px;
    margin-top:20px;
}

.book-card{
    border-radius:25px;
    overflow:hidden;
    background:rgba(255,255,255,0.06);
    border:1px solid rgba(255,255,255,0.1);
    box-shadow:0 10px 25px rgba(0,0,0,0.25);
    transition:0.3s;
}

.book-card:hover{
    transform:translateY(-6px);
}

.book-cover{
    width:100%;
    height:240px;
    object-fit:cover;
}

.book-empty{
    width:100%;
    height:240px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:60px;
    background:rgba(255,255,255,0.05);
}

.book-body{
    padding:20px;
}

.book-title{
    color:white;
    font-size:20px;
    font-weight:700;
    margin-bottom:10px;
}

.book-author{
    color:#cbd5e1;
    font-size:14px;
    margin-bottom:12px;
}

.book-category{
    display:inline-block;
    padding:6px 12px;
    border-radius:999px;
    background:rgba(59,130,246,0.2);
    color:#93c5fd;
    font-size:13px;
    margin-bottom:15px;
}

.book-desc{
    color:#cbd5e1;
    font-size:14px;
    line-height:1.7;
    min-height:80px;
}

.book-footer{
    margin-top:15px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.stock-badge{
    background:rgba(34,197,94,.2);
    color:#4ade80;
    padding:8px 14px;
    border-radius:999px;
    font-size:13px;
    font-weight:600;
}

.ai-badge{
    background:rgba(168,85,247,.2);
    color:#d8b4fe;
    padding:8px 14px;
    border-radius:999px;
    font-size:13px;
    font-weight:600;
}

.section-title{
    color:white;
    margin-bottom:10px;
    font-size:25px;
    font-weight:700;
}

.section-subtitle{
    color:#cbd5e1;
    font-size:14px;
}

</style>

<div class="scan-container">

    {{-- TITLE --}}

    <div class="page-title">

        <h1>

            {{ isset($siswa)

                ? '📚 Scan QR Buku'

                : '📷 Scan QR Siswa' }}

        </h1>

        <p>

            Scan QR untuk transaksi peminjaman perpustakaan

        </p>

    </div>

    {{-- ALERT --}}

    @if(session('success'))

        <div class="alert-success">

            {{ session('success') }}

        </div>

    @endif

    @if(session('error'))

        <div class="alert-danger">

            {{ session('error') }}

        </div>

    @endif

    {{-- SCANNER --}}

    <div class="scan-card">

        <div class="card-header-custom">

            {{ isset($siswa)

                ? '📚 Scan QR Buku'

                : '👨‍🎓 Scan QR Siswa' }}

        </div>

        <div class="card-body-custom">

            <div id="reader"></div>

            {{-- FORM SCAN SISWA --}}

            <form
                id="formSiswa"
                method="POST"
                action="/scan-siswa-process">

                @csrf

                <input
                    type="hidden"
                    name="nis"
                    id="nis_input">

            </form>

            {{-- FORM SCAN BUKU --}}

            @if(isset($siswa))

            <form
                id="formBuku"
                method="POST"
                action="/scan-buku-process">

                @csrf

                <input
                    type="hidden"
                    name="nis"
                    value="{{ $siswa->nis }}">

                <input
                    type="hidden"
                    name="qr_code"
                    id="qr_buku">

            </form>

            @endif

        </div>

    </div>

    {{-- DATA SISWA --}}

    @if(isset($siswa))

    <div class="info-box">

        <div class="info-item">

            <b>NIS :</b>

            {{ $siswa->nis }}

        </div>

        <div class="info-item">

            <b>Nama :</b>

            {{ $siswa->nama_siswa }}

        </div>

        <div class="info-item">

            <b>Kelas :</b>

            {{ $siswa->kelas }}

        </div>

    </div>

    {{-- ========================= --}}
    {{-- RIWAYAT --}}
    {{-- ========================= --}}

    <div class="info-box">

        <div class="section-title">

            📖 Riwayat Peminjaman

        </div>

        <div class="section-subtitle">

            Daftar buku yang sedang dipinjam siswa

        </div>

        @if(count($transaksi) > 0)

        <table class="table-custom">

    <tr>

        <th>ID</th>

        <th>Judul Buku</th>

        <th>Tanggal Pinjam</th>

        <th>Batas Kembali</th>

        <th>Status</th>

        <th>Keterangan</th>

        <th>Aksi</th>

    </tr>

    @foreach($transaksi as $t)

    <tr>

        {{-- ID --}}

        <td>

            {{ $t->id_transaksi }}

        </td>

        {{-- JUDUL BUKU --}}

        <td>

            {{ $t->buku->judul_buku ?? '-' }}

        </td>

        {{-- TANGGAL PINJAM --}}

        <td>

            {{ \Carbon\Carbon::parse($t->tanggal_pinjam)->format('d M Y') }}

        </td>

        {{-- BATAS KEMBALI --}}

        <td>

            {{ \Carbon\Carbon::parse($t->tanggal_kembali)->format('d M Y') }}

        </td>

        {{-- STATUS --}}

        <td>

            @if($t->status == 'terlambat')

                <span class="badge-danger">

                    Terlambat

                </span>

            @elseif($t->status == 'dikembalikan')

                <span class="badge-success">

                    Dikembalikan

                </span>

            @else

                <span class="badge-success">

                    Dipinjam

                </span>

            @endif

        </td>

        {{-- KETERANGAN --}}

<td>

    @if($t->status == 'terlambat')

        @if($t->id_sanksi == null)

            <span class="badge-danger">

                Belum Pilih Sanksi

            </span>

        @else

            <span class="badge-danger">

                {{ $t->sanksi->nama_sanksi ?? 'Kena Sanksi' }}

            </span>

        @endif

    @elseif($t->status == 'dikembalikan')

        <span class="badge-success">

            Aman

        </span>

    @else

        <span class="badge-success">

            Sedang Dipinjam

        </span>

    @endif

</td>
        {{-- AKSI --}}

<td>

    @if($t->status == 'dipinjam')

        <a
            href="/pengembalian/{{ $t->id_transaksi }}"
            class="btn-kembali">

            Kembalikan

        </a>

    @elseif($t->status == 'terlambat')

        {{-- BELUM PILIH SANKSI --}}

        @if($t->id_sanksi == null)

            <a
                href="/pengembalian/{{ $t->id_transaksi }}"
                class="btn-kembali"
                style="background:#ef4444;">

                Pilih Sanksi

            </a>

        {{-- SUDAH PILIH SANKSI TAPI BELUM SELESAI --}}

        @elseif($t->status_sanksi == 'belum_selesai')

            <span class="badge-danger">

                Sanksi Diproses

            </span>

        {{-- SUDAH SELESAI --}}

        @elseif($t->status_sanksi == 'selesai')

            <span class="badge-success">

                Sanksi Selesai

            </span>

        @endif

    @else

        <span class="badge-success">

            Sudah Dikembalikan

        </span>

    @endif

    </td>
    </tr>

    @endforeach

</table>
        @else

        <div class="alert-danger">

            Belum ada transaksi

        </div>

        @endif

    </div>

    {{-- ========================= --}}
    {{-- REKOMENDASI --}}
    {{-- ========================= --}}

    @if(count($rekomendasi) > 0)

    <div class="info-box">

        <div class="section-title">

            @if(count($transaksi) > 0)

                🤖 Rekomendasi Buku AI

            @else

                📚 Buku Umum

            @endif

        </div>

        <div class="section-subtitle">

            @if(count($transaksi) > 0)

                Buku direkomendasikan berdasarkan histori peminjaman siswa menggunakan TF-IDF dan Cosine Similarity

            @else

                Buku umum untuk siswa yang belum memiliki histori peminjaman

            @endif

        </div>

        <div class="book-grid">

            @foreach($rekomendasi as $r)

            <div class="book-card">

                {{-- COVER --}}

                @if($r->cover)

                <img
                    src="{{ asset('storage/'.$r->cover) }}"
                    class="book-cover">

                @else

                <div class="book-empty">

                    📚

                </div>

                @endif

                {{-- BODY --}}

                <div class="book-body">

                    <div class="book-title">

                        {{ $r->judul_buku }}

                    </div>

                    <div class="book-author">

                        👨‍🏫 {{ $r->pengarang }}

                    </div>

                    <div class="book-category">
                        {{ optional($r->kategori)->nama_kategori ?? 'Tanpa Kategori' }}
                    </div>

                    <div class="book-desc">

                        {{ Str::limit($r->deskripsi, 120) }}

                    </div>

                    <div class="book-footer">

                        <span class="stock-badge">

                            Stock :
                            {{ $r->stock }}

                        </span>

                        @if(count($transaksi) > 0)

                        <span class="ai-badge">

                            🤖
                            {{ $r->similarity_score ?? 35 }}%

                        </span>

                        @endif

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

    @endif

    {{-- ========================= --}}
    {{-- SEMUA BUKU --}}
    {{-- HANYA UNTUK SISWA BARU --}}
    {{-- ========================= --}}

    @if(
        isset($semuaBuku)
        &&
        count($transaksi) == 0
    )

    <div class="info-box">

        <div class="section-title">

            📚 Semua Buku

        </div>

        <div class="section-subtitle">

            Koleksi buku yang tersedia di perpustakaan

        </div>

        <div class="book-grid">

            @foreach($semuaBuku as $b)

            <div class="book-card">

                @if($b->cover)

                <img
                    src="{{ asset('storage/'.$b->cover) }}"
                    class="book-cover">

                @else

                <div class="book-empty">

                    📚

                </div>

                @endif

                <div class="book-body">

                    <div class="book-title">

                        {{ $b->judul_buku }}

                    </div>

                    <div class="book-author">

                        👨‍🏫 {{ $b->pengarang }}

                    </div>

                    <div class="book-category">

                        {{ $b->kategori->nama_kategori ?? '-' }}

                    </div>

                    <div class="book-desc">

                        {{ Str::limit($b->deskripsi, 120) }}

                    </div>

                    <div class="book-footer">

                        <span class="stock-badge">

                            Stock :
                            {{ $b->stock }}

                        </span>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

    @endif

    @endif

</div>

<script>

let mode =
"{{ isset($siswa) ? 'buku' : 'siswa' }}";

const html5QrCode =
new Html5Qrcode("reader");

// =======================
// HASIL SCAN
// =======================

function onScanSuccess(decodedText)
{
    console.log(decodedText);

    // =======================
    // MODE SCAN SISWA
    // =======================

    if(mode === "siswa")
    {
        document.getElementById(
            'nis_input'
        ).value = decodedText;

        html5QrCode.stop().then(() => {

            document.getElementById(
                'formSiswa'
            ).submit();

        });

        return;
    }

    // =======================
    // MODE SCAN BUKU
    // =======================

    if(mode === "buku")
    {
        document.getElementById(
            'qr_buku'
        ).value = decodedText;

        html5QrCode.stop().then(() => {

            document.getElementById(
                'formBuku'
            ).submit();

        });

        return;
    }
}

// =======================
// START CAMERA
// =======================

Html5Qrcode.getCameras()

.then(devices => {

    if(devices.length)
    {
        html5QrCode.start(

            devices[0].id,

            {
                fps:10,
                qrbox:250
            },

            onScanSuccess
        );
    }

})

.catch(err => console.log(err));

</script>

@endsection