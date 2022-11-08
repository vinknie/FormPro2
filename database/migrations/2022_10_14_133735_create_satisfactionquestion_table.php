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
        Schema::create('satisfactionquestion', function (Blueprint $table) {
            $table->bigIncrements('id_satisfactionquestion');
            $table->bigInteger('id_qcmsatisfaction')->unsigned();
            $table->string('question');
            $table->string('reponse1');
            $table->string('reponse2');
            $table->string('reponse3');
            $table->string('reponse4');
            $table->foreign('id_qcmsatisfaction')->references('id_qcmsatisfaction')->on('qcmsatisfaction');
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
        Schema::dropIfExists('satisfaction_question');
    }
};
