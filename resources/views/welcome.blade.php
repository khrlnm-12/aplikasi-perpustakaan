<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Perpustakaan Digital</title>

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Font Awesome -->

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{

            min-height:100vh;

            display:flex;

            justify-content:center;

            align-items:center;

            background:
            linear-gradient(
                -45deg,
                #020617,
                #0f172a,
                #1e3a8a,
                #312e81
            );

            background-size:400% 400%;

            animation:
            gradientBG 12s ease infinite;

            font-family:'Segoe UI',sans-serif;

            overflow:hidden;

            position:relative;
        }

        @keyframes gradientBG{

            0%{
                background-position:0% 50%;
            }

            50%{
                background-position:100% 50%;
            }

            100%{
                background-position:0% 50%;
            }

        }

        .circle{
            position:absolute;
            border-radius:50%;
            background:rgba(255,255,255,0.08);

            animation:
            float 8s infinite ease-in-out;
        }

        .circle1{
            width:250px;
            height:250px;
            top:-80px;
            left:-80px;
        }

        .circle2{
            width:180px;
            height:180px;
            bottom:-60px;
            right:-60px;
            animation-delay:2s;
        }

        .circle3{
            width:120px;
            height:120px;
            bottom:120px;
            left:120px;
            animation-delay:4s;
        }

        @keyframes float{

            0%{
                transform:
                translateY(0px)
                rotate(0deg);
            }

            50%{
                transform:
                translateY(-20px)
                rotate(10deg);
            }

            100%{
                transform:
                translateY(0px)
                rotate(0deg);
            }

        }

        .login-box{

            width:1000px;

            max-width:95%;

            border-radius:30px;

            overflow:hidden;

            background:
            rgba(255,255,255,0.08);

            backdrop-filter:blur(18px);

            box-shadow:
            0 8px 40px rgba(0,0,0,0.4);

            animation:
            fadeUp 1s ease;

            position:relative;

            z-index:10;
        }

        @keyframes fadeUp{

            from{
                opacity:0;
                transform:
                translateY(40px);
            }

            to{
                opacity:1;
                transform:
                translateY(0);
            }

        }

        .left-side{

            padding:60px;

            color:white;

            background:
            rgba(0,0,0,0.2);
        }

        .book-icon{

            font-size:85px;

            color:#60a5fa;

            margin-bottom:25px;

            animation:
            floatBook 4s ease-in-out infinite;
        }

        @keyframes floatBook{

            0%{
                transform:translateY(0px);
            }

            50%{
                transform:translateY(-10px);
            }

            100%{
                transform:translateY(0px);
            }

        }

        .left-side h1{

            font-size:48px;

            font-weight:800;

            margin-bottom:20px;
        }

        .left-side p{

            color:#cbd5e1;

            line-height:1.9;

            font-size:17px;
        }

        .feature-box{

            margin-top:45px;

            display:flex;

            gap:20px;
        }

        .feature{

            flex:1;

            text-align:center;

            transition:0.3s;
        }

        .feature:hover{

            transform:
            translateY(-5px);
        }

        .feature i{

            font-size:30px;

            margin-bottom:12px;

            color:#8b5cf6;
        }

        .feature div{

            font-size:14px;

            color:#e2e8f0;
        }

        .right-side{

            background:white;

            padding:60px;
        }

        .right-side h2{

            text-align:center;

            font-weight:800;

            color:#0f172a;

            margin-bottom:35px;
        }

        .form-label{

            font-weight:600;

            color:#334155;

            margin-bottom:8px;
        }

        .form-control,
        .form-select{

            height:55px;

            border-radius:15px;

            border:1px solid #dbeafe;

            margin-bottom:22px;

            padding-left:18px;

            transition:0.3s;
        }

        .form-control:focus,
        .form-select:focus{

            box-shadow:none;

            border-color:#6366f1;

            transform:scale(1.01);
        }

        /* PASSWORD */

        .password-box{

            position:relative;
        }

        .password-box input{

            padding-right:50px;
        }

        .toggle-password{

            position:absolute;

            top:50%;

            right:18px;

            transform:translateY(-50%);

            cursor:pointer;

            color:#64748b;

            font-size:18px;

            z-index:10;
        }

        .toggle-password:hover{

            color:#4f46e5;
        }

        .btn-login{

            height:55px;

            border:none;

            border-radius:15px;

            background:
            linear-gradient(
                to right,
                #2563eb,
                #7c3aed
            );

            color:white;

            font-size:17px;

            font-weight:600;

            transition:0.3s;
        }

        .btn-login:hover{

            transform:
            translateY(-3px)
            scale(1.01);

            opacity:0.95;
        }

        .footer{

            margin-top:30px;

            text-align:center;

            color:#94a3b8;

            font-size:14px;
        }

        @media(max-width:768px){

            body{
                padding:20px;
            }

            .left-side{
                display:none;
            }

            .right-side{
                padding:40px 25px;
            }

        }

    </style>
</head>

<body>

<div class="circle circle1"></div>
<div class="circle circle2"></div>
<div class="circle circle3"></div>

<div class="login-box">

    <div class="row g-0">

        <!-- LEFT SIDE -->

        <div class="col-md-6 left-side">

            <div class="book-icon">

                <i class="fa-solid fa-book-open-reader"></i>

            </div>

            <h1>
                Perpustakaan Digital
            </h1>

            <p>
                Sistem perpustakaan modern berbasis QR Code
                untuk peminjaman buku, monitoring data,
                rekomendasi buku, dan notifikasi otomatis.
            </p>

            <div class="feature-box">

                <div class="feature">

                    <i class="fa-solid fa-book"></i>

                    <div>Koleksi Buku</div>

                </div>

                <div class="feature">

                    <i class="fa-solid fa-chart-line"></i>

                    <div>Monitoring</div>

                </div>

                <div class="feature">

                    <i class="fa-solid fa-bell"></i>

                    <div>Notifikasi</div>

                </div>

            </div>

        </div>

        <!-- RIGHT SIDE -->

        <div class="col-md-6 right-side">

            <h2>
                Login Sistem
            </h2>

            @if(session('error'))

                <div class="alert alert-danger">

                    {{ session('error') }}

                </div>

            @endif

            <form method="POST"
                  action="/login">

                @csrf

                <!-- ROLE -->

                <label class="form-label">
                    Login Sebagai
                </label>

                <select name="role"
                        id="role"
                        class="form-select"
                        onchange="changePlaceholder()"
                        required>

                    <option value="">
                        Pilih Role
                    </option>

                    <option value="siswa">
                        Siswa
                    </option>

                    <option value="petugas">
                        Petugas
                    </option>

                    <option value="kepala_sekolah">
                        Kepala Sekolah
                    </option>

                </select>

                <!-- LOGIN -->

                <label class="form-label">
                    ID Login
                </label>

                <input type="text"
                       name="login"
                       id="loginInput"
                       class="form-control"
                       placeholder="Masukkan ID"
                       required>

                <!-- PASSWORD -->

                <label class="form-label">
                    Password
                </label>

                <div class="password-box">

                    <input type="password"
                           name="password"
                           id="password"
                           class="form-control"
                           placeholder="Masukkan password"
                           autocomplete="current-password"
                           required>

                    <span class="toggle-password"
                          onclick="togglePassword()">

                        <i class="fa-solid fa-eye"
                           id="eyeIcon"></i>

                    </span>

                </div>

                <!-- BUTTON -->

                <button type="submit"
                        class="btn btn-login w-100">

                    <i class="fa-solid fa-right-to-bracket"></i>

                    Masuk Sistem

                </button>

            </form>

            <div class="footer">

                © 2026 Perpustakaan Digital Sekolah

            </div>

        </div>

    </div>

</div>

<script>

function changePlaceholder()
{
    let role =
        document.getElementById('role').value;

    let input =
        document.getElementById('loginInput');

    if(role == 'siswa')
    {
        input.placeholder =
            'Masukkan NIS';
    }

    else if(role == 'petugas')
    {
        input.placeholder =
            'Masukkan ID Petugas';
    }

    else if(role == 'kepala_sekolah')
    {
        input.placeholder =
            'Masukkan ID Kepala Sekolah';
    }

    else
    {
        input.placeholder =
            'Masukkan ID';
    }
}

/* TOGGLE PASSWORD */

function togglePassword()
{
    let password =
        document.getElementById('password');

    let eyeIcon =
        document.getElementById('eyeIcon');

    if(password.type === 'password')
    {
        password.type = 'text';

        eyeIcon.classList.remove('fa-eye');

        eyeIcon.classList.add('fa-eye-slash');
    }
    else
    {
        password.type = 'password';

        eyeIcon.classList.remove('fa-eye-slash');

        eyeIcon.classList.add('fa-eye');
    }
}

</script>

</body>
</html>