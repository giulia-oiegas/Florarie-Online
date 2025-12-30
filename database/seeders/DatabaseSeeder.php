<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //cream 20 buchete
        \App\Models\Buchet::factory(20)->create();

        //cream 50 recenzii (distribuite aleatoriu la buchete)
        \App\Models\Recenzie::factory(50)->create();

        //cream 10 evenimente
        \App\Models\Eveniment::factory(10)->create();
    }
}
