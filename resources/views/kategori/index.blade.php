@extends('layouts.petugas')
@section('title', 'Data Kategori')
@section('content')

<style>

.container{
    max-width:1100px;
    margin:auto;
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
    gap:20px;
    flex-wrap:wrap;
}

.title h1{
    font-size:38px;
    font-weight:700;
    background:linear-gradient(to right,#c084fc,#60a5fa);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.title p{
    margin-top:8px;
    color:#cbd5e1;
    font-size:14px;
}

.header-right{
    display:flex;
    gap:14px;
    align-items:center;
    flex-wrap:wrap;
}

/* TOMBOL TAMBAH */
.btn-tambah{
    background:linear-gradient(135deg,#8b5cf6,#3b82f6);
    color:white;
    text-decoration:none;
    padding:14px 22px;
    border-radius:16px;
    font-weight:600;
    transition:.3s;
    box-shadow:0 8px 20px rgba(139,92,246,.4);
}

.btn-tambah:hover{
    transform:translateY(-3px);
}

/* TOMBOL DATA NONAKTIF */
.btn-data-nonaktif{
    background:linear-gradient(135deg,#f59e0b,#d97706);
    color:white;
    text-decoration:none;
    padding:14px 22px;
    border-radius:16px;
    font-weight:600;
    transition:.3s;
    box-shadow:0 8px 20px rgba(245,158,11,.35);
}

.btn-data-nonaktif:hover{
    transform:translateY(-3px);
}

.table-wrapper{
    backdrop-filter:blur(18px);
    background:rgba(255,255,255,.08);
    border:1px solid rgba(255,255,255,.1);
    border-radius:28px;
    overflow:hidden;
    box-shadow:0 10px 40px rgba(0,0,0,.35);
}

table{
    width:100%;
    border-collapse:collapse;
}

thead{
    background:rgba(255,255,255,.08);
}

th{
    padding:22px;
    text-align:center;
    color:#e2e8f0;
    font-size:14px;
    letter-spacing:1px;
}

td{
    padding:20px;
    text-align:center;
    border-bottom:1px solid rgba(255,255,255,.05);
    color:white;
}

tr:hover{
    background:rgba(255,255,255,.05);
}

.id-badge{
    background:rgba(59,130,246,.15);
    color:#93c5fd;
    padding:8px 14px;
    border-radius:12px;
    font-weight:600;
    display:inline-block;
}

.kategori-badge{
    background:rgba(139,92,246,.2);
    border:1px solid rgba(192,132,252,.4);
    color:#f3e8ff;
    padding:10px 18px;
    border-radius:999px;
    display:inline-block;
    font-weight:500;
}

.aksi{
    display:flex;
    justify-content:center;
    gap:12px;
}

/* TOMBOL EDIT */
.btn-edit{
    width:120px;
    height:42px;

    display:flex;
    align-items:center;
    justify-content:center;

    background:linear-gradient(135deg,#06b6d4,#3b82f6);
    color:white;
    text-decoration:none;
    border-radius:12px;
    font-size:14px;
    font-weight:600;

    box-shadow:0 6px 18px rgba(59,130,246,.35);

    transition:.3s;
}

.btn-edit:hover{
    transform:translateY(-3px);
}

/* TOMBOL NONAKTIF */
.btn-nonaktif{
    width:120px;
    height:42px;

    display:flex;
    align-items:center;
    justify-content:center;

    background:linear-gradient(135deg,#f59e0b,#d97706);
    color:white;
    border:none;
    border-radius:12px;
    font-size:14px;
    font-weight:600;
    cursor:pointer;

    box-shadow:0 6px 18px rgba(245,158,11,.35);

    transition:.3s;
}

.btn-nonaktif:hover{
    transform:translateY(-3px);
}

.alert-success{
    background:linear-gradient(135deg,#10b981,#059669);
    color:white;
    padding:16px;
    border-radius:16px;
    margin-bottom:25px;
    font-weight:600;
    box-shadow:0 8px 25px rgba(16,185,129,.25);
}

</style>

<div class="container">

    @if(session('success'))

        <div class="alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="header">

        <div class="title">

            <h1>🏷 Data Kategori</h1>

            <p>
                Kelola kategori buku
            </p>

        </div>

        <div class="header-right">

            <a href="/kategori/nonaktif"
               class="btn-data-nonaktif">

                ⛔ Data Nonaktif

            </a>

            <a href="/kategori/create"
               class="btn-tambah">

                + Tambah Kategori

            </a>

        </div>

    </div>

    <div class="table-wrapper">

        <table>

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

            @foreach($kategori as $k)

            <tr>

                <td>

                    <span class="id-badge">

                        {{ $k->id_kategori }}

                    </span>

                </td>

                <td>

                    <span class="kategori-badge">

                        {{ $k->nama_kategori }}

                    </span>

                </td>

                <td>

                    <div class="aksi">

                        <a href="/kategori/{{ $k->id_kategori }}/edit"
                           class="btn-edit">

                            ✏ Edit

                        </a>

                        <form action="/kategori/{{ $k->id_kategori }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn-nonaktif"
                                    onclick="return confirm('Yakin ingin menonaktifkan kategori ini?')">

                                ⛔ Nonaktif

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection