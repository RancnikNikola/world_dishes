<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {


        // foreach (config('translatable.locales') as $locale) {
        //     $rules[$locale . '.title'] = 'string';
        //     $rules[$locale . '.full_text'] = 'string';
        // }


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
