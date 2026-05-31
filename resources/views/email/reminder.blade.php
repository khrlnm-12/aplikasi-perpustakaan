<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Notifikasi Perpustakaan</title>
</head>

<body style="
    margin:0;
    padding:30px;
    background:#f1f5f9;
    font-family:Arial, sans-serif;
">

    <div style="
        max-width:600px;
        margin:auto;
        background:#ffffff;
        border-radius:20px;
        overflow:hidden;
        box-shadow:0 8px 25px rgba(0,0,0,0.08);
    ">

        <!-- HEADER -->
        <div style="
            background:linear-gradient(135deg,#16a34a,#22c55e);
            padding:35px;
            text-align:center;
            color:white;
        ">

            <h1 style="
                margin:0;
                font-size:28px;
                letter-spacing:1px;
            ">
                📚 Perpustakaan Digital
            </h1>

            <p style="
                margin-top:10px;
                opacity:0.9;
                font-size:15px;
            ">
                Sistem Notifikasi Pengembalian Buku
            </p>

        </div>

        <!-- CONTENT -->
        <div style="
            padding:40px 35px;
            color:#1e293b;
        ">

            <h2 style="
                margin-top:0;
                font-size:24px;
                color:#0f172a;
            ">
                Halo,
                {{ $transaksi->siswa->nama_siswa }} 👋
            </h2>

            @if($type == 'reminder')

                <div style="
                    margin-top:25px;
                    background:#ecfdf5;
                    border-left:6px solid #22c55e;
                    padding:25px;
                    border-radius:14px;
                ">

                    <p style="
                        margin:0;
                        color:#475569;
                        font-size:16px;
                    ">
                        Buku berikut akan jatuh tempo dalam
                        <b>2 hari</b>:
                    </p>

                    <h3 style="
                        margin-top:15px;
                        margin-bottom:0;
                        color:#16a34a;
                        font-size:22px;
                    ">
                        {{ $transaksi->buku->judul_buku }}
                    </h3>

                </div>

            @endif

            @if($type == 'late')

                <div style="
                    margin-top:25px;
                    background:#fef2f2;
                    border-left:6px solid #ef4444;
                    padding:25px;
                    border-radius:14px;
                ">

                    <p style="
                        margin:0;
                        color:#475569;
                        font-size:16px;
                    ">
                        Anda terlambat mengembalikan buku:
                    </p>

                    <h3 style="
                        margin-top:15px;
                        margin-bottom:0;
                        color:#dc2626;
                        font-size:22px;
                    ">
                        {{ $transaksi->buku->judul_buku }}
                    </h3>

                </div>

            @endif

            <p style="
                margin-top:35px;
                line-height:1.8;
                color:#475569;
                font-size:15px;
            ">
                Mohon segera melakukan pengembalian buku
                agar terhindar dari keterlambatan dan sanksi.
            </p>

        </div>

        <!-- FOOTER -->
        <div style="
            border-top:1px solid #e2e8f0;
            padding:20px;
            text-align:center;
            color:#94a3b8;
            font-size:13px;
        ">

            © {{ date('Y') }} Perpustakaan Digital

        </div>

    </div>

</body>
</html>