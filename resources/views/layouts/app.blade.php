@if(session('role') == 'siswa')

    @include('layouts.siswa')

@elseif(session('role') == 'petugas')

    @include('layouts.petugas')

@elseif(session('role') == 'kepala_sekolah')

    @include('layouts.kepsek')

@endif