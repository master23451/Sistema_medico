<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministradorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrador', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100)->nullable();
            $table->string('apellidos',100)->nullable();
            $table->string('profile_photo_path',100)->nullable();
            $table->string('usuario',100)->nullable();
            $table->string('contra',250)->nullable();
            $table->string('email',50)->nullable();
            $table->string('numero_contacto',10)->nullable();
            $table->string('sexo',20)->nullable();
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
        Schema::dropIfExists('administrador');
    }
}
