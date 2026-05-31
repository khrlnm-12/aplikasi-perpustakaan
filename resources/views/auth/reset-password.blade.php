<style>

/* WRAPPER */

.reset-wrapper{

    min-height:100vh;

    display:flex;
    justify-content:center;
    align-items:center;

    padding:30px;

    background:
    linear-gradient(
        135deg,
        #4f46e5,
        #7c3aed,
        #9333ea
    );
}

/* CARD */

.reset-card{

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

.reset-card::before{

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

.reset-icon{

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

.reset-title{

    text-align:center;

    font-size:34px;
    font-weight:800;

    margin-bottom:12px;
}

.reset-subtitle{

    text-align:center;

    color:rgba(255,255,255,.85);

    line-height:1.7;

    margin-bottom:35px;
}

/* INPUT */

.input-group{

    margin-bottom:24px;
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

    padding:0 20px 0 58px;

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

    top:50%;
    left:20px;

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

/* MOBILE */

@media(max-width:600px){

    .reset-card{

        padding:32px 24px;
    }

    .reset-title{

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

<div class="reset-wrapper">

    <div class="reset-card">

        <div class="reset-icon">

            <i class="fa-solid fa-key"></i>

        </div>

        <div class="reset-title">

            Reset Password

        </div>

        <div class="reset-subtitle">

            Buat password baru yang aman
            untuk akun perpustakaan Anda

        </div>

        <form
            method="POST"
            action="{{ route('password.reset') }}"
        >

            @csrf

            <input
                type="hidden"
                name="email"
                value="{{ $email }}"
            >

            <!-- PASSWORD BARU -->

            <div class="input-group">

                <label class="input-label">

                    Password Baru

                </label>

                <div class="input-box">

                    <i class="fa-solid fa-lock input-icon"></i>

                    <input
                        type="password"
                        name="password_baru"
                        class="form-control"
                        placeholder="Masukkan password baru"
                        required
                    >

                </div>

            </div>

            <!-- KONFIRMASI PASSWORD -->

            <div class="input-group">

                <label class="input-label">

                    Konfirmasi Password

                </label>

                <div class="input-box">

                    <i class="fa-solid fa-shield-halved input-icon"></i>

                    <input
                        type="password"
                        name="konfirmasi_password"
                        class="form-control"
                        placeholder="Konfirmasi password baru"
                        required
                    >

                </div>

            </div>

            <!-- BUTTON -->

            <button
                type="submit"
                class="btn-reset"
            >

                <i class="fa-solid fa-rotate-right"></i>

                Reset Password

            </button>

        </form>

    </div>

</div>