<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Meal;

class MealTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'locale' => 'en',
            'meal_id' => Meal::factory(),
            'title' => $this->faker->sentence(2),
            'description' => $this->faker->sentence,
            // 'status' => $this->faker->word,
            // 'image' => $this->faker->image(null, 640, 480),
            // 'category_id' => Category::factory()
        ];
    }
}
