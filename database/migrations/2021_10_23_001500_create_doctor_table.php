<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_consultorio')->unsigned();
            $table->string('nombre',100)->nullable();
            $table->string('apellidos',100)->nullable();
            $table->string('foto_ruta',100)->nullable();
            $table->string('usuario',100)->nullable();
            $table->string('contra',250)->nullable();
            $table->string('email',50)->nullable();
            $table->string('numero_contacto',10)->nullable();
            $table->string('sexo',20)->nullable();
            $table->time('horarioE');
            $table->time('horarioS');
            $table->foreign('id_consultorio')->references('id')->on('consultorio');
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
        Schema::dropIfExists('doctor');
    }
}
