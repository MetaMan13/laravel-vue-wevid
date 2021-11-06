<?php

namespace Database\Factories;

use App\Models\Gif;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class GifFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gif::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'path' => $this->faker->word(),
            'file_name' => $this->faker->word(),
            'video_id' => Video::all()->random()->id, 
        ];
    }
}
