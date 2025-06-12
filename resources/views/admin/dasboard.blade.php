<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            color: #fff;
        }
        .navbar {
            background-color: #111;
        }
        .navbar a {
            color: white;
            margin-right: 15px;
            text-decoration: none;
        }
        .navbar a.active {
            color: #3f6df4;
            font-weight: bold;
        }
        .navbar a.logout {
            color: red;
            font-weight: bold;
        }
        .card {
            background-color: #2a2a2a;
        }
        .table th, .table td {
            color: #fff;
            vertical-align: middle;
        }
        .btn-edit {
            background-color: #0d6efd;
            color: white;
        }
        .btn-delete {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar p-3">
        <strong>Admin</strong>
        <a href="#" class="active">Manajemen</a>
        <a href="#">Dasboard</a>
        <a href="#">Pengguna</a>
        <a href="#" class="logout">Logout</a>
    </div>

    <!-- Konten Utama -->
    <div class="container mt-4">
        <h4>Manajemen Komik</h4>
        <a href="{{ route('komik.create') }}" class="btn btn-dark mb-3">Tambah Komik</a>
        <div class="table-responsive">
            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th>Cover</th>
                        <th>Judul</th>
                        <th>Genre</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="https://cdn.komiku.id/wp-content/uploads/How-to-Use-a-Returner-1.jpg" alt="Cover" width="80"></td>
                        <td>How to use a Returner</td>
                        <td>Fantasy, Action</td>
                        <td>
                            <button class="btn btn-edit btn-sm">Edit</button>
                            <button class="btn btn-delete btn-sm">Hapus</button>
                        </td>
                    </tr>
                    <!-- Tambah baris lain di sini -->
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
