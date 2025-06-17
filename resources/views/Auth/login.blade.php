    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Ini untuk load library Font Awesome dari CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <title>Login</title>
    </head>

    <body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh; background: linear-gradient(to right,rgb(0, 0, 0), #2575fc);"">
        <div class=" container bg-white p-4 rounded shadow" style="max-width: 400px;">
        <h2 class="text-center mb-3">Login</h2>
        @if($errors->has('email'))
        <div class="alert alert-danger">
            {{ $errors->first('email') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <input type="email" name="email" class="form-control" placeholder="Email" required><br><br>

            <input type="password" name="password" class="form-control" placeholder="Password" required><br><br>
            <button type="submit" class="btn btn-dark  w-100 mt-2">Login</button>

            <a href="{{ route('auth.google') }}" class="btn btn-danger w-100 mt-2">
                <!-- Ini untuk pakai icon Google dari Font Awesome -->
                <i class="fab fa-google me-2"></i>Login dengan Google</a>
        </form>
        <p class="text-center mt-3">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>

        @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
        @endif
        </div>


    </body>

    </html>