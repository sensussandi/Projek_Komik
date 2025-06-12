<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            color: white;
        }
        .navbar {
            background-color: #111;
            padding: 15px;
        }
        .navbar a {
            color: white;
            margin-right: 20px;
            text-decoration: none;
        }
        .navbar a.active {
            color: #3390FF;
            font-weight: bold;
        }
        .navbar a.logout {
            color: red;
            font-weight: bold;
        }
        .section {
            padding: 25px;
            margin: 15px;
            background-color: #2b2b2b;
            border-radius: 10px;
        }
        .table thead {
            background-color: #1a1a1a;
        }
        .table td, .table th {
            vertical-align: middle;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar d-flex align-items-center justify-content-between">
        <div>
            <strong>Admin</strong>
            <a href="#" class="active">Manajemen</a>
            <a href="#">Dashboard</a>
            <a href="#">Pengguna</a>
        </div>
        <a href="#" class="logout">Logout</a>
    </div>

    <!-- Komik Management Section -->
    <div class="section">
        <h3>Manajemen Komik</h3>
        <a href="{{ route('komik.create') }}" class="btn btn-dark my-2">Tambah Komik</a>
        <table class="table table-dark table-bordered">
            <thead>
                <tr>
                    <th>Cover</th>
                    <th>Judul</th>
                    <th>Genre</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($komiks as $komik)
                    <tr>
                        <td><img src="{{ asset('storage/' . $komik->cover_url) }}" width="100"></td>
                        <td>{{ $komik->judul }}</td>
                        <td>{{ $komik->genre }}</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm">Edit</a>
                            <form action="#" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Dashboard Statistik Section -->
    <div class="section">
        <h3>Dashboard Statistik</h3>
        <table class="table table-dark table-bordered">
            <thead>
                <tr>
                    <th>Komik</th>
                    <th>Pengguna</th>
                    <th>Chapter</th>
                    <th>Update terakhir</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>17</td>
                    <td>290</td>
                    <td>900</td>
                    <td>1 jam yang lalu</td>
                </tr>
                <!-- tambahkan baris lain jika dibutuhkan -->
            </tbody>
        </table>
    </div>

    <!-- Manajemen Pengguna Section -->
    <div class="section">
        <h3>Manajemen Pengguna</h3>
        <div class="mb-3">
            <input type="text" class="form-control w-25 d-inline" placeholder="Cari pengguna...">
            <button class="btn btn-secondary btn-sm">Cari</button>
        </div>
        <table class="table table-dark table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Admin</td>
                    <td>admin@example.com</td>
                    <td>Admin</td>
                    <td><a href="#" class="btn btn-light btn-sm">Ubah</a></td>
                </tr>
                <tr>
                    <td>Donal Trump</td>
                    <td>trump@gmail.com</td>
                    <td>User</td>
                    <td><a href="#" class="btn btn-danger btn-sm">Ban</a></td>
                </tr>
                <!-- Tambahkan user lainnya -->
            </tbody>
        </table>
    </div>

</body>
</html>
