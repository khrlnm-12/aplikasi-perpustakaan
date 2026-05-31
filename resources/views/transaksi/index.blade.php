@extends('layouts.petugas')

@section('title', 'Data Transaksi')

@section('content')

<style>

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }

    .container{
        max-width:1400px;
        margin:auto;
        padding:20px;
    }

    .header{
        margin-bottom:35px;
    }

    .title h1{
        font-size:46px;
        font-weight:800;
        letter-spacing:1px;
        background:linear-gradient(to right,#c084fc,#60a5fa);
        -webkit-background-clip:text;
        -webkit-text-fill-color:transparent;
    }

    .title p{
        margin-top:10px;
        color:#94a3b8;
        font-size:15px;
    }

    .table-wrapper{
        background:rgba(15,23,42,.72);
        backdrop-filter:blur(18px);
        border:1px solid rgba(255,255,255,.08);
        border-radius:32px;
        overflow:hidden;
        box-shadow:
            0 15px 45px rgba(0,0,0,.45),
            inset 0 1px 1px rgba(255,255,255,.04);
    }

    .table-title{
        padding:30px;
        border-bottom:1px solid rgba(255,255,255,.06);
        display:flex;
        justify-content:space-between;
        align-items:center;
    }

    .table-title h2{
        color:white;
        font-size:22px;
        font-weight:700;
    }

    .table-title span{
        color:#94a3b8;
        font-size:13px;
    }

    table{
        width:100%;
        border-collapse:collapse;
    }

    thead{
        background:rgba(255,255,255,.04);
    }

    th{
        padding:22px;
        text-align:center;
        color:#e2e8f0;
        font-size:14px;
        font-weight:700;
    }

    td{
        padding:24px 18px;
        text-align:center;
        color:#f8fafc;
        border-bottom:1px solid rgba(255,255,255,.05);
        transition:.3s;
    }

    tbody tr{
        transition:.3s;
    }

    tbody tr:hover{
        background:rgba(255,255,255,.03);
        transform:scale(1.003);
    }

    tbody tr:last-child td{
        border-bottom:none;
    }

    .badge-id{
        display:inline-block;
        background:linear-gradient(135deg,#4338ca,#3b82f6);
        color:white;
        padding:12px 18px;
        border-radius:16px;
        font-weight:700;
        min-width:70px;
        box-shadow:0 6px 18px rgba(59,130,246,.3);
    }

    .status{
        padding:10px 18px;
        border-radius:999px;
        font-size:13px;
        font-weight:700;
        display:inline-flex;
        align-items:center;
        gap:6px;
    }

    .status-pinjam{
        background:rgba(245,158,11,.15);
        color:#fcd34d;
        border:1px solid rgba(245,158,11,.25);
    }

    .status-kembali{
        background:rgba(16,185,129,.15);
        color:#6ee7b7;
        border:1px solid rgba(16,185,129,.25);
    }

    .not-found{
        color:#fca5a5;
        font-size:13px;
        font-weight:600;
    }

    .aksi{
        display:flex;
        flex-direction:column;
        gap:12px;
        align-items:center;
    }

    .btn-detail,
    .btn-kembali,
    .btn-hapus{
        width:140px;
        padding:12px;
        border:none;
        border-radius:16px;
        text-decoration:none;
        color:white;
        font-size:14px;
        font-weight:700;
        display:flex;
        align-items:center;
        justify-content:center;
        gap:6px;
        transition:.3s;
        cursor:pointer;
    }

    .btn-detail{
        background:linear-gradient(135deg,#8b5cf6,#7c3aed);
        box-shadow:0 6px 18px rgba(139,92,246,.35);
    }

    .btn-detail:hover{
        transform:translateY(-3px);
        box-shadow:0 12px 25px rgba(139,92,246,.45);
    }

    .btn-kembali{
        background:linear-gradient(135deg,#10b981,#059669);
        box-shadow:0 6px 18px rgba(16,185,129,.35);
    }

    .btn-kembali:hover{
        transform:translateY(-3px);
        box-shadow:0 12px 25px rgba(16,185,129,.45);
    }

    .btn-hapus{
        background:linear-gradient(135deg,#ef4444,#dc2626);
        box-shadow:0 6px 18px rgba(239,68,68,.35);
    }

    .btn-hapus:hover{
        transform:translateY(-3px);
        box-shadow:0 12px 25px rgba(239,68,68,.45);
    }

    @media(max-width:1000px){

        .table-wrapper{
            overflow-x:auto;
        }

        table{
            min-width:1200px;
        }

    }

</style>

<div class="container">
    <div class="header">
        <div class="title">
        
            <h1>📚 Data Transaksi</h1>

            <p>
                Kelola data peminjaman dan pengembalian buku perpustakaan
            </p>

        </div>

    </div>

    <div class="table-wrapper">

        <div class="table-title">

            <h2>Riwayat Transaksi</h2>

            <span>
                Total : {{ $transaksi->count() }} transaksi
            </span>

        </div>

        <table>

            <thead>

                <tr>

                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Buku</th>
                    <th>Status</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($transaksi as $t)

                <tr>

                    <td>

                        <span class="badge-id">
                            {{ $t->id_transaksi }}
                        </span>

                    </td>

                    <td>

                        @if($t->siswa)

                            {{ $t->siswa->nama_siswa }}

                        @else

                            <span class="not-found">
                                Siswa tidak ditemukan
                            </span>

                        @endif

                    </td>

                    <td>

                        @if($t->buku)

                            {{ $t->buku->judul_buku }}

                        @else

                            <span class="not-found">
                                Buku tidak ditemukan
                            </span>

                        @endif

                    </td>
                    
                    <td>
                        @if($t->status == 'dipinjam')
                        <span class="status status-pinjam">
                            📖 Dipinjam
                        </span>
                        
                        @elseif($t->status == 'dikembalikan')
                        <span class="status status-kembali">
                            ✅ Pengembalian Tepat Waktu
                        </span>
                        
                        @elseif($t->status == 'terlambat')
                        <span class="status status-terlambat">
                            ⏰ Pengembalian Terlambat
                        </span>
                        @endif
                    </td>

                    <td>

                        <div class="aksi">

                            <a href="/transaksi/{{ $t->id_transaksi }}"
                               class="btn-detail">
                                👁 Detail
                            </a>

                            @if($t->status == 'dipinjam')

                            @endif
                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="8">

                        <span class="not-found">
                            Tidak ada data transaksi
                        </span>

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection