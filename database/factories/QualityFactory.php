<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QualityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quality' => $this->faker->unique->sentence(3),
        ];
    }
}
