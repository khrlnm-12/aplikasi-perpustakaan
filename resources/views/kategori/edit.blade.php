<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>

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
            max-width:550px;
            padding:40px;
            border-radius:30px;
            backdrop-filter:blur(18px);
            background:rgba(255,255,255,0.08);
            border:1px solid rgba(255,255,255,0.1);
            box-shadow:0 10px 40px rgba(0,0,0,0.4);
            color:white;
        }

        .header{
            text-align:center;
            margin-bottom:35px;
        }

        .header h1{
            font-size:34px;
            font-weight:700;
            background:linear-gradient(to right, #f9a8d4, #60a5fa);
            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .header p{
            margin-top:8px;
            color:#cbd5e1;
            font-size:14px;
        }

        .form-group{
            margin-bottom:25px;
        }

        label{
            display:block;
            margin-bottom:12px;
            font-size:15px;
            font-weight:500;
            color:#f8fafc;
        }

        input{
            width:100%;
            padding:16px 18px;
            border:none;
            outline:none;
            border-radius:18px;
            background:rgba(255,255,255,0.08);
            border:1px solid rgba(255,255,255,0.08);
            color:white;
            font-size:15px;
            transition:0.3s;
        }

        input:focus{
            border:1px solid #8b5cf6;
            background:rgba(255,255,255,0.12);
            box-shadow:0 0 15px rgba(139,92,246,0.4);
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

        .badge{
            display:inline-block;
            padding:8px 16px;
            border-radius:999px;
            background:rgba(236,72,153,0.15);
            border:1px solid rgba(244,114,182,0.4);
            color:#fbcfe8;
            font-size:13px;
            margin-top:12px;
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

        <h1>✏ Edit Kategori</h1>

        <p>
            Ubah data kategori sesuai kebutuhan
        </p>

        <div class="badge">
            ID Kategori : #{{ $kategori->id_kategori }}
        </div>

    </div>

    <form action="/kategori/{{ $kategori->id_kategori }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">

            <label>Nama Kategori</label>

            <input type="text"
                   name="nama_kategori"
                   value="{{ $kategori->nama_kategori }}">

        </div>

        <button type="submit" class="btn">
            🚀 Update Kategori
        </button>

    </form>

    <a href="/kategori" class="back">
        ← Kembali ke Data Kategori
    </a>

</div>

</body>
</html>