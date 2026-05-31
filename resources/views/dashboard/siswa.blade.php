@extends('layouts.siswa')

@section('title', 'Dashboard Siswa')

@section('content')

<style>

body{
    background:#f1f5f9;
}

.dashboard-wrapper{
    width:100%;
}

/* HERO */

.hero-section{
    background:
    linear-gradient(
        135deg,
        #16a34a,
        #22c55e
    );

    border-radius:30px;
    padding:40px;
    color:white;
    position:relative;
    overflow:hidden;
    margin-bottom:35px;

    box-shadow:
    0 20px 40px rgba(34,197,94,.20);
}

.hero-section::before{
    content:'';
    position:absolute;
    width:280px;
    height:280px;
    border-radius:50%;
    background:rgba(255,255,255,.08);
    top:-120px;
    right:-90px;
}

.hero-title{
    font-size:38px;
    font-weight:800;
    margin-bottom:10px;
}

.hero-subtitle{
    font-size:15px;
    opacity:.95;
    margin-bottom:28px;
}

.search-form{
    display:flex;
    gap:12px;
}

.search-input{
    flex:1;
    height:58px;
    border:none;
    outline:none;
    border-radius:18px;
    padding:0 22px;
    font-size:15px;
    background:white;
}

.search-btn{
    width:130px;
    border:none;
    border-radius:18px;
    background:#0f172a;
    color:white;
    font-weight:700;
}

.top-grid{
    display:grid;
    grid-template-columns:320px 1fr;
    gap:25px;
    margin-bottom:35px;
}

.custom-card{
    background:white;
    border-radius:28px;
    overflow:hidden;

    box-shadow:
    0 10px 30px rgba(0,0,0,.05);
}

.card-header-custom{
    padding:20px 25px;
    font-size:18px;
    font-weight:700;
    color:white;
}

.blue-header{
    background:
    linear-gradient(
        135deg,
        #2563eb,
        #3b82f6
    );
}

.card-body-custom{
    padding:30px;
}

.qr-box{
    text-align:center;
}

.qr-box svg{
    background:white;
    padding:18px;
    border-radius:24px;

    box-shadow:
    0 10px 25px rgba(0,0,0,.08);
}

.student-name{
    font-size:22px;
    font-weight:700;
    margin-top:20px;
    color:#0f172a;
}

.student-nis{
    display:inline-block;
    margin-top:12px;
    padding:10px 18px;
    border-radius:999px;
    background:#dbeafe;
    color:#2563eb;
    font-size:14px;
    font-weight:700;
}

.section-title{
    font-size:26px;
    font-weight:800;
    color:#0f172a;
    margin-bottom:22px;
}

.book-grid{
    display:grid;
    grid-template-columns:
    repeat(auto-fit,minmax(250px,1fr));

    gap:24px;
    margin-bottom:40px;
}

.book-card{
    background:white;
    border-radius:24px;
    overflow:hidden;
    box-shadow:
    0 10px 30px rgba(0,0,0,.05);

    transition:.3s;
    cursor:pointer;
}

.history-card{
    background:white;
    border-radius:30px;
    padding:30px;
    margin-top:35px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.history-header{
    font-size:40px;
    font-weight:800;
    margin-bottom:25px;
    color:#0f172a;
}

.table-responsive{
    overflow-x:auto;
}

.history-table{
    width:100%;
    border-collapse:collapse;
    min-width:1200px;
}

/* BADGE */

.badge-success{
    background:#dcfce7;
    color:#166534;
    padding:8px 14px;
    border-radius:999px;
    font-size:13px;
    font-weight:700;
}

.badge-danger{
    background:#fee2e2;
    color:#991b1b;
    padding:8px 14px;
    border-radius:999px;
    font-size:13px;
    font-weight:700;
}

.book-card:hover{
    transform:translateY(-8px);

    box-shadow:
    0 18px 40px rgba(0,0,0,.08);
}

.book-cover{
    width:100%;
    height:230px;
    object-fit:contain;
    background:#f8fafc;
    padding:12px;
}

.book-body{
    padding:20px;
}

.book-title{
    font-size:21px;
    font-weight:700;
    color:#0f172a;
    margin-bottom:10px;
}

.book-desc{
    color:#64748b;
    font-size:14px;
    min-height:50px;
    margin-bottom:18px;
}

.book-footer{
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.ai-badge{
    background:#ede9fe;
    color:#7c3aed;
    padding:8px 14px;
    border-radius:999px;
    font-size:12px;
    font-weight:700;
}

.detail-btn{
    border:none;
    background:#22c55e;
    color:white;
    padding:12px 20px;
    border-radius:14px;
    font-weight:700;
    width:100%;
}

.history-card{
    background:white;
    border-radius:28px;
    padding:30px;

    box-shadow:
    0 10px 30px rgba(0,0,0,.05);

    margin-bottom:35px;
}

.history-table{
    width:100%;
}

.history-table th{
    color:#0f172a;
    padding-bottom:18px;
    text-align:left;
}

.history-table td{
    padding:18px 0;
    border-top:1px solid #e2e8f0;
}

.badge-dipinjam{
    background:#facc15;
    color:#78350f;
    padding:7px 14px;
    border-radius:999px;
    font-size:12px;
    font-weight:700;
}

.badge-kembali{
    background:#22c55e;
    color:white;
    padding:7px 14px;
    border-radius:999px;
    font-size:12px;
    font-weight:700;
}

.modal-content{
    border:none;
    border-radius:30px;
    overflow:hidden;
}

.modal-header{
    background:
    linear-gradient(
        135deg,
        #2563eb,
        #3b82f6
    );

    color:white;
    border:none;
}

.modal-body{
    padding:35px;
}

@media(max-width:992px){

    .top-grid{
        grid-template-columns:1fr;
    }

    .hero-title{
        font-size:28px;
    }

    .search-form{
        flex-direction:column;
    }

    .search-btn{
        width:100%;
        height:55px;
    }

}

</style>

<div class="dashboard-wrapper">

    <!-- HERO -->

    <div class="hero-section">

        <div class="hero-title">

            👋 Selamat Datang,
            {{ session('nama_siswa') }}

        </div>

        <div class="hero-subtitle">

            Jelajahi koleksi buku digital perpustakaan

        </div>

        <div class="search-form">

            <input
                type="text"
                id="searchBook"
                class="search-input"
                placeholder="Cari buku favoritmu...">

            <button class="search-btn">

                Cari

            </button>

        </div>

    </div>

    <!-- TOP GRID -->

    <div class="top-grid">

        <!-- QR SISWA -->

        <div class="custom-card">

            <div class="card-header-custom blue-header">

                🎫 Kartu Digital Perpustakaan

            </div>

            <div class="card-body-custom">

                <div class="qr-box">

                    {!! SimpleSoftwareIO\QrCode\Facades\QrCode::size(220)->generate(session('nis')) !!}

                    <div class="student-name">

                        {{ session('nama_siswa') }}

                    </div>

                    <div class="student-nis">

                        NIS :
                        {{ session('nis') }}

                    </div>

                </div>

            </div>

        </div>

        <!-- TRENDING -->

        @if(isset($semuaBuku[0]))

        <div class="book-card open-book"

            data-title="{{ strtolower($semuaBuku[0]->judul_buku) }}"
            data-judul="{{ $semuaBuku[0]->judul_buku }}"
            data-qr="{{ $semuaBuku[0]->qr_code }}"
            data-deskripsi="{{ $semuaBuku[0]->deskripsi }}"
            data-cover="{{ asset('storage/'.$semuaBuku[0]->cover) }}"
            data-pengarang="{{ $semuaBuku[0]->pengarang }}"
            data-penerbit="{{ $semuaBuku[0]->penerbit }}"
            data-tahun="{{ $semuaBuku[0]->tahun_terbit }}">

            @if($semuaBuku[0]->cover)

            <img
                src="{{ asset('storage/'.$semuaBuku[0]->cover) }}"
                class="book-cover">

            @endif

            <div class="book-body">

                <div class="book-title">

                    🔥 {{ $semuaBuku[0]->judul_buku }}

                </div>

                <div class="book-desc">

                    {{ Str::limit($semuaBuku[0]->deskripsi, 120) }}

                </div>

                <button class="detail-btn">

                    📖 Lihat Detail Buku

                </button>

            </div>

        </div>

        @endif

    </div>

    <!-- REKOMENDASI -->

    <div class="section-title">

        🤖 Recommended For You

    </div>

    <div class="book-grid">

        @foreach($rekomendasi as $r)

        <div class="book-card open-book searchable-book"

            data-title="{{ strtolower($r->judul_buku) }}"
            data-judul="{{ $r->judul_buku }}"
            data-qr="{{ $r->qr_code }}"
            data-deskripsi="{{ $r->deskripsi }}"
            data-cover="{{ asset('storage/'.$r->cover) }}"
            data-pengarang="{{ $r->pengarang }}"
            data-penerbit="{{ $r->penerbit }}"
            data-tahun="{{ $r->tahun_terbit }}">

            @if($r->cover)

            <img
                src="{{ asset('storage/'.$r->cover) }}"
                class="book-cover">

            @endif

            <div class="book-body">

                <div class="book-title">

                    {{ $r->judul_buku }}

                </div>

                <div class="book-desc">

                    {{ Str::limit($r->deskripsi, 100) }}

                </div>

                <div class="book-footer">

                    <span class="ai-badge">

                        🤖 {{ $r->similarity_score ?? 0 }}%

                    </span>

                </div>
                
                <div class="ai-box">

    @php

    $score = $r->similarity_score ?? 0;

    $kategori =
    strtolower(
        $r->kategori->nama_kategori ?? ''
    );

    if($score >= 70){

        $awalan =
        'Sangat direkomendasikan karena';

    }
    elseif($score >= 40){

        $awalan =
        'Direkomendasikan karena';

    }
    else{

        $awalan =
        'Mungkin cocok karena';
    }

    switch($kategori){

    case 'matematika':

        $kesimpulan =
        $awalan .
        ' berkaitan dengan logika, rumus, dan latihan matematika SMA.';

        break;

    case 'fisika':

        $kesimpulan =
        $awalan .
        ' cocok untuk memahami konsep fisika dan perhitungan SMA.';

        break;

    case 'kimia':

        $kesimpulan =
        $awalan .
        ' membantu mempelajari materi kimia dan praktikum SMA.';

        break;

    case 'biologi':

        $kesimpulan =
        $awalan .
        ' sesuai untuk belajar makhluk hidup dan sains SMA.';

        break;

    case 'sejarah':

        $kesimpulan =
        $awalan .
        ' berkaitan dengan pembelajaran sejarah dan wawasan nasional.';

        break;

    case 'bahasa indonesia':

        $kesimpulan =
        $awalan .
        ' membantu meningkatkan kemampuan membaca dan memahami teks.';

        break;

    case 'bahasa inggris':

        $kesimpulan =
        $awalan .
        ' cocok untuk belajar vocabulary dan grammar bahasa Inggris.';

        break;

    case 'geografi':

        $kesimpulan =
        $awalan .
        ' membantu memahami peta, lingkungan, dan fenomena bumi.';

        break;

    case 'olahraga':
        $kesimpulan =
        $awalan .
        'cocok untuk menambah wawasan tentang kesehatan, kebugaran, dan aktivitas olahraga.';

    break;

    case 'ekonomi':

        $kesimpulan =
        $awalan .
        ' sesuai untuk belajar ekonomi dan kegiatan bisnis dasar.';

        break;

    case 'novel':

        $kesimpulan =
        $awalan .
        ' cocok untuk hiburan serta meningkatkan minat membaca.';

        break;

    default:

        $kesimpulan =
        $awalan .
        ' memiliki kemiripan dengan histori peminjaman Anda.';
}

    @endphp

    🤖 {{ $kesimpulan }}

</div>

                <div style="margin-top:18px;">

                    <button class="detail-btn">

                        📖 Klik Detail Buku

                    </button>

                </div>

            </div>

        </div>

        @endforeach

    </div>

    <!-- EXPLORE -->

    <div class="section-title">

        📘 Explore Books

    </div>

    <div class="book-grid">

        @foreach($semuaBuku as $b)

        <div class="book-card open-book searchable-book"

            data-title="{{ strtolower($b->judul_buku) }}"
            data-judul="{{ $b->judul_buku }}"
            data-qr="{{ $b->qr_code }}"
            data-deskripsi="{{ $b->deskripsi }}"
            data-cover="{{ asset('storage/'.$b->cover) }}"
            data-pengarang="{{ $b->pengarang }}"
            data-penerbit="{{ $b->penerbit }}"
            data-tahun="{{ $b->tahun_terbit }}">

            @if($b->cover)

            <img
                src="{{ asset('storage/'.$b->cover) }}"
                class="book-cover">

            @endif

            <div class="book-body">

                <div class="book-title">

                    {{ $b->judul_buku }}

                </div>

                <div class="book-desc">

                    {{ Str::limit($b->deskripsi, 100) }}

                </div>

                <button class="detail-btn">

                    📖 Klik Detail Buku

                </button>

            </div>

        </div>

        @endforeach

    </div>

    <!-- RIWAYAT -->

    <div class="history-card">

    <div class="history-header">

        📚 Riwayat Peminjaman

    </div>

    <div class="table-responsive">

        <table class="history-table">

            <thead>

                <tr>

                    <th>No</th>

                    <th>Judul Buku</th>

                    <th>Tanggal Pinjam</th>

                    <th>Batas Kembali</th>

                    <th>Tanggal Dikembalikan</th>

                    <th>Status</th>
                </tr>

            </thead>

            <tbody>

                @forelse($riwayat as $k => $r)

                <tr>

                    <td>

                        {{ $k + 1 }}

                    </td>

                    <td>

                        {{ $r->buku->judul_buku ?? '-' }}

                    </td>

                    <td>

                        {{ \Carbon\Carbon::parse($r->tanggal_pinjam)->format('d M Y') }}

                    </td>

                    <td>

                        {{ \Carbon\Carbon::parse($r->tanggal_kembali)->format('d M Y') }}

                    </td>

                    <td>

                        @if($r->tanggal_dikembalikan)

                            {{ \Carbon\Carbon::parse($r->tanggal_dikembalikan)->format('d M Y') }}

                        @else

                            -

                        @endif

                    </td>

                    <td>

                        @if($r->status == 'dipinjam')

                            <span class="badge-warning">

                                Dipinjam

                            </span>

                        @elseif($r->status == 'terlambat')

                            <span class="badge-danger">

                                Terlambat

                            </span>

                        @else

                            <span class="badge-success">

                                Dikembalikan

                            </span>

                        @endif

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="8">

                        Belum ada riwayat peminjaman

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>
<!-- MODAL -->

<div class="modal fade"
     id="bookModal"
     tabindex="-1">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    📖 Detail Buku

                </h5>

                <button
                    type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <div class="row g-4">

                    <div class="col-md-4">

                        <img
                            id="modalCover"
                            class="img-fluid rounded shadow"
                            style="
                            width:100%;
                            height:300px;
                            object-fit:contain;
                            background:#f8fafc;
                            padding:15px;
                            border-radius:20px;">

                    </div>

                    <div class="col-md-8">

                        <h2 id="modalJudul"
                            style="
                            font-weight:800;
                            margin-bottom:20px;
                            color:#0f172a;">
                        </h2>

                        <div style="margin-bottom:12px;">

                            <strong>✍ Pengarang :</strong>

                            <span id="modalPengarang"></span>

                        </div>

                        <div style="margin-bottom:12px;">

                            <strong>🏢 Penerbit :</strong>

                            <span id="modalPenerbit"></span>

                        </div>

                        <div style="margin-bottom:12px;">

                            <strong>📅 Tahun :</strong>

                            <span id="modalTahun"></span>

                        </div>

                        <div style="margin-bottom:20px;">

                            <strong>📚 QR Buku :</strong>

                            <div id="modalQr"
                                 style="margin-top:10px;">
                            </div>

                        </div>

                        <div id="modalDeskripsi"></div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

document.addEventListener('DOMContentLoaded', function(){

    const books =
    document.querySelectorAll('.open-book');

    books.forEach(book => {

        book.addEventListener('click', function(){

            const judul =
            this.getAttribute('data-judul');

            const qr =
            this.getAttribute('data-qr');

            const deskripsi =
            this.getAttribute('data-deskripsi');

            const cover =
            this.getAttribute('data-cover');

            const pengarang =
            this.getAttribute('data-pengarang');

            const penerbit =
            this.getAttribute('data-penerbit');

            const tahun =
            this.getAttribute('data-tahun');

            document.getElementById(
                'modalJudul'
            ).innerText = judul;

            document.getElementById(
                'modalPengarang'
            ).innerText = pengarang ?? '-';

            document.getElementById(
                'modalPenerbit'
            ).innerText = penerbit ?? '-';

            document.getElementById(
                'modalTahun'
            ).innerText = tahun ?? '-';

            document.getElementById(
                'modalCover'
            ).src = cover;

            document.getElementById(
                'modalDeskripsi'
            ).innerHTML =

            `
            <div style="
            margin-top:20px;
            padding:18px;
            background:#f8fafc;
            border-radius:16px;
            line-height:1.8;
            color:#475569;
            text-align:left;
            ">

            <b>📝 Deskripsi Buku :</b>

            <br><br>

            ${deskripsi ?? '-'}

            </div>
            `;

            document.getElementById(
                'modalQr'
            ).innerHTML =

            `
            <img
            src="https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=${encodeURIComponent(qr)}"
            width="220">
            `;

            let modal =
            new bootstrap.Modal(

                document.getElementById(
                    'bookModal'
                )

            );

            modal.show();

        });

    });

    const searchInput =
    document.getElementById(
        'searchBook'
    );

    const searchableBooks =
    document.querySelectorAll(
        '.searchable-book'
    );

    searchInput.addEventListener(
        'keyup',
        function(){

        const keyword =
        this.value.toLowerCase();

        searchableBooks.forEach(book=>{

            const title =
            book.getAttribute(
                'data-title'
            );

            if(title.includes(keyword)){

                book.style.display =
                'block';

            }else{

                book.style.display =
                'none';

            }

        });

    });

});

</script>

@endsection