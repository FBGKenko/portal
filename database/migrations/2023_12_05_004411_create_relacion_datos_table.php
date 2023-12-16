<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('relacion_datos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('catalogo_dato_id')->constrained();
            $table->foreignId('seguimiento_id')->constrained();
            $table->boolean('compartido');
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
        Schema::dropIfExists('relacion_datos');
    }
};
