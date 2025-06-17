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

        .table td,
        .table th {
            vertical-align: middle;
            text-align: center;
        }

        img.cover-img {
            height: 150px;
            object-fit: cover;
        }

        .btn-action {
            display: flex;
            gap: 5px;
            justify-content: center;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <div class="navbar d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-3">
            <strong class="me-3">Admin</strong>
            <a href="{{ route('admin.dashboard') }}" class="active">Manajemen</a>
            <a href="{{ route('admin.users') }}">Pengguna</a>
        </div>
        <a href="{{ route('logout.link') }}" class="logout">Logout</a>
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
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($komiks as $komik)
                <tr>
                    <td><img src="{{ asset('storage/' . $komik->cover_url) }}" width="100"></td>
                    <td>{{ $komik->judul }}</td>
                    <td>{{ $komik->genre }}</td>
                    <td>{{ Str::limit($komik->sinopsis, 100) }}</td>
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

</body>

</html>