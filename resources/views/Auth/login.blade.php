<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    @if($errors->any())
        <p style="color:red">{{ $errors->first() }}</p>
    @endif

     <form method="POST" action="{{ route('login') }}">
        @csrf
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <label>Password:</label><br>    
        <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
    <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
    
    @if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

</body>
</html>