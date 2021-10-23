<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensajeAdministradsorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensaje_administradsor', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_administrador')->unsigned();
            $table->string('titulo',255)->nullable();
            $table->text('mensaje')->nullable();
            $table->string('imagen',255)->nullable();
            $table->dateTime('fercha de publicacion')->nullable();
            $table->foreign('id_administrador')->references('id')->on('administrador');
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
        Schema::dropIfExists('mensaje_administradsor');
    }
}
