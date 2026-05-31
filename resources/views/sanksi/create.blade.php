@extends('layouts.petugas')

@section('title', 'Tambah Sanksi')

@section('page-title', 'Tambah Sanksi')

@section('content')

<style>

.form-card{

    max-width:700px;

    margin:auto;

    background:
    rgba(255,255,255,.08);

    border:1px solid rgba(255,255,255,.08);

    backdrop-filter:blur(18px);

    border-radius:30px;

    padding:40px;

    box-shadow:
    0 10px 35px rgba(0,0,0,.25);
}

.form-title{

    font-size:30px;

    font-weight:700;

    margin-bottom:30px;

    color:white;
}

.form-label{

    display:block;

    margin-bottom:10px;

    color:#cbd5e1;

    font-weight:600;
}

.form-control{

    width:100%;

    padding:16px;

    border:none;

    border-radius:16px;

    background:
    rgba(255,255,255,.08);

    color:white;

    margin-bottom:25px;
}

.form-control:focus{

    outline:none;

    border:
    1px solid #8b5cf6;
}

.btn-submit{

    background:
    linear-gradient(
        135deg,
        #8b5cf6,
        #3b82f6
    );

    border:none;

    padding:14px 24px;

    border-radius:16px;

    color:white;

    font-weight:700;

    cursor:pointer;
}

</style>

<div class="form-card">

    <div class="form-title">

        ⚠️ Tambah Sanksi

    </div>

    <form action="/sanksi"
          method="POST">

        @csrf

        <label class="form-label">

            Jenis Sanksi

        </label>

        <input
            type="text"
            name="jenis_sanksi"
            class="form-control"
            placeholder="Masukkan jenis sanksi"
            required>

        <button
            type="submit"
            class="btn-submit">

            Simpan

        </button>

    </form>

</div>

@endsection