<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RecordsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_number'=> $this->faker->numberBetween(20000000, 29999999),
            'name' => $this->faker->name,

        ];
    }
}
