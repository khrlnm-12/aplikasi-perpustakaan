<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Perpustakaan Digital</title>

    <!-- Bootstrap -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Font Awesome -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <!-- Google Font -->

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins', sans-serif;
        }

        body{

            min-height:100vh;

            display:flex;

            justify-content:center;

            align-items:center;

            overflow:hidden;

            position:relative;

            background:
                linear-gradient(
                    -45deg,
                    #60a5fa,
                    #818cf8,
                    #38bdf8,
                    #c084fc
                );

            background-size:400% 400%;

            animation:bgMove 12s ease infinite;
        }

        @keyframes bgMove{

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

        /* FLOATING PARTICLES */

        .particle{

            position:absolute;

            border-radius:50%;

            background:
                rgba(255,255,255,0.45);

            animation:
                particleMove linear infinite;
        }

        .p1{
            width:15px;
            height:15px;
            top:10%;
            left:15%;
            animation-duration:12s;
        }

        .p2{
            width:20px;
            height:20px;
            top:70%;
            left:25%;
            animation-duration:15s;
        }

        .p3{
            width:18px;
            height:18px;
            top:30%;
            right:20%;
            animation-duration:18s;
        }

        .p4{
            width:14px;
            height:14px;
            bottom:15%;
            right:10%;
            animation-duration:14s;
        }

        .p5{
            width:25px;
            height:25px;
            top:50%;
            left:50%;
            animation-duration:20s;
        }

        @keyframes particleMove{

            0%{
                transform:
                    translateY(0px)
                    scale(1);

                opacity:0.2;
            }

            50%{
                transform:
                    translateY(-80px)
                    scale(1.5);

                opacity:0.7;
            }

            100%{
                transform:
                    translateY(-160px)
                    scale(1);

                opacity:0;
            }

        }

        /* LOGIN CARD */

        .login-card{

            width:430px;

            padding:45px;

            border-radius:35px;

            background:
                rgba(255,255,255,0.25);

            backdrop-filter:blur(20px);

            border:
                1px solid rgba(255,255,255,0.4);

            box-shadow:
                0 20px 50px rgba(0,0,0,0.15);

            position:relative;

            z-index:10;

            animation:
                floatCard 4s ease-in-out infinite;
        }

        @keyframes floatCard{

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

        /* LOGO */

        .logo{

            width:95px;

            height:95px;

            border-radius:30px;

            margin:auto;

            margin-bottom:25px;

            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #7c3aed
                );

            display:flex;

            justify-content:center;

            align-items:center;

            font-size:38px;

            color:white;

            box-shadow:
                0 12px 30px rgba(37,99,235,0.35);

            animation:
                pulse 3s infinite;
        }

        .logo i{
            animation:
                rotateIcon 8s linear infinite;
        }

        @keyframes pulse{

            0%{
                transform:scale(1);
            }

            50%{
                transform:scale(1.08);
            }

            100%{
                transform:scale(1);
            }

        }

        @keyframes rotateIcon{

            from{
                transform:rotate(0deg);
            }

            to{
                transform:rotate(360deg);
            }

        }

        /* TEXT */

        .title{

            text-align:center;

            font-size:32px;

            font-weight:700;

            color:white;

            margin-bottom:8px;
        }

        .subtitle{

            text-align:center;

            color:#f8fafc;

            margin-bottom:35px;

            font-size:14px;
        }

        /* FORM */

        .form-label{

            color:white;

            font-weight:500;

            margin-bottom:8px;
        }

        .input-group{

            height:58px;

            border-radius:18px;

            margin-bottom:10px;

            background:
                rgba(255,255,255,0.35);

            border:
                1px solid rgba(255,255,255,0.5);

            position:relative;
        }

        .input-group-text{

            background:transparent;

            border:none;

            color:#2563eb;

            padding-left:18px;
        }

        .form-control{

            border:none;

            background:transparent;

            color:#0f172a;

            font-weight:500;
        }

        .form-control::placeholder{
            color:#475569;
        }

        .form-control:focus{

            background:transparent;

            box-shadow:none;

            color:#0f172a;
        }

        /* TOGGLE PASSWORD */

        .toggle-password{

            position:absolute;

            top:50%;
            right:15px;

            transform:translateY(-50%);

            border:none;

            background:none;

            color:#475569;

            cursor:pointer;

            z-index:999;

            font-size:18px;

            transition:.3s;
        }

        .toggle-password:hover{

            color:#2563eb;
        }

        /* FORGOT PASSWORD */

        .forgot-password{

            text-align:right;

            margin-bottom:22px;
        }

        .forgot-password a{

            color:white;

            font-size:13px;

            text-decoration:none;

            transition:0.3s;

            opacity:0.9;
        }

        .forgot-password a:hover{

            opacity:1;

            text-decoration:underline;
        }

        /* BUTTON */

        .btn-login{

            width:100%;

            height:58px;

            border:none;

            border-radius:18px;

            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #7c3aed
                );

            color:white;

            font-weight:600;

            font-size:15px;

            transition:0.3s;

            position:relative;

            overflow:hidden;
        }

        .btn-login::before{

            content:'';

            position:absolute;

            top:0;

            left:-100%;

            width:100%;

            height:100%;

            background:
                rgba(255,255,255,0.25);

            transform:skewX(-20deg);

            transition:0.7s;
        }

        .btn-login:hover::before{
            left:120%;
        }

        .btn-login:hover{

            transform:translateY(-3px);

            box-shadow:
                0 15px 30px rgba(37,99,235,0.35);
        }

        /* FOOTER */

        .footer{

            text-align:center;

            margin-top:25px;

            color:white;

            font-size:13px;
        }

        .alert{
            border-radius:15px;
        }

        /* RESPONSIVE */

        @media(max-width:500px){

            .login-card{

                width:90%;

                padding:35px 25px;
            }

            .title{
                font-size:26px;
            }

        }

    </style>

</head>

<body>

    <!-- PARTICLES -->

    <div class="particle p1"></div>
    <div class="particle p2"></div>
    <div class="particle p3"></div>
    <div class="particle p4"></div>
    <div class="particle p5"></div>

    <!-- LOGIN CARD -->

    <div class="login-card">

        <div class="logo">

            <i class="fa-solid fa-book-open-reader"></i>

        </div>

        <h1 class="title">
            Perpustakaan
        </h1>

        <p class="subtitle">
            Sistem Informasi Perpustakaan Digital
        </p>

        @if(session('error'))

            <div class="alert alert-danger">

                {{ session('error') }}

            </div>

        @endif

        <form
            action="{{ url('/login') }}"
            method="POST"
        >

            @csrf
            <!-- LOGIN -->
            <label class="form-label">
                ID Login
            </label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-user"></i>
                </span>
                <input
                    type="text"
                    name="login"
                    class="form-control"
                    placeholder="Masukkan ID Anda"
                    required
                >
            </div>
            <!-- PASSWORD -->
            <label class="form-label">
                Password
            </label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-lock"></i>
                </span>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                    placeholder="Masukkan Password"
                    required
                >
                <!-- TOGGLE -->
                <button
                    type="button"
                    class="toggle-password"
                    onclick="togglePassword()"
                >
                    <i
                        id="eyeIcon"
                        class="fa-solid fa-eye"
                    ></i>

                </button>

            </div>

            <!-- LUPA PASSWORD -->

            <div class="forgot-password">

                <a href="{{ url('/forgot-password') }}">

                    Lupa Password?

                </a>

            </div>

            <!-- BUTTON -->

            <button
                type="submit"
                class="btn-login"
            >

                <i class="fa-solid fa-right-to-bracket"></i>

                Login Sekarang

            </button>

        </form>

        <div class="footer">
            © 2026 Perpustakaan Digital
        </div>

    </div>

    <!-- SCRIPT -->

    <script>

        function togglePassword(){

            const password =
            document.getElementById('password');

            const eyeIcon =
            document.getElementById('eyeIcon');

            if(password.type === 'password'){

                password.type = 'text';

                eyeIcon.classList.remove('fa-eye');

                eyeIcon.classList.add('fa-eye-slash');

            }else{

                password.type = 'password';

                eyeIcon.classList.remove('fa-eye-slash');

                eyeIcon.classList.add('fa-eye');
            }
        }

    </script>

</body>

</html>