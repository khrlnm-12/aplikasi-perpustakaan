@extends('layouts.app')

@section('title', 'Ubah Password')

@php

/*
|--------------------------------------------------------------------------
| WARNA BERDASARKAN ROLE
|--------------------------------------------------------------------------
*/

if(session('role') == 'siswa'){

    $gradient =
    'linear-gradient(135deg,#16a34a,#22c55e)';

    $focus =
    '#22c55e';

    $shadow =
    'rgba(34,197,94,.25)';

}
elseif(session('role') == 'petugas'){

    $gradient =
    'linear-gradient(135deg,#4338ca,#2563eb)';

    $focus =
    '#2563eb';

    $shadow =
    'rgba(37,99,235,.25)';

}
else{

    $gradient =
    'linear-gradient(135deg,#7c3aed,#9333ea)';

    $focus =
    '#9333ea';

    $shadow =
    'rgba(147,51,234,.25)';
}

@endphp

@section('content')

<style>

body{
    background:#f1f5f9;
}

/* WRAPPER */

.content-wrapper{

    width:100%;

    display:flex;
    justify-content:center;

    padding:40px 20px;
}

.password-wrapper{

    width:100%;
    max-width:820px;
}

/* CARD */

.password-card{

    background:white;

    border-radius:32px;

    overflow:hidden;

    box-shadow:
    0 25px 50px rgba(0,0,0,.08);
}

/* HEADER */

.password-header{

    padding:45px;

    background: {{ $gradient }};

    color:white;

    position:relative;

    overflow:hidden;
}

.password-header::before{

    content:'';

    position:absolute;

    width:260px;
    height:260px;

    border-radius:50%;

    background:rgba(255,255,255,.08);

    top:-120px;
    right:-80px;
}

.password-title{

    font-size:42px;
    font-weight:800;

    margin-bottom:12px;

    position:relative;
    z-index:2;
}

.password-subtitle{

    font-size:16px;

    opacity:.95;

    position:relative;
    z-index:2;
}

/* BODY */

.password-body{

    padding:45px;
}

/* ALERT */

.alert-success{

    background:#dcfce7;
    color:#166534;

    padding:16px 18px;

    border-radius:16px;

    margin-bottom:25px;

    font-weight:600;
}

.alert-danger{

    background:#fee2e2;
    color:#991b1b;

    padding:16px 18px;

    border-radius:16px;

    margin-bottom:25px;

    font-weight:600;
}

/* FORM */

.form-group{
    margin-bottom:28px;
}

.form-label{

    display:block;

    margin-bottom:12px;

    font-size:16px;
    font-weight:700;

    color:#0f172a;
}

/* PASSWORD BOX */

.password-input-box{

    position:relative;
}

/* INPUT */

.form-input{

    width:100%;
    height:65px;

    border:none;
    outline:none;

    border-radius:20px;

    background:#f8fafc;

    padding:0 65px 0 22px;

    font-size:16px;

    border:2px solid transparent;

    transition:.3s;
}

.form-input:focus{

    background:white;

    border-color: {{ $focus }};

    box-shadow:
    0 0 0 4px rgba(0,0,0,.03);
}

/* TOGGLE PASSWORD */

.toggle-password{

    position:absolute;

    top:50%;
    right:20px;

    transform:translateY(-50%);

    width:42px;
    height:42px;

    border:none;

    border-radius:12px;

    background:#eef2ff;

    color:#475569;

    cursor:pointer;

    transition:.3s;
}

.toggle-password:hover{

    background: {{ $focus }};

    color:white;
}

/* BUTTON */

.save-btn{

    width:100%;
    height:65px;

    border:none;

    border-radius:20px;

    background: {{ $gradient }};

    color:white;

    font-size:17px;
    font-weight:700;

    margin-top:10px;

    transition:.3s;
}

.save-btn:hover{

    transform:translateY(-4px);

    box-shadow:
    0 18px 30px {{ $shadow }};
}

/* ERROR */

.error-text{

    color:#dc2626;

    font-size:13px;

    margin-top:8px;
}

/* TIPS */

.password-tips{

    margin-top:35px;

    background:#f8fafc;

    border-radius:22px;

    padding:25px;

    color:#475569;

    line-height:1.9;

    display:flex;
    gap:18px;
    align-items:flex-start;
}

.tip-icon{

    min-width:55px;
    height:55px;

    border-radius:18px;

    display:flex;
    align-items:center;
    justify-content:center;

    background: {{ $gradient }};

    color:white;

    font-size:22px;
}

/* RESPONSIVE */

@media(max-width:768px){

    .password-header{
        padding:35px;
    }

    .password-body{
        padding:28px;
    }

    .password-title{
        font-size:32px;
    }

    .form-input{
        height:58px;
    }

    .save-btn{
        height:58px;
    }

    .password-tips{
        flex-direction:column;
    }
}

</style>

<div class="content-wrapper">

    <div class="password-wrapper">

        <div class="password-card">

            <!-- HEADER -->

            <div class="password-header">

                <div class="password-title">

                    🔑 Ubah Password

                </div>

                <div class="password-subtitle">

                    Pastikan password akun Anda aman dan mudah diingat

                </div>

            </div>

            <!-- BODY -->

            <div class="password-body">

                @if(session('success'))

                    <div class="alert-success">

                        {{ session('success') }}

                    </div>

                @endif

                @if(session('error'))

                    <div class="alert-danger">

                        {{ session('error') }}

                    </div>

                @endif

                @if($errors->any())

                    <div class="alert-danger">

                        {{ $errors->first() }}

                    </div>

                @endif

                <form
                    action="{{ route('password.update') }}"
                    method="POST"
                >

                    @csrf

                    <!-- PASSWORD LAMA -->

                    <div class="form-group">

                        <label class="form-label">

                            Password Lama

                        </label>

                        <div class="password-input-box">

                            <input
                                type="password"
                                name="password_lama"
                                id="password_lama"
                                class="form-input"
                                placeholder="Masukkan password lama"
                                required
                            >

                            <button
                                type="button"
                                class="toggle-password"
                                onclick="togglePassword('password_lama', this)"
                            >

                                <i class="fa-solid fa-eye"></i>

                            </button>

                        </div>

                    </div>

                    <!-- PASSWORD BARU -->

                    <div class="form-group">

                        <label class="form-label">

                            Password Baru

                        </label>

                        <div class="password-input-box">

                            <input
                                type="password"
                                name="password_baru"
                                id="password_baru"
                                class="form-input"
                                placeholder="Masukkan password baru"
                                required
                            >

                            <button
                                type="button"
                                class="toggle-password"
                                onclick="togglePassword('password_baru', this)"
                            >

                                <i class="fa-solid fa-eye"></i>

                            </button>

                        </div>

                    </div>

                    <!-- KONFIRMASI PASSWORD -->

                    <div class="form-group">

                        <label class="form-label">

                            Konfirmasi Password Baru

                        </label>

                        <div class="password-input-box">

                            <input
                                type="password"
                                name="konfirmasi_password"
                                id="konfirmasi_password"
                                class="form-input"
                                placeholder="Konfirmasi password baru"
                                required
                            >

                            <button
                                type="button"
                                class="toggle-password"
                                onclick="togglePassword('konfirmasi_password', this)"
                            >

                                <i class="fa-solid fa-eye"></i>

                            </button>

                        </div>

                    </div>

                    <!-- BUTTON -->

                    <button
                        type="submit"
                        class="save-btn"
                    >

                        💾 Simpan Password

                    </button>

                </form>

                <!-- TIPS -->

                <div class="password-tips">

                    <div class="tip-icon">

                        <i class="fa-solid fa-shield-halved"></i>

                    </div>

                    <div>

                        <strong style="font-size:18px; color:#0f172a;">

                            Tips Keamanan :

                        </strong>

                        <br>

                        Gunakan kombinasi huruf besar,
                        huruf kecil, angka, dan simbol
                        agar password lebih kuat
                        dan akun Anda lebih aman.

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

function togglePassword(id, button){

    const input =
    document.getElementById(id);

    const icon =
    button.querySelector('i');

    if(input.type === 'password'){

        input.type = 'text';

        icon.classList.remove('fa-eye');

        icon.classList.add('fa-eye-slash');

    }else{

        input.type = 'password';

        icon.classList.remove('fa-eye-slash');

        icon.classList.add('fa-eye');
    }
}

</script>

@endsection