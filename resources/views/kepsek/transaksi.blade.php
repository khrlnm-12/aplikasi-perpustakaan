@extends('layouts.kepsek')

@section('title', 'Informasi Transaksi')

@section('page-title', 'Informasi Transaksi')

@section('content')

<!-- HERO -->

<div class="hero-section">

    <div>

        <div class="hero-badge">
            📚 Monitoring Transaksi
        </div>

        <h1 class="hero-title">
            Data Transaksi Perpustakaan
        </h1>

        <p class="hero-subtitle">

            Monitoring seluruh aktivitas
            peminjaman dan pengembalian buku
            perpustakaan sekolah secara realtime.

        </p>

    </div>

    <div class="hero-icon">

        <i class="fa-solid fa-book-open-reader"></i>

    </div>

</div>

<!-- SEARCH -->

<div class="search-box">

    <i class="fa-solid fa-magnifying-glass"></i>

    <input type="text"
           id="searchTransaksi"
           placeholder="Cari nama siswa atau judul buku...">

</div>

<!-- TABLE -->

<div class="table-wrapper">

    <div class="table-header">

        <div>

            <h2>
                📖 Daftar Transaksi
            </h2>

            <span>
                Total Transaksi :
                {{ $transaksi->total() }}
            </span>

        </div>

    </div>

    <div class="table-responsive">

        <table class="modern-table"
               id="transaksiTable">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Siswa</th>
                    <th>Buku</th>
                    <th>Status</th>

                </tr>

            </thead>

            <tbody>

                @forelse($transaksi as $item)

                <tr onclick="window.location='{{ route('kepsek.transaksi.detail', $item->id_transaksi) }}'"
                    style="cursor:pointer;">

                    <!-- NO -->

                    <td>

                        <div class="number-box">

                            {{ $loop->iteration }}

                        </div>

                    </td>

                    <!-- SISWA -->

                    <td>

                        <div class="student-info">

                            <div class="student-icon">

                                <i class="fa-solid fa-user"></i>

                            </div>

                            <div>

                                <div class="student-name">

                                    {{ $item->siswa->nama_siswa ?? '-' }}

                                </div>

                                <div class="student-nis">

                                    NIS :
                                    {{ $item->siswa->nis ?? '-' }}

                                </div>

                            </div>

                        </div>

                    </td>

                    <!-- BUKU -->

                    <td>

                        <div class="book-info">

                            <i class="fa-solid fa-book"></i>

                            {{ $item->buku->judul_buku ?? '-' }}

                        </div>

                    </td>

                  

                    <!-- STATUS -->

                    <td>

                        @if($item->status == 'dipinjam')

                            <span class="status dipinjam">

                                <i class="fa-solid fa-book-open"></i>

                                Dipinjam

                            </span>

                        @elseif($item->status == 'dikembalikan')

                            <span class="status selesai">

                                <i class="fa-solid fa-circle-check"></i>

                                Dikembalikan

                            </span>

                        @else

                            <span class="status terlambat">

                                <i class="fa-solid fa-clock"></i>

                                Terlambat

                            </span>

                        @endif

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6">

                        <div class="empty-box">

                            <i class="fa-solid fa-folder-open"></i>

                            <p>
                                Tidak ada data transaksi
                            </p>

                        </div>

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <!-- PAGINATION -->

    <div class="pagination-box">

        {{ $transaksi->links() }}

    </div>

</div>

<style>

/* HERO */

.hero-section{

    display:flex;

    justify-content:space-between;

    align-items:center;

    gap:30px;

    flex-wrap:wrap;

    padding:35px;

    margin-bottom:30px;

    border-radius:32px;

    background:
    linear-gradient(
        135deg,
        #ede9fe,
        #dbeafe
    );
}

.hero-badge{

    display:inline-block;

    padding:10px 18px;

    border-radius:999px;

    background:white;

    color:#7c3aed;

    margin-bottom:18px;

    font-size:14px;

    font-weight:600;
}

.hero-title{

    font-size:42px;

    font-weight:800;

    color:#0f172a;

    margin-bottom:15px;
}

.hero-subtitle{

    color:#475569;

    line-height:1.8;

    max-width:650px;
}

.hero-icon{

    width:110px;
    height:110px;

    border-radius:28px;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:42px;

    color:white;

    background:
    linear-gradient(
        135deg,
        #7c3aed,
        #2563eb
    );

    box-shadow:
    0 20px 40px rgba(124,58,237,.25);
}

/* SEARCH */

.search-box{

    display:flex;

    align-items:center;

    gap:14px;

    padding:18px 22px;

    border-radius:20px;

    background:white;

    margin-bottom:28px;

    box-shadow:
    0 10px 25px rgba(0,0,0,.05);
}

.search-box i{

    color:#94a3b8;
}

.search-box input{

    width:100%;

    border:none;

    outline:none;

    background:none;

    color:#0f172a;

    font-size:15px;
}

/* TABLE */

.table-wrapper{

    background:white;

    border-radius:30px;

    overflow:hidden;

    box-shadow:
    0 15px 35px rgba(0,0,0,.05);
}

.table-header{

    padding:28px 30px;

    background:
    linear-gradient(
        135deg,
        #7c3aed,
        #2563eb
    );

    color:white;
}

.table-header h2{

    font-size:28px;

    margin-bottom:8px;
}

.table-header span{

    opacity:.9;
}

.table-responsive{

    overflow-x:auto;
}

.modern-table{

    width:100%;

    border-collapse:collapse;
}

.modern-table th{

    padding:22px;

    text-align:left;

    background:#f8fafc;

    color:#475569;

    font-size:14px;

    text-transform:uppercase;
}

.modern-table td{

    padding:22px;

    border-bottom:
    1px solid #e2e8f0;

    color:#0f172a;

    vertical-align:middle;
}

.modern-table tbody tr{

    transition:.3s;
}

.modern-table tbody tr:hover{

    background:#f8fafc;
}

/* NUMBER */

.number-box{

    width:40px;
    height:40px;

    border-radius:12px;

    display:flex;

    align-items:center;

    justify-content:center;

    background:#eef2ff;

    color:#4f46e5;

    font-weight:700;
}

/* STUDENT */

.student-info{

    display:flex;

    align-items:center;

    gap:15px;
}

.student-icon{

    width:50px;
    height:50px;

    border-radius:16px;

    display:flex;

    align-items:center;

    justify-content:center;

    background:
    linear-gradient(
        135deg,
        #7c3aed,
        #2563eb
    );

    color:white;

    font-size:20px;
}

.student-name{

    font-size:16px;

    font-weight:700;

    color:#0f172a;

    margin-bottom:4px;
}

.student-nis{

    color:#64748b;

    font-size:13px;
}

/* BOOK */

.book-info{

    display:flex;

    align-items:center;

    gap:10px;

    color:#0f172a;

    font-weight:600;
}

/* DATE */

.date-box{

    padding:10px 16px;

    border-radius:12px;

    background:#f1f5f9;

    color:#0f172a;

    font-size:13px;
}

/* STATUS */

.status{

    display:inline-flex;

    align-items:center;

    gap:8px;

    padding:10px 16px;

    border-radius:999px;

    font-size:13px;

    font-weight:600;
}

.dipinjam{

    background:#dbeafe;

    color:#2563eb;
}

.selesai{

    background:#dcfce7;

    color:#16a34a;
}

.terlambat{

    background:#fee2e2;

    color:#dc2626;
}

/* EMPTY */

.empty-box{

    padding:60px;

    text-align:center;

    color:#64748b;
}

.empty-box i{

    font-size:60px;

    margin-bottom:20px;
}

/* PAGINATION */

.pagination-box{

    padding:25px;
}

/* RESPONSIVE */

@media(max-width:768px){

    .hero-title{

        font-size:30px;
    }

}

</style>

<script>

document
.getElementById('searchTransaksi')
.addEventListener('keyup', function(){

    let value =
        this.value.toLowerCase();

    let rows =
        document.querySelectorAll(
            '#transaksiTable tbody tr'
        );

    rows.forEach(row => {

        row.style.display =

            row.innerText
               .toLowerCase()
               .includes(value)

            ? ''

            : 'none';

    });

});

</script>

@endsection