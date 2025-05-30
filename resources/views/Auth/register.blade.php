<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Register</title>
</head>
 <body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh; background: linear-gradient(to right,rgb(0, 0, 0), #2575fc);"">
        <div class="container bg-white p-4 rounded shadow" style="max-width: 400px;">
         <h2 class="text-center mb-3">Register</h2>

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
            
                <input type="text" name="name" class="form-control" placeholder="Nama" value="{{ old('name') }}" required><br><br>
            
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required><br><br>
            
                <input type="password" name="password" class="form-control" placeholder="Password" required><br><br>
            
                <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required><br><br>
                <button type="submit" class="btn btn-dark  w-100 mt-2">Daftar</button>

                 <p class="text-center mt-3">Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
            
                </form>
        </div>
    </body>
</html>