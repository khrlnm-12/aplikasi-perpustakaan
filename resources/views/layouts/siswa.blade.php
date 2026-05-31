<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title')
    </title>

    <!-- FONT -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <!-- BOOTSTRAP -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- ICON -->

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{

            min-height:100vh;

            background:
            linear-gradient(
                135deg,
                #f0f9ff,
                #eff6ff,
                #f8fafc
            );

            color:#0f172a;

            overflow-x:hidden;
        }

        /* ========================= */
        /* SIDEBAR */
        /* ========================= */

        .sidebar{

            width:280px;

            height:100vh;

            position:fixed;

            top:0;
            left:0;

            z-index:999;

            padding:30px 22px;

            background:
            rgba(255,255,255,.85);

            backdrop-filter:blur(18px);

            border-right:
            1px solid rgba(255,255,255,.4);

            box-shadow:
            0 10px 30px rgba(0,0,0,.05);
        }

        /* LOGO */

        .logo{

            text-align:center;

            margin-bottom:40px;
        }

        .logo-icon{

            width:75px;
            height:75px;

            margin:auto auto 15px;

            border-radius:22px;

            display:flex;
            align-items:center;
            justify-content:center;

            font-size:32px;

            color:white;

            background:
            linear-gradient(
                135deg,
                #22c55e,
                #16a34a
            );

            box-shadow:
            0 10px 25px rgba(34,197,94,.25);
        }

        .logo h2{

            font-size:27px;

            font-weight:800;

            background:
            linear-gradient(
                to right,
                #2563eb,
                #38bdf8
            );

            -webkit-background-clip:text;

            -webkit-text-fill-color:transparent;
        }

        .logo p{

            margin-top:6px;

            color:#64748b;

            font-size:13px;
        }

        /* ========================= */
        /* MENU */
        /* ========================= */

        .menu{

            display:flex;

            flex-direction:column;

            gap:14px;
        }

        .menu a{

            text-decoration:none;

            padding:16px 18px;

            border-radius:18px;

            font-size:15px;

            font-weight:600;

            color:#334155;

            background:#f8fafc;

            display:flex;

            align-items:center;

            gap:12px;

            transition:.3s ease;
        }

        .menu a i{

            font-size:18px;
        }

        .menu a:hover{

            color:white;

            transform:translateX(6px);

            background:
            linear-gradient(
                135deg,
                #3b82f6,
                #2563eb
            );

            box-shadow:
            0 10px 20px rgba(37,99,235,.25);
        }

        /* ACTIVE */

        .menu .active{

            color:white;

            background:
            linear-gradient(
                135deg,
                #22c55e,
                #16a34a
            );

            box-shadow:
            0 10px 20px rgba(34,197,94,.25);
        }

        /* LOGOUT BUTTON */

        .logout-form{
            width:100%;
        }

        .logout-btn{

            width:100%;

            border:none;

            padding:16px 18px;

            border-radius:18px;

            font-size:15px;

            font-weight:600;

            color:white;

            display:flex;

            align-items:center;

            gap:12px;

            background:
            linear-gradient(
                135deg,
                #ef4444,
                #dc2626
            );

            transition:.3s ease;

            box-shadow:
            0 10px 20px rgba(239,68,68,.2);
        }

        .logout-btn:hover{

            transform:translateX(6px);

            background:
            linear-gradient(
                135deg,
                #dc2626,
                #b91c1c
            );
        }

        /* ========================= */
        /* CONTENT */
        /* ========================= */

        .content{

            margin-left:280px;

            padding:30px;

            min-height:100vh;
        }

        /* ========================= */
        /* TOPBAR */
        /* ========================= */

        .topbar{

            background:
            rgba(255,255,255,.8);

            backdrop-filter:blur(18px);

            border:
            1px solid rgba(255,255,255,.5);

            border-radius:24px;

            padding:18px 25px;

            margin-bottom:30px;

            display:flex;

            justify-content:space-between;

            align-items:center;

            box-shadow:
            0 10px 25px rgba(0,0,0,.05);
        }

        .topbar-title{

            font-size:24px;

            font-weight:700;

            color:#0f172a;
        }

        .topbar-sub{

            color:#64748b;

            font-size:14px;

            margin-top:3px;
        }

        .topbar-user{

            display:flex;

            align-items:center;

            gap:12px;
        }

        .avatar{

            width:50px;
            height:50px;

            border-radius:50%;

            background:
            linear-gradient(
                135deg,
                #3b82f6,
                #60a5fa
            );

            color:white;

            display:flex;

            align-items:center;

            justify-content:center;

            font-size:20px;

            font-weight:700;
        }

        .user-name{

            font-size:15px;

            font-weight:700;

            color:#0f172a;
        }

        .user-role{

            font-size:12px;

            color:#64748b;
        }

        /* ========================= */
        /* MOBILE */
        /* ========================= */

        .mobile-toggle{

            display:none;
        }

        @media(max-width:992px){

            .sidebar{

                left:-100%;

                transition:.3s;
            }

            .sidebar.active{

                left:0;
            }

            .content{

                margin-left:0;

                padding:20px;
            }

            .mobile-toggle{

                display:flex;

                align-items:center;

                justify-content:center;

                width:45px;
                height:45px;

                border:none;

                border-radius:14px;

                background:
                linear-gradient(
                    135deg,
                    #3b82f6,
                    #2563eb
                );

                color:white;

                font-size:18px;
            }

            .topbar{

                flex-direction:column;

                align-items:flex-start;

                gap:20px;
            }

        }

    </style>

</head>

<body>

    <!-- SIDEBAR -->

    <div class="sidebar"
         id="sidebar">

        <!-- LOGO -->

        <div class="logo">

            <div class="logo-icon">

                📚

            </div>

            <h2>
                Perpustakaan
            </h2>

            <p>
                Smart Library Student Panel
            </p>

        </div>

        <!-- MENU -->

        <div class="menu">

            <a href="/dashboard/siswa"
               class="active">

                <i class="fa-solid fa-house"></i>

                Dashboard

            </a>

            <a href="{{ route('password.form') }}"
                class="menu-item">

                🔑 Ubah Password
            </a>

            
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

    </div>

    <!-- CONTENT -->

    <div class="content">

        <!-- TOPBAR -->

        <div class="topbar">

            <div>

                <div class="topbar-title">

                    Dashboard Siswa

                </div>

                <div class="topbar-sub">

                    Sistem Perpustakaan Digital Modern

                </div>

            </div>

            <div class="topbar-user">

                <!-- MOBILE BUTTON -->

                <button class="mobile-toggle"
                        id="toggleSidebar">

                    <i class="fa-solid fa-bars"></i>

                </button>

                <!-- USER -->

                <div class="avatar">

                    {{ strtoupper(substr(session('nama_siswa'),0,1)) }}

                </div>

                <div>

                    <div class="user-name">

                        {{ session('nama_siswa') }}

                    </div>

                    <div class="user-role">

                        Siswa Aktif

                    </div>

                </div>

            </div>

        </div>

        <!-- PAGE CONTENT -->

        @yield('content')

    </div>

    <!-- BOOTSTRAP -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SIDEBAR MOBILE -->

    <script>

        const toggle =
            document.getElementById(
                'toggleSidebar'
            );

        const sidebar =
            document.getElementById(
                'sidebar'
            );

        toggle.addEventListener('click', function(){

            sidebar.classList.toggle(
                'active'
            );

        });

    </script>

</body>

</html>