<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MealTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MealTranslation::factory()->times(5)->create();
    }
}
