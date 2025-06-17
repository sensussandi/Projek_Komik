<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container mt-5">
    <h2>Edit Admin</h2>
    <form action="{{ route('admin.editusers.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
    
        <div class="mb-3">
            <label for="name">Nama:</label>
            <input type="text" name="name" id="name" class="form-control bg-dark text-white" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control bg-dark text-white" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="password">Password (opsional):</label>
            <input type="password" name="password" id="password" class="form-control bg-dark text-white">
            <small>Kosongkan jika tidak ingin mengubah password</small>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.users') }}" class="btn btn-danger">Batal</a>
    </form>
</div>

</body> 
</html>
