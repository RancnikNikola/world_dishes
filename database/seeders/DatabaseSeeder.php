<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MealTranslation;
use App\Models\Meal;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    protected $model = MealTranslation::class;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Category::truncate();
        // Meal::truncate();
        // MealTranslation::truncate();

        MealTranslation::factory()->create();
    }
}
