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
            'id_number'=> $this->faker->unique()->numberBetween(20000000, 29999999),
            'fName' => $this->faker->firstname(),
            'mName' => $this->faker->randomElement(['Jon', 'Sur', 'Mer', 'Pol', 'Her', 'Hur', 'Bur']),
            'lName' => $this->faker->lastname(),
        ];
    }
}
