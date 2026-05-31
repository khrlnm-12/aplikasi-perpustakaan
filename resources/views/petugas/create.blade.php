<!DOCTYPE html>
<html>
<head>
    <title>Tambah Petugas</title>
</head>
<body>

<h1>Tambah Petugas</h1>

<form action="/petugas" method="POST">

    @csrf

    <input type="text" name="nama_petugas" placeholder="Nama Petugas">

    <br><br>

    <input type="text" name="no_telepon" placeholder="No Telepon">

    <br><br>

    <textarea name="alamat" placeholder="Alamat"></textarea>

    <br><br>

    <input type="password" name="password" placeholder="Password">

    <br><br>

    <button type="submit">
        Simpan
    </button>

</form>

</body>
</html>