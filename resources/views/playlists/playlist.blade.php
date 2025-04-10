@extends('layouts.default')

@section('content')
<div class="container position-relative">
    <div class="position-absolute top-0 end-0 mt-2 me-2">
        <a href="{{ url('/addPlaylist') }}" class="btn btn-outline-primary">Add Playlist</a>
    </div>

    <div class="container">
        <h1 class="mb-4">These are all your playlists:</h1>

        @if(session('success'))
            <div id="successMessage" class="alert alert-success">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(function() {
                    var successMessage = document.getElementById('successMessage');
                    if(successMessage) {
                        successMessage.style.display = 'none';
                    }
                }, 15000);
            </script>
        @endif

        @if($playlists->isEmpty())
            <div class="alert alert-info">
                No playlists have been added yet.
            </div>
        @else
            <ul class="list-group">
                @foreach($playlists as $playlist)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $playlist->name }}

                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton{{ $playlist->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                Options
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $playlist->id }}">
                                <li>
                                    <a class="dropdown-item" href="{{ route('playlists.show', $playlist->id) }}">
                                        View Playlist
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('playlists.delete', $playlist->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger">
                                            Delete Playlist
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection
