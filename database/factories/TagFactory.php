<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->word;

        return [
            'en' => [
                'title' => $title,
            ],
            'slug' => Str::slug($title),
            'es' => [
                'title' => $title,
            ],
            'slug' => Str::slug($title),
            'it' => [
                'title' => $title,
            ],
            'slug' => Str::slug($title),
        ];
    }
}
