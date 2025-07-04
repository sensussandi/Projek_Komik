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

        .table td,
        .table th {
            vertical-align: middle;
        }
    </style>
</head>

<body>


    <!-- Navbar -->
    <div class="navbar d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-3">
            <strong class="me-3">Admin</strong>
            <a href="{{ route('admin.dashboard') }}">Manajemen</a>
            <a href="{{ route('admin.users') }}" class="active">Pengguna</a>
        </div>
        <a href="{{ route('logout.link') }}" class="logout">Logout</a>
    </div>

    <!-- Manajemen Pengguna Section -->
    <div class="section">
        <h2>Manajemen Pengguna</h2>


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
                        <form action="{{ route('admin.users.ban', $user->id) }}" method="POST">
                            @csrf
                            @if($user->is_banned)
                            <button class="btn btn-success btn-sm" onclick="return confirm('Batalkan blokir pengguna ini?')">Unban</button>
                            @else
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Ban pengguna ini?')">Ban</button>
                            @endif
                        </form>
                        @else
                        <a href="{{ route('admin.editAdmin.edit', $user->id) }}" class="btn btn-light btn-sm">Ubah</a>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data pengguna.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>

</html>