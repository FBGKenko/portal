<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string("correo", 100)->unique();
            $table->string("telefono",20)->unique();
            $table->string("clave");
            $table->dateTime("ultimaConexion")->nullable();
            $table->string("nombres",50);
            $table->string("apellidos",50);
            $table->string("tipo")->default("Cliente");
            $table->date("cumpleanios")->nullable();
            $table->string("origen",50)->nullable();
            $table->timestamps();

            $table->index('correo');
            $table->index('nombres');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
