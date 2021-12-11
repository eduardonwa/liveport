<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(2),
            'description' => $this->faker->paragraph(),
            'display_date' => $this->faker->date('F j, Y'),
            'url' => $this->faker->url(),
        ];
    }
}
