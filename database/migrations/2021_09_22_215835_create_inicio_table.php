<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inicio', function (Blueprint $table) {
            $table->id();
            $table->text('intro');
            $table->text('horaE');
            $table->text('horaS');
            $table->string('telefono',10);
            $table->string('correo',250);
            $table->text('direccion');
            $table->string('logo',255);
            $table->string('favicon',255);
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
        Schema::dropIfExists('inicio');
    }
}
