@extends('layouts.main')

@section('judul', 'Home')

@section('content')
    <h1>Rekomendasi</h1>

    <div class="container_content">
        <div class="comic-wrapper">
            @foreach ($comics as $comic)
                <div class="comic-item">
                    <img src="{{ asset($comic->cover_url) }}" alt="{{ $comic->judul }}">
                    <h1>{{ $comic->judul }}</h1>

                    <div class="chapter-buttons">
                        @if(isset($comic->latestChapters[0]))
                            <a href="{{ route('chapter.show', ['id' => $comic->latestChapters[0]->id]) }}" class="chapter-button">
                                Chapter {{ $comic->latestChapters[0]->nomor_chapter }}
                            </a>
                        @endif

                        @if(isset($comic->latestChapters[1]))
                            <a href="{{ route('chapter.show', ['id' => $comic->latestChapters[1]->id]) }}" class="chapter-button">
                                Chapter {{ $comic->latestChapters[1]->nomor_chapter }}
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection