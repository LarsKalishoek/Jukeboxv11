<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/users', [ProfileController::class, 'showUsers']);
Route::get('/songs', [SongController::class, 'showSongs']);
Route::get('/playlists', [PlaylistController::class, 'showPlaylists'])->name('playlists');
Route::get('/addPlaylist', [PlaylistController::class, 'showAddPlaylistForm']);
Route::get('/addSong', [SongController::class, 'songAdd'])->name('songs.add');
Route::post('/addSong', [SongController::class, 'addSong']);
Route::post('/addPlaylist', [PlaylistController::class, 'addPlaylist'])->name('playlists.addPlaylist');
// Route::get('/playlist/{id}', [PlaylistController::class, 'showPlaylist']);
Route::get('/playlist/{playlist}', [PlaylistController::class, 'showPlaylistSongs'])->name('playlists.show');
Route::get('/songs/{id}', [SongController::class, 'viewSong'])->name('songs.view');
Route::delete('/songs/{id}', [SongController::class, 'deleteSong'])->name('songs.delete');
Route::post('/songs/{song}/add-to-playlist', [SongController::class, 'addToPlaylist'])->name('songs.addToPlaylist');
Route::post('/playlists/add-song', [PlaylistController::class, 'addSong'])->name('playlists.addSong');
Route::post('/playlist/{playlistId}/song/{songId}/remove', [PlaylistController::class, 'removeSongFromPlaylist'])->name('playlists.removeSong');
Route::delete('/playlists/{playlist}', [PlaylistController::class, 'destroy'])->name('playlists.delete');
Route::delete('/genres/{genre}', [GenreController::class, 'destroy'])->name('genres.delete');
Route::get('/genres', [GenreController::class, 'showGenre'])->name('genres.genre');
Route::get('/addGenre', [GenreController::class, 'showGenreForm']); 
Route::post('/addGenre', [GenreController::class, 'addGenre'])->name('genres.addGenre');
Route::get('/playlist/{genre}', [GenreController::class, 'showSongWithGenre']);
Route::get('/genre/{genre}', [GenreController::class, 'showGenreSongs'])->name('genres.show');

require __DIR__.'/auth.php';