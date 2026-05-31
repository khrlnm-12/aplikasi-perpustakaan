@extends('layouts.kepsek')

@section('title', 'Informasi Siswa')

@section('page-title', 'Informasi Siswa')

@section('content')

<!-- HERO -->

<div class="hero-box">

    <div>

        <div class="hero-badge">
            🎓 Sistem Akademik
        </div>

        <h1 class="hero-title">
            Data Seluruh Siswa
        </h1>

        <p class="hero-subtitle">

            Monitoring seluruh data siswa
            perpustakaan sekolah secara realtime.

        </p>

    </div>

    <div class="hero-icon">

        <i class="fa-solid fa-user-graduate"></i>

    </div>

</div>

<!-- SEARCH -->

<div class="search-box">

    <i class="fa-solid fa-magnifying-glass"></i>

    <input type="text"
           id="searchInput"
           placeholder="Cari nama siswa, NIS, atau kelas...">

</div>

<!-- TABLE -->

<div class="table-card">

    <div class="table-header">

        <div>

            <h2>
                👨‍🎓 Informasi Siswa
            </h2>

            <span>
                Total Siswa :
                {{ $siswa->count() }}
            </span>

        </div>

    </div>

    <div class="table-responsive">

        <table class="modern-table"
               id="siswaTable">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>NIS</th>
                    <th>Kelas</th>

                </tr>

            </thead>

            <tbody>

                @forelse($siswa as $item)

                <!-- INI YANG DIPERBAIKI -->
                <tr onclick="window.location='{{ route('kepsek.siswa.detail', $item->nis) }}'"
                    style="cursor:pointer;">

                    <td>

                        <div class="number-box">
                            {{ $loop->iteration }}
                        </div>

                    </td>

                    <td>

                        <div class="student-box">

                            <div class="student-icon">

                                <i class="fa-solid fa-user"></i>

                            </div>

                            <div>

                                <div class="student-name">

                                    {{ $item->nama_siswa }}

                                </div>

                                <div class="student-desc">

                                    Siswa Aktif

                                </div>

                            </div>

                        </div>

                    </td>

                    <td>

                        <span class="nis-box">

                            {{ $item->nis }}

                        </span>

                    </td>

                    <td>

                        <span class="kelas-box">

                            {{ $item->kelas }}

                        </span>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="4">

                        <div class="empty-box">

                            <i class="fa-solid fa-users"></i>

                            <p>
                                Tidak ada data siswa
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

.hero-box{

    display:flex;

    justify-content:space-between;

    align-items:center;

    gap:30px;

    flex-wrap:wrap;

    padding:35px;

    border-radius:35px;

    margin-bottom:30px;

    background:
    linear-gradient(
        135deg,
        rgba(124,58,237,.12),
        rgba(37,99,235,.08)
    );

    border:
    1px solid rgba(255,255,255,.7);
}

.hero-badge{

    display:inline-block;

    padding:10px 18px;

    border-radius:999px;

    background:white;

    color:#7c3aed;

    font-size:14px;

    font-weight:600;

    margin-bottom:18px;

    box-shadow:
    0 10px 20px rgba(0,0,0,.05);
}

.hero-title{

    font-size:42px;

    font-weight:800;

    color:#0f172a;

    margin-bottom:14px;
}

.hero-subtitle{

    color:#64748b;

    line-height:1.8;

    max-width:650px;
}

.hero-icon{

    width:120px;
    height:120px;

    border-radius:30px;

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

    font-size:50px;

    box-shadow:
    0 20px 40px rgba(124,58,237,.2);
}

/* SEARCH */

.search-box{

    display:flex;

    align-items:center;

    gap:14px;

    background:white;

    padding:18px 22px;

    border-radius:22px;

    margin-bottom:30px;

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

    font-size:15px;

    background:none;
}

/* TABLE */

.table-card{

    background:white;

    border-radius:35px;

    overflow:hidden;

    box-shadow:
    0 15px 35px rgba(0,0,0,.05);
}

.table-header{

    padding:30px;

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

    background:#f8fafc;

    color:#475569;

    text-align:left;

    font-size:14px;

    text-transform:uppercase;
}

.modern-table td{

    padding:22px;

    border-bottom:
    1px solid #e2e8f0;

    color:#0f172a;
}

.modern-table tbody tr{

    transition:.3s;
}

/* HOVER KLIK */

.modern-table tbody tr:hover{

    background:#f8fafc;

    transform:scale(1.01);
}

/* STUDENT */

.student-box{

    display:flex;

    align-items:center;

    gap:15px;
}

.student-icon{

    width:55px;
    height:55px;

    border-radius:18px;

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

    margin-bottom:3px;
}

.student-desc{

    color:#64748b;

    font-size:13px;
}

/* BOX */

.number-box,
.nis-box,
.kelas-box{

    display:inline-flex;

    align-items:center;
    justify-content:center;

    padding:10px 16px;

    border-radius:14px;

    font-weight:600;
}

.number-box{

    width:40px;
    height:40px;

    background:#eef2ff;

    color:#4f46e5;
}

.nis-box{

    background:#eff6ff;

    color:#2563eb;
}

.kelas-box{

    background:#ecfdf5;

    color:#16a34a;
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

    .hero-box{

        padding:25px;
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
            '#siswaTable tbody tr'
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