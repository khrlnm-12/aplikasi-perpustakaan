@extends('layouts.petugas')
@section('title', 'Siswa Nonaktif')
@section('content')

<style>

.container{
    max-width:1100px;
    margin:auto;
}

.title{
    margin-bottom:30px;
}

.title h1{
    font-size:38px;
    font-weight:700;
    background:linear-gradient(to right,#f59e0b,#f97316);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.table-wrapper{
    backdrop-filter:blur(18px);
    background:rgba(255,255,255,.06);
    border:1px solid rgba(255,255,255,.08);
    border-radius:28px;
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
    padding:22px;
    text-align:center;
    color:#e2e8f0;
    font-size:14px;
    font-weight:700;
}

td{
    padding:20px;
    text-align:center;
    color:white;
    border-bottom:1px solid rgba(255,255,255,.05);
}

tbody tr{
    transition:.3s;
}

tbody tr:hover{
    background:rgba(255,255,255,.04);
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
}

.btn-aktif{
    width:130px;
    height:40px;

    display:flex;
    align-items:center;
    justify-content:center;

    margin:auto;

    border:none;
    border-radius:12px;

    background:linear-gradient(135deg,#10b981,#059669);

    color:white;
    font-weight:700;
    cursor:pointer;

    transition:.3s;
}

.btn-aktif:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 25px rgba(16,185,129,.35);
}

.alert-success{
    background:linear-gradient(135deg,#10b981,#059669);
    color:white;
    padding:16px;
    border-radius:16px;
    margin-bottom:25px;
    font-weight:600;
}

</style>

<div class="container">

    @if(session('success'))

        <div class="alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="title">

        <h1>⛔ Siswa Nonaktif</h1>

    </div>

    <div class="table-wrapper">

        <table>

            <thead>

                <tr>

                    <th>NIS</th>
                    <th>Nama Siswa</th>
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

                    <form
                        action="/siswa/{{ $s->nis }}/aktifkan"
                        method="POST">

                        @csrf
                        @method('PUT')

                        <button
                            type="submit"
                            class="btn-aktif">

                            ✅ Aktifkan

                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection