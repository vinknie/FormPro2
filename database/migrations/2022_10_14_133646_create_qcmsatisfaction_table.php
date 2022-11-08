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
        Schema::create('qcmsatisfaction', function (Blueprint $table) {
            $table->bigIncrements('id_qcmsatisfaction');
            $table->string('nom');
            $table->bigInteger('id_formation')->unsigned();
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
        Schema::dropIfExists('qcmsatisfaction');
    }
};
