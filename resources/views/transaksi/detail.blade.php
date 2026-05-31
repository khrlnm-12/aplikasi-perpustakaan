@extends('layouts.petugas')

@section('title', 'Detail Transaksi')

@section('content')

<style>

    .detail-container{
        max-width:1150px;
        margin:auto;
    }

    .detail-header{
        margin-bottom:35px;
    }

    .detail-header h1{
        font-size:42px;
        font-weight:800;
        background:linear-gradient(to right,#c084fc,#60a5fa);
        -webkit-background-clip:text;
        -webkit-text-fill-color:transparent;
        margin-bottom:10px;
    }

    .detail-header p{
        color:#94a3b8;
        font-size:15px;
    }

    .card{
        background:rgba(15,23,42,.75);
        backdrop-filter:blur(18px);
        border:1px solid rgba(255,255,255,.08);
        border-radius:32px;
        padding:40px;
        box-shadow:0 15px 45px rgba(0,0,0,.35);
    }

    .top{
        display:flex;
        align-items:center;
        gap:25px;
        margin-bottom:35px;
        flex-wrap:wrap;
    }

    .icon{
        width:120px;
        height:120px;
        border-radius:30px;
        background:linear-gradient(135deg,#8b5cf6,#3b82f6);
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:50px;
        color:white;
        box-shadow:0 10px 30px rgba(139,92,246,.35);
    }

    .top h2{
        font-size:38px;
        color:white;
        margin-bottom:10px;
    }

    .top p{
        color:#94a3b8;
    }

    .grid{
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
        gap:20px;
    }

    .box{
        background:rgba(255,255,255,.04);
        border:1px solid rgba(255,255,255,.06);
        border-radius:22px;
        padding:25px;
        transition:.3s;
    }

    .box:hover{
        transform:translateY(-4px);
        background:rgba(255,255,255,.06);
    }

    .box h4{
        color:#94a3b8;
        margin-bottom:14px;
        font-size:14px;
        font-weight:600;
    }

    .box p{
        color:white;
        font-size:24px;
        font-weight:700;
        line-height:1.4;
    }

    .status{
        display:inline-flex;
        align-items:center;
        gap:8px;
        padding:12px 18px;
        border-radius:999px;
        font-size:14px;
        font-weight:700;
    }

    .dipinjam{
        background:rgba(245,158,11,.15);
        color:#fcd34d;
        border:1px solid rgba(245,158,11,.25);
    }

    .dikembalikan{
        background:rgba(16,185,129,.15);
        color:#6ee7b7;
        border:1px solid rgba(16,185,129,.25);
    }

    .terlambat{
        background:rgba(239,68,68,.15);
        color:#fca5a5;
        border:1px solid rgba(239,68,68,.25);
    }

    .btn-kembali{
        margin-top:35px;
        display:inline-flex;
        align-items:center;
        gap:8px;
        background:linear-gradient(135deg,#8b5cf6,#3b82f6);
        color:white;
        text-decoration:none;
        padding:14px 24px;
        border-radius:16px;
        font-weight:700;
        transition:.3s;
        box-shadow:0 10px 25px rgba(139,92,246,.25);
    }

    .btn-kembali:hover{
        transform:translateY(-3px);
        color:white;
    }

    @media(max-width:768px){

        .top{
            flex-direction:column;
            align-items:flex-start;
        }

        .top h2{
            font-size:30px;
        }

        .box p{
            font-size:20px;
        }
    }

</style>

<div class="detail-container">

    <div class="detail-header">

        <h1>📚 Detail Transaksi</h1>

        <p>
            Informasi lengkap transaksi perpustakaan
        </p>

    </div>

    <div class="card">

        <div class="top">

            <div class="icon">
                📖
            </div>

            <div>

                <h2>
                    Transaksi {{ $transaksi->id_transaksi }}
                </h2>

                <p>
                    Detail data peminjaman dan pengembalian buku
                </p>

            </div>

        </div>

        <div class="grid">

            <div class="box">

                <h4>Nama Siswa</h4>

                <p>
                    {{ $transaksi->siswa->nama_siswa ?? '-' }}
                </p>

            </div>

            <div class="box">

                <h4>Buku</h4>

                <p>
                    {{ $transaksi->buku->judul_buku ?? '-' }}
                </p>

            </div>

            <div class="box">

                <h4>Petugas</h4>

                <p>
                    {{ $transaksi->petugas->nama_petugas ?? '-' }}
                </p>

            </div>

            <div class="box">

                <h4>Tanggal Pinjam</h4>

                <p>
                    {{ \Carbon\Carbon::parse($transaksi->tanggal_pinjam)->format('d M Y') }}
                </p>

            </div>

            <div class="box">

                <h4>Jatuh Tempo</h4>

                <p>
                    {{ \Carbon\Carbon::parse($transaksi->tanggal_kembali)->format('d M Y') }}
                </p>

            </div>

            <div class="box">

                <h4>Tanggal Dikembalikan</h4>

                <p>

                    @if($transaksi->tanggal_dikembalikan)

                        {{ \Carbon\Carbon::parse($transaksi->tanggal_dikembalikan)->format('d M Y') }}

                    @else

                        Belum Dikembalikan

                    @endif

                </p>

            </div>

            <div class="box">

                <h4>Status</h4>

                @if($transaksi->status == 'dipinjam')

                    <span class="status dipinjam">
                        📖 Sedang Dipinjam
                    </span>

                @elseif($transaksi->status == 'dikembalikan')

                    <span class="status dikembalikan">
                        ✅ Pengembalian Tepat Waktu
                    </span>

                @elseif($transaksi->status == 'terlambat')

                    <span class="status terlambat">
                        ⏰ Pengembalian Terlambat
                    </span>

                @endif

            </div>

            <div class="box">

                <h4>Status Sanksi</h4>

                <p>

                    @if($transaksi->status == 'terlambat')

                        {{ ucfirst(str_replace('_',' ',$transaksi->status_sanksi)) }}

                    @else

                        Tidak Ada

                    @endif

                </p>

            </div>

            <div class="box">

                <h4>Sanksi</h4>

                <p>

                    @if($transaksi->sanksi)

                        {{ $transaksi->sanksi->jenis_sanksi }}

                    @else

                        Tidak Ada

                    @endif

                </p>

            </div>

        </div>

        <a href="/transaksi" class="btn-kembali">
            ← Kembali
        </a>

    </div>

</div>

@endsection