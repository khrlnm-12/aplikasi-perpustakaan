@extends('layouts.petugas')

@section('title', 'Dashboard Petugas')

@section('content')

<style>

.dashboard{
    width:100%;
}

/* WELCOME */

.welcome-card{
    position:relative;
    overflow:hidden;
    padding:45px;
    border-radius:32px;
    background:linear-gradient(
        135deg,
        #7c3aed,
        #2563eb
    );
    margin-bottom:35px;
    box-shadow:0 25px 50px rgba(37,99,235,.25);
}

.welcome-card::before{
    content:'';
    position:absolute;
    width:320px;
    height:320px;
    border-radius:50%;
    background:rgba(255,255,255,.08);
    top:-120px;
    right:-100px;
}

.welcome-card h1{
    font-size:42px;
    font-weight:800;
    color:white;
    margin-bottom:10px;
    position:relative;
    z-index:2;
}

.welcome-card p{
    color:#dbeafe;
    font-size:16px;
    position:relative;
    z-index:2;
}

/* STATS */

.stats{
    display:grid;
    grid-template-columns:
    repeat(auto-fit,minmax(220px,1fr));
    gap:22px;
    margin-bottom:35px;
}

.card-link{
    text-decoration:none;
}

.card-box{
    position:relative;
    overflow:hidden;
    background:rgba(255,255,255,.08);
    border:1px solid rgba(255,255,255,.08);
    backdrop-filter:blur(18px);
    border-radius:28px;
    padding:30px;
    box-shadow:0 10px 35px rgba(0,0,0,.25);
    transition:.35s;
    cursor:pointer;
}

.card-box:hover{
    transform:translateY(-10px);
    box-shadow:
        0 20px 40px rgba(59,130,246,.25),
        0 10px 25px rgba(139,92,246,.2);
}

.card-box h5{
    font-size:16px;
    margin-bottom:18px;
    color:#cbd5e1;
}

.card-box h1{
    font-size:44px;
    font-weight:800;
    color:white;
}

.green{ color:#4ade80 !important; }
.blue{ color:#60a5fa !important; }
.yellow{ color:#facc15 !important; }
.cyan{ color:#22d3ee !important; }
.gray{ color:#e2e8f0 !important; }

/* HERO */

.hero{
    background:rgba(255,255,255,.08);
    border:1px solid rgba(255,255,255,.08);
    backdrop-filter:blur(18px);
    border-radius:32px;
    padding:45px;
    margin-bottom:35px;
    box-shadow:0 10px 35px rgba(0,0,0,.25);
}

.hero-content{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:30px;
    flex-wrap:wrap;
}

.hero-text{
    flex:1;
}

.hero-text h1{
    color:white;
    font-size:42px;
    font-weight:800;
    margin-bottom:18px;
}

.hero-text p{
    color:#cbd5e1;
    line-height:1.8;
    margin-bottom:25px;
}

.btn-scan{
    display:inline-flex;
    align-items:center;
    gap:10px;
    text-decoration:none;
    padding:16px 24px;
    border-radius:18px;
    background:linear-gradient(
        135deg,
        #8b5cf6,
        #2563eb
    );
    color:white;
    font-weight:700;
    transition:.3s;
    box-shadow:0 10px 25px rgba(139,92,246,.35);
}

.btn-scan:hover{
    transform:translateY(-3px);
    color:white;
}

.hero-image img{
    width:250px;
    filter:drop-shadow(
        0 10px 25px rgba(0,0,0,.35)
    );
}

/* TABLE */

.table-card,
.chart-card{
    background:rgba(255,255,255,.08);
    border:1px solid rgba(255,255,255,.08);
    backdrop-filter:blur(18px);
    border-radius:30px;
    overflow:hidden;
    box-shadow:0 10px 35px rgba(0,0,0,.25);
    margin-bottom:35px;
}

.table-header{
    padding:28px 35px;
    background:linear-gradient(
        135deg,
        #ef4444,
        #dc2626
    );
    color:white;
}

.table-header-flex{
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:20px;
}

.table-title{
    font-size:28px;
    font-weight:800;
    margin-bottom:8px;
}

.table-subtitle{
    color:#fee2e2;
    font-size:14px;
}

.total-late{
    width:70px;
    height:70px;
    border-radius:20px;
    background:rgba(255,255,255,.15);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:28px;
    font-weight:800;
}

.chart-header{
    padding:22px 30px;
    background:linear-gradient(
        135deg,
        #2563eb,
        #7c3aed
    );
    color:white;
    font-size:22px;
    font-weight:700;
}

.table-header-green{
    padding:22px 30px;
    background:linear-gradient(
        135deg,
        #10b981,
        #059669
    );
    color:white;
    font-size:22px;
    font-weight:700;
}

.table-responsive{
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    padding:20px;
    text-align:center;
    color:#e2e8f0;
    background:rgba(255,255,255,.04);
    font-size:14px;
}

td{
    padding:20px;
    text-align:center;
    border-bottom:
    1px solid rgba(255,255,255,.05);
    color:white;
    vertical-align:middle;
}

tr:hover{
    background:rgba(255,255,255,.03);
}

/* STUDENT */

.student-box{
    display:flex;
    align-items:center;
    gap:15px;
}

.student-avatar{
    width:48px;
    height:48px;
    border-radius:14px;
    background:linear-gradient(
        135deg,
        #8b5cf6,
        #2563eb
    );
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-weight:800;
}

.student-name{
    font-weight:700;
    color:white;
    margin-bottom:4px;
}

.student-nis{
    font-size:12px;
    color:#94a3b8;
}

/* BOOK */

.book-box{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    font-weight:600;
}

/* BADGE */

.badge-danger,
.badge-success,
.badge-warning{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:10px 16px;
    border-radius:999px;
    font-size:12px;
    font-weight:700;
}

.badge-danger{
    background:rgba(239,68,68,.18);
    color:#fca5a5;
}

.badge-success{
    background:rgba(34,197,94,.18);
    color:#86efac;
}

.badge-warning{
    background:rgba(245,158,11,.18);
    color:#fcd34d;
}

/* BUTTON */

.btn-selesai{
    border:none;
    padding:10px 16px;
    border-radius:12px;
    background:linear-gradient(
        135deg,
        #10b981,
        #059669
    );
    color:white;
    font-size:12px;
    font-weight:700;
    cursor:pointer;
    transition:.3s;
}

.btn-selesai:hover{
    transform:translateY(-2px);
}

/* EMPTY */

.empty-box{
    padding:60px 20px;
    text-align:center;
    color:#cbd5e1;
}

.empty-box i{
    font-size:60px;
    color:#4ade80;
    margin-bottom:20px;
}

.empty-box h3{
    color:white;
    margin-bottom:10px;
}

/* CHART */

.chart-body{
    padding:30px;
}

@media(max-width:992px){

    .hero-content{
        flex-direction:column;
    }

    .hero-image img{
        width:180px;
    }

    .student-box{
        flex-direction:column;
        text-align:center;
    }

}

</style>

<div class="dashboard">

    <!-- WELCOME -->

    <div class="welcome-card">

        <h1>
            👋 Selamat Datang,
            {{ session('nama_petugas') }}
        </h1>

        <p>
            Sistem Perpustakaan Digital Modern
            untuk mengelola buku, siswa,
            dan transaksi perpustakaan lebih cepat.
        </p>

    </div>

    <!-- STATISTIK -->

    <div class="stats">

        <a href="/buku" class="card-link">
            <div class="card-box">
                <h5 class="green">📚 Total Buku</h5>
                <h1>{{ $total_buku }}</h1>
            </div>
        </a>

        <a href="/siswa" class="card-link">
            <div class="card-box">
                <h5 class="blue">🎓 Total Siswa</h5>
                <h1>{{ $total_siswa }}</h1>
            </div>
        </a>

        <a href="/transaksi" class="card-link">
            <div class="card-box">
                <h5 class="yellow">🔄 Total Transaksi</h5>
                <h1>{{ $total_transaksi }}</h1>
            </div>
        </a>

        <a href="/transaksi?status=dipinjam" class="card-link">
            <div class="card-box">
                <h5 class="cyan">📖 Dipinjam</h5>
                <h1>{{ $dipinjam }}</h1>
            </div>
        </a>

        <a href="/transaksi?status=dikembalikan" class="card-link">
            <div class="card-box">
                <h5 class="gray">✅ Dikembalikan</h5>
                <h1>{{ $dikembalikan }}</h1>
            </div>
        </a>

        <a href="/transaksi?status=terlambat" class="card-link">
            <div class="card-box">
                <h5 style="color:#f87171;">⏰ Terlambat</h5>
                <h1>{{ $terlambat }}</h1>
            </div>
        </a>

    </div>

    <!-- HERO -->

    <div class="hero">

        <div class="hero-content">

            <div class="hero-text">

                <h1>
                    Kelola Perpustakaan
                    Lebih Modern 🚀
                </h1>

                <p>
                    Pantau data buku,
                    transaksi peminjaman,
                    keterlambatan,
                    dan scan QR siswa
                    secara real-time.
                </p>

                <a href="/scan" class="btn-scan">
                    📷 Scan Siswa Sekarang
                </a>

            </div>

            <div class="hero-image">

                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png">

            </div>

        </div>

    </div>

    <!-- PEMINJAMAN -->

    <div class="chart-card">

        <div class="chart-header">

            📖 Peminjaman Buku Terbaru

        </div>

        <div class="chart-body">

            <table>

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Jatuh Tempo</th>
                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($transaksi_terbaru as $k => $t)

                    <tr>

                        <td>{{ $k + 1 }}</td>

                        <td>

                            <div class="student-box">

                                <div class="student-avatar">

                                    {{ strtoupper(substr($t->siswa->nama_siswa ?? 'S',0,1)) }}

                                </div>

                                <div>

                                    <div class="student-name">

                                        {{ $t->siswa->nama_siswa ?? '-' }}

                                    </div>

                                    <div class="student-nis">

                                        NIS :
                                        {{ $t->siswa->nis ?? '-' }}

                                    </div>

                                </div>

                            </div>

                        </td>

                        <td>

                            <div class="book-box">

                                📚
                                {{ $t->buku->judul_buku ?? '-' }}

                            </div>

                        </td>

                        <td>

                            {{ \Carbon\Carbon::parse($t->tanggal_pinjam)->format('d M Y') }}

                        </td>

                        <td>

                            {{ \Carbon\Carbon::parse($t->tanggal_kembali)->format('d M Y') }}

                        </td>

                        <td>

                            @if($t->status == 'terlambat')

                                <span class="badge-danger">

                                    ⏰ Terlambat

                                </span>

                            @elseif($t->status == 'dipinjam')

                                <span class="badge-warning">

                                    📖 Dipinjam

                                </span>

                            @else

                                <span class="badge-success">

                                    ✅ Dikembalikan

                                </span>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6">

                            <div class="empty-box">

                                <i class="fa-solid fa-book"></i>

                                <h3>
                                    Belum Ada Peminjaman
                                </h3>

                                <p>
                                    Data peminjaman buku akan muncul di sini
                                </p>

                            </div>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <!-- KETERLAMBATAN -->

    <div class="table-card">

        <div class="table-header">

            <div class="table-header-flex">

                <div>

                    <div class="table-title">

                        🚨 Keterlambatan Terbaru

                    </div>

                    <div class="table-subtitle">

                        Monitoring siswa yang terlambat
                        mengembalikan buku perpustakaan

                    </div>

                </div>

                <div class="total-late">

                    {{ $terlambat }}

                </div>

            </div>

        </div>

        <div class="table-responsive">

            <table>

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Siswa</th>
                        <th>Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Jatuh Tempo</th>
                        <th>Status Pengembalian</th>
                        <th>Status Sanksi</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($keterlambatan as $k => $t)

                    <tr>

                        <td>{{ $k + 1 }}</td>

                        <td>

                            <div class="student-box">

                                <div class="student-avatar">

                                    {{ strtoupper(substr($t->siswa->nama_siswa ?? 'S',0,1)) }}

                                </div>

                                <div>

                                    <div class="student-name">

                                        {{ $t->siswa->nama_siswa ?? '-' }}

                                    </div>

                                    <div class="student-nis">

                                        NIS :
                                        {{ $t->siswa->nis ?? '-' }}

                                    </div>

                                </div>

                            </div>

                        </td>

                        <td>

                            <div class="book-box">

                                📚
                                {{ $t->buku->judul_buku ?? '-' }}

                            </div>

                        </td>

                        <td>

                            {{ \Carbon\Carbon::parse($t->tanggal_pinjam)->format('d M Y') }}

                        </td>

                        <td>

                            <span style="color:#fca5a5;font-weight:700;">

                                {{ \Carbon\Carbon::parse($t->tanggal_kembali)->format('d M Y') }}

                            </span>

                        </td>

                        <td>

                            <span class="badge-danger">

                                ⏰ Terlambat

                            </span>

                        </td>

                        <td>

                            @if($t->status_sanksi == 'selesai')

                                <span class="badge-success">

                                    ✅ Selesai

                                </span>

                            @else

                                <span class="badge-warning">

                                    ⌛ Belum Selesai

                                </span>

                            @endif

                        </td>

                        <td>

                            @if($t->status_sanksi != 'selesai')

                                <form action="{{ route('sanksi.selesai', $t->id_transaksi) }}"
                                      method="POST">

                                    @csrf

                                    <button type="submit"
                                            class="btn-selesai">

                                        ✔ Selesai

                                    </button>

                                </form>

                            @else

                                <span class="badge-success">

                                    ✔ Sudah

                                </span>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="8">

                            <div class="empty-box">

                                <i class="fa-solid fa-circle-check"></i>

                                <h3>

                                    Tidak Ada Keterlambatan

                                </h3>

                                <p>

                                    Semua transaksi pengembalian
                                    berjalan dengan baik

                                </p>

                            </div>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <!-- TOP BUKU -->

    <div class="chart-card">

        <div class="chart-header">

            📚 Top Buku Populer

        </div>

        <div class="chart-body">

            <table>

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Total Dipinjam</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($top_buku as $k => $b)

                    <tr>

                        <td>{{ $k + 1 }}</td>

                        <td>

                            {{ $b->buku->judul_buku ?? '-' }}

                        </td>

                        <td>

                            {{ $b->total }}x

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="3">

                            <div class="empty-box">

                                Tidak ada data buku populer

                            </div>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <!-- TOP SISWA -->

    <div class="chart-card">

        <div class="table-header-green">

            🎓 Top Siswa Peminjam

        </div>

        <div class="chart-body">

            <table>

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Total Pinjam</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($siswa_populer as $k => $s)

                    <tr>

                        <td>{{ $k + 1 }}</td>

                        <td>

                            {{ $s->siswa->nama_siswa ?? '-' }}

                        </td>

                        <td>

                            {{ $s->total }}x

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="3">

                            <div class="empty-box">

                                Tidak ada data siswa populer

                            </div>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <!-- GRAFIK -->

    <div class="chart-card">

        <div class="chart-header">

            📈 Grafik Transaksi

        </div>

        <div class="chart-body">

            <canvas id="grafikTransaksi"></canvas>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx =
document.getElementById('grafikTransaksi');

new Chart(ctx, {

    type:'line',

    data:{

        labels:[

            @foreach($grafik as $g)

                '{{ $g->tanggal }}',

            @endforeach

        ],

        datasets:[{

            label:'Jumlah Transaksi',

            data:[

                @foreach($grafik as $g)

                    {{ $g->total }},

                @endforeach

            ],

            borderWidth:3,
            tension:.4,
            fill:true

        }]

    }

});

</script>

@endsection