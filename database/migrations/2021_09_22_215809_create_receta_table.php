<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receta', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_doctor')->unsigned();
            $table->bigInteger('id_consultorio')->unsigned();
            $table->bigInteger('id_paciente')->unsigned();
            $table->text('medicamentos');
            $table->dateTime('fechaE');
            $table->foreign('id_doctor')->references('id_doctor')->on('doctor');
            $table->foreign('id_consultorio')->references('id_consultorio')->on('consultorio');
            $table->foreign('id_paciente')->references('id_paciente')->on('paciente');
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
        Schema::dropIfExists('receta');
    }
}
