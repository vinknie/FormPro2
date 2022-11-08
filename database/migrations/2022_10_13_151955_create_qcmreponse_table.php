<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQcmreponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qcmreponse', function (Blueprint $table) {
            $table->bigInteger('id_qcmexamen')->unsigned();
            $table->bigInteger('id_examenQuestion')->unsigned();
            $table->string('reponse');

            $table->primary(['id_qcmexamen', 'id_examenQuestion']);
            $table->foreign('id_qcmexamen')->references('id_qcmexamen')->on('qcmexamen');
            $table->foreign('id_examenQuestion')->references('id_examenQuestion')->on('examenquestion');
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
        Schema::dropIfExists('qcmreponse');
    }
}
