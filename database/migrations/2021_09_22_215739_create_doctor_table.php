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

            $table->bigInteger('id')->unique()->unsigned()->primary();
            $table->bigInteger('id_consultorio')->unsigned();
            $table->string('nombre',100)->nullable();
            $table->string('apellido_P', 150)->nullable();
            $table->string('apellido_M', 150)->nullable();
            $table->string('profile_photo_path',255)->nullable();
            $table->string('direccion',255)->nullable();
            $table->string('cp',50)->nullable();
            $table->string('colonia',100)->nullable();
            $table->string('telefono',10)->nullable();
            $table->string('celular',10)->nullable();
            $table->string('email',255)->nullable()->unique();
            $table->string('sexo',50)->nullable();
            $table->time('horario_E')->nullable();
            $table->time('horario_S')->nullable();
            $table->bigInteger('rol')->nullable();
            $table->tinyInteger('status')->default('1');
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
