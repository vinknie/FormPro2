<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenquestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenquestion', function (Blueprint $table) {
            $table->bigIncrements('id_examenQuestion');
            $table->bigInteger('id_qcmexamen')->unsigned();
            $table->string('question');
            $table->string('reponse1');
            $table->string('reponse2');
            $table->string('reponse3');
            $table->string('reponse4');
            $table->foreign('id_qcmexamen')->references('id_qcmexamen')->on('qcmexamen');
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
        Schema::dropIfExists('examenquestion');
    }
}
