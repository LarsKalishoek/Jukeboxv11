<?php

namespace App\Http\Controllers;
use App\Models\Song;
// use App\Http\Controllers\Genre;
use App\Models\Genre;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Kiwilan\Audio\Audio;
use Kiwilan\Audio\Helpers\AudioFile;
use Kiwilan\Audio\Enums\AudioFormatEnum;


class SongController extends Controller
{
    public function showSongs(): View
    {
        $songs = Song::all();
        $user = Auth::user();
        $playlists = $user ? $user->playlists : collect();

        return view('songs.songs',[
            'songs' => $songs,
            'playlists' => $playlists,
        ]);
    }

    public function songAdd(){
        $genres = Genre::all();
        return view('songs.addSong', compact('genres'));
    }

    public function addSong(Request $req)
    {
    $req->validate([
        'title'=> 'required',
        'artist'=> 'required',
        'genre_id'=> 'required|exists:genres,id',
        'file'=> 'required|mimes:mp3,audio/mpeg',
    ]);

    $file = $req->file('file');
    $filename = time() . '_' . $file->getClientOriginalName();
    $filePath = $file->storeAs('songs', $filename, 'public');
    

    Song::create([
        'title' => $req->get('title'),
        'artist' =>  $req->get('artist'),
        'genre_id' => $req->get('genre_id'),
        'file_path' => $filePath,
    ]);

    return redirect('songs');
    }

    public function viewSong($id)
    {
        $song = Song::findOrFail($id);

        return view('songs.view', [
            'song' => $song,
        ]);
    }
    public function deleteSong($id)
    {
        $song = Song::findOrFail($id);
        $song->delete();

        return redirect('/songs')->with('success', 'Song deleted successfully!');
    }

    public function addToPlaylist(Request $request)
    {
        $request->validate([
            'song_id' => 'required|exists:songs,id',
            'playlist_id' => 'required|exists:playlists,id',
        ]);
    
        $song = Song::find($request->song_id);
        $playlist = Playlist::find($request->playlist_id);
    
        if ($playlist->songs()->where('song_id', $song->id)->exists()) {
            return redirect()->back()->with('error', 'This song is already in the playlist.');
        }

        $playlist->songs()->attach($song->id);
    
        return redirect()->back()->with('success', 'Song added to the playlist!');
    }
    


}
