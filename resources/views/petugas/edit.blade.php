<!DOCTYPE html>
<html>
<head>
    <title>Edit Petugas</title>
</head>
<body>

<h1>Edit Petugas</h1>

<form action="/petugas/{{ $petugas->id_petugas }}" method="POST">

    @csrf
    @method('PUT')

    <input type="text"
           name="nama_petugas"
           value="{{ $petugas->nama_petugas }}">

    <br><br>

    <input type="text"
           name="no_telepon"
           value="{{ $petugas->no_telepon }}">

    <br><br>

    <textarea name="alamat">{{ $petugas->alamat }}</textarea>

    <br><br>

    <input type="text"
           name="username"
           value="{{ $petugas->username }}">

    <br><br>

    <button type="submit">
        Update
    </button>

</form>

</body>
</html>