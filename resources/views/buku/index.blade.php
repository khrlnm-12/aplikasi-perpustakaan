@extends('layouts.petugas')
@section('title', 'Data Buku')
@section('page-title', '📚 Data Buku')
@section('content')

<style>

.container{
    max-width:1300px;
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
    color:#cbd5e1;
    margin-top:5px;
    font-size:15px;
}

.header-right{
    display:flex;
    gap:12px;
    align-items:center;
    flex-wrap:wrap;
}

/* TOMBOL TAMBAH */
.btn-tambah{
    background:linear-gradient(135deg,#8b5cf6,#3b82f6);
    color:white;
    text-decoration:none;
    padding:14px 24px;
    border-radius:16px;
    font-weight:600;
    transition:.3s;
    box-shadow:0 8px 20px rgba(139,92,246,.35);
}

.btn-tambah:hover{
    transform:translateY(-3px);
}

/* TOMBOL DATA NONAKTIF */
.btn-data-nonaktif{
    background:linear-gradient(135deg,#f59e0b,#d97706);
    color:white;
    text-decoration:none;
    padding:14px 24px;
    border-radius:16px;
    font-weight:600;
    transition:.3s;
    box-shadow:0 8px 20px rgba(245,158,11,.35);
}

.btn-data-nonaktif:hover{
    transform:translateY(-3px);
}

.import-form{
    display:flex;
    gap:10px;
    align-items:center;
    flex-wrap:wrap;
}

.input-file{
    background:rgba(255,255,255,.08);
    border:1px solid rgba(255,255,255,.1);
    color:white;
    padding:10px;
    border-radius:12px;
}

.btn-import{
    background:linear-gradient(135deg,#10b981,#059669);
    color:white;
    border:none;
    padding:12px 18px;
    border-radius:14px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
}

.btn-import:hover{
    transform:translateY(-3px);
}

.alert-success{
    background:#10b981;
    color:white;
    padding:14px;
    border-radius:14px;
    margin-bottom:20px;
}

.search-box{
    margin-bottom:25px;
    display:flex;
    gap:12px;
    flex-wrap:wrap;
}

.search-input{
    flex:1;
    min-width:250px;
    padding:14px 18px;
    border:none;
    border-radius:14px;
    background:rgba(255,255,255,.08);
    color:white;
    outline:none;
}

.search-input::placeholder{
    color:#cbd5e1;
}

.btn-search{
    background:linear-gradient(135deg,#3b82f6,#2563eb);
    border:none;
    color:white;
    padding:14px 22px;
    border-radius:14px;
    font-weight:600;
    cursor:pointer;
}

.table-wrapper{
    backdrop-filter:blur(20px);
    background:rgba(255,255,255,.08);
    border:1px solid rgba(255,255,255,.1);
    border-radius:28px;
    overflow:hidden;
    box-shadow:0 10px 35px rgba(0,0,0,.35);
}

table{
    width:100%;
    border-collapse:collapse;
}

thead{
    background:rgba(255,255,255,.08);
}

th{
    padding:22px 16px;
    text-align:center;
    color:#e2e8f0;
}

td{
    padding:18px 14px;
    text-align:center;
    color:#f8fafc;
    border-bottom:1px solid rgba(255,255,255,.05);
}

tbody tr:hover{
    background:rgba(255,255,255,.04);
}

.judul{
    font-weight:600;
}

.kategori{
    background:rgba(139,92,246,.2);
    color:#e9d5ff;
    padding:8px 14px;
    border-radius:999px;
    font-size:13px;
}

.aksi{
    display:flex;
    flex-direction:column;
    gap:10px;
    align-items:center;
}

/* SEMUA TOMBOL */
.btn-detail,
.btn-edit,
.btn-nonaktif{
    width:120px;
    height:40px;

    display:flex;
    align-items:center;
    justify-content:center;

    text-align:center;
    color:white;
    text-decoration:none;

    border:none;
    border-radius:12px;

    font-size:14px;
    font-weight:600;
    box-sizing:border-box;
    cursor:pointer;

    transition:.3s;
}

/* DETAIL */
.btn-detail{
    background:linear-gradient(135deg,#8b5cf6,#6366f1);
    box-shadow:0 6px 18px rgba(139,92,246,.35);
}

.btn-detail:hover{
    transform:translateY(-3px);
}

/* EDIT */
.btn-edit{
    background:linear-gradient(135deg,#06b6d4,#3b82f6);
    box-shadow:0 6px 18px rgba(59,130,246,.35);
}

.btn-edit:hover{
    transform:translateY(-3px);
}

/* NONAKTIF */
.btn-nonaktif{
    background:linear-gradient(135deg,#f59e0b,#d97706);
    box-shadow:0 6px 18px rgba(245,158,11,.35);
}

.btn-nonaktif:hover{
    transform:translateY(-3px);
}

.empty{
    color:#94a3b8;
}

@media(max-width:900px){

    .table-wrapper{
        overflow-x:auto;
    }

    table{
        min-width:1200px;
    }
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

            <h1>📚 Data Buku</h1>

            <p>
                Kelola koleksi buku perpustakaan
            </p>

        </div>

        <div class="header-right">

            <a href="/buku/nonaktif"
               class="btn-data-nonaktif">

                ⛔ Data Nonaktif

            </a>

            <a href="/buku/create"
               class="btn-tambah">

                + Tambah Buku

            </a>

            <form action="{{ route('buku.import') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="import-form">

                @csrf

                <input
                    type="file"
                    name="file"
                    required
                    class="input-file">

                <button
                    type="submit"
                    class="btn-import">

                    ⬆ Import CSV

                </button>

            </form>

        </div>

    </div>

    {{-- SEARCH --}}
    <form action="{{ route('buku.index') }}" method="GET">

        <div class="search-box">

            <input
                type="text"
                name="search"
                class="search-input"
                placeholder="Cari judul, pengarang, penerbit..."
                value="{{ request('search') }}">

            <button
                type="submit"
                class="btn-search">

                🔍 Cari

            </button>

        </div>

    </form>

    <div class="table-wrapper">

        <table>

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Kategori</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

            @forelse($buku as $b)

            <tr>

                <td>

                    {{ $b->id_buku }}

                </td>

                <td class="judul">

                    {{ $b->judul_buku }}

                </td>

                <td class="judul">

                    {{ $b->pengarang }}

                </td>

                <td>

                    <span class="kategori">

                        {{ $b->kategori->nama_kategori }}

                    </span>

                </td>

                <td>

                    <div class="aksi">

                        <a href="{{ route('buku.show', $b->id_buku) }}"
                           class="btn-detail">

                            📖 Detail

                        </a>

                        <a href="/buku/{{ $b->id_buku }}/edit"
                           class="btn-edit">

                            ✏ Edit

                        </a>

                        <form
                            action="/buku/{{ $b->id_buku }}"
                            method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn-nonaktif"
                                onclick="return confirm('Yakin ingin menonaktifkan buku ini?')">

                                ⛔ Nonaktif

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="5">

                    <span class="empty">

                        Belum ada data buku

                    </span>

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection