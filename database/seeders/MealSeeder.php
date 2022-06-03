<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Meal;
use App\Models\Ingredient;
use Illuminate\Database\Seeder;


class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Meal::factory()->count(15)->create();

        foreach (Meal::all() as $meal) {
            $tags = Tag::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $ingredients = Ingredient::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $meal->tags()->attach($tags);
            $meal->ingredients()->attach($ingredients);
        }
    }
}
