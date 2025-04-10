<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Song;


class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addGenre(Request $request)
    {
        $request->validate([
            'name'=> 'required'
        ]);

        Genre::create([
            'name'=> $request->name,
        ]);
        return redirect('genres')->with('success', 'Genre added');
    }
    public function showGenreForm()
    {
        return view('genres.addGenre');
    }
    public function showGenre(): View
    {
        $genres = Genre::all();
        return view('genres.genre',[
            'genres' => $genres,
        ]);
    }
    public function showGenreSongs(Genre $genre)
    {
        $songs = Song::where('genre_id', $genre->id)->with('genre')->get();
        // dd($genre->id);
        // dd($songs,$genre);
        return view('genres.show', compact('genre', 'songs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genres.genre')->with('success', 'Genre deleted successfully!');
    }
}
