@extends('layouts.petugas')
@section('title', 'Data Siswa')
@section('content')

<style>

.container{
    max-width:1250px;
    margin:auto;
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:35px;
    gap:20px;
    flex-wrap:wrap;
}

.title h1{
    font-size:42px;
    font-weight:800;
    background:linear-gradient(to right,#c084fc,#60a5fa);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
    margin-bottom:8px;
}

.title p{
    color:#cbd5e1;
    font-size:15px;
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
    padding:14px 24px;
    border-radius:18px;
    font-weight:700;
    box-shadow:0 10px 25px rgba(139,92,246,.35);
    transition:.3s;
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
    border-radius:18px;
    font-weight:700;
    box-shadow:0 10px 25px rgba(245,158,11,.35);
    transition:.3s;
}

.btn-data-nonaktif:hover{
    transform:translateY(-3px);
}

.import-form{
    display:flex;
    gap:12px;
    align-items:center;
    flex-wrap:wrap;
}

.input-file{
    background:rgba(255,255,255,.06);
    border:1px solid rgba(255,255,255,.08);
    color:white;
    padding:12px;
    border-radius:14px;
}

.btn-import{
    background:linear-gradient(135deg,#10b981,#059669);
    color:white;
    border:none;
    padding:12px 20px;
    border-radius:14px;
    cursor:pointer;
    font-weight:700;
    transition:.3s;
    box-shadow:0 8px 20px rgba(16,185,129,.25);
}

.btn-import:hover{
    transform:translateY(-3px);
}

.table-wrapper{
    backdrop-filter:blur(18px);
    background:rgba(255,255,255,.06);
    border:1px solid rgba(255,255,255,.08);
    border-radius:30px;
    overflow:hidden;
    box-shadow:0 15px 45px rgba(0,0,0,.35);
}

table{
    width:100%;
    border-collapse:collapse;
}

thead{
    background:rgba(255,255,255,.05);
}

th{
    padding:24px;
    color:#e2e8f0;
    font-size:14px;
    text-align:center;
    font-weight:700;
}

td{
    padding:22px;
    text-align:center;
    color:white;
    border-bottom:1px solid rgba(255,255,255,.05);
}

tbody tr{
    transition:.3s;
}

tbody tr:hover{
    background:rgba(255,255,255,.04);
    transform:scale(1.005);
}

.badge{
    background:rgba(59,130,246,.15);
    color:#93c5fd;
    padding:10px 16px;
    border-radius:14px;
    font-weight:700;
    display:inline-block;
}

.nama{
    font-weight:700;
    font-size:15px;
}

.kelas{
    background:rgba(139,92,246,.12);
    color:#c4b5fd;
    padding:8px 14px;
    border-radius:12px;
    display:inline-block;
    font-weight:600;
}

.aksi{
    display:flex;
    flex-direction:column;
    gap:12px;
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

    border-radius:14px;
    text-decoration:none;
    border:none;
    color:white;
    font-size:14px;
    font-weight:700;
    cursor:pointer;
    transition:all .3s ease;
    box-sizing:border-box;
}

/* DETAIL */
.btn-detail{
    background:linear-gradient(135deg,#8b5cf6,#7c3aed);
    box-shadow:0 6px 18px rgba(139,92,246,.35);
}

.btn-detail:hover{
    transform:translateY(-3px) scale(1.03);
    box-shadow:0 12px 24px rgba(139,92,246,.45);
}

/* EDIT */
.btn-edit{
    background:linear-gradient(135deg,#06b6d4,#3b82f6);
    box-shadow:0 6px 18px rgba(59,130,246,.35);
}

.btn-edit:hover{
    transform:translateY(-3px) scale(1.03);
    box-shadow:0 12px 24px rgba(59,130,246,.45);
}

/* NONAKTIF */
.btn-nonaktif{
    background:linear-gradient(135deg,#f59e0b,#d97706);
    box-shadow:0 6px 18px rgba(245,158,11,.35);
}

.btn-nonaktif:hover{
    transform:translateY(-3px) scale(1.03);
    box-shadow:0 12px 24px rgba(245,158,11,.45);
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

            <h1>🎓 Data Siswa</h1>

            <p>
                Kelola data siswa perpustakaan dengan tampilan modern
            </p>

        </div>

        <div class="header-right">

            <a href="/siswa/nonaktif"
               class="btn-data-nonaktif">

                ⛔ Data Nonaktif

            </a>

            <a href="/siswa/create"
               class="btn-tambah">

                + Tambah Siswa

            </a>

            <form action="{{ route('siswa.import') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="import-form">

                @csrf

                <input type="file"
                       name="file"
                       class="input-file"
                       required>

                <button type="submit"
                        class="btn-import">

                    ⬆ Import CSV

                </button>

            </form>

        </div>

    </div>

    <div class="table-wrapper">

        <table>

            <thead>

                <tr>

                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

            @foreach($siswa as $s)

            <tr>

                <td>

                    <span class="badge">

                        {{ $s->nis }}

                    </span>

                </td>

                <td>

                    <div class="nama">

                        {{ $s->nama_siswa }}

                    </div>

                </td>

                <td>

                    <span class="kelas">

                        {{ $s->kelas }}

                    </span>

                </td>

                <td>

                    <div class="aksi">

                        <a href="/siswa/{{ $s->nis }}"
                           class="btn-detail">

                            👁 Detail

                        </a>

                        <a href="/siswa/{{ $s->nis }}/edit"
                           class="btn-edit">

                            ✏ Edit

                        </a>

                        <form action="/siswa/{{ $s->nis }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn-nonaktif"
                                    onclick="return confirm('Yakin ingin menonaktifkan siswa ini?')">

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
