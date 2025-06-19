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
            font-weight: bold;
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
<script>
function updatePlaceholders() {
    const inputs = document.querySelectorAll('#chapter-wrapper input');
    inputs.forEach((inp, idx) => inp.placeholder = `Chapter ${idx+1}`);
}

function addChapter() {
    const container = document.getElementById('chapter-new-container');
    const div = document.createElement('div');
    div.className = 'input-group mb-2';
    div.innerHTML = `
        <input type="text" name="chapters[new][]" class="form-control bg-dark text-white">
        <button type="button" class="btn btn-danger" onclick="removeChapter(this)">-</button>
    `;
    container.appendChild(div);
    updatePlaceholders();
}

function removeChapter(btn){
    btn.parentElement.remove();
    updatePlaceholders();
}

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

        <form action="{{ route('komik.update', $komik->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label for="judul">Judul :</label>
                <input type="text" name="judul" id="judul" class="form-control bg-dark text-white" required value="{{ old('judul', $komik->judul) }}">
            </div>
            <div class="mb-2">
                <label for="genre">Genre :</label>
                <input type="text" name="genre" id="genre" class="form-control bg-dark text-white" value="{{ old('genre', $komik->genre) }}">
            </div>
            <div class="mb-2">
                <label for="penulis">Penulis :</label>
                <input type="text" name="penulis" id="penulis" class="form-control bg-dark text-white" required value="{{ old('penulis', $komik->penulis) }}">
            </div>
            <div class="mb-2">
                <label for="sinopsis">Deskripsi :</label>
                <textarea name="sinopsis" id="sinopsis" rows="4" class="form-control bg-dark text-white" required>{{ old('sinopsis', $komik->sinopsis) }}</textarea>
            </div>
            {{-- … potongan atas tetap … --}}
            <div class="mb-2">
                <label for="chapter">Edit Chapter :</label>

                <div id="chapter-wrapper">
                    {{-- A. Chapter lama --}}
                    @foreach ($komik->chapters as $i => $chapter)
                    <div class="input-group mb-2">
                        <input type="text"
                            name="chapters[{{ $chapter->id }}]"
                            class="form-control bg-dark text-white"
                            value="{{ $chapter->judul_chapter }}"
                            placeholder="Chapter {{ $i+1 }}">
                        <button type="button" class="btn btn-danger" onclick="removeChapter(this)">-</button>
                    </div>
                    @endforeach

                    {{-- B. TEMPAT chapter baru akan disisipkan --}}
                    <div id="chapter-new-container"></div>
                </div>

                {{-- C. Tombol tambah di bawah --}}
                <div class="text-end">
                    <button type="button" class="btn btn-success" onclick="addChapter()">+ Tambah Chapter</button>
                </div>
            </div>
            {{-- … potongan bawah tetap … --}}

    </div>
    <div class="mt-3 d-flex justify-content-between">
        <button type="submit" class="btn btn-primary btn-custom">Simpan</button>
        <a href="{{ url('/admin/dashboard') }}" class="btn btn-danger btn-custom">Batal</a>
    </div>
    </form>
    </div>

</body>

</html>