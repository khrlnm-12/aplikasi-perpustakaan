@extends('layouts.kepsek')

@section('title', 'Detail Siswa')

@section('page-title', 'Detail Siswa')

@section('content')

<div class="detail-container">

    <!-- HEADER -->

    <div class="detail-header">

        <div class="student-avatar">

            <i class="fa-solid fa-user-graduate"></i>

        </div>

        <div>

            <div class="badge-detail">
                👨‍🎓 Informasi Siswa
            </div>

            <h1 class="student-name">

                {{ $siswa->nama_siswa }}

            </h1>

            <p class="student-subtitle">

                Detail lengkap data siswa perpustakaan

            </p>

        </div>

    </div>

    <!-- CONTENT -->

    <div class="detail-card">

        <div class="detail-item">

            <span>NIS</span>

            <h3>{{ $siswa->nis }}</h3>

        </div>

        <div class="detail-item">

            <span>Kelas</span>

            <h3>{{ $siswa->kelas }}</h3>

        </div>

        <div class="detail-item">

            <span>jenis Kelamin</span>

            <h3>{{ $siswa->jenis_kelamin }}</h3>

        </div>

        <div class="detail-item">

            <span>Email</span>

            <h3>{{ $siswa->email }}</h3>

        </div>

        <div class="detail-item">

            <span>No Telepon</span>

            <h3>{{ $siswa->no_telepon }}</h3>

        </div>

        <div class="detail-item full-width">

            <span>Alamat</span>

            <h3>{{ $siswa->alamat }}</h3>

        </div>

    </div>

    <!-- BUTTON -->

    <a href="{{ route('kepsek.siswa') }}"
       class="back-button">

        <i class="fa-solid fa-arrow-left"></i>

        Kembali

    </a>

</div>

<style>

/* CONTAINER */

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

.student-avatar{

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

    box-shadow:
    0 20px 40px rgba(124,58,237,.2);
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

.student-name{

    font-size:38px;

    font-weight:800;

    color:#0f172a;

    margin-bottom:10px;
}

.student-subtitle{

    color:#64748b;

    line-height:1.7;
}

/* CARD */

.detail-card{

    background:white;

    border-radius:30px;

    padding:35px;

    box-shadow:
    0 15px 35px rgba(0,0,0,.05);

    display:grid;

    grid-template-columns:
    repeat(auto-fit, minmax(250px,1fr));

    gap:25px;

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

    transform:translateY(-5px);

    box-shadow:
    0 10px 25px rgba(0,0,0,.05);
}

.detail-item span{

    display:block;

    font-size:14px;

    color:#64748b;

    margin-bottom:10px;
}

.detail-item h3{

    color:#0f172a;

    font-size:20px;

    font-weight:700;

    line-height:1.6;
}

/* FULL WIDTH */

.full-width{

    grid-column:1/-1;
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

    box-shadow:
    0 15px 30px rgba(124,58,237,.2);

    transition:.3s;
}

.back-button:hover{

    transform:translateY(-3px);
}

/* RESPONSIVE */

@media(max-width:768px){

    .detail-header{

        flex-direction:column;

        text-align:center;
    }

    .student-name{

        font-size:28px;
    }
}

</style>

@endsection