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
        Schema::create('reponsesatisfaction', function (Blueprint $table) {
            $table->bigIncrements('id_reponsesatisfaction');
            
            $table->bigInteger('id_qcmsatisfaction')->unsigned();
            $table->foreign('id_qcmsatisfaction')->references('id_qcmsatisfaction')->on('qcmsatisfaction');
            $table->bigInteger('id_eleve')->unsigned();
            $table->foreign('id_eleve')->references('id')->on('utilisateurs');
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
        Schema::dropIfExists('reponse_satisfaction');
    }
};
