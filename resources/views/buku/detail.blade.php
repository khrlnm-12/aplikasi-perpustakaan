@php

    $layout = 'layouts.petugas';

    if(session('role') == 'siswa')
    {
        $layout = 'layouts.siswa';
    }

@endphp

@extends($layout)

@section('title', 'Detail Buku')

@section('content')

<style>

.detail-wrapper{

    display:flex;

    justify-content:center;

    align-items:center;

    padding:40px 20px;
}

.detail-card{

    width:100%;

    max-width:850px;

    background:white;

    border-radius:35px;

    padding:45px;

    box-shadow:
        0 15px 40px rgba(0,0,0,0.08);

    text-align:center;
}

.cover{

    width:220px;

    height:300px;

    object-fit:cover;

    border-radius:25px;

    margin-bottom:25px;

    box-shadow:
        0 10px 30px rgba(0,0,0,0.15);
}

.detail-title{

    font-size:42px;

    font-weight:800;

    color:#0f172a;

    margin-bottom:25px;
}

.detail-info{

    margin-top:20px;
}

.detail-info p{

    font-size:18px;

    color:#334155;

    margin-bottom:16px;

    line-height:1.8;
}

.detail-info b{

    color:#0f172a;
}

.deskripsi{

    margin-top:25px;

    background:#f8fafc;

    padding:20px;

    border-radius:20px;

    color:#475569;

    line-height:1.8;
}

/* QR SECTION */

.qr-section{

    margin-top:40px;
}

.qr-title{

    font-size:24px;

    font-weight:700;

    color:#0f172a;

    margin-bottom:20px;
}

.qr{

    background:white;

    padding:20px;

    border-radius:20px;

    display:inline-block;

    box-shadow:
        0 10px 30px rgba(0,0,0,0.12);
}

.btn-transaksi{

    display:inline-block;

    margin-top:25px;

    padding:14px 28px;

    border-radius:16px;

    background:
        linear-gradient(
            135deg,
            #10b981,
            #059669
        );

    color:white;

    text-decoration:none;

    font-weight:700;

    transition:0.3s;
}

.btn-transaksi:hover{

    transform:translateY(-3px);

    opacity:0.9;
}

/* BUTTON KEMBALI */

.btn-kembali{

    display:inline-block;

    margin-top:35px;

    padding:14px 28px;

    border-radius:16px;

    background:
        linear-gradient(
            135deg,
            #4f46e5,
            #7c3aed
        );

    color:white;

    text-decoration:none;

    font-weight:700;

    transition:0.3s;
}

.btn-kembali:hover{

    transform:translateY(-3px);

    opacity:0.9;
}

/* RESPONSIVE */

@media(max-width:768px){

    .detail-card{

        padding:30px 20px;
    }

    .detail-title{

        font-size:30px;
    }

    .cover{

        width:180px;

        height:240px;
    }

    .detail-info p{

        font-size:16px;
    }
}

</style>

<div class="detail-wrapper">

    <div class="detail-card">

        @if($buku->cover)

            <img
                src="{{ asset('storage/' . $buku->cover) }}"
                class="cover">

        @endif

        <h1 class="detail-title">

            {{ $buku->judul_buku }}

        </h1>

        <div class="detail-info">

            <p>

                <b>Pengarang :</b>

                {{ $buku->pengarang }}

            </p>

            <p>

                <b>Penerbit :</b>

                {{ $buku->penerbit }}

            </p>

            <p>

                <b>Tahun Terbit :</b>

                {{ $buku->tahun_terbit }}

            </p>

            <p>

                <b>Kategori :</b>

                {{ $buku->kategori->nama_kategori ?? '-' }}

            </p>

        </div>

        <div class="deskripsi">

            <b>Deskripsi Buku</b>

            <br><br>

            {{ $buku->deskripsi ?? 'Tidak ada deskripsi buku.' }}

        </div>

        {{-- QR & TRANSAKSI HANYA UNTUK PETUGAS DAN SISWA --}}

        @if(
            session('role') == 'petugas' ||
            session('role') == 'siswa'
        )

            <div class="qr-section">

                <h3 class="qr-title">

                    QR Code Buku

                </h3>

                <div class="qr">

                    {!! QrCode::size(220)->generate($buku->qr_code) !!}

                </div>

                <br>
            </div>

        @endif

        <a href="{{ url()->previous() }}"
           class="btn-kembali">

            ← Kembali

        </a>

    </div>

</div>

@endsection