@extends('layouts.kepsek')

@section('title', 'Detail Buku')

@section('page-title', 'Detail Buku')

@section('content')

<div class="detail-container">

    <!-- HEADER -->

    <div class="detail-header">

        <div class="book-icon">

            <i class="fa-solid fa-book"></i>

        </div>

        <div>

            <div class="badge-detail">
                📚 Informasi Buku
            </div>

            <h1 class="book-title">

                {{ $buku->judul_buku }}

            </h1>

            <p class="book-subtitle">

                Detail lengkap data buku perpustakaan

            </p>

        </div>

    </div>

    <!-- COVER -->

    @if($buku->cover)

    <div class="cover-wrapper">

        <img
            src="{{ asset('storage/' . $buku->cover) }}"
            class="book-cover">

    </div>

    @endif

    <!-- CONTENT -->

    <div class="detail-card">

        <div class="detail-item">

            <span>Judul Buku</span>

            <h3>{{ $buku->judul_buku }}</h3>

        </div>

        <div class="detail-item">

            <span>Pengarang</span>

            <h3>{{ $buku->pengarang }}</h3>

        </div>

        <div class="detail-item">

            <span>Penerbit</span>

            <h3>{{ $buku->penerbit }}</h3>

        </div>

        <div class="detail-item">

            <span>Tahun Terbit</span>

            <h3>{{ $buku->tahun_terbit }}</h3>

        </div>

        <div class="detail-item">

            <span>Kategori</span>

            <h3>

                {{ $buku->kategori->nama_kategori ?? '-' }}

            </h3>

        </div>

        <div class="detail-item">

            <span>Deskripsi</span>

            <h3>

                {{ $buku->deskripsi ?? 'Tidak ada deskripsi buku' }}

            </h3>

        </div>

    </div>

    <!-- BUTTON -->

    <a href="{{ route('kepsek.buku') }}"
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

.book-icon{

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

.book-title{

    font-size:38px;

    font-weight:800;

    color:#0f172a;

    margin-bottom:10px;
}

.book-subtitle{

    color:#64748b;

    line-height:1.7;
}

/* COVER */

.cover-wrapper{

    display:flex;

    justify-content:center;

    margin-bottom:35px;
}

.book-cover{

    width:260px;

    height:360px;

    object-fit:cover;

    border-radius:28px;

    box-shadow:
    0 20px 40px rgba(0,0,0,.15);

    transition:.3s;
}

.book-cover:hover{

    transform:scale(1.03);
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

    .book-title{

        font-size:28px;
    }

    .book-cover{

        width:200px;

        height:290px;
    }
}

</style>

@endsection