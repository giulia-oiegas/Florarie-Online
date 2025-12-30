<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvenimenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenimente', function (Blueprint $table) {
            $table->id();
            $table->string('nume_eveniment'); //titlul evenimentului
            //event_date ca dateTime
            $table->dateTime('data_eveniment');
            $table->text('descriere'); //detalii despre eveniment

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
        Schema::dropIfExists('evenimente');
    }
}
