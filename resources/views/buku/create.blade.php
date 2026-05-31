<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
            padding:30px;
            background:
            radial-gradient(circle at top left, rgba(168,85,247,0.4), transparent 30%),
            radial-gradient(circle at bottom right, rgba(59,130,246,0.4), transparent 30%),
            linear-gradient(135deg, #0f172a, #111827, #1e293b);
        }

        .card{
            width:100%;
            max-width:700px;
            backdrop-filter:blur(18px);
            background:rgba(255,255,255,0.08);
            border:1px solid rgba(255,255,255,0.1);
            border-radius:30px;
            padding:40px;
            box-shadow:0 10px 40px rgba(0,0,0,0.4);
            color:white;
        }

        .header{
            text-align:center;
            margin-bottom:35px;
        }

        .header h1{
            font-size:36px;
            font-weight:700;
            background:linear-gradient(to right, #c084fc, #60a5fa);
            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .header p{
            color:#cbd5e1;
            margin-top:8px;
            font-size:14px;
        }

        .form-group{
            margin-bottom:24px;
        }

        label{
            display:block;
            margin-bottom:10px;
            font-size:15px;
            font-weight:500;
            color:#f1f5f9;
        }

        input,
        select{
            width:100%;
            padding:15px 18px;
            border:none;
            outline:none;
            border-radius:16px;
            background:rgba(255,255,255,0.08);
            border:1px solid rgba(255,255,255,0.08);
            color:white;
            font-size:15px;
            transition:0.3s;
        }

        input:focus,
        select:focus{
            border:1px solid #8b5cf6;
            box-shadow:0 0 15px rgba(139,92,246,0.4);
            background:rgba(255,255,255,0.12);
        }

        input::placeholder{
            color:#cbd5e1;
        }

        select option{
            background:#1e293b;
            color:white;
        }

        /* Upload Cover */

        .upload-box{
            position:relative;
            border:2px dashed rgba(255,255,255,0.2);
            border-radius:20px;
            padding:30px;
            text-align:center;
            background:rgba(255,255,255,0.05);
            transition:0.3s;
        }

        .upload-box:hover{
            border-color:#8b5cf6;
            background:rgba(255,255,255,0.08);
        }

        .upload-box input[type="file"]{
            background:none;
            border:none;
            padding:0;
            cursor:pointer;
        }

        .upload-icon{
            font-size:45px;
            margin-bottom:10px;
        }

        .upload-text{
            color:#cbd5e1;
            font-size:14px;
        }

        .btn{
            width:100%;
            padding:16px;
            border:none;
            border-radius:18px;
            background:linear-gradient(135deg, #8b5cf6, #3b82f6);
            color:white;
            font-size:16px;
            font-weight:600;
            cursor:pointer;
            transition:0.3s;
            box-shadow:0 8px 20px rgba(139,92,246,0.4);
        }

        .btn:hover{
            transform:translateY(-3px);
            box-shadow:0 10px 25px rgba(59,130,246,0.5);
        }

        .back{
            display:inline-block;
            margin-top:20px;
            color:#cbd5e1;
            text-decoration:none;
            font-size:14px;
            transition:0.3s;
        }

        .back:hover{
            color:white;
        }

        @media(max-width:768px){

            .card{
                padding:30px 24px;
            }

            .header h1{
                font-size:28px;
            }

        }

    </style>
</head>

<body>

<div class="card">

    <div class="header">
        <h1>📚 Tambah Buku</h1>
        <p>Tambahkan data buku baru ke sistem perpustakaan</p>
    </div>

    <!-- enctype wajib untuk upload file -->
    <form action="/buku"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="form-group">

            <label>Judul Buku</label>

            <input type="text"
                   name="judul_buku"
                   placeholder="Masukkan judul buku">

        </div>

        <div class="form-group">

            <label>Pengarang</label>

            <input type="text"
                   name="pengarang"
                   placeholder="Masukkan nama pengarang">

        </div>

        <div class="form-group">

            <label>Penerbit</label>

            <input type="text"
                   name="penerbit"
                   placeholder="Masukkan nama penerbit">

        </div>

        <div class="form-group">

    <label>Tahun Terbit</label>

    <input type="number"
           name="tahun_terbit"
           placeholder="Contoh: 2025">

</div>

<div class="mb-3">

    <label>
        Deskripsi Buku
    </label>

    <textarea
        name="deskripsi"
        class="form-control"
        rows="5"></textarea>

</div>

        <div class="form-group">

            <label>Kategori</label>

            <select name="id_kategori">

                <option disabled selected>
                    -- Pilih Kategori --
                </option>

                @foreach($kategori as $k)

                <option value="{{ $k->id_kategori }}">
                    {{ $k->nama_kategori }}
                </option>

                @endforeach

            </select>

        </div>

        <!-- Upload Cover -->

        <div class="form-group">

            <label>Cover Buku</label>

            <div class="upload-box">

                <div class="upload-icon">
                    📖
                </div>

                <p class="upload-text">
                    Upload cover buku di sini
                </p>

                <br>

                <input type="file"
                       name="cover">

            </div>

        </div>

        <button type="submit" class="btn">
            💾 Simpan Buku
        </button>

    </form>

    <a href="/buku" class="back">
        ← Kembali ke Data Buku
    </a>

</div>

</body>
</html>