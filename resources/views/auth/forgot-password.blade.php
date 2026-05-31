<style>

/* WRAPPER */

.forgot-wrapper{

    min-height:100vh;

    display:flex;
    justify-content:center;
    align-items:center;

    background:
    linear-gradient(
        135deg,
        #4f46e5,
        #7c3aed,
        #9333ea
    );

    padding:30px;
}

/* CARD */

.forgot-card{

    width:100%;
    max-width:500px;

    background:rgba(255,255,255,.12);

    backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,.2);

    border-radius:32px;

    padding:45px;

    box-shadow:
    0 25px 50px rgba(0,0,0,.2);

    color:white;

    position:relative;

    overflow:hidden;
}

.forgot-card::before{

    content:'';

    position:absolute;

    width:220px;
    height:220px;

    border-radius:50%;

    background:rgba(255,255,255,.08);

    top:-80px;
    right:-80px;
}

/* ICON */

.icon-box{

    width:90px;
    height:90px;

    margin:auto auto 25px;

    border-radius:28px;

    background:
    linear-gradient(
        135deg,
        #ffffff,
        #e9d5ff
    );

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:40px;

    color:#7c3aed;

    box-shadow:
    0 15px 30px rgba(0,0,0,.15);
}

/* TITLE */

.forgot-title{

    text-align:center;

    font-size:34px;
    font-weight:800;

    margin-bottom:12px;
}

.forgot-subtitle{

    text-align:center;

    color:rgba(255,255,255,.85);

    line-height:1.7;

    margin-bottom:35px;
}

/* ALERT */

.alert{

    padding:16px 18px;

    border-radius:18px;

    margin-bottom:22px;

    font-weight:600;
}

.alert-success{

    background:rgba(34,197,94,.18);

    border:1px solid rgba(34,197,94,.3);

    color:#dcfce7;
}

.alert-danger{

    background:rgba(239,68,68,.18);

    border:1px solid rgba(239,68,68,.3);

    color:#fee2e2;
}

/* INPUT */

.input-group{

    margin-bottom:25px;
}

.input-label{

    display:block;

    margin-bottom:12px;

    font-size:15px;
    font-weight:700;

    color:white;
}

.input-box{

    position:relative;
}

.form-control{

    width:100%;
    height:65px;

    border:none;
    outline:none;

    border-radius:20px;

    padding:0 22px 0 58px;

    font-size:16px;

    background:rgba(255,255,255,.15);

    color:white;

    border:2px solid transparent;

    transition:.3s;
}

.form-control::placeholder{

    color:rgba(255,255,255,.7);
}

.form-control:focus{

    border-color:white;

    background:rgba(255,255,255,.2);

    box-shadow:
    0 0 0 4px rgba(255,255,255,.12);
}

.input-icon{

    position:absolute;

    left:20px;
    top:50%;

    transform:translateY(-50%);

    color:white;

    font-size:18px;
}

/* BUTTON */

.btn-reset{

    width:100%;
    height:65px;

    border:none;

    border-radius:20px;

    background:white;

    color:#6d28d9;

    font-size:17px;
    font-weight:800;

    cursor:pointer;

    transition:.3s;
}

.btn-reset:hover{

    transform:translateY(-4px);

    box-shadow:
    0 20px 35px rgba(0,0,0,.2);
}

/* BACK */

.back-login{

    margin-top:22px;

    text-align:center;
}

.back-login a{

    color:white;

    text-decoration:none;

    font-weight:600;

    opacity:.9;

    transition:.3s;
}

.back-login a:hover{

    opacity:1;
}

/* MOBILE */

@media(max-width:600px){

    .forgot-card{

        padding:32px 24px;
    }

    .forgot-title{

        font-size:28px;
    }

    .form-control{

        height:58px;
    }

    .btn-reset{

        height:58px;
    }
}

</style>

<div class="forgot-wrapper">

    <div class="forgot-card">

        <div class="icon-box">

            <i class="fa-solid fa-lock"></i>

        </div>

        <div class="forgot-title">

            Lupa Password

        </div>

        <div class="forgot-subtitle">

            Masukkan email akun Anda
            untuk menerima link reset password

        </div>

        @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

        @endif

        @if($errors->any())

        <div class="alert alert-danger">

            {{ $errors->first() }}

        </div>

        @endif

        <form
            action="{{ route('forgot.password.send') }}"
            method="POST"
        >

            @csrf

            <div class="input-group">

                <label class="input-label">

                    Email

                </label>

                <div class="input-box">

                    <i class="fa-solid fa-envelope input-icon"></i>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Masukkan email Anda"
                        required
                    >

                </div>

            </div>

            <button
                type="submit"
                class="btn-reset"
            >

                <i class="fa-solid fa-paper-plane"></i>

                Kirim Reset Password

            </button>

        </form>

        <div class="back-login">

            <a href="/">

                ← Kembali ke Login

            </a>

        </div>

    </div>

</div>