<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
<h2>Daftar Akun</h2>

<!-- Display Success Message -->
@if(session('success'))
    <div style="color: green; padding: 10px; background: #d4edda; border: 1px solid #c3e6cb; margin-bottom: 15px;">
        {{ session('success') }}
    </div>
@endif

<!-- Display Error Messages -->
@if($errors->any())
    <div style="color: red; padding: 10px; background: #f8d7da; border: 1px solid #f5c6cb; margin-bottom: 15px;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form method="POST" action="{{ route('register') }}">
    @csrf
    <label>Nama:</label><br>
    <input type="text" name="name" placeholder="Nama" value="{{ old('name') }}" required><br><br>
    <label>Email:</label><br>
    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required><br><br>
    <label>Password:</label><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <label>Konfirmasi Password:</label><br>
    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required><br><br>
    <button type="submit">Daftar</button>

   <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
</form>
</body>
</html>