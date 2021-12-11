<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ToolboxFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tool' => $this->faker->word(),
        ];
    }
}
