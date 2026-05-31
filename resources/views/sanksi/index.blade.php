@extends('layouts.petugas')

@section('title', 'Data Sanksi')

@section('page-title', 'Data Sanksi')

@section('content')

<style>

.table-card{

    background:
    rgba(255,255,255,.08);

    border:1px solid rgba(255,255,255,.08);

    backdrop-filter:blur(18px);

    border-radius:30px;

    overflow:hidden;

    box-shadow:
    0 10px 35px rgba(0,0,0,.25);
}

.table-header{

    padding:22px 30px;

    background:
    linear-gradient(
        135deg,
        #ef4444,
        #dc2626
    );

    display:flex;

    justify-content:space-between;

    align-items:center;
}

.table-header h2{

    color:white;

    font-size:24px;

    font-weight:700;
}

.btn-tambah{

    text-decoration:none;

    background:white;

    color:#dc2626;

    padding:10px 18px;

    border-radius:14px;

    font-weight:700;
}

table{

    width:100%;

    border-collapse:collapse;
}

th{

    padding:18px;

    background:
    rgba(255,255,255,.05);

    color:#e2e8f0;

    text-align:center;
}

td{

    padding:18px;

    text-align:center;

    color:white;

    border-bottom:
    1px solid rgba(255,255,255,.05);
}

tr:hover{

    background:
    rgba(255,255,255,.03);
}

.action-btn{

    padding:8px 14px;

    border-radius:10px;

    text-decoration:none;

    color:white;

    font-size:13px;

    font-weight:600;
}

.edit{

    background:#3b82f6;
}

.delete{

    background:#ef4444;

    border:none;
}

.empty{

    padding:30px;

    color:#cbd5e1;
}

</style>

<div class="table-card">

    <div class="table-header">

        <h2>

            ⚠️ Data Sanksi

        </h2>

        <a href="/sanksi/create"
           class="btn-tambah">

            + Tambah Sanksi

        </a>

    </div>

    <table>

        <thead>

            <tr>

                <th>No</th>
                <th>Jenis Sanksi</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

            @forelse($sanksi as $s)

            <tr>

                <td>

                    {{ $loop->iteration }}

                </td>

                <td>

                    {{ $s->jenis_sanksi }}

                </td>

                <td>

                    <a href="/sanksi/{{ $s->id_sanksi }}/edit"
                       class="action-btn edit">

                        Edit

                    </a>

                    <form
                        action="/sanksi/{{ $s->id_sanksi }}"
                        method="POST"
                        style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button
                            class="action-btn delete">

                            Hapus

                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="3"
                    class="empty">

                    Data sanksi belum ada

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection