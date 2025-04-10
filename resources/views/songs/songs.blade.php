@extends('layouts.default')

@section('content')
    <div class="container position-relative">
        <div class="position-absolute top-0 end-0 mt-2 me-2">
            <a href="{{ url('/addSong') }}" class="btn btn-outline-primary">Add Song</a>
        </div>

        <div class="container">
            <h1 class="mb-4">These are all the songs:</h1>

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

            @if($songs->isEmpty())
                <div class="alert alert-info">
                    No songs have been added yet.
                </div>
            @else
                <ul class="list-group">
                    @foreach($songs as $song)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $song->title }}

                            <div class="dropdown">
                                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton{{ $song->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    Options
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $song->id }}">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('songs.view', $song->id) }}">
                                            View Song
                                        </a>
                                    </li>

                                    @if($playlists->isNotEmpty())
                                        <li><h6 class="dropdown-header">Add to Playlist</h6></li>
                                        @foreach($playlists as $playlist)
                                            <li>
                                                <form action="{{ route('playlists.addSong') }}" method="POST" class="dropdown-item m-0 p-0">
                                                    @csrf
                                                    <input type="hidden" name="song_id" value="{{ $song->id }}">
                                                    <input type="hidden" name="playlist_id" value="{{ $playlist->id }}">

                                                    @if($playlist->songs->contains($song->id))
                                                        <button type="submit" class="btn btn-link dropdown-item disabled" disabled>
                                                            {{ $playlist->name }} (Already in Playlist)
                                                        </button>
                                                    @else
                                                        <button type="submit" class="btn btn-link dropdown-item">
                                                            {{ $playlist->name }}
                                                        </button>
                                                    @endif
                                                </form>
                                            </li>
                                        @endforeach
                                        <li><hr class="dropdown-divider"></li>
                                    @endif

                                    <li>
                                        <form action="{{ route('songs.delete', $song->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">
                                                Delete Song
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
