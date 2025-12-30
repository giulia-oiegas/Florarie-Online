<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BuchetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            //genereaza 3 cuv aleatoare pt nume (ex: "Buchet Mare Roz)
            'nume' => $this->faker->words(3, true),

            //pret intre 50 si 500 lei
            'pret' => $this->faker->randomFloat(2, 50, 500),

            //alegem aleatoriu dintr-o lista fixa
            'tip_floare' => $this->faker->randomElement(['Trandafiri', 'Lalele', 'Bujori', 'Hortensii', 'Mix']),

            //un text scurt
            'descriere' => $this->faker->sentence(10),

            //o poza placeholder de pe net
            'imagine_url' => 'https://via.placeholder.com/300?text=Floare',

            'status' => 'activ',

        ];
    }
}
