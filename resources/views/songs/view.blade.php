@extends('layouts.default')

@section('content')
    <div class="container">
        <h1>{{ $song->title }}</h1>
        <p><strong>Artist:</strong> {{ $song->artist }}</p>
        <p><strong>Genre:</strong> {{ $song->genre->name }}</p>

        @if($song->file_path)
            <audio controls>
                <source src="{{ asset('storage/' . $song->file_path) }}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        @endif

        <div class="mt-3">
            <a href="{{ url('/songs') }}" class="btn btn-outline-primary">← Back to Songs</a>
        </div>
    </div>
@endsection
