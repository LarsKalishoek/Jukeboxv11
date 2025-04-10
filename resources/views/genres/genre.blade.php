@extends('layouts.default')

@section('content')
<div class="container position-relative">
    <div class="position-absolute top-0 end-0 mt-2 me-2">
        <a href="{{ url('/addGenre') }}" class="btn btn-outline-primary">Add Genre</a>
    </div>

    <div class="container">
        <h1 class="mb-4">These are all your genres:</h1>

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

        @if($genres->isEmpty())
            <div class="alert alert-info">
                No genres have been added yet.
            </div>
        @else
            <ul class="list-group">
                @foreach($genres as $genre)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $genre->name }}

                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton{{ $genre->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                Options
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $genre->id }}">
                                <li>
                                    <a class="dropdown-item" href="{{ route('genres.show', $genre->id) }}">
                                        Songs with this genre
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('genres.delete', $genre->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger">
                                            Delete genre
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
