@extends('layouts.default')

@section('name', 'Add a Playlist')

@section('content')
    <div class="container">
        <h1 class="mb-4">Add a Playlist</h1>

        <form action="{{ route('playlists.addPlaylist') }}" method="post" class="bg-light p-4 rounded shadow-sm">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label"><b>Enter A Playlist Name</b></label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-outline-primary">Add Playlist</button>
        </form>
    </div>
@endsection
