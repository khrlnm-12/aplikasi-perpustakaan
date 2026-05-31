@extends('layouts.petugas')
@section('title', 'Kategori Nonaktif')
@section('content')

<style>

.container{
    max-width:1000px;
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
    background:rgba(255,255,255,.06);
    border:1px solid rgba(255,255,255,.08);
    border-radius:24px;
    overflow:hidden;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    padding:20px;
    background:rgba(255,255,255,.05);
    color:#e2e8f0;
}

td{
    padding:18px;
    text-align:center;
    color:white;
    border-bottom:1px solid rgba(255,255,255,.05);
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
}

.alert-success{
    background:#10b981;
    color:white;
    padding:14px;
    border-radius:14px;
    margin-bottom:20px;
}

</style>

<div class="container">

    @if(session('success'))

        <div class="alert-success">
            {{ session('success') }}
        </div>

    @endif

    <div class="title">

        <h1>🏷 Kategori Nonaktif</h1>

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

                    <td>{{ $k->id_kategori }}</td>

                    <td>{{ $k->nama_kategori }}</td>

                    <td>

                        <form
                            action="/kategori/{{ $k->id_kategori }}/aktifkan"
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