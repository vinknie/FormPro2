<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQcmexamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qcmexamen', function (Blueprint $table) {
            $table->bigIncrements('id_qcmexamen');
            $table->bigInteger('id_matiere')->unsigned();
            $table->string('nom');
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
        Schema::dropIfExists('qcmexamen');
    }
}
