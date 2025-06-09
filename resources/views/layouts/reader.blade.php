<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('judul')</title>
    <style>
        body {
            margin: 0;
            background: #111;
            color: #fff;
            font-family: sans-serif;
        }

        .reader-header {
            background-color: #000;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .comic-pages img {
            width: 100%;
            max-width: 800px;
            display: block;
            margin: 10px auto;
        }

        a {
            color: #61dafb;
            text-decoration: none;
        }
    </style>
</head>
<body>

    @yield('content')

</body>
</html>
