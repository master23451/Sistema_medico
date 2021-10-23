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
            $table->id();
            $table->string('nombre',100);
            $table->string('apellidos', 150);
            $table->string('expediente', 255);
            $table->string('profile_photo_path',255);
            $table->string('usuario');
            $table->string('contra',250)->nullable();
            $table->string('email')->unique();
            $table->string('numero_contacto',10);
            $table->string('sexo',10);
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
