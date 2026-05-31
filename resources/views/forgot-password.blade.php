@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

@if($errors->any())

<div class="alert alert-danger">
    {{ $errors->first() }}
</div>

@endif

<form action="{{ route('forgot.password.send') }}" method="POST">

    @csrf

    <input
        type="email"
        name="email"
        class="form-control"
        placeholder="Masukkan Email"
        required
    >

    <button
        type="submit"
        class="btn-reset"
    >

        <i class="fa-solid fa-paper-plane"></i>

        Kirim Reset Password

    </button>

</form>