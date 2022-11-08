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
        Schema::create('notes', function (Blueprint $table) {
            $table->bigInteger('id_eleve')->unsigned();
            $table->bigInteger('id_matiere')->unsigned();
            $table->string('reponse');

            $table->primary(['id_eleve', 'id_matiere']);
            
            $table->foreign('id_eleve')->references('id')->on('utilisateurs');
            $table->foreign('id_matiere')->references('id_matiere')->on('matiere');
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
        Schema::dropIfExists('notes');
    }
};
