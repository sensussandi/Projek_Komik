@extends('layouts.main')

@section('judul', 'Home')

@section('content')
    <h1>Rekomendasi Komik</h1>

    <div class="container">
        <div class="comic-wrapper">
            @for ($i = 1; $i <= 13; $i++)
                <div class="comic-item">
                    <img src="{{ asset('img/comic/komik' . $i . '.jpg') }}" alt="Komik {{ $i }}" style="max-width: 200px;">
                    <h2>Komik {{ $i }}</h2>
                </div>
            @endfor
        </div>
    </div>
@endsection