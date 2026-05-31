<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>

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
            max-width:750px;
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
            background:linear-gradient(to right, #f9a8d4, #60a5fa);
            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .header p{
            color:#cbd5e1;
            margin-top:8px;
            font-size:14px;
        }

        .badge{
            display:inline-block;
            margin-top:14px;
            padding:8px 16px;
            border-radius:999px;
            background:rgba(139,92,246,0.15);
            border:1px solid rgba(192,132,252,0.4);
            color:#f3e8ff;
            font-size:13px;
        }

        .form-group{
            margin-bottom:24px;
        }

        label{
            display:block;
            margin-bottom:10px;
            font-size:15px;
            font-weight:500;
            color:#f8fafc;
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

        select option{
            background:#1e293b;
            color:white;
        }

        input::placeholder{
            color:#cbd5e1;
        }

        /* Cover */

        .cover-preview{
            margin-top:15px;
            text-align:center;
        }

        .cover-preview img{
            width:130px;
            height:180px;
            object-fit:cover;
            border-radius:18px;
            border:2px solid rgba(255,255,255,0.15);
            box-shadow:0 10px 25px rgba(0,0,0,0.35);
        }

        .upload-box{
            border:2px dashed rgba(255,255,255,0.15);
            border-radius:20px;
            padding:25px;
            text-align:center;
            background:rgba(255,255,255,0.05);
            transition:0.3s;
        }

        .upload-box:hover{
            border-color:#8b5cf6;
            background:rgba(255,255,255,0.08);
        }

        .upload-box input{
            background:none;
            border:none;
            padding:0;
        }

        .btn{
            width:100%;
            padding:16px;
            border:none;
            border-radius:18px;
            background:linear-gradient(135deg, #ec4899, #3b82f6);
            color:white;
            font-size:16px;
            font-weight:600;
            cursor:pointer;
            transition:0.3s;
            box-shadow:0 8px 20px rgba(236,72,153,0.35);
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

        <h1>✏ Edit Buku</h1>

        <p>
            Perbarui informasi buku perpustakaan
        </p>

        <div class="badge">
            ID Buku : #{{ $buku->id_buku }}
        </div>

    </div>

    <form action="/buku/{{ $buku->id_buku }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="form-group">

            <label>Judul Buku</label>

            <input type="text"
                   name="judul_buku"
                   value="{{ $buku->judul_buku }}">

        </div>

        <div class="form-group">

            <label>Pengarang</label>

            <input type="text"
                   name="pengarang"
                   value="{{ $buku->pengarang }}">

        </div>

        <div class="form-group">

            <label>Penerbit</label>

            <input type="text"
                   name="penerbit"
                   value="{{ $buku->penerbit }}">

        </div>

        <div class="form-group">

            <label>Tahun Terbit</label>

            <input type="number"
                   name="tahun_terbit"
                   value="{{ $buku->tahun_terbit }}">

        </div>

        <div class="mb-3">

    <label>
        Deskripsi Buku
    </label>

    <textarea
        name="deskripsi"
        class="form-control"
        rows="5">{{ $buku->deskripsi }}</textarea>

</div>

        <div class="form-group">

            <label>Kategori</label>

            <select name="id_kategori">

                @foreach($kategori as $k)

                <option value="{{ $k->id_kategori }}"
                    {{ $buku->id_kategori == $k->id_kategori ? 'selected' : '' }}>

                    {{ $k->nama_kategori }}

                </option>

                @endforeach

            </select>

        </div>

        <!-- Cover -->

        <div class="form-group">

            <label>Cover Buku</label>

            <div class="upload-box">

                <p style="margin-bottom:15px; color:#cbd5e1;">
                    Upload cover baru jika ingin mengganti
                </p>

                <input type="file" name="cover">

            </div>

            @if($buku->cover)

            <div class="cover-preview">

                <img src="{{ asset('storage/' . $buku->cover) }}">

            </div>

            @endif

        </div>

        <button type="submit" class="btn">
            🚀 Update Buku
        </button>

    </form>

    <a href="/buku" class="back">
        ← Kembali ke Data Buku
    </a>

</div>

</body>
</html>