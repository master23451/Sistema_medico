<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente', function (Blueprint $table) {

            $table->bigIncrements('id_paciente');
            $table->string('nombre',100)->nullable();
            $table->string('apellidos', 150)->nullable();
            $table->string('expediente', 255)->nullable();
            $table->string('profile_photo_path',255)->nullable();
            $table->string('usuario',100)->nullable();
            $table->string('contrasena',250)->nullable();
            $table->string('email')->unique();
            $table->string('telefono',10)->nullable();
            $table->string('celular',10)->nullable();
            $table->string('sexo',10)->nullable();
            $table->string('rol',20)->nullable();
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('paciente');
    }
}
