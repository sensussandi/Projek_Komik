@extends('layouts.app') <!-- atau sesuaikan dengan layout Anda -->

@section('content')
<div style="background-color: black; color: white; padding: 20px; border-radius: 10px;">
    <h3 style="color: white; font-weight: bold;">Admin</h3>
    <hr style="border-color: white;">

    <form action="{{ route('komik.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div style="margin-bottom: 15px;">
            <label>Judul :</label><br>
            <input type="text" name="judul" class="form-control" style="background-color: #333; color: white;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Genre :</label><br>
            <input type="text" name="genre" class="form-control" style="background-color: #333; color: white;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Penulis :</label><br>
            <input type="text" name="penulis" class="form-control" style="background-color: #333; color: white;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Deskripsi :</label><br>
            <textarea name="deskripsi" rows="4" class="form-control" style="background-color: #333; color: white;"></textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Gambar Cover :</label><br>
            <input type="file" name="cover" class="form-control-file" style="color: white;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Tambahkan Chapter :</label><br>
            <input type="text" name="chapter" class="form-control" style="background-color: #333; color: white;">
        </div>

        <div>
            <button type="submit" class="btn btn-primary" style="background-color: blue;">Simpan</button>
            <a href="{{ route('komik.index') }}" class="btn btn-danger" style="margin-left: 10px;">Batal</a>
        </div>
    </form>
</div>
@endsection