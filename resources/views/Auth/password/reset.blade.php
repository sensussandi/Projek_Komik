<h2>Buat Password Baru</h2>

<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="email" name="email" class="form-control" placeholder="Email" required>
    <input type="password" name="password" class="form-control mt-2" placeholder="Password baru" required>
    <input type="password" name="password_confirmation" class="form-control mt-2" placeholder="Konfirmasi password" required>
    <button type="submit" class="btn btn-success mt-2">Reset Password</button>
</form>
