<h1>{{ $komik->judul }}</h1>
<img src="{{ asset($komik->cover_url) }}" alt="{{ $komik->judul }}">
<p>Deskripsi: {{ $komik->deskripsi }}</p>

<h3>Chapter:</h3>
<ul>
    @foreach ($komik->chapters as $chapter)
        <li>Chapter {{ $chapter->nomor_chapter }} - {{ $chapter->judul }}</li>
    @endforeach
</ul>
