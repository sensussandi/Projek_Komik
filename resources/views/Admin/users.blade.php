<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Pengguna</title>
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
        <div class="d-flex align-items-center gap-3">
            <strong class="me-3">Admin</strong>
            <a href="{{ route('admin.dashboard') }}" >Manajemen</a>
            <a href="{{ route('admin.users') }}" class="active">Pengguna</a>
        </div>
        <a href="{{ route('logout.link') }}" class="logout">Logout</a>
    </div>

    <!-- Manajemen Pengguna Section -->
    <div class="section">
        <h2>Manajemen Pengguna</h2>

        <form method="GET" action="{{ route('admin.users') }}" class="mb-3 d-flex">
            <input type="text" name="search" class="form-control me-2 w-25" placeholder="Cari pengguna..." value="{{ request('search') }}">
            <button class="btn btn-secondary">Cari</button>
        </form>

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
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td>
                            @if($user->role === 'user')
                                <form action="#" method="POST">
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Ban</button>
                                </form>
                            @else
                                <a href="#" class="btn btn-light btn-sm">Ubah</a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center">Tidak ada data pengguna.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>
