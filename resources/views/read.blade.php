@extends('layouts.reader')

@section('judul', $chapter->comic->judul . ' - Chapter ' . $chapter->nomor_chapter)

@section('content')
    <div class="reader-header">
        <a href="{{ route('home') }}">⬅️ Kembali</a>
        <span>{{ $chapter->comic->judul }} > Chapter: {{ $chapter->judul_chapter }}</span>
        <a href="{{ route('home') }}">🏠 Home</a>
    </div>

    <div class="comic-pages">
        @foreach($chapter->pages as $page)
            <img src="{{ asset($page->image_url) }}" alt="Page {{ $page->urutan }}">
        @endforeach
    </div>

        <div class="chapter-navigation">
            @if ($previousChapter)
                <a href="{{ route('chapter.show', ['id' => $previousChapter->id]) }}" class="btn btn-secondary">⬅️ Sebelumnya</a>
            @endif

            @if ($nextChapter)
                <a href="{{ route('chapter.show', ['id' => $nextChapter->id]) }}" class="btn btn-primary">Selanjutnya ➡️</a>
            @endif
        </div>





@endsection
