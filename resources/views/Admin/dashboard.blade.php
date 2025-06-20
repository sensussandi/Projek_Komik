<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
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
                    <td><img src="{{ asset($komik->cover_url) }}" width="100"></td>
                    <td>{{ $komik->judul }}</td>
                    <td>{{ $komik->genre }}</td>
                    <td>{{ Str::limit($komik->sinopsis, 100) }}</td>
                    <td>
                        <a href="{{ route('komik.edit', $komik->id) }}" class="btn btn-primary btn-sm">Edit</a>

                        <form action="{{ route('komik.destroy', $komik->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus komik ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>