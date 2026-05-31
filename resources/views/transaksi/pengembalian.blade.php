@extends('layouts.petugas')

@section('title', 'Pengembalian Buku')

@section('content')

<style>

    .pengembalian-container{

        max-width:900px;

        margin:auto;
    }

    .card-box{

        background:
        rgba(255,255,255,.08);

        border:1px solid rgba(255,255,255,.08);

        backdrop-filter:blur(18px);

        border-radius:30px;

        padding:35px;

        box-shadow:
        0 10px 35px rgba(0,0,0,.25);
    }

    .title{

        font-size:34px;

        font-weight:800;

        color:white;

        margin-bottom:30px;
    }

    .detail-box{

        display:grid;

        grid-template-columns:
        repeat(auto-fit,minmax(250px,1fr));

        gap:20px;

        margin-bottom:30px;
    }

    .detail-item{

        background:
        rgba(255,255,255,.05);

        border-radius:20px;

        padding:20px;
    }

    .detail-item h5{

        color:#94a3b8;

        margin-bottom:10px;

        font-size:14px;
    }

    .detail-item p{

        color:white;

        font-size:20px;

        font-weight:700;
    }

    .form-group{

        margin-bottom:25px;
    }

    .form-group label{

        display:block;

        color:white;

        margin-bottom:12px;

        font-weight:600;
    }

    .form-control{

        width:100%;

        padding:16px;

        border:none;

        outline:none;

        border-radius:16px;

        background:
        rgba(255,255,255,.08);

        color:white;

        font-size:15px;
    }

    .form-control option{

        color:black;
    }

    .btn-submit{

        border:none;

        padding:16px 28px;

        border-radius:16px;

        background:
        linear-gradient(
            135deg,
            #8b5cf6,
            #2563eb
        );

        color:white;

        font-weight:700;

        cursor:pointer;

        transition:.3s;
    }

    .btn-submit:hover{

        transform:translateY(-3px);
    }

</style>

<div class="pengembalian-container">

    <div class="card-box">

        <div class="title">

            📚 Form Pengembalian Buku

        </div>

        <!-- DETAIL TRANSAKSI -->

        <div class="detail-box">

            <div class="detail-item">

                <h5>Nama Siswa</h5>

                <p>
                    {{ $transaksi->siswa->nama_siswa }}
                </p>

            </div>

            <div class="detail-item">

                <h5>Judul Buku</h5>

                <p>
                    {{ $transaksi->buku->judul_buku }}
                </p>

            </div>

            <div class="detail-item">

                <h5>Tanggal Pinjam</h5>

                <p>
                    {{ $transaksi->tanggal_pinjam }}
                </p>

            </div>

            <div class="detail-item">

                <h5>Status</h5>

                <p>
                    {{ ucfirst($transaksi->status) }}
                </p>

            </div>

        </div>

        <!-- FORM -->

        <form action="/pengembalian/{{ $transaksi->id_transaksi }}"
              method="POST">

            @csrf

            @php

    $telat =
        now()->gt(
            \Carbon\Carbon::parse(
                $transaksi->tanggal_kembali
            )
        );

@endphp

@if($telat)

<div class="form-group">

    <label>

        ⚠️ Siswa Terlambat,
        Pilih Sanksi

    </label>

    <select name="id_sanksi"
            class="form-control"
            required>

        <option value="">
            -- Pilih Sanksi --
        </option>

        @foreach($sanksi as $s)

        <option value="{{ $s->id_sanksi }}">

            {{ $s->jenis_sanksi }}

        </option>

        @endforeach

    </select>

</div>

@else

<div style="
    background:rgba(34,197,94,.15);
    color:#86efac;
    padding:18px;
    border-radius:18px;
    margin-bottom:25px;
    font-weight:600;
">

    ✅ Buku dikembalikan tepat waktu,
    tidak ada sanksi.

</div>

@endif

                </select>

            </div>

            <button type="submit"
                    class="btn-submit">

                ✅ Proses Pengembalian

            </button>

        </form>

    </div>

</div>

@endsection