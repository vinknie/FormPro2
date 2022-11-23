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
        Schema::create('user_formation', function (Blueprint $table) {
            $table->bigInteger('id_utilisateur')->unsigned();
            $table->bigInteger('id_formation')->unsigned();

            $table->primary(['id_utilisateur', 'id_formation']);
            
            $table->foreign('id_utilisateur')->references('id')->on('utilisateurs');
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
        Schema::dropIfExists('user_formation');
    }
};
