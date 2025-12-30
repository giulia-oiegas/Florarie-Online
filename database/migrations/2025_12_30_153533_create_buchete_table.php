<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBucheteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buchete', function (Blueprint $table) {
            $table->id();
            $table->string('nume'); //numele buchetului
            $table->decimal('pret', 8, 2); //pret (8 cifre, 2 zecimale)
            $table->string('tip_floare'); //categoria (trandafiri, lalele, etc...)
            $table->text('descriere')->nullable(); // descriere (optionala)
            $table->string('imagine_url')->nullable(); //link poza

            $table->enum('status', ['activ', 'inactiv'])->default('activ'); //status cu valoare implicita

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buchete');
    }
}
