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
        $recenzii = [
        'Buchetul a fost absolut superb! Florile au rezistat aproape două săptămâni.',
        'Servicii ireproșabile. Livrarea a fost făcută la timp, exact când am stabilit.',
        'Am comandat pentru aniversarea soției și a fost extrem de impresionată. Recomand!',
        'Aranjamentul arată exact ca în poze, poate chiar mai bine în realitate.',
        'Flori proaspete și foarte parfumate. Mulțumesc echipei pentru profesionalism!',
        'O surpriză minunată! Nu mă așteptam să arate atât de elegant.',
        'Cel mai frumos buchet de trandafiri pe care l-am cumpărat vreodată.',
        'Raport calitate-preț excelent. Cu siguranță voi mai comanda.',
        'Personal foarte amabil, m-au ajutat să aleg florile potrivite pentru eveniment.',
        'Livrat cu grijă, florile au ajuns intacte. Mulțumesc!'
    ];

        return [
            'nume_client' => $this->faker->name, //nume random
            'text_recenzie' => $this->faker->randomElement($recenzii), //un text mai lung
            'nota' => rand(1, 5), //nota de la 1 la 5

            //alegem un ID random între 1 și 50
            'buchet_id' => rand(1, 20),
        ];
    }
}
