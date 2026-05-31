@extends('layouts.kepsek')

@section('title', 'Detail Transaksi')

@section('page-title', 'Detail Transaksi')

@section('content')

<div class="detail-container">

    <!-- HEADER -->

    <div class="detail-header">

        <div class="transaction-icon">

            <i class="fa-solid fa-book-open-reader"></i>

        </div>

        <div>

            <div class="badge-detail">
                📖 Informasi Transaksi
            </div>

            <h1 class="transaction-title">

                {{ $transaksi->siswa->nama_siswa ?? '-' }}

            </h1>

            <p class="transaction-subtitle">

                Detail transaksi peminjaman buku perpustakaan

            </p>

        </div>

    </div>

    <!-- CONTENT -->

    <div class="detail-card">

        <!-- NAMA -->

        <div class="detail-item">

            <span>Nama Siswa</span>

            <h3>

                {{ $transaksi->siswa->nama_siswa ?? '-' }}

            </h3>

        </div>

        <!-- NIS -->

        <div class="detail-item">

            <span>NIS</span>

            <h3>

                {{ $transaksi->siswa->nis ?? '-' }}

            </h3>

        </div>

        <!-- BUKU -->

        <div class="detail-item">

            <span>Judul Buku</span>

            <h3>

                {{ $transaksi->buku->judul_buku ?? '-' }}

            </h3>

        </div>

        <!-- PETUGAS -->

        <div class="detail-item">

            <span>Petugas</span>

            <h3>

                {{ $transaksi->petugas->nama_petugas ?? '-' }}

            </h3>

        </div>

        <!-- TANGGAL PINJAM -->

        <div class="detail-item">

            <span>Tanggal Pinjam</span>

            <h3>

                {{ \Carbon\Carbon::parse($transaksi->tanggal_pinjam)->format('d M Y') }}

            </h3>

        </div>

        <!-- JATUH TEMPO -->

        <div class="detail-item">

            <span>Jatuh Tempo</span>

            <h3>

                {{ \Carbon\Carbon::parse($transaksi->tanggal_kembali)->format('d M Y') }}

            </h3>

        </div>

        <!-- TANGGAL DIKEMBALIKAN -->

        <div class="detail-item">

            <span>Tanggal Dikembalikan</span>

            <h3>

                @if($transaksi->tanggal_dikembalikan)

                    {{ \Carbon\Carbon::parse($transaksi->tanggal_dikembalikan)->format('d M Y') }}

                @else

                    Belum Dikembalikan

                @endif

            </h3>

        </div>

        <!-- STATUS PENGEMBALIAN -->

        <div class="detail-item">

            <span>Status Pengembalian</span>

            <h3>

                @if($transaksi->status == 'dipinjam')

                    <span class="status-badge dipinjam">

                        📖 Masih Dipinjam

                    </span>

                @elseif($transaksi->status == 'terlambat')

                    <span class="status-badge terlambat">

                        ⏰ Terlambat

                    </span>

                @else

                    <span class="status-badge dikembalikan">

                        ✅ Tepat Waktu

                    </span>

                @endif

            </h3>

        </div>

        <!-- STATUS SANKSI -->

        <div class="detail-item">

            <span>Status Sanksi</span>

            <h3>

                @if($transaksi->status == 'terlambat')

                    @if($transaksi->status_sanksi == 'selesai')

                        <span class="status-badge selesai">

                            ✅ Selesai

                        </span>

                    @else

                        <span class="status-badge belum">

                            ⚠️ Belum Selesai

                        </span>

                    @endif

                @else

                    <span class="status-badge tidak-ada">

                        ✔ Tidak Ada Sanksi

                    </span>

                @endif

            </h3>

        </div>

        <!-- JENIS SANKSI -->

        <div class="detail-item">

            <span>Jenis Sanksi</span>

            <h3>

                {{ $transaksi->sanksi->jenis_sanksi ?? 'Tidak Ada' }}

            </h3>

        </div>

    </div>

    <!-- BUTTON -->

    <a href="{{ route('kepsek.transaksi') }}"
       class="back-button">

        <i class="fa-solid fa-arrow-left"></i>

        Kembali

    </a>

</div>

<style>

.detail-container{

    max-width:1000px;
    margin:auto;
}

/* HEADER */

.detail-header{

    display:flex;
    align-items:center;
    gap:25px;
    margin-bottom:35px;

    background:
    linear-gradient(
        135deg,
        rgba(124,58,237,.12),
        rgba(37,99,235,.08)
    );

    padding:35px;
    border-radius:30px;
}

.transaction-icon{

    width:110px;
    height:110px;

    border-radius:30px;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:45px;

    color:white;

    background:
    linear-gradient(
        135deg,
        #7c3aed,
        #2563eb
    );
}

.badge-detail{

    display:inline-block;

    padding:10px 18px;

    border-radius:999px;

    background:white;

    color:#7c3aed;

    font-size:14px;

    font-weight:600;

    margin-bottom:15px;
}

.transaction-title{

    font-size:38px;
    font-weight:800;
    color:#0f172a;

    margin-bottom:10px;
}

.transaction-subtitle{

    color:#64748b;
}

/* CARD */

.detail-card{

    background:white;

    border-radius:30px;

    padding:35px;

    display:grid;

    grid-template-columns:
    repeat(auto-fit,minmax(250px,1fr));

    gap:25px;

    box-shadow:
    0 15px 35px rgba(0,0,0,.05);

    margin-bottom:30px;
}

/* ITEM */

.detail-item{

    background:#f8fafc;

    padding:25px;

    border-radius:22px;

    transition:.3s;
}

.detail-item:hover{

    transform:translateY(-4px);
}

.detail-item span{

    display:block;

    color:#64748b;

    margin-bottom:10px;
}

.detail-item h3{

    color:#0f172a;

    font-size:22px;

    line-height:1.5;
}

/* STATUS */

.status-badge{

    display:inline-flex;

    align-items:center;

    gap:8px;

    padding:10px 18px;

    border-radius:999px;

    font-size:14px;

    font-weight:700;
}

.dipinjam{

    background:rgba(245,158,11,.15);
    color:#d97706;
}

.dikembalikan{

    background:rgba(16,185,129,.15);
    color:#059669;
}

.terlambat{

    background:rgba(239,68,68,.15);
    color:#dc2626;
}

.selesai{

    background:rgba(16,185,129,.15);
    color:#059669;
}

.belum{

    background:rgba(245,158,11,.15);
    color:#d97706;
}

.tidak-ada{

    background:rgba(59,130,246,.15);
    color:#2563eb;
}

/* BUTTON */

.back-button{

    display:inline-flex;

    align-items:center;

    gap:10px;

    padding:15px 25px;

    border-radius:16px;

    text-decoration:none;

    color:white;

    font-weight:600;

    background:
    linear-gradient(
        135deg,
        #7c3aed,
        #2563eb
    );

    transition:.3s;
}

.back-button:hover{

    transform:translateY(-3px);

    color:white;
}

</style>

@endsection