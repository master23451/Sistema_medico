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

            $table->bigInteger('id')->unique()->unsigned()->primary();
            $table->string('expediente', 255)->nullable()->unique();
            $table->string('nombre',100)->nullable();
            $table->string('apellido_P', 150)->nullable();
            $table->string('apellido_M', 150)->nullable();
            $table->string('profile_photo_path',255)->nullable();
            $table->string('direccion',255)->nullable();
            $table->string('telefono',10)->nullable();
            $table->string('celular',10)->nullable();
            $table->string('email',255)->nullable();
            $table->string('sexo',10)->nullable();
            $table->bigInteger('rol')->nullable();
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
