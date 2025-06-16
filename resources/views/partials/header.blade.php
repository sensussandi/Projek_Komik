<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/HomeStyle.css') }}">
    
    <title>@yield('judul', 'Judul Default')</title>
  </head>
  <body>

    <!-- start nav -->
    <nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
    <img src="{{Asset('img\logo\logo.png')}}" class="img-fluid" style="max-width: 45px;" alt="logo_kita">
    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
        </li>
            <!-- Kategori Dropdown -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="kategoriDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Kategori
              </a>
              <ul class="dropdown-menu" aria-labelledby="kategoriDropdown">
                <li><a class="dropdown-item" href="{{ route('kategori.show', 'action') }}">Action</a></li>
                <li><a class="dropdown-item" href="{{ route('kategori.show', 'adventure') }}">Adventure</a></li>
                <li><a class="dropdown-item" href="{{ route('kategori.show', 'romance') }}">Romance</a></li>
                <li><a class="dropdown-item" href="{{ route('kategori.show', 'shounen') }}">Shounen</a></li>
              </ul>
            </li>

            <!-- Populer Link -->
            <li class="nav-item">
              <a class="nav-link" href="{{ route('populer') }}">Populer</a>
            </li>
          </ul>

          <form form class="d-flex" method="GET" action="{{route('komik.search')}}">
            <input class="form-control me-2" type="search" placeholder="Search" name="searching" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
    <!-- end navbar -->
