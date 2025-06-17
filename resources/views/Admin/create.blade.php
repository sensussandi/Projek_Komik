<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Komik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            color: #fff;
        }
        .navbar {
            background-color: #111;
            padding: 10px;
        }
        .navbar a {
            color: white;
            margin-right: 15px;
            text-decoration: none;
        }
        .navbar a.logout {
            color: red;
        }
        .form-container {
            background-color: #1e1e1e;
            padding: 25px;
            border-radius: 10px;
            border: 2px solid #0cf;
            max-width: 700px;
            margin: 40px auto;
        }
        label {
            font-weight: bold;
            margin-top: 10px;
        }
        .btn-custom {
            padding-left: 30px;
            padding-right: 30px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-3">
            <strong class="me-3">Admin</strong>
            <a href="{{ route('admin.dashboard') }}">Manajemen</a>
            <a href="{{ route('admin.users') }}">Pengguna</a>
        </div>
        <a href="{{ route('logout.link') }}" class="logout">Logout</a>
    </div>

    <!-- Form Tambah Komik -->
    <div class="form-container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label for="judul">Judul :</label>
                <input type="text" name="judul" id="judul" class="form-control bg-dark text-white" required>
            </div>
            <div class="mb-2">
                <label for="genre">Genre :</label>
                <input type="text" name="genre" id="genre" class="form-control bg-dark text-white">
            </div>
            <div class="mb-2">
                <label for="penulis">Penulis :</label>
                <input type="text" name="penulis" id="penulis" class="form-control bg-dark text-white" required>
            </div>
            <div class="mb-2">
                <label for="sinopsis">Deskripsi :</label>
                <textarea name="sinopsis" id="sinopsis" rows="4" class="form-control bg-dark text-white" required placeholder="Text Area"></textarea>
            </div>
            <div class="mb-2">
                <label for="cover">Gambar Cover :</label>
                <input type="file" name="cover" id="cover" class="form-control bg-dark text-white">
            </div>
            <div class="mb-2">
                <label for="chapter">Tambahkan Chapter :</label>
                <input type="text" name="chapter" id="chapter" class="form-control bg-dark text-white">
            </div>

            <div class="mt-3 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary btn-custom">Simpan</button>
                <a href="{{ url('/admin/dashboard') }}" class="btn btn-danger btn-custom">Batal</a>
            </div>
        </form>
    </div>

</body>
</html>
