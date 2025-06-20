<h2>Reset Password</h2>

@if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <input type="email" name="email" class="form-control" placeholder="Masukkan email">
    <button type="submit" class="btn btn-primary mt-2">Kirim Link Reset</button>
</form>
