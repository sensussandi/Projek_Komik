<!DOCTYPE html>
<html>
<head>
    <title>Daftar Komik</title>
</head>
<body>
    <h1>Daftar Komik</h1>

    @foreach ($comics as $comic)
        <div>
            <h3>{{ $comic->title }}</h3>
            <img src="{{ asset($comic->image_path) }}" alt="{{ $comic->title }}" style="max-width:200px;">
        </div>
    @endforeach

</body>
</html>
