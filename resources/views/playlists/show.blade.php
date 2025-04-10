@extends('layouts.default')

@section('content')
    <div class="container my-5">
        <div class="text-center mb-5">
            <h1 class="display-4">{{ $playlist->name }}</h1>
        </div>

        @if($songs->isEmpty())
            <div class="alert alert-info text-center">
                No songs have been added to this playlist yet.
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @foreach($songs as $index => $song)
                    <div class="col">
                        <div class="card shadow-sm h-100 position-relative">
                            <div class="card-body">
                                <h5 class="card-title">{{ $song->title }}</h5>

                                <p class="card-text mb-1">
                                    <strong>Artist:</strong> {{ $song->artist }}
                                </p>

                                <p class="card-text mb-1">
                                    <strong>Genre:</strong> 
                                    <span class="badge bg-secondary">{{ $song->genre->name }}</span>
                                </p>

                                @if($song->file_path)
                                    <audio controls class="w-100 mt-3">
                                        <source src="{{ asset('storage/' . $song->file_path) }}" type="audio/mp3">
                                        Your browser does not support the audio element.
                                    </audio>
                                @else
                                    <p class="text-danger mt-2">Audio file not available.</p>
                                @endif
                            </div>

                            <!-- Verwijderknop rechtsboven -->
                            <div class="position-absolute top-0 end-0 m-2">
                                <form action="{{ route('playlists.removeSong', ['playlistId' => $playlist->id, 'songId' => $song->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Remove from {{ $playlist->name }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
