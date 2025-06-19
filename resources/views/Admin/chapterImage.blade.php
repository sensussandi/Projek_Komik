<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Gambar Chapter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- jQuery UI CSS untuk drag-drop --}}
    <link href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" rel="stylesheet">

    <style>
        body {
            background-color: #000;
            color: #fff;
        }
        .form-container {
            background-color: #1e1e1e;
            padding: 25px;
            border-radius: 10px;
            border: 2px solid #0cf;
            max-width: 900px;
            margin: 40px auto;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h3 class="mb-4">Kelola Gambar – {{ $chapter->judul_chapter }} ({{ $komik->judul }})</h3>

        {{-- Pesan sukses --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Form upload --}}
        <form action="{{ route('chapterImage.store', [$komik, $chapter]) }}"
              method="POST" enctype="multipart/form-data"
              class="border p-3 mb-4 rounded bg-dark">
            @csrf
            <label class="form-label">Upload gambar (boleh banyak):</label>
            <input type="file" name="images[]" multiple class="form-control mb-3">
            <button class="btn btn-primary">Upload</button>
        </form>

        {{-- Daftar gambar & urutkan --}}
        <ul id="sortable" class="list-group mb-3">
            @foreach ($chapter->images as $img)
                <li class="list-group-item d-flex align-items-center" data-id="{{ $img->id }}">
                    <img src="{{ asset('storage/'.$img->image_url) }}" width="80" class="me-3 rounded">
                    <span class="flex-grow-1 text-truncate text-dark">{{ $img->image_url }}</span>
                    <form action="{{ route('chapterImage.destroy', $img) }}" method="POST" class="m-0">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <a href="{{ route('komik.edit', [$komik, $chapter]) }}" class="btn btn-secondary mt-2">Selesai</a>
    </div>

    {{-- jQuery dan Bootstrap --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- jQuery UI --}}
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script>
        $('#sortable').sortable({ placeholder: 'ui-state-highlight' });

        document.getElementById('saveOrder').addEventListener('click', function() {
            const order = $('#sortable li').map((_, li) => $(li).data('id')).get();
            fetch("{{ route('chapterImage.order') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ order })
            }).then(() => location.reload());
        });
    </script>

</body>
</html>
