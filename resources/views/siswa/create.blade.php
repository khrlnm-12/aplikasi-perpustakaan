@extends('layouts.petugas')

@section('title', 'Tambah Siswa')

@section('content')

<style>

    .form-container{
        max-width:750px;
        margin:auto;
    }

    .card{
        backdrop-filter:blur(18px);
        background:rgba(255,255,255,0.08);
        border:1px solid rgba(255,255,255,0.1);
        border-radius:30px;
        padding:40px;
        box-shadow:0 10px 40px rgba(0,0,0,0.4);
        color:white;
    }

    .header{
        text-align:center;
        margin-bottom:35px;
    }

    .header h1{
        font-size:36px;
        font-weight:700;
        background:linear-gradient(to right, #c084fc, #60a5fa);
        -webkit-background-clip:text;
        -webkit-text-fill-color:transparent;
    }

    .header p{
        color:#cbd5e1;
        margin-top:8px;
        font-size:14px;
    }

    .form-group{
        margin-bottom:24px;
    }

    label{
        display:block;
        margin-bottom:10px;
        font-size:15px;
        font-weight:500;
        color:#f1f5f9;
    }

    input,
    select,
    textarea{
        width:100%;
        padding:15px 18px;
        border:none;
        outline:none;
        border-radius:16px;
        background:rgba(255,255,255,0.08);
        border:1px solid rgba(255,255,255,0.08);
        color:white;
        font-size:15px;
        transition:0.3s;
    }

    input:focus,
    select:focus,
    textarea:focus{
        border:1px solid #8b5cf6;
        box-shadow:0 0 15px rgba(139,92,246,0.4);
        background:rgba(255,255,255,0.12);
    }

    textarea{
        resize:none;
        min-height:120px;
    }

    input::placeholder,
    textarea::placeholder{
        color:#cbd5e1;
    }

    select option{
        background:#1e293b;
        color:white;
    }

    .btn{
        width:100%;
        padding:16px;
        border:none;
        border-radius:18px;
        background:linear-gradient(135deg, #8b5cf6, #3b82f6);
        color:white;
        font-size:16px;
        font-weight:600;
        cursor:pointer;
        transition:0.3s;
        box-shadow:0 8px 20px rgba(139,92,246,0.4);
    }

    .btn:hover{
        transform:translateY(-3px);
        box-shadow:0 10px 25px rgba(59,130,246,0.5);
    }

</style>

<div class="form-container">

    <div class="card">

        <div class="header">

            <h1>🎓 Tambah Siswa</h1>

            <p>
                Tambahkan data siswa baru ke sistem perpustakaan
            </p>

        </div>

        <form action="/siswa" method="POST">

            @csrf

            <div class="form-group">

                <label>NIS</label>

                <input type="text"
                       name="nis"
                       placeholder="Masukkan NIS">

            </div>

            <div class="form-group">

                <label>Nama Siswa</label>

                <input type="text"
                       name="nama_siswa"
                       placeholder="Masukkan nama siswa">

            </div>

            <div class="form-group">

                <label>Jenis Kelamin</label>

                <select name="jenis_kelamin">

                    <option value="L">
                        Laki-laki
                    </option>

                    <option value="P">
                        Perempuan
                    </option>

                </select>

            </div>

            <div class="form-group">

                <label>Kelas</label>

                <input type="text"
                       name="kelas"
                       placeholder="Masukkan kelas">

            </div>

            <div class="form-group">

                <label>No Telepon</label>

                <input type="text"
                       name="no_telepon"
                       placeholder="Masukkan nomor telepon">

            </div>

            <div class="form-group">

                <label>Alamat</label>

                <textarea name="alamat"
                          placeholder="Masukkan alamat"></textarea>

            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email"
                name="email"
                placeholder="Masukkan email">
            </div>
            
            <button type="submit" class="btn">
                💾 Simpan Siswa
            </button>

        </form>

    </div>

</div>

@endsection