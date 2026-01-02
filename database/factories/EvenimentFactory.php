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
        $numeEvenimente = [
            'Târgul de Nunți "Vis de Iubire"',
            'Expoziția Anuală de Flori Exotice',
            'Atelier de Coronițe de Crăciun',
            'Workshop: Cum să faci un aranjament floral',
            'Festivalul Lalelelor',
            'Ziua Porților Deschise la Florărie',
            'Lansarea Colecției de Primăvară',
            'Curs de Design Floral pentru Începători',
            'Eveniment Caritabil "Flori pentru Suflet"',
            'Târgul de Flori de Toamnă'
        ];

        $descrieri = [
            'Vă invităm să descoperiți cele mai noi tendințe în materie de aranjamente florale. Intrarea este liberă!',
            'Un eveniment dedicat iubitorilor de frumos. Veniți să admirați specii rare de flori și să învățați cum să le îngrijiți.',
            'Învață să creezi propriul tău aranjament floral sub îndrumarea floriștilor noștri experți. Materialele sunt incluse.',
            'O atmosferă de poveste, muzică live și mii de flori colorate. Vă așteptăm cu drag!',
            'Evenimentul perfect pentru viitorii miri. Găsiți inspirație pentru buchetul de mireasă și decorul sălii.'
        ];

        return [
            'nume_eveniment' => $this->faker->randomElement($numeEvenimente), //titlu din 3 cuvinte
            'data_eveniment' => $this->faker->dateTimeBetween('now', '+1 year'), //data în viitor
            'descriere' => $this->faker->randomElement($descrieri),
        ];
    }
}
