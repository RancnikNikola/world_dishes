<?php

namespace Database\Factories;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

class LanguageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        foreach (config('translatable.locales') as $locale) {
            return [
                'lang' => $locale,
            ];
        }
    }
}
