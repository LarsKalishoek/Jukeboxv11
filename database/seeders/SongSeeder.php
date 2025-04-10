<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Song;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Song::create([
            "title" => "aaa",
            "artist" => "aaa",
            "genre_id" => 1,
            "file_path" => "songs/1742829188_Just listen to the song.mp3"
        ]);

        Song::factory()->count(100)->create();
    }
}
