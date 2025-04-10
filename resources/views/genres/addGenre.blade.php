@extends('layouts.default')

@section('name', 'Add a Genre')

@section('content')
    <div class="container">
        <h1 class="mb-4">Add a Genre</h1>

        <form action="{{ route('genres.addGenre') }}" method="post" class="bg-light p-4 rounded shadow-sm">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label"><b>Enter A Genre Name</b></label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-outline-primary">Add Genre</button>
        </form>
    </div>
@endsection
