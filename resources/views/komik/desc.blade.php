@extends('layouts.main')

@section('judul', $komik->judul)

@section('content')
<div class="container mt-4 text-white">
    <h1>{{ $komik->judul }}</h1>

    <img src="{{ asset($komik->cover_url) }}" alt="{{ $komik->judul }}" style="max-width: 300px;" class="mb-3">

    <p><strong>Sinopsis:</strong></p>
    <p>{{ $komik->sinopsis }}</p>

    <p><strong>Genre:</strong></p>
    <p>{{ $komik->genre }}</p>

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

    <hr>
<h3>Komentar:</h3>
{{-- Form tambah komentar --}}
@if (Auth::check())
    <form action="{{ route('komentar.store') }}" method="POST">
        @csrf
        <input type="hidden" name="komik_id" value="{{ $komik->id }}">
        <textarea name="isi_komentar" class="form-control mb-2" rows="3" placeholder="Tulis komentar..."></textarea>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
@endif

@foreach ($komik->komentars as $komentar)
    <div class="mb-2 p-2 bg-dark rounded text-white">
        <strong>{{ $komentar->user->name }}</strong>: {{ $komentar->isi_komentar }}
        <br><small class="text-muted">{{ $komentar->created_at->diffForHumans() }}</small>
    </div>
@endforeach


@endsection
