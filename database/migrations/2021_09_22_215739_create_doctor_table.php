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

            $table->bigIncrements('id_doctor');
            $table->bigInteger('id_consultorio')->unsigned();
            $table->string('nombre',100)->nullable();
            $table->string('apellidos',100)->nullable();
            $table->string('profile_photo_path',100)->nullable();
            $table->string('usuario',100)->nullable();
            $table->string('contra',250)->nullable();
            $table->string('email',50)->nullable();
            $table->string('telefono',10)->nullable();
            $table->string('celular',10)->nullable();
            $table->string('sexo',20)->nullable();
            $table->bigInteger('horarios')->nullable()->unsigned();
            $table->string('rol',20)->nullable();
            $table->tinyInteger('status')->default('1');
            $table->foreign('id_consultorio')->references('id_consultorio')->on('consultorio');
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
