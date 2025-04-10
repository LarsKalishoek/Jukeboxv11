@extends('layouts.default')

@section('title', 'Add a Song')

@section('content')
    <div class="container">
        <h1 class="mb-4">Add a Song</h1>

        <form action="/addSong" method="post" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label"><b>Enter Song Title</b></label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Song title" required>
            </div>

            <div class="mb-3">
                <label for="artist" class="form-label"><b>Enter Artist Name</b></label>
                <input type="text" name="artist" id="artist" class="form-control" placeholder="Artist name" required>
            </div>

            <div class="mb-3">
                <label for="genre_id" class="form-label"><b>Select Genre</b></label>
                <select name="genre_id" id="genre_id" class="form-control" required>
                    <option value="" disabled selected>Choose a Genre</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="file_path" class="form-label"><b>Upload Song File</b></label>
                <input type="file" name="file" id="file" class="form-control" accept="audio/*" required>
            </div>

            <button type="submit" class="btn btn-outline-primary">Add Song</button>
        </form>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif  
    </div>
@endsection
