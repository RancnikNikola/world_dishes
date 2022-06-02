<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    
        return [

            'category_id' => rand(null, 5),

            'en' => [
                'title' => $this->faker->unique()->sentence,
                'description' =>  $this->faker->unique()->paragraph,
            ],
            'es' => [
                'title' => $this->faker->unique()->sentence,
                'description' =>  $this->faker->unique()->paragraph,
            ],
            'it' => [
                'title' => $this->faker->unique()->sentence,
                'description' =>  $this->faker->unique()->paragraph,
            ],
            'status' => 'created'

        ];
    }
}
