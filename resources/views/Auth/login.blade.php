<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap dan Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            height: 100vh;
            margin: 0;
            background: url('/img/bg-login.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
        }

        h2 {
            font-weight: bold;
            color: #333;
        }

        .btn-dark {
            background-color: #000;
            border: none;
        }

        .btn-danger {
            font-weight: bold;
        }

        .form-check-label, .form-control {
            font-size: 14px;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center">
    <div class="container">
        <h2 class="text-center mb-3">Login</h2>

        @if($errors->has('email'))
        <div class="alert alert-danger">
            {{ $errors->first('email') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>

            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">Ingat Saya</label>
            </div>

            <button type="submit" class="btn btn-dark w-100">Login</button>

            <a href="{{ route('auth.google') }}" class="btn btn-danger w-100 mt-2">
                <i class="fab fa-google me-2"></i>Login dengan Google
            </a>
        </form>

        <p class="text-center mt-3"><a href="{{ route('password.request') }}">Lupa kata sandi?</a></p>

        <p class="text-center">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>

        @if(session('success'))
        <p class="text-success text-center">{{ session('success') }}</p>
        @endif
    </div>
</body>

</html>
