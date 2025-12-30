<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EvenimentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nume_eveniment' => $this->faker->sentence(3), //titlu din 3 cuvinte
            'data_eveniment' => $this->faker->dateTimeBetween('now', '+1 year'), //data în viitor
            'descriere' => $this->faker->paragraph,
        ];
    }
}
