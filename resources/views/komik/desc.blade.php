@extends('layouts.main')

@section('judul', $komik->judul)

@section('content')
<div class="container mt-4 text-white">
    <h1>{{ $komik->judul }}</h1>

    <img src="{{ asset($komik->cover_url) }}" alt="{{ $komik->judul }}" style="max-width: 300px;" class="mb-3">

    <p><strong>Sinopsis:</strong></p>
    <p>{{ $komik->sinopsis }}</p>

    <hr>
    <h3>Daftar Chapter:</h3>
    <ul>
        <div class="chapter-buttons">
        @foreach($komik->chapters as $chapter)
          
                <a href="{{ route('chapter.show', $chapter->id) }}" class="chapterONdesc-button">Chapter {{ $chapter->nomor_chapter}}</a>
           
        @endforeach
         </div>
    </ul>
</div>
@endsection
