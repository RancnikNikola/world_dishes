<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MealTranslation;
use App\Models\Meal;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            TagSeeder::class,
            IngredientSeeder::class,
            LanguageSeeder::class,
            MealSeeder::class
        ]);
    }
}
