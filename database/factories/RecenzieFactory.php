<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RecenzieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nume_client' => $this->faker->name, //nume random
        'text_recenzie' => $this->faker->paragraph, //un text mai lung
        'nota' => rand(1, 5), //nota de la 1 la 5

        //alegem un ID random între 1 și 50
        'buchet_id' => rand(1, 20),
        ];
    }
}
