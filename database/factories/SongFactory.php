<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $filePathOptions = ["songs/1742829188_Just listen to the song.mp3", "songs/1743165634_5 sec video ad (sample 2) [m9coOXt5nuw].mp3"];
        return [
            "title" => fake()->sentence(3),
            "artist" => fake()->word(1),
            "genre_id" => fake()->numberBetween(1,20),
            "file_path" => $filePathOptions[array_rand($filePathOptions)],
        ];
    }
}
