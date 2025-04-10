<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Http\Controllers\Genre;
use App\Models\Genre;

class Song extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'title',
        'artist',
        'genre_id', 
        'file_path',
    ];

    public function playlists(){
        return $this->belongsToMany(Playlist::class);
    }
    public function genre(){
        return $this->belongsTo(Genre::Class);
    }
}
