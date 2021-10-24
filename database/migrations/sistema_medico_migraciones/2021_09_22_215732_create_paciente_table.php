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
            $table->string('nombre',100)->nullable();
            $table->string('apellidos', 150)->nullable();
            $table->string('expediente', 255)->nullable();
            $table->string('profile_photo_path',255)->nullable();
            $table->string('usuario')->nullable();
            $table->string('contra',250)->nullable();
            $table->string('email')->unique();
            $table->string('numero_contacto',10)->nullable();
            $table->string('sexo',10)->nullable();
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
