<?php

namespace Database\Factories;

use App\Models\Ingredient;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;


class IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->sentence;

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
