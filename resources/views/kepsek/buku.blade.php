@extends('layouts.kepsek')

@section('title', 'Informasi Buku')

@section('page-title', 'Informasi Buku')

@section('content')

<!-- HERO -->

<div class="hero-section">

    <div>

        <div class="hero-badge">
            📚 Sistem Perpustakaan Digital
        </div>

        <h1 class="hero-title">
            Informasi Buku Perpustakaan
        </h1>

        <p class="hero-subtitle">

            Monitoring seluruh koleksi buku perpustakaan
            sekolah secara realtime, modern,
            dan lebih terstruktur.

        </p>

    </div>

    <div class="hero-icon">

        <i class="fa-solid fa-book-open-reader"></i>

    </div>

</div>

<!-- SEARCH -->

<div class="search-container">

    <div class="search-box">

        <i class="fa-solid fa-magnifying-glass"></i>

        <input type="text"
               id="searchInput"
               placeholder="Cari judul buku atau penulis...">

    </div>

</div>

<!-- TABLE -->

<div class="table-card">

    <div class="table-top">

        <div>

            <div class="table-title">
                📘 Daftar Buku
            </div>

            <div class="table-subtitle">

                Total Buku :
                {{ $buku->count() }}

            </div>

        </div>

    </div>

    <div class="table-responsive">

        <table class="modern-table"
               id="bukuTable">

            <thead>

                <tr>

                    <th width="8%">
                        No
                    </th>

                    <th width="35%">
                        Buku
                    </th>

                    <th width="15%">
                        Kategori
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($buku as $item)

                <!-- CLICKABLE ROW -->

                <tr onclick="window.location='{{ route('kepsek.buku.detail', $item->id_buku) }}'"
                    style="cursor:pointer;">

                    <!-- NO -->

                    <td>

                        <div class="number-box">

                            {{ $loop->iteration }}

                        </div>

                    </td>

                    <!-- BUKU -->

                    <td>

                        <div class="book-info">

                            <div class="book-icon">

                                <i class="fa-solid fa-book"></i>

                            </div>

                            <div>

                                <div class="book-title">

                                    {{ $item->judul_buku }}

                                </div>

                                <div class="book-category">

                                    {{ $item->kategori->nama_kategori ?? 'Kategori Buku' }}

                                </div>

                            </div>

                        </div>

                    </td>

                    <!-- KATEGORI -->

                    <td>

                        <span class="kategori-badge">

                            {{ $item->kategori->nama_kategori ?? '-' }}

                        </span>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6">

                        <div class="empty-box">

                            <i class="fa-solid fa-book-open"></i>

                            <p>

                                Tidak ada data buku

                            </p>

                        </div>

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<style>

/* HERO */

.hero-section{

    display:flex;

    justify-content:space-between;

    align-items:center;

    flex-wrap:wrap;

    gap:30px;

    margin-bottom:35px;

    padding:40px;

    border-radius:35px;

    background:
        linear-gradient(
            135deg,
            #4f46e5,
            #7c3aed
        );

    color:white;

    overflow:hidden;

    position:relative;

    box-shadow:
        0 20px 40px rgba(79,70,229,0.25);
}

.hero-section::before{

    content:'';

    position:absolute;

    width:280px;
    height:280px;

    border-radius:50%;

    background:
        rgba(255,255,255,0.08);

    top:-100px;
    right:-80px;
}

.hero-badge{

    display:inline-block;

    padding:10px 18px;

    border-radius:999px;

    background:
        rgba(255,255,255,0.12);

    margin-bottom:20px;

    font-size:14px;

    font-weight:600;
}

.hero-title{

    font-size:42px;

    font-weight:800;

    margin-bottom:14px;
}

.hero-subtitle{

    max-width:650px;

    color:#e0e7ff;

    line-height:1.9;
}

.hero-icon{

    width:120px;
    height:120px;

    border-radius:30px;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:50px;

    background:
        rgba(255,255,255,0.15);

    backdrop-filter:blur(10px);
}

/* SEARCH */

.search-container{

    margin-bottom:30px;
}

.search-box{

    display:flex;

    align-items:center;

    gap:15px;

    background:white;

    padding:18px 22px;

    border-radius:22px;

    box-shadow:
        0 10px 30px rgba(0,0,0,0.06);
}

.search-box i{

    color:#64748b;

    font-size:18px;
}

.search-box input{

    width:100%;

    border:none;

    outline:none;

    background:none;

    font-size:15px;

    color:#0f172a;
}

.search-box input::placeholder{

    color:#94a3b8;
}

/* TABLE CARD */

.table-card{

    background:white;

    border-radius:35px;

    overflow:hidden;

    box-shadow:
        0 10px 35px rgba(0,0,0,0.06);
}

.table-top{

    padding:28px 30px;

    border-bottom:
        1px solid #e2e8f0;
}

.table-title{

    font-size:28px;

    font-weight:700;

    color:#0f172a;

    margin-bottom:6px;
}

.table-subtitle{

    color:#64748b;
}

.table-responsive{

    overflow-x:auto;
}

/* TABLE */

.modern-table{

    width:100%;

    border-collapse:collapse;
}

.modern-table thead{

    background:#f8fafc;
}

.modern-table th{

    padding:22px;

    text-align:left;

    color:#475569;

    font-size:14px;

    font-weight:700;

    text-transform:uppercase;

    letter-spacing:1px;
}

.modern-table td{

    padding:22px;

    border-bottom:
        1px solid #f1f5f9;

    vertical-align:middle;

    color:#0f172a;
}

.modern-table tbody tr{

    transition:0.3s;
    cursor:pointer;
}

.modern-table tbody tr:hover{

    background:#f8fafc;
    transform:scale(1.01);
}

/* BOOK */

.book-info{

    display:flex;

    align-items:center;

    gap:16px;
}

.book-icon{

    width:55px;
    height:55px;

    border-radius:18px;

    display:flex;
    align-items:center;
    justify-content:center;

    color:white;

    font-size:20px;

    background:
        linear-gradient(
            135deg,
            #4f46e5,
            #7c3aed
        );
}

.book-title{

    font-size:16px;

    font-weight:700;

    margin-bottom:5px;
}

.book-category{

    color:#64748b;

    font-size:13px;
}

/* NUMBER */

.number-box{

    width:40px;
    height:40px;

    border-radius:14px;

    display:flex;
    align-items:center;
    justify-content:center;

    background:#eef2ff;

    color:#4f46e5;

    font-weight:700;
}

/* YEAR */

.year-box{

    background:#dbeafe;

    color:#2563eb;

    padding:10px 16px;

    border-radius:14px;

    display:inline-block;

    font-weight:700;
}

/* KATEGORI */

.kategori-badge{

    background:#ede9fe;

    color:#7c3aed;

    padding:10px 16px;

    border-radius:999px;

    font-size:13px;

    font-weight:700;
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

/* RESPONSIVE */

@media(max-width:768px){

    .hero-title{

        font-size:30px;
    }

    .hero-section{

        padding:30px;
    }

    .table-top{

        padding:22px;
    }
}

</style>

<script>

document
.getElementById('searchInput')
.addEventListener('keyup', function(){

    let filter =
        this.value.toLowerCase();

    let rows =
        document.querySelectorAll(
            '#bukuTable tbody tr'
        );

    rows.forEach(row => {

        let text =
            row.innerText.toLowerCase();

        row.style.display =
            text.includes(filter)
            ? ''
            : 'none';

    });

});

</script>

@endsection