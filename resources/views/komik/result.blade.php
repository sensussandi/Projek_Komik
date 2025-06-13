@extends('layouts.main') 

@section('judul', 'Hasil Pencarian')

@section('content')
    <div class="container mt-4">
        <h3>Hasil pencarian untuk: "{{ $query }}"</h3>

        @if($komik->isEmpty())
            <p>Tidak ada komik ditemukan.</p>
        @else
                <div class="comic-wrapper-container">
                        <div class="comic-wrapper">
                            @foreach ($komik as $item)
                            <div class="comic-item">
                                <img src="{{ asset($item->cover_url) }}" alt="{{ $item->judul }}">
                                <h1>{{ $item->judul }}</h1>
                            </div>
                            @endforeach
                        </div>
                <div class="comic-wrapper-container">
            </div>
        @endif
    </div>
@endsection
