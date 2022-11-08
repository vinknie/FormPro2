<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presence', function (Blueprint $table) {
            $table->bigIncrements('id_presence');
            $table->boolean('presence');
            $table->date('date');
            $table->bigInteger('id_eleve')->unsigned();
            $table->bigInteger('id_formation')->unsigned();
            $table->foreign('id_eleve')->references('id')->on('utilisateurs');
            $table->foreign('id_formation')->references('id_formation')->on('formation');
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
        Schema::dropIfExists('presence');
    }
};
