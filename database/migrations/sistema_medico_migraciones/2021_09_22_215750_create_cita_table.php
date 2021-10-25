<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_doctor')->unsigned();
            $table->bigInteger('id_consultorio')->unsigned();
            $table->bigInteger('id_paciente')->unsigned();
            $table->string('nombre',100);
            $table->string('apellidos', 150);
            $table->text('documento');
            $table->dateTime('inicio');
            $table->dateTime('final');
            $table->foreign('id_doctor')->references('id_doctor')->on('info_doctor');
            $table->foreign('id_consultorio')->references('id_consultorio')->on('info_doctor');
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
        Schema::dropIfExists('cita');
    }
}
