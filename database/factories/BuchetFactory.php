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
        //lista de nume frumoase pentru buchete
    $numeBuchete = [
        'Vis de Primăvară', 'Romantism Pur', 'Trandafiri Pasionali',
        'Simfonie de Culori', 'Buchetul Miresei', 'Raza de Soare',
        'Eleganță Albă', 'Lalele Multicolore', 'Magia Iernii',
        'Sărut Dulce', 'Grădina Secretă', 'Bujori Imperiali',
        'Buchet Aniversar', 'Flori de Câmp', 'Dragoste Eternă'
    ];

    //lista de descrieri scurte
    $descrieri = [
        'Un aranjament floral deosebit, perfect pentru orice ocazie specială.',
        'Flori proaspete, alese cu grijă pentru a transmite cele mai frumoase emoții.',
        'O combinație vibrantă de culori și parfumuri care înveselește ziua.',
        'Elegant și rafinat, acest buchet este cadoul ideal pentru persoana iubită.',
        'Creat cu pasiune de floriștii noștri, folosind cele mai proaspete plante.'
    ];

        return [
            //genereaza 3 cuv aleatoare pt nume (ex: "Buchet Mare Roz)
            'nume' => $this->faker->randomElement($numeBuchete),

            //pret intre 50 si 500 lei
            'pret' => $this->faker->randomFloat(2, 50, 500),

            //alegem aleatoriu dintr-o lista fixa
            'tip_floare' => $this->faker->randomElement(['Trandafiri', 'Lalele', 'Bujori', 'Hortensii', 'Mix']),

            //un text scurt
            'descriere' => $this->faker->randomElement($descrieri),

            //o poza placeholder de pe net
            'imagine_url' => 'https://loremflickr.com/400/300/bouquette?random=' . rand(1, 9999),

            'status' => 'activ',

        ];
    }
}
