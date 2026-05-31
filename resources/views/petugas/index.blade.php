<!DOCTYPE html>
<html>
<head>
    <title>Data Petugas</title>
</head>
<body>

<h1>Data Petugas</h1>

<a href="/petugas/create">
    Tambah Petugas
</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>No Telepon</th>
        <th>Username</th>
        <th>Aksi</th>
    </tr>

    @foreach($petugas as $p)

    <tr>
        <td>{{ $p->id_petugas }}</td>
        <td>{{ $p->nama_petugas }}</td>
        <td>{{ $p->no_telepon }}</td>
        <td>{{ $p->username }}</td>

        <td>

            <a href="/petugas/{{ $p->id_petugas }}/edit">
                Edit
            </a>

            <form action="/petugas/{{ $p->id_petugas }}" method="POST">

                @csrf
                @method('DELETE')

                <button type="submit">
                    Hapus
                </button>

            </form>

        </td>

    </tr>

    @endforeach

</table>

</body>
</html>