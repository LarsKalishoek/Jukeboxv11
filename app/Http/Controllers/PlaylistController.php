<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;
use App\Models\Song;


class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function showAddPlaylistForm()
    {
        return view('playlists.addPlaylist'); 
    }


    public function showPlaylists()
    {
        $playlists = auth()->check() ? auth()->user()->playlists : collect();
        return view('playlists.playlist', [
            'playlists' => $playlists,
        ]);
    }

    public function addSong(Request $request)
{
    $request->validate([
        'playlist_id' => 'required|exists:playlists,id',
        'song_id' => 'required|exists:songs,id',
    ]);

    $playlist = Playlist::findOrFail($request->playlist_id);

    $playlist->songs()->attach($request->song_id);

    return redirect()->back()->with('success', 'Song added to playlist!');
}


    public function showPlaylistSongs(Playlist $playlist)
    {
        
        $playlists = auth()->user()->playlists;
        
        $songs = $playlist->songs()->get(); 

        return view("playlists.show", [
            "songs" => $songs, 
            "playlist" => $playlist,
            "playlists" => $playlists
        ]);
    }


    public function addPlaylist(Request $request)
    {
        $request->validate([
            'name'=> 'required'
        ]);
        auth()->user()->playlists()->create([
            'name' => $request->input('name'),
        ]);
        return redirect('playlists');
    }

    public function removeSongFromPlaylist($playlistId, $songId)
    {
        $playlist = Playlist::find($playlistId);
        $song = Song::find($songId);

        if ($playlist && $song) {
            // Verwijder de song uit de playlist
            $playlist->songs()->detach($song->id);

            return redirect()->route('playlists.show', $playlistId)->with('success', 'Song removed from playlist!');
        }

        return redirect()->route('playlists.show', $playlistId)->with('error', 'Song or Playlist not found.');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
// PlaylistController.php

    // public function show(Playlist $playlist)
    // {
    //     return view('playlists.show', compact('playlist'));
    // }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Playlist $playlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Playlist $playlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playlist $playlist)
    {
        $playlist->delete();
        return redirect()->route('playlists')->with('success', 'Playlist deleted successfully!');
    }
    
}
