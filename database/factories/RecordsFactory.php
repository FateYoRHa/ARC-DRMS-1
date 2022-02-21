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
            'fName' => $this->faker->firstname(),
            'mName' => $this->faker->randomElement(['Jon', 'Sur', 'Mer', 'Pol']),
            'lName' => $this->faker->lastname(),
        ];
    }
}
