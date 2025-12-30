<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecenziiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recenzii', function (Blueprint $table) {
            $table->id();
            $table->string('nume_client'); //cine a scris recenzia
            $table->text('text_recenzie'); //povestea/opinia
            $table->integer('nota')->default(5); //o nota(optional)

            //relatia - leaga recenzia de un buchet
            //daca stergi buchetul, se sterg si recenziile
            $table->foreignId('buchet_id')->constrained('buchete')->onDelete('cascade');

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
        Schema::dropIfExists('recenzii');
    }
}
