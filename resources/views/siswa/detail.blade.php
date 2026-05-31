@extends('layouts.petugas')

@section('title', 'Detail Siswa')

@section('content')

<style>

    .detail-container{
        max-width:1100px;
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
        color:#cbd5e1;
        font-size:15px;
    }

    .profile-card{
        background:rgba(255,255,255,.06);
        backdrop-filter:blur(20px);
        border:1px solid rgba(255,255,255,.08);
        border-radius:35px;
        padding:40px;
        box-shadow:0 15px 45px rgba(0,0,0,.35);
        margin-bottom:30px;
    }

    .profile-top{
        display:flex;
        align-items:center;
        gap:30px;
        flex-wrap:wrap;
    }

    .avatar{
        width:130px;
        height:130px;
        border-radius:30px;
        background:linear-gradient(135deg,#8b5cf6,#3b82f6);
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:55px;
        color:white;
        box-shadow:0 10px 30px rgba(139,92,246,.35);
    }

    .profile-info h2{
        font-size:42px;
        color:white;
        margin-bottom:10px;
        font-weight:800;
    }

    .profile-info p{
        color:#cbd5e1;
        font-size:16px;
    }

    .badge{
        display:inline-block;
        background:rgba(139,92,246,.15);
        color:#c4b5fd;
        padding:10px 18px;
        border-radius:14px;
        font-weight:700;
        margin-bottom:18px;
    }

    .detail-grid{
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
        gap:20px;
    }

    .detail-box{
        background:rgba(255,255,255,.05);
        border:1px solid rgba(255,255,255,.06);
        border-radius:22px;
        padding:25px;
        transition:.3s;
    }

    .detail-box:hover{
        transform:translateY(-5px);
        background:rgba(255,255,255,.07);
    }

    .detail-box h4{
        color:#94a3b8;
        margin-bottom:14px;
        font-size:14px;
        font-weight:600;
    }

    .detail-box p{
        color:white;
        font-size:24px;
        font-weight:700;
    }

    .alamat-box{
        margin-top:20px;
    }

    .btn-kembali{
        display:inline-flex;
        align-items:center;
        gap:8px;
        background:linear-gradient(135deg,#8b5cf6,#3b82f6);
        color:white;
        text-decoration:none;
        padding:14px 24px;
        border-radius:16px;
        font-weight:700;
        box-shadow:0 10px 25px rgba(139,92,246,.3);
        transition:.3s;
    }

    .btn-kembali:hover{
        transform:translateY(-3px);
    }

</style>

<div class="detail-container">

    <div class="detail-header">
        <h1>🎓 Detail Siswa</h1>
        <p>Informasi lengkap siswa perpustakaan</p>
    </div>

    <div class="profile-card">

        <div class="profile-top">

            <div class="avatar">
                👨‍🎓
            </div>

            <div class="profile-info">

                <div class="badge">
                    📘 Informasi Siswa
                </div>

                <h2>{{ $siswa->nama_siswa }}</h2>

                <p>
                    Detail lengkap data siswa perpustakaan
                </p>

            </div>

        </div>

    </div>

    <div class="detail-grid">

        <div class="detail-box">
            <h4>NIS</h4>
            <p>{{ $siswa->nis }}</p>
        </div>

        <div class="detail-box">
            <h4>Kelas</h4>
            <p>{{ $siswa->kelas }}</p>
        </div>

        <div class="detail-box">
            <h4>Jenis Kelamin</h4>

            <p>
                @if($siswa->jenis_kelamin == 'L')
                    👦 Laki-laki
                @else
                    👧 Perempuan
                @endif
            </p>
        </div>

        <div class="detail-box">
            <h4>No Telepon</h4>
            <p>{{ $siswa->no_telepon }}</p>
        </div>

        <div class="detail-box">
            <h4>Email</h4>
            <p>{{ $siswa->email }}</p>
        </div>

    </div>

    <div class="detail-box alamat-box">
        <h4>Alamat</h4>
        <p>{{ $siswa->alamat }}</p>
    </div>

    <br>

    <a href="/siswa" class="btn-kembali">
        ← Kembali
    </a>

</div>

@endsection