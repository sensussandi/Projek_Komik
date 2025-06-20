@extends('layouts.main')

@section('judul', 'Kategori: ' . ucfirst($genre))

@section('content')
    <h1>Kategori: {{ ucfirst($genre) }}</h1>

    <div class="container">
        <div class="comic-wrapper">
            @forelse ($comics as $comic)
                <div class="comic-item">
                    <a href="{{ route('komik.detail', $comic->id) }}">
                        <img src="{{ asset($comic->cover_url) }}" alt="{{ $comic->judul }}">
                    </a>
                    <h2>{{ $comic->judul }}</h2>
                </div>
            @empty
                <p>Tidak ada komik dalam genre ini.</p>
            @endforelse
        </div>
    </div>
@endsection
