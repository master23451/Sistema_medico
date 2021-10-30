<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user',100)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_photo_path',100)->nullable();
            $table->rememberToken();
            $table->string('telefono',10)->nullable();
            $table->string('celular',10)->nullable();
            $table->string('sexo',20)->nullable();
            $table->bigInteger('consultorio_id')->unsigned()->nullable();
            $table->bigInteger('rol')->unsigned()->nullable();
            $table->tinyInteger('status')->default('1');
            $table->foreign('rol')->references('id')->on('roles');
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
        Schema::dropIfExists('users');
    }
}
