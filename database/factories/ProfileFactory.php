<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->name(),
            'bio' => $this->faker->text(),
            'linkedin_url' => $this->faker->url(),
            'optional' => $this->faker->sentence(4),
        ];
    }
}
