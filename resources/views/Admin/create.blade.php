<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Komik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<script>
    function updatePlaceholders() {
        const inputs = document.querySelectorAll('#chapter-wrapper input[name="chapters[]"]');
        inputs.forEach((input, index) => {
            input.placeholder = `Chapter ${index + 1}`;
        });
    }

    function addChapter() {
        const wrapper = document.getElementById('chapter-wrapper');

        const div = document.createElement('div');
        div.classList.add('input-group', 'mb-2');

        div.innerHTML = `
            <input type="text" name="chapters[]" class="form-control bg-dark text-white">
            <button type="button" class="btn btn-danger" onclick="removeChapter(this)">-</button>
        `;

        wrapper.appendChild(div);
        updatePlaceholders();
    }

    function removeChapter(button) {
        const field = button.parentElement;
        field.remove();
        updatePlaceholders();
    }

    // Inisialisasi ulang placeholder saat halaman pertama kali dimuat
    document.addEventListener('DOMContentLoaded', updatePlaceholders);
</script>

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
                @error('judul')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-2">
                <label for="genre">Genre :</label>
                <input type="text" name="genre" id="genre" class="form-control bg-dark text-white">
                @error('genre')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-2">
                <label for="penulis">Penulis :</label>
                <input type="text" name="penulis" id="penulis" class="form-control bg-dark text-white" required>
                @error('penulis')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-2">
                <label for="sinopsis">Deskripsi :</label>
                <textarea name="sinopsis" id="sinopsis" rows="4" class="form-control bg-dark text-white" required placeholder="Text Area"></textarea>
                @error('sinopsis')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

           <div class="mb-2">
                <label for="cover">Gambar Cover :</label>
                <input type="file" name="cover" id="cover" class="form-control bg-dark text-white">
                @error('cover')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-2">
                <label for="chapter">Tambahkan Chapter :</label>
                <div id="chapter-wrapper">
                    <!-- Field chapter pertama -->
                    <div class="input-group mb-2">
                        <input type="text" name="chapters[]" class="form-control bg-dark text-white" placeholder="Chapter 1">
                        <button type="button" class="btn btn-danger" onclick="removeChapter(this)">-</button>
                    </div>
                    <!-- Tambahan akan dimasukkan di bawah sini -->
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-success mt-2" onclick="addChapter()">+ Tambah Chapter</button>
                </div>
            </div>

            <div class="mt-3 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary btn-custom">Simpan</button>
                <a href="{{ url('/admin/dashboard') }}" class="btn btn-danger btn-custom">Batal</a>
            </div>
        </form>
    </div>

    <div class="form-container">

   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

  
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf

</body>

</html>