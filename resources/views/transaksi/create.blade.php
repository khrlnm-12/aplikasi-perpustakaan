<!DOCTYPE html>
<html>
<head>
    <title>Tambah Transaksi</title>
</head>
<body>

<h1>Tambah Transaksi</h1>

<form action="/transaksi" method="POST">

    @csrf

    <label>Siswa</label>
    <br>

    <select name="nis">

        @foreach($siswa as $s)

        <option value="{{ $s->nis }}">
            {{ $s->nama_siswa }}
        </option>

        @endforeach

    </select>

    <br><br>

    <label>Buku</label>
    <br>

    <select name="id_buku">

        @foreach($buku as $b)

        <option value="{{ $b->id_buku }}">
            {{ $b->judul_buku }}
        </option>

        @endforeach

    </select>

    <br><br>

    <label>Petugas</label>
    <br>

    <select name="id_petugas">

        @foreach($petugas as $p)

        <option value="{{ $p->id_petugas }}">
            {{ $p->nama_petugas }}
        </option>

        @endforeach

    </select>

    <br><br>

    <label>Tanggal Pinjam</label>
    <br>

    <input type="date" name="tanggal_pinjam">

    <br><br>

    <label>Tanggal Kembali</label>
    <br>

    <input type="date" name="tanggal_kembali">

    <br><br>

    <button type="submit">
        Simpan
    </button>

</form>

</body>
</html>