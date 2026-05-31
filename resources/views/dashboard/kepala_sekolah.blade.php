<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Dashboard Kepala Sekolah</title>

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

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{

            min-height:100vh;

            overflow-x:hidden;

            font-family:'Segoe UI', sans-serif;

            background:
                linear-gradient(
                    135deg,
                    #eef2ff,
                    #f8fafc,
                    #dbeafe
                );
        }

        /* SIDEBAR */

        .sidebar{

            width:290px;
            height:100vh;

            position:fixed;
            left:0;
            top:0;

            padding:30px 22px;

            background:white;

            border-right:1px solid #e2e8f0;

            z-index:1000;

            overflow-y:auto;
        }

        .logo-box{
            text-align:center;
            margin-bottom:40px;
        }

        .logo-icon{

            width:80px;
            height:80px;

            margin:auto;

            border-radius:24px;

            display:flex;
            align-items:center;
            justify-content:center;

            font-size:35px;
            color:white;

            background:
                linear-gradient(
                    135deg,
                    #4f46e5,
                    #7c3aed
                );
        }

        .logo-title{

            margin-top:18px;

            font-size:24px;
            font-weight:700;

            color:#0f172a;
        }

        .logo-subtitle{

            color:#64748b;
            font-size:14px;
        }

        /* MENU */

        .sidebar-menu{
            list-style:none;
            padding:0;
        }

        .sidebar-menu li{
            margin-bottom:14px;
        }

        .sidebar-menu a{

            display:flex;
            align-items:center;
            gap:14px;

            text-decoration:none;

            color:#334155;

            padding:16px 18px;

            border-radius:18px;

            font-weight:600;

            transition:0.3s;
        }

        .sidebar-menu a:hover{

            background:#eef2ff;

            color:#4f46e5;

            transform:translateX(5px);
        }

        .sidebar-menu .active{

            background:
                linear-gradient(
                    135deg,
                    #4f46e5,
                    #2563eb
                );

            color:white;

            box-shadow:
                0 10px 25px rgba(79,70,229,0.25);
        }

        /* LOGOUT */

        .logout-btn{

            width:100%;

            border:none;

            display:flex;
            align-items:center;
            justify-content:center;
            gap:14px;

            padding:16px 18px;

            border-radius:18px;

            font-weight:600;

            color:white;

            cursor:pointer;

            background:
                linear-gradient(
                    135deg,
                    #dc2626,
                    #ef4444
                );

            transition:0.3s;
        }

        .logout-btn:hover{

            transform:translateY(-3px);

            box-shadow:
                0 12px 25px rgba(239,68,68,0.3);
        }

        /* MAIN */

        .main-content{

            margin-left:290px;

            padding:35px;
        }

        /* TOPBAR */

        .topbar{

            display:flex;
            justify-content:space-between;
            align-items:center;
            flex-wrap:wrap;

            gap:20px;

            margin-bottom:35px;
        }

        .page-title{

            font-size:40px;
            font-weight:800;

            color:#0f172a;
        }

        .page-subtitle{

            color:#64748b;

            margin-top:6px;
        }

        .profile-box{

            display:flex;
            align-items:center;
            gap:15px;

            padding:16px 20px;

            border-radius:24px;

            background:white;

            box-shadow:
                0 10px 30px rgba(0,0,0,0.06);
        }

        .profile-icon{

            width:60px;
            height:60px;

            border-radius:18px;

            display:flex;
            align-items:center;
            justify-content:center;

            color:white;
            font-size:24px;

            background:
                linear-gradient(
                    135deg,
                    #4f46e5,
                    #7c3aed
                );
        }

        /* HERO */

        .hero-card{

            border:none;

            border-radius:35px;

            overflow:hidden;

            background:
                linear-gradient(
                    135deg,
                    #4f46e5,
                    #7c3aed
                );

            color:white;

            margin-bottom:35px;

            box-shadow:
                0 20px 50px rgba(79,70,229,0.25);
        }

        .hero-content{
            padding:45px;
        }

        .hero-title{

            font-size:44px;
            font-weight:800;

            margin-bottom:14px;
        }

        .hero-text{

            line-height:1.9;

            color:#e0e7ff;
        }

        /* STATISTIK */

        .stat-link{
            text-decoration:none;
        }

        .stat-card{

            border:none;

            border-radius:28px;

            overflow:hidden;

            transition:0.35s ease;

            cursor:pointer;
        }

        .stat-card:hover{

            transform:
                translateY(-10px) scale(1.02);

            box-shadow:
                0 20px 40px rgba(0,0,0,0.15);
        }

        .stat-body{

            padding:30px;

            position:relative;
        }

        .stat-label{

            font-size:17px;
            font-weight:600;

            color:white;
        }

        .stat-total{

            font-size:50px;
            font-weight:800;

            color:white;

            margin-top:10px;
        }

        .stat-icon{

            position:absolute;

            top:25px;
            right:25px;

            font-size:60px;

            opacity:0.18;
        }

        .card-buku{
            background:linear-gradient(135deg,#10b981,#34d399);
        }

        .card-siswa{
            background:linear-gradient(135deg,#3b82f6,#60a5fa);
        }

        .card-transaksi{
            background:linear-gradient(135deg,#f59e0b,#fbbf24);
        }

        .card-sanksi{
            background:linear-gradient(135deg,#ef4444,#f87171);
        }

        /* AKTIVITAS */

        .activity-card{

            background:white;

            border-radius:30px;

            overflow:hidden;

            box-shadow:
                0 10px 30px rgba(0,0,0,0.06);
        }

        .activity-header{

            padding:25px 30px;

            font-size:24px;
            font-weight:700;

            color:#0f172a;

            border-bottom:
                1px solid #e2e8f0;
        }

        .activity-item{

            display:flex;
            justify-content:space-between;
            align-items:center;

            padding:25px 30px;

            border-bottom:
                1px solid #f1f5f9;

            transition:0.3s;
        }

        .activity-item:hover{

            background:#f8fafc;
        }

        .activity-left{

            display:flex;
            align-items:center;
            gap:18px;
        }

        .activity-icon{

            width:60px;
            height:60px;

            border-radius:18px;

            display:flex;
            align-items:center;
            justify-content:center;

            color:white;

            font-size:22px;
        }

        .icon-pinjam{
            background:linear-gradient(135deg,#f59e0b,#fbbf24);
        }

        .icon-kembali{
            background:linear-gradient(135deg,#10b981,#34d399);
        }

        .icon-terlambat{
            background:linear-gradient(135deg,#ef4444,#f87171);
        }

        .activity-title{

            font-size:18px;
            font-weight:700;

            color:#0f172a;
        }

        .activity-desc{

            color:#64748b;

            margin-top:4px;
        }

        .activity-time{

            color:#94a3b8;

            font-size:14px;
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
            }

            .page-title{
                font-size:30px;
            }

            .hero-title{
                font-size:34px;
            }
        }

    </style>

</head>

<body>

    <!-- SIDEBAR -->

    <div class="sidebar">

        <div class="logo-box">

            <div class="logo-icon">
                <i class="fa-solid fa-school"></i>
            </div>

            <div class="logo-title">
                PERPUSTAKAAN
            </div>

            <div class="logo-subtitle">
                Dashboard Kepala Sekolah
            </div>

        </div>

        <ul class="sidebar-menu">

            <!-- DASHBOARD -->

            <li>

                <a
                    href="{{ route('dashboard.kepsek') }}"
                    class="{{ request()->routeIs('dashboard.kepsek') ? 'active' : '' }}"
                >

                    <i class="fa-solid fa-house"></i>

                    Dashboard

                </a>

            </li>

            <!-- INFORMASI BUKU -->

            <li>

                <a
                    href="{{ route('kepsek.buku') }}"
                    class="{{ request()->routeIs('kepsek.buku') ? 'active' : '' }}"
                >

                    <i class="fa-solid fa-book"></i>

                    Informasi Buku

                </a>

            </li>

            <!-- INFORMASI SISWA -->

            <li>

                <a
                    href="{{ route('kepsek.siswa') }}"
                    class="{{ request()->routeIs('kepsek.siswa') ? 'active' : '' }}"
                >

                    <i class="fa-solid fa-users"></i>

                    Informasi Siswa

                </a>

            </li>

            <!-- INFORMASI TRANSAKSI -->

            <li>

                <a
                    href="{{ route('kepsek.transaksi') }}"
                    class="{{ request()->routeIs('kepsek.transaksi') ? 'active' : '' }}"
                >

                    <i class="fa-solid fa-book-open"></i>

                    Informasi Transaksi

                </a>

            </li>
            <!-- UBAH PASSWORD -->

            <li>

                <a
                    href="{{ route('password.form') }}"
                    class="{{ request()->routeIs('password.form') ? 'active' : '' }}"
                >
                    🔑 Ubah Password

                </a>

            </li>

            <!-- LOGOUT -->

            <li class="mt-4">

                <form
                    action="{{ route('logout') }}"
                    method="POST"
                >

                    @csrf

                    <button
                        type="submit"
                        class="logout-btn"
                    >

                        <i class="fa-solid fa-right-from-bracket"></i>

                        Logout

                    </button>

                </form>

            </li>

        </ul>

    </div>

    <!-- MAIN -->

    <div class="main-content">

        <!-- TOPBAR -->

        <div class="topbar">

            <div>

                <div class="page-title">
                    Dashboard Kepala Sekolah
                </div>

                <div class="page-subtitle">
                    Monitoring Sistem Perpustakaan Digital
                </div>

            </div>

            <div class="profile-box">

                <div class="profile-icon">
                    <i class="fa-solid fa-user-tie"></i>
                </div>

                <div>

                    <div class="fw-bold text-dark">
                        {{ session('nama_kepala_sekolah') }}
                    </div>

                    <small class="text-secondary">
                        Administrator
                    </small>

                </div>

            </div>

        </div>

        <!-- HERO -->

        <div class="hero-card">

            <div class="hero-content">

                <div class="hero-title">
                    Selamat Datang 👋
                </div>

                <div class="hero-text">

                    Monitoring seluruh aktivitas perpustakaan sekolah
                    mulai dari data buku, siswa,
                    transaksi hingga sanksi secara realtime.

                </div>

            </div>

        </div>

        <!-- STATISTIK -->

        <div class="row mb-4">

            <!-- TOTAL BUKU -->

            <div class="col-lg-3 col-md-6 mb-4">

                <a
                    href="{{ route('kepsek.buku') }}"
                    class="stat-link"
                >

                    <div class="card stat-card card-buku">

                        <div class="stat-body">

                            <div class="stat-label">
                                Total Buku
                            </div>

                            <div class="stat-total">
                                {{ $total_buku ?? 0 }}
                            </div>

                            <i class="fa-solid fa-book stat-icon"></i>

                        </div>

                    </div>

                </a>

            </div>

            <!-- TOTAL SISWA -->

            <div class="col-lg-3 col-md-6 mb-4">

                <a
                    href="{{ route('kepsek.siswa') }}"
                    class="stat-link"
                >

                    <div class="card stat-card card-siswa">

                        <div class="stat-body">

                            <div class="stat-label">
                                Total Siswa
                            </div>

                            <div class="stat-total">
                                {{ $total_siswa ?? 0 }}
                            </div>

                            <i class="fa-solid fa-users stat-icon"></i>

                        </div>

                    </div>

                </a>

            </div>

            <!-- TOTAL TRANSAKSI -->

            <div class="col-lg-3 col-md-6 mb-4">

                <a
                    href="{{ route('kepsek.transaksi') }}"
                    class="stat-link"
                >

                    <div class="card stat-card card-transaksi">

                        <div class="stat-body">

                            <div class="stat-label">
                                Total Transaksi
                            </div>

                            <div class="stat-total">
                                {{ $total_transaksi ?? 0 }}
                            </div>

                            <i class="fa-solid fa-book-open stat-icon"></i>

                        </div>

                    </div>

                </a>

            </div>

        <!-- AKTIVITAS -->

        <div class="activity-card">

            <div class="activity-header">

                <i class="fa-solid fa-chart-line me-2"></i>

                Aktivitas Terbaru

            </div>

            @forelse($transaksi as $t)

            <div class="activity-item">

                <div class="activity-left">

                    <div
                        class="activity-icon

                        @if($t->status == 'dipinjam')
                            icon-pinjam
                        @elseif($t->status == 'dikembalikan')
                            icon-kembali
                        @else
                            icon-terlambat
                        @endif
                    ">

                        <i class="fa-solid fa-book"></i>

                    </div>

                    <div>

                        <div class="activity-title">

                            {{ $t->siswa->nama_siswa ?? '-' }}

                        </div>

                        <div class="activity-desc">

                            {{ $t->status }}
                            buku

                            <strong>
                                {{ $t->buku->judul_buku ?? '-' }}
                            </strong>

                        </div>

                    </div>

                </div>

                <div class="activity-time">

                    {{ $t->created_at->diffForHumans() }}

                </div>

            </div>

            @empty

            <div class="text-center p-5 text-secondary">

                Tidak ada aktivitas

            </div>

            @endforelse

        </div>

    </div>

    <!-- Bootstrap -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>