<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <!-- GOOGLE FONT -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- FONT AWESOME -->

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins', sans-serif;
        }

        body{
            background:#0f172a;
            color:white;
            overflow-x:hidden;
        }

        .wrapper{
            display:flex;
            min-height:100vh;
        }

        /* SIDEBAR */

        .sidebar{
            width:270px;
            background:
                linear-gradient(
                    180deg,
                    rgba(15,23,42,0.98),
                    rgba(30,41,59,0.96)
                );

            backdrop-filter:blur(20px);

            border-right:
                1px solid rgba(255,255,255,0.08);

            padding:30px 20px;

            position:fixed;

            height:100vh;

            overflow-y:auto;

            z-index:1000;
        }

        /* LOGO */

        .logo{
            display:flex;
            align-items:center;
            gap:15px;

            margin-bottom:45px;
        }

        .logo-icon{
            width:55px;
            height:55px;

            border-radius:18px;

            display:flex;
            align-items:center;
            justify-content:center;

            background:
                linear-gradient(
                    135deg,
                    #8b5cf6,
                    #3b82f6
                );

            font-size:24px;

            box-shadow:
                0 10px 25px rgba(59,130,246,.35);
        }

        .logo-text h2{
            font-size:22px;
            font-weight:700;
        }

        .logo-text p{
            font-size:13px;
            color:#94a3b8;
        }

        /* MENU */

        .menu-title{
            color:#94a3b8;
            font-size:12px;
            margin-bottom:14px;
            text-transform:uppercase;
            letter-spacing:1px;
        }

        .menu{
            display:flex;
            flex-direction:column;
            gap:8px;
        }

        .menu a{
            display:flex;
            align-items:center;
            gap:14px;

            text-decoration:none;

            color:#e2e8f0;

            padding:15px 18px;

            border-radius:18px;

            transition:.3s;

            font-size:15px;
            font-weight:500;
        }

        .menu a:hover{
            background:
                linear-gradient(
                    135deg,
                    #8b5cf6,
                    #3b82f6
                );

            transform:translateX(5px);

            box-shadow:
                0 10px 25px rgba(59,130,246,.25);
        }

        .menu a.active{
            background:
                linear-gradient(
                    135deg,
                    #8b5cf6,
                    #3b82f6
                );

            box-shadow:
                0 10px 25px rgba(59,130,246,.25);
        }

        /* LOGOUT */

        .logout-form{
            margin-top:25px;
        }

        .logout-btn{
            width:100%;

            border:none;

            padding:15px 18px;

            border-radius:18px;

            background:
                linear-gradient(
                    135deg,
                    #ef4444,
                    #dc2626
                );

            color:white;

            font-size:15px;
            font-weight:600;

            display:flex;
            align-items:center;
            justify-content:center;
            gap:10px;

            cursor:pointer;

            transition:.3s;
        }

        .logout-btn:hover{
            transform:translateY(-3px);

            box-shadow:
                0 12px 30px rgba(239,68,68,.35);
        }

        /* CONTENT */

        .main-content{
            margin-left:270px;

            width:100%;

            padding:30px;

            background:
                radial-gradient(
                    circle at top left,
                    rgba(168,85,247,0.28),
                    transparent 30%
                ),

                radial-gradient(
                    circle at bottom right,
                    rgba(59,130,246,0.28),
                    transparent 30%
                ),

                linear-gradient(
                    135deg,
                    #0f172a,
                    #111827,
                    #1e293b
                );

            min-height:100vh;
        }

        /* TOPBAR */

        .topbar{
            display:flex;
            justify-content:space-between;
            align-items:center;

            gap:20px;

            margin-bottom:35px;

            flex-wrap:wrap;
        }

        .topbar h1{
            font-size:32px;
            font-weight:700;
        }

        .profile{
            background:
                rgba(255,255,255,0.08);

            padding:12px 18px;

            border-radius:18px;

            display:flex;
            align-items:center;
            gap:12px;

            border:
                1px solid rgba(255,255,255,0.08);

            backdrop-filter:blur(12px);
        }

        .profile-icon{
            width:45px;
            height:45px;

            border-radius:14px;

            display:flex;
            align-items:center;
            justify-content:center;

            background:
                linear-gradient(
                    135deg,
                    #8b5cf6,
                    #3b82f6
                );
        }

        .profile-text h4{
            font-size:15px;
        }

        .profile-text p{
            font-size:12px;
            color:#cbd5e1;
        }

        /* RESPONSIVE */

        @media(max-width:768px){

            .sidebar{
                width:100%;
                height:auto;
                position:relative;
            }

            .main-content{
                margin-left:0;
            }

            .wrapper{
                flex-direction:column;
            }

            .topbar h1{
                font-size:24px;
            }

        }

    </style>

</head>

<body>

<div class="wrapper">

    <!-- SIDEBAR -->

    <div class="sidebar">

        <!-- LOGO -->

        <div class="logo">

            <div class="logo-icon">
                <i class="fa-solid fa-book"></i>
            </div>

            <div class="logo-text">

                <h2>Perpustakaan</h2>

                <p>Dashboard Petugas</p>

            </div>

        </div>

        <!-- MENU -->

        <div class="menu-title">

            Menu Utama

        </div>

        <div class="menu">

            <a href="/dashboard/petugas"
               class="{{ request()->is('dashboard/petugas') ? 'active' : '' }}">

                <i class="fa-solid fa-house"></i>

                Dashboard

            </a>

            <a href="/buku">

                <i class="fa-solid fa-book"></i>

                Data Buku

            </a>

            <a href="/kategori">

                <i class="fa-solid fa-tags"></i>

                Data Kategori

            </a>

            <a href="/siswa">

                <i class="fa-solid fa-user-graduate"></i>

                Data Siswa

            </a>

            <a href="/transaksi">

                <i class="fa-solid fa-arrow-right-arrow-left"></i>

                Transaksi

            </a>

            <a href="/sanksi">

                <i class="fa-solid fa-triangle-exclamation"></i>

                Data Sanksi

            </a>

            <a href="/scan">

                <i class="fa-solid fa-qrcode"></i>

                Scan Siswa

            </a>

             <a href="{{ route('password.form') }}"
                class="menu-item">

                🔑 Ubah Password
            </a>

        </div>

        <!-- LOGOUT -->

        <form action="{{ route('logout') }}"
              method="POST"
              class="logout-form">

            @csrf

            <button type="submit"
                    class="logout-btn">

                <i class="fa-solid fa-right-from-bracket"></i>

                Logout

            </button>

        </form>

    </div>

    <!-- MAIN CONTENT -->

    <div class="main-content">

        <!-- TOPBAR -->

        <div class="topbar">

            <h1>@yield('page-title')</h1>

            <div class="profile">

                <div class="profile-icon">

                    <i class="fa-solid fa-user"></i>

                </div>

                <div class="profile-text">

                    <h4>
                        {{ session('nama_petugas') }}
                    </h4>

                    <p>Petugas Perpustakaan</p>

                </div>

            </div>

        </div>

        <!-- CONTENT -->

        @yield('content')

    </div>

</div>

</body>

</html>