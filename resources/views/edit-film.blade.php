<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>Edit Film</title>
</head>
<body>
    <div class="container-fluid">
        <div class="container position-center">
            <div class="row page-bg">
                <div class="p-4 col-md-12">
                    <div class="text-center top-icon">
                        <h1 class="mt-3">Edit Film</h1>
                        <br>
                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif

                        <form id="form-login" action="{{ route('film.update', $data->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Apakah Anda yakin edit data?');">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-floating mb-3">
                                <input class="form-control" name="title" type="text" placeholder="Title" autofocus required
                                value="{{ $data->title ? $data->title : '' }}">
                                <label for="title" class="form-label">Judul</label>
                            </div>
                            @error('title')
                            <div class="alert alert-danger">
                                Judul salah
                            </div>
                            @enderror

                            <div class="form-floating mb-3">
                                <input class="form-control" name="genre" type="text" placeholder="Genre" required
                                value="{{ $data->genre ? $data->genre : '' }}">
                                <label for="genre" class="form-label text-lg">Genre</label>
                            </div>
                            @error('genre')
                            <div class="alert alert-danger">
                                Genre Salah
                            </div>
                            @enderror

                            <div class="form-floating mb-3">
                                <input class="form-control" name="year" type="text" placeholder="Year" required
                                value="{{ $data->year ? $data->year : '' }}">
                                <label for="year" class="form-label">Tahun</label>
                            </div class="form-floating mb-3">
                            @error('year')
                            <div class="alert alert-danger">
                                Tahun Salah
                            </div>
                            @enderror

                            <div class="form-floating mb-3">
                                <input class="form-control" name="rating" type="text" placeholder="Rating" required
                                value="{{ $data->rating ? $data->rating : '' }}">
                                <label for="rating" class="form-label">Rating</label>
                            </div class="form-floating mb-3">
                            @error('rating')
                            <div class="alert alert-danger">
                                Rating Salah
                            </div>
                            @enderror
                            
                            <div class="mb-3">
                                <label for="thumbnail" class="form-label">Poster Film</label>
                                <input class="form-control" name="thumbnail" type="file" placeholder="Film Poster">
                            </div>
                            @error('thumbnail')
                            <div class="alert alert-danger">
                                Poster Film Invalid
                            </div>
                            @enderror
                            
                            <br>
                            <div class="mt-4 text-center submit-btn">
                                <a href="{{ route('home') }}" class="btn btn-secondary" onclick="return confirm('Apakah Anda yakin kembali ke menu utama?');">Kembali</a>
                                <button type="submit" class="btn btn-primary" form="form-login">Edit Film</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
