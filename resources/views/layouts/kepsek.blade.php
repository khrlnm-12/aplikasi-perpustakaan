<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <!-- FONT -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
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

            background:
            linear-gradient(
                135deg,
                #f8fafc,
                #eef2ff,
                #f1f5f9
            );

            min-height:100vh;

            color:#0f172a;

            overflow-x:hidden;
        }

        .wrapper{
            display:flex;
            min-height:100vh;
        }

        /* SIDEBAR */

        .sidebar{

            width:280px;

            background:white;

            padding:30px 22px;

            position:fixed;

            height:100vh;

            border-right:
            1px solid #e2e8f0;

            box-shadow:
            0 10px 30px rgba(0,0,0,.05);

            z-index:1000;
        }

        /* LOGO */

        .logo-box{

            display:flex;

            align-items:center;

            gap:16px;

            margin-bottom:45px;
        }

        .logo-icon{

            width:60px;
            height:60px;

            border-radius:20px;

            display:flex;
            align-items:center;
            justify-content:center;

            background:
            linear-gradient(
                135deg,
                #7c3aed,
                #2563eb
            );

            color:white;

            font-size:24px;

            box-shadow:
            0 12px 25px rgba(124,58,237,.25);
        }

        .logo-title{

            font-size:22px;

            font-weight:800;

            color:#0f172a;

            line-height:1.2;
        }

        .logo-subtitle{

            font-size:13px;

            color:#64748b;

            margin-top:3px;
        }

        /* MENU */

        .menu-title{

            font-size:12px;

            color:#94a3b8;

            text-transform:uppercase;

            letter-spacing:1px;

            margin-bottom:15px;

            padding-left:10px;
        }

        .menu{

            display:flex;

            flex-direction:column;

            gap:12px;
        }

        .menu a{

            display:flex;

            align-items:center;

            gap:15px;

            text-decoration:none;

            padding:16px 18px;

            border-radius:18px;

            color:#334155;

            font-weight:600;

            transition:.3s;
        }

        .menu a:hover{

            background:
            linear-gradient(
                135deg,
                #7c3aed,
                #2563eb
            );

            color:white;

            transform:translateX(5px);

            box-shadow:
            0 12px 25px rgba(37,99,235,.18);
        }

        .menu .active{

            background:
            linear-gradient(
                135deg,
                #7c3aed,
                #2563eb
            );

            color:white;

            box-shadow:
            0 12px 25px rgba(37,99,235,.18);
        }

        .menu i{

            width:22px;

            text-align:center;

            font-size:17px;
        }

        /* LOGOUT */

        .logout-form{

            margin-top:35px;
        }

        .logout-btn{

            width:100%;

            border:none;

            padding:16px;

            border-radius:18px;

            background:
            linear-gradient(
                135deg,
                #ef4444,
                #dc2626
            );

            color:white;

            font-weight:700;

            cursor:pointer;

            transition:.3s;
        }

        .logout-btn:hover{

            transform:translateY(-3px);

            box-shadow:
            0 12px 25px rgba(239,68,68,.25);
        }

        /* CONTENT */

        .main-content{

            margin-left:280px;

            width:100%;

            padding:35px;
        }

        /* TOPBAR */

        .topbar{

            display:flex;

            justify-content:space-between;

            align-items:center;

            margin-bottom:35px;

            flex-wrap:wrap;

            gap:20px;
        }

        .page-title{

            font-size:36px;

            font-weight:800;

            color:#0f172a;
        }

        .page-subtitle{

            color:#64748b;

            margin-top:6px;

            font-size:15px;
        }

        /* PROFILE */

        .profile-box{

            display:flex;

            align-items:center;

            gap:14px;

            background:white;

            padding:14px 20px;

            border-radius:22px;

            box-shadow:
            0 10px 25px rgba(0,0,0,.05);
        }

        .profile-icon{

            width:50px;
            height:50px;

            border-radius:16px;

            display:flex;
            align-items:center;
            justify-content:center;

            background:
            linear-gradient(
                135deg,
                #7c3aed,
                #2563eb
            );

            color:white;

            font-size:20px;
        }

        .profile-name{

            font-weight:700;

            color:#0f172a;
        }

        .profile-role{

            font-size:13px;

            color:#64748b;
        }

        /* CONTENT CARD */

        .content-card{

            background:white;

            border-radius:30px;

            padding:30px;

            box-shadow:
            0 10px 30px rgba(0,0,0,.05);
        }

        /* RESPONSIVE */

        @media(max-width:992px){

            .sidebar{

                width:100%;

                height:auto;

                position:relative;
            }

            .main-content{

                margin-left:0;

                padding:25px;
            }

            .wrapper{

                flex-direction:column;
            }

            .page-title{

                font-size:28px;
            }
        }

    </style>

</head>

<body>

<div class="wrapper">

    <!-- SIDEBAR -->

    <div class="sidebar">

        <!-- LOGO -->

        <div class="logo-box">

            <div class="logo-icon">

                <i class="fa-solid fa-school"></i>

            </div>

            <div>

                <div class="logo-title">

                    PERPUSTAKAAN

                </div>

                <div class="logo-subtitle">

                    Kepala Sekolah

                </div>

            </div>

        </div>

        <!-- MENU -->

        <div class="menu-title">

            Menu Utama

        </div>

        <div class="menu">

            <!-- DASHBOARD -->

            <a href="/dashboard/kepala-sekolah"
               class="{{ request()->is('dashboard/kepala-sekolah') ? 'active' : '' }}">

                <i class="fa-solid fa-house"></i>

                Dashboard

            </a>

            <!-- BUKU -->

            <a href="/kepsek/buku"
               class="{{ request()->is('kepsek/buku') ? 'active' : '' }}">

                <i class="fa-solid fa-book"></i>

                Informasi Buku

            </a>

            <!-- SISWA -->

            <a href="/kepsek/siswa"
               class="{{ request()->is('kepsek/siswa') ? 'active' : '' }}">

                <i class="fa-solid fa-users"></i>

                Informasi Siswa

            </a>

            <!-- TRANSAKSI -->

            <a href="/kepsek/transaksi"
               class="{{ request()->is('kepsek/transaksi') ? 'active' : '' }}">

                <i class="fa-solid fa-book-open"></i>

                Informasi Transaksi

            </a>
            <a href="{{ route('password.kepsek.form') }}"
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

                <i class="fa-solid fa-right-from-bracket me-2"></i>

                Logout

            </button>

        </form>

    </div>

    <!-- MAIN CONTENT -->

    <div class="main-content">

        <!-- TOPBAR -->

        <div class="topbar">

            <div>

                <div class="page-title">

                    @yield('page-title')

                </div>

                <div class="page-subtitle">

                    Sistem Monitoring Perpustakaan Sekolah

                </div>

            </div>

            <!-- PROFILE -->

            <div class="profile-box">

                <div class="profile-icon">

                    <i class="fa-solid fa-user-tie"></i>

                </div>

                <div>

                    <div class="profile-name">

                        {{ session('nama_kepala_sekolah') }}

                    </div>

                    <div class="profile-role">

                        Kepala Sekolah

                    </div>

                </div>

            </div>

        </div>

        <!-- CONTENT -->

        @yield('content')

    </div>

</div>

</body>
</html>